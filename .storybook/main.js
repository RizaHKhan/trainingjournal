module.exports = {
    stories: [
        "../resources/js/Components/**/*.stories.mdx",
        "../resources/js/Components/**/*.stories.@(js|jsx|ts|tsx)",
    ],
    addons: [
        "@storybook/addon-links",
        "@storybook/addon-essentials",
        "@storybook/addon-interactions",
    ],
    framework: "@storybook/vue3",
    core: {
        builder: "@storybook/builder-vite",
    },
    features: {
        storyStoreV7: true,
    },
};
