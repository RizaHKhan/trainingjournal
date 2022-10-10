<template>
    <Head title="Programs" />
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
                                    <Link
                                        class="link icon"
                                        :href="
                                            route('deleteProgram', {
                                                program: row.id,
                                            })
                                        "
                                        method="delete"
                                        ><Icon name="delete"
                                    /></Link>
                                    <Link
                                        class="link icon"
                                        :href="
                                            route('editProgram', {
                                                program: row.id,
                                            })
                                        "
                                    >
                                        <Icon name="edit" />
                                    </Link>
                                </q-td>
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    programs: {
        type: Array,
        default: () => [],
    },
});
</script>
