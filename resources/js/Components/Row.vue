<template>
    <div :style="styles">
        <slot></slot>
    </div>
</template>

<script setup lang="ts">
import { computed, useSlots } from "vue"
import useResponsiveness from "@/composables/useResponsiveness"
const { breakpoint } = useResponsiveness()

const props = defineProps({
    grid: {
        type: Boolean,
        default: false
    },
    column: {
        type: Boolean,
        default: false
    },
    row: {
        type: Boolean,
        default: false
    },
    columns: {
        type: String,
        default: ""
    },
    rows: {
        type: String,
        default: ""
    },
    flow: {
        type: String,
        default: ""
    },
    justify: {
        type: String,
        default: "",
        validator: (val: string) =>
            [
                "flex-start",
                "flex-end",
                "center",
                "space-between",
                "space-around",
                "space-evenly",
                ""
            ].includes(val)
    },
    gap: {
        type: String,
        default: "0.5rem"
    }
})

interface Style {
    display: string
    "grid-auto-flow": string
    "grid-template-columns": string
    "grid-template-rows": string
    width: string
    "flex-direction": string
    "flex-row": string
    "flex-flow": string
    "grid-gap": string
    "justify-content": string
}

const styles = computed(() => {
    const styles = <Style>{}

    if (props.grid) {
        styles["display"] = "grid"

        if (props.flow) {
            styles["grid-auto-flow"] = props.flow
        } else if (["xs", "sm"].includes(breakpoint.value)) {
            styles["grid-auto-flow"] = "row"
        } else {
            if (props.columns) {
                styles["grid-template-columns"] = props.columns
            } else {
                const slots = useSlots() as any
                const numOfElements = slots.default().length

                styles[
                    "grid-template-columns"
                ] = `repeat(${numOfElements}, 1fr)`
            }

            if (props.rows) {
                styles["grid-template-rows"] = props.rows
            }
        }
    } else {
        styles["display"] = "flex"
        styles["width"] = "100%"

        if (props.column) {
            styles["flex-direction"] = "column"
        } else if (props.row) {
            styles["flex-direction"] = "row"
        } else if (props.flow) {
            styles["flex-flow"] = props.flow
        } else if (["xs", "sm"].includes(breakpoint.value)) {
            styles["flex-flow"] = "column"
        } else {
            styles["flex-flow"] = "row"
        }
    }

    styles["grid-gap"] = props.gap

    if (props.justify) {
        styles["justify-content"] = props.justify
    }

    return styles
})
</script>
