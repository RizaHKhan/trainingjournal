<template>
    <slot name="activator" v-bind="{ openModal }">
        <Button v-bind="$attrs" @click="openModal" />
    </slot>

    <q-dialog v-model="modal" :persistent="persistent">
        <q-card :style="[size]">
            <q-card-section class="q-pb-none">
                <p class="text-h6">{{ title }}</p>
            </q-card-section>
            <q-card-section>
                <slot />
            </q-card-section>
            <q-card-actions align="right">
                <slot name="actions" v-bind="{ closeModal }" />
            </q-card-actions>
        </q-card>
    </q-dialog>
</template>

<script setup lang="ts">
import { ref, computed } from "vue"

const modal = ref(false)
const props = defineProps({
    title: {
        type: String,
        default: ""
    },
    size: {
        type: String,
        default: "medium",
        validator(val) {
            return ["small", "medium", "large"].includes(val)
        }
    },
    persistent: {
        type: Boolean,
        default: false
    }
})

const emit = defineEmits(["opened", "closed"])

const size = computed(() => {
    let style = {}
    switch (props.size) {
        case "small":
            style = { width: "300px" }
            break
        case "medium":
            style = { width: "700px", "max-width": "80vw" }
            break
        case "large":
            style = { "min-width": "95vw" }
            break
    }

    return style
})

const closeModal = () => {
    emit("closed")
    modal.value = false
}

const openModal = () => {
    emit("opened")
    modal.value = true
}
</script>

<script lang="ts">
export default {
    inheritAttrs: false
}
</script>
