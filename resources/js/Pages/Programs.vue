<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout header="Programs">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <Table :rows="programs" cols="programHeaders">
                            <template #body-cell-exercises="{ row }">
                                <q-td>
                                    <Row column>
                                        <p
                                            v-for="exercise in row.exercises"
                                            :key="exercise.id"
                                        >
                                            {{ exercise.name }}
                                        </p>
                                    </Row>
                                </q-td>
                            </template>

                            <template #body-cell-actions="{ row }">
                                <q-td>
                                    <Button icon="delete" flat />
                                    <Button icon="edit" flat />
                                </q-td>
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
            <pre>{{ programs }}</pre>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";

defineProps({
    programs: {
        type: Array,
        default: () => [],
    },
});
</script>
