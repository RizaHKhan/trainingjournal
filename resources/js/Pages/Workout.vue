<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout header="Programs">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p class="text-h3">{{ date }}</p>
                        <Table
                            :rows="exercises"
                            cols="workoutHeader"
                            :hide-pagination="true"
                        >
                            <template #body-cell-weight="{ row }">
                                <q-td>
                                    <TextInput v-model="row.weight" />
                                </q-td>
                            </template>
                            <template #body-cell-rpe="{ row }">
                                <q-td>
                                    <TextInput v-model="row.rpe" />
                                </q-td>
                            </template>
                        </Table>
                        <Row justify="end">
                            <Button label="Save" />
                        </Row>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";

const props = defineProps({
    exercises: {
        type: Array,
        default: () => [],
    },
    date: {
        type: String,
        default: "",
    },
});
</script>
