<template>
    <q-btn unelevated class="q-pa-sm" color="primary" no-caps>
        <template v-for="(_, slot) in $slots" #[slot]="scope">
            <slot :name="slot" v-bind="scope || {}" />
        </template>
    </q-btn>
</template>

<script setup lang="ts"></script>
