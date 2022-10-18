<template>
    <q-input ref="input" outlined :class="[...classes]" dense>
        <template v-for="(_, slot) in $slots" #[slot]="scope">
            <slot :name="slot" v-bind="scope || {}" />
        </template>
    </q-input>
</template>

<script setup lang="ts">
import { ref, computed } from "vue"

const input = ref(null)

const classes = computed(() => {
    const classes = []

    const beforeField = input?.value?.$el.querySelector(".q-field__before")
    if (beforeField) {
        classes.push("with-before")
    }

    const afterField = input?.value?.$el.querySelector(".q-field__after")
    if (afterField) {
        classes.push("with-after")
    }

    return classes
})
</script>

<style lang="scss">
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type="number"] {
    -moz-appearance: textfield;
}
</style>
