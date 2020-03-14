import { mount } from '@vue/test-utils'
import Works from './Works.vue'

describe('Works component', () => {
    const wrapper = mount(Works)

    it('have works-filter', () => {
        expect(wrapper.contains('.works__filter')).toBe(true)
    })
});
