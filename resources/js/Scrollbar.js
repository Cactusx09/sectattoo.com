import Scrollbar from 'smooth-scrollbar';
import OverscrollPlugin from 'smooth-scrollbar/plugins/overscroll';

const ScrollAnimations = data => {
    const options = {
        scrollBarOptions: {
            damping: 0.08,
            thumbMinSize: 3
        },
        scrollBarMobileSpeed: 0.3,
    };

    const variables = {};

    const init = () => {
        if (data.element !== undefined) {
            setVariables();
            setScrollBar();
        } else {
            console.error('Set an element!');
        }
    };

    const classManipulate = {
        has: (element, className) => {
            return new RegExp(' ' + className + ' ').test(
                ' ' + element.className + ' '
            );
        },

        add: (element, className, direction) => {
            if (!classManipulate.has(element, className)) {
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
            if (classManipulate.has(element, className)) {
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
        }
    };

    const isMobile = () => {
        if (
            navigator.userAgent.match(/Android/i) ||
            navigator.userAgent.match(/webOS/i) ||
            navigator.userAgent.match(/iPhone/i) ||
            navigator.userAgent.match(/iPad/i) ||
            navigator.userAgent.match(/iPod/i) ||
            navigator.userAgent.match(/BlackBerry/i) ||
            navigator.userAgent.match(/Windows Phone/i)
        ) {
            return true;
        } else {
            return false;
        }
    };

    const setVariables = () => {
        variables.element = document.querySelector(data.element);
        variables.scrollBarOptions = data.scrollBarOptions
            ? data.scrollBarOptions
            : options.scrollBarOptions;
        variables.scrollBarMobileSpeed = options.scrollBarMobileSpeed;
        variables.elements = variables.element.querySelectorAll(
            '[data-aos]'
        );
        variables.parentElements = [];
        for (let a = 0; a < variables.elements.length; a++) {
            variables.parentElements[a] = variables.elements[a].parentElement;
        }
    };

    const setScrollBar = () => {
        variables.parentPos = variables.element.getBoundingClientRect();
        variables.elementPos = {};
        variables.elementTop = {};
        variables.realPosition = {};
        if (isMobile() === true) {
            class MobilePlugin extends ScrollbarPlugin {
                static pluginName = 'mobile';
                static defaultOptions = {
                    speed: variables.scrollBarMobileSpeed
                };
                transformDelta(delta, fromEvent) {
                    if (fromEvent.type !== 'touchend') {
                        return delta;
                    }

                    return {
                        x: delta.x * this.options.speed,
                        y: delta.y * this.options.speed
                    };
                }
            }
            Scrollbar.use(MobilePlugin);
        }

        Scrollbar.use(OverscrollPlugin);
        variables.scrollBar = Scrollbar.init(
            variables.element,
            variables.scrollBarOptions
        );
        let position = 0,
            direction,
            isVisible;
        variables.scrollBar.addListener(status => {
            if (status.offset.y > position) {
                direction = 'down';
            } else {
                direction = 'up';
            }
            position = status.offset.y;
            for (let a = 0; a < variables.elements.length; a++) {

                const { bounding } = variables.scrollBar;
                const targetBounding = variables.parentElements[a].getBoundingClientRect();

                const topOffset = Number(variables.elements[a].getAttribute('data-aos-top-offset')) || 250;
                const bottomOffset = Number(variables.elements[a].getAttribute('data-aos-bottom-offset')) || 0;

                // check overlapping
                const top = Math.max(bounding.top, targetBounding.top + topOffset);
                const bottom = Math.min(bounding.bottom, targetBounding.bottom + bottomOffset);
                const left = Math.max(bounding.left, targetBounding.left);
                const right = Math.min(bounding.right, targetBounding.right);

                isVisible = top < bottom && left < right;
                // isVisible = variables.scrollBar.isVisible(
                //     variables.parentElements[a]
                // );

                if (
                    isVisible
                ) {
                    classManipulate.add(variables.elements[a], 'aos-animate', direction);
                } else if (
                    !isVisible &&
                    variables.elements[a].getBoundingClientRect().top > 0
                ) {
                    classManipulate.remove(
                        variables.elements[a],
                        'aos-animate',
                        direction,
                    );
                }
            }
        });
    };

    return {
        init: () => {
            init();
        },
        publicMethods: {
            destroy: () => {
                Scrollbar.destroy(variables.element);
            },
            getScrollBar: () => {
                return variables.scrollBar;
            },
            update: () => {
                Scrollbar.update(variables.element);
            }
        }
    };
};

const scrollAnimations = data => {
    const scrollAnimations = new ScrollAnimations(data);
    scrollAnimations.init();
    return scrollAnimations.publicMethods;
};

export default scrollAnimations;
