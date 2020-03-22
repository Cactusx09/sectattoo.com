import Scrollbar from 'smooth-scrollbar';
import OverscrollPlugin from 'smooth-scrollbar/plugins/overscroll';

class ScrollAnimations {
    constructor(data) {
        this.data = data;
        this.options = {
            scrollBarOptions: {
                damping: 0.08,
                thumbMinSize: 3
            },
            scrollBarMobileSpeed: 0.3,
        };

        this.variables = {};

        this.classManipulate = {
            has: (element, className) => {
                return new RegExp(' ' + className + ' ').test(
                    ' ' + element.className + ' '
                );
            },

            add: (element, className, direction) => {
                if (!this.classManipulate.has(element, className)) {
                    element.className += ' ' + className;

                    if (element.getAttribute('data-aos-id')) {
                        // console.log('in', direction);
                        const event = new CustomEvent(`aos:in:${element.getAttribute('data-aos-id')}`, {
                            detail: direction,
                        });
                        document.dispatchEvent(event);
                    }
                }
            },

            remove: (element, className, direction) => {
                let newClass =
                    ' ' + element.className.replace(/[\t\r\n]/g, ' ') + ' ';
                if (this.classManipulate.has(element, className)) {
                    while (newClass.indexOf(' ' + className + ' ') >= 0) {
                        newClass = newClass.replace(' ' + className + ' ', ' ');
                    }
                    element.className = newClass.replace(/^\s+|\s+$/g, '');

                    if (element.getAttribute('data-aos-id')) {
                        // console.log('out', direction);
                        const event = new CustomEvent(`aos:out:${element.getAttribute('data-aos-id')}`, {
                            detail: direction,
                        });
                        document.dispatchEvent(event);
                    }
                }
            },
        };

        this.init();
    }

    init() {
        if (this.data.element !== undefined) {
            this.setVariables();
            this.setScrollBar();
        } else {
            console.error('Set an element!');
        }
    }

    setVariables() {
        this.variables.element = document.querySelector(this.data.element);
        this.variables.scrollBarOptions = this.data.scrollBarOptions
            ? this.data.scrollBarOptions
            : this.options.scrollBarOptions;
        this.variables.scrollBarMobileSpeed = this.options.scrollBarMobileSpeed;
        this.variables.elements = this.variables.element.querySelectorAll(
            '[data-aos]',
        );
        this.variables.parentElements = [];
        for (let a = 0; a < this.variables.elements.length; a++) {
            this.variables.parentElements[a] = this.variables.elements[a].parentElement;
        }
    }

    setScrollBar() {
        this.variables.parentPos = this.variables.element.getBoundingClientRect();
        this.variables.elementPos = {};
        this.variables.elementTop = {};
        this.variables.realPosition = {};
        if (this.isMobile() === true) {
            this.variables.elements.forEach((element) => {
                element.style.opacity = 1
                element.removeAttribute('data-aos');
            })
            this.isMobile = true;
            // return;
        }

        Scrollbar.use(OverscrollPlugin);
        this.variables.scrollBar = Scrollbar.init(
            this.variables.element,
            this.variables.scrollBarOptions
        );
        this.variables.scrollBar.track.xAxis.element.remove();

        let position = 0;
        let direction;
        let isVisible;
        this.variables.scrollBar.addListener((status) => {
            if (status.offset.y > position) {
                direction = 'down';
            } else {
                direction = 'up';
            }
            position = status.offset.y;
            for (let a = 0; a < this.variables.elements.length; a++) {

                const { bounding } = this.variables.scrollBar;
                const targetBounding = this.variables.parentElements[a].getBoundingClientRect();

                const topOffset = Number(this.variables.elements[a].getAttribute('data-aos-top-offset')) || 250;
                const bottomOffset = Number(this.variables.elements[a].getAttribute('data-aos-bottom-offset')) || 0;

                // check overlapping
                const top = Math.max(bounding.top, targetBounding.top + topOffset);
                const bottom = Math.min(bounding.bottom, targetBounding.bottom + bottomOffset);
                const left = Math.max(bounding.left, targetBounding.left);
                const right = Math.min(bounding.right, targetBounding.right);

                isVisible = top < bottom && left < right;
                // isVisible = this.variables.scrollBar.isVisible(
                //     this.variables.parentElements[a]
                // );

                if (isVisible) {
                    this.classManipulate.add(this.variables.elements[a], 'aos-animate', direction);
                } else if (
                    !isVisible &&
                    this.variables.elements[a].getBoundingClientRect().top > 0
                ) {
                    this.classManipulate.remove(
                        this.variables.elements[a],
                        'aos-animate',
                        direction,
                    );
                }
            }
        });
    }

    isMobile() {
        return window.matchMedia('(max-width: 720px)').matches
    }

    destroy() {
        Scrollbar.destroy(this.variables.element)
    }

    getScrollBar() {
        return this.variables.scrollBar
    }

    update() {
        Scrollbar.update(this.variables.element);
    }

    scrollIntoView(selector) {
        const element = document.querySelector(selector)
        this.variables.scrollBar.scrollIntoView(element)
    }

};

export default ScrollAnimations;
