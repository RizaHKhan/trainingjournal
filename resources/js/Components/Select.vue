<template>
    <q-select outlined color="purple" dense emit-value map-options>
        <template v-for="(_, slot) in $slots" #[slot]="scope">
            <slot :name="slot" v-bind="scope || {}" />
        </template>
    </q-select>
</template>
