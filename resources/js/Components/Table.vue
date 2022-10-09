<template>
    <q-table
        flat
        style="width: 100%"
        :columns="columns[cols]"
        :hide-pagination="true"
    >
        <template v-for="(_, slot) in $slots" #[slot]="scope">
            <slot :name="slot" v-bind="scope || {}" />
        </template>
    </q-table>
</template>

<script setup>
import useTable from "@/composables/useTable";

const props = defineProps({
    cols: {
        type: String,
        default: "",
    },
});

const { columns } = useTable();
</script>
