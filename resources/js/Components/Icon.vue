<template>
    <q-icon size="sm">
        <template v-for="(_, slot) in $slots" #[slot]="scope">
            <slot :name="slot" v-bind="scope || {}" />
        </template>
    </q-icon>
</template>

<script setup lang="ts"></script>
