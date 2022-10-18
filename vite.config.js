import { resolve } from "path"
import { defineConfig } from "vite"
import { quasar, transformAssetUrls } from "@quasar/vite-plugin"
import laravel from "laravel-vite-plugin"
import vue from "@vitejs/plugin-vue"

export default defineConfig({
    plugins: [
        laravel({
            input: "resources/js/app.ts",
            refresh: true
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false
                }
            }
        }),
        quasar({
            sassVariables: "resources/css/quasar-variables.scss"
        })
    ],
    resolve: {
        alias: {
            "@": resolve(__dirname, "./resources/js/")
        }
    }
})
