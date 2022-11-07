import AuthLayout from "./Index.vue"

export default {
    title: "Layouts/AuthLayout",
    component: AuthLayout,
    argTypes: {}
}

const Template = (args) => ({
    components: { AuthLayout },
    setup() {
        return { args }
    },
    template: `<AuthLayout v-bind="args">
                some stuff goes here
              </AuthLayout>`
})

export const Primary = Template.bind({})
Primary.args = {}
