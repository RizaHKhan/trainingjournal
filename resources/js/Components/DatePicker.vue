<template>
    <TextInput v-model="date">
        <template #append>
            <Icon name="event" class="cursor-pointer">
                <q-popup-proxy
                    cover
                    transition-show="scale"
                    transition-hide="scale"
                >
                    <Date v-model="date" />
                </q-popup-proxy>
            </Icon>
        </template>
    </TextInput>
</template>

<script setup lang="ts">
import Date from "./Date.vue"
import { computed } from "vue"

const props = defineProps({
    modelValue: {
        type: String,
        default: ""
    }
})

const emit = defineEmits(["update:modelValue"])

const date = computed({
    get: () => props.modelValue,
    set: (val) => emit("update:modelValue", val)
})
</script>
