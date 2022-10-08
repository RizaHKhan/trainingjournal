import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { Quasar } from "quasar";

import Button from "@/Components/Button.vue";
import Checkbox from "@/Components/Checkbox.vue";
import TextInput from "@/Components/TextInput.vue";
import Table from "@/Components/Table.vue";
import Modal from "@/Components/Modal.vue";
import Row from "@/Components/Row.vue";
import Select from "@/Components/Select.vue";
import Icon from "@/Components/Icon.vue";
import DatePicker from "@/Components/DatePicker.vue";

import "@quasar/extras/material-icons/material-icons.css";
import "quasar/src/css/index.sass";

const appName = "The Training Journal";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(Quasar, {
                plugins: {},
            })
            .use(ZiggyVue, Ziggy)
            .component("Button", Button)
            .component("Checkbox", Checkbox)
            .component("TextInput", TextInput)
            .component("Table", Table)
            .component("Modal", Modal)
            .component("Row", Row)
            .component("Select", Select)
            .component("Icon", Icon)
            .component("DatePicker", DatePicker)
            .mount(el);
    },
});

InertiaProgress.init({ color: "#4B5563" });
