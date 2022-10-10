import "@quasar/extras/roboto-font/roboto-font.css";
// These are optional
import "@quasar/extras/material-icons/material-icons.css";
// Loads the quasar styles and registers quasar functionality with storybook
import "quasar/dist/quasar.css";
import { app } from "@storybook/vue3";
import { Quasar } from "quasar";

// This is also where you would setup things such as pinia for storybook

app.use(Quasar, {});

export const parameters = {
    actions: { argTypesRegex: "^on[A-Z].*" },
    controls: {
        matchers: {
            color: /(background|color)$/i,
            date: /Date$/,
        },
    },
};
