<template>
    <div class="q-pa-sm">
        <nav class="flex justify-between">
            <div class="shrink-0 flex items-center">
                <Link :href="route('dashboard')">
                    <ApplicationLogo class="block h-9 w-auto" />
                </Link>
            </div>

            <div class="q-gutter-xs">
                <Modal label="Workout" color="green" title="Add Workout">
                    <Row column>
                        <Select
                            v-model="workout.program"
                            :options="$page.props.programs"
                            option-label="name"
                            emit-value
                            dropdown-icon="keyboard_arrow_down"
                            map-options
                        />
                        <DatePicker v-model="workout.date" />
                    </Row>

                    <template #actions="{ closeModal }">
                        <Button
                            label="Cancel"
                            color="secondary"
                            @click="closeModal"
                        />
                        <Link
                            :href="
                                route('workout', {
                                    program: workout.program.id,
                                })
                            "
                            method="post"
                            >Workout</Link
                        >
                    </template>
                </Modal>

                <q-btn-dropdown :label="$page.props.auth.user.name" flat>
                    <q-list>
                        <q-item clickable v-close-popup>
                            <Link href="/programs" class="flex full-width"
                                >Programs</Link
                            >
                        </q-item>

                        <q-item clickable v-close-popup href="/exercises">
                            <Link href="/exercises" class="flex full-width"
                                >Exercises</Link
                            >
                        </q-item>

                        <q-item clickable v-close-popup>
                            <q-item-section>
                                <Link
                                    href="/logout"
                                    method="post"
                                    class="flex full-width"
                                    >Logout</Link
                                >
                            </q-item-section>
                        </q-item>
                    </q-list>
                </q-btn-dropdown>
            </div>
        </nav>

        <header>
            <p class="text-h4">{{ header }}</p>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";

interface Program {
    id: number;
    name: string;
}

const workout = ref<{ date: string; program: Program }>({
    date: "",
    program: { id: 0, name: "" },
});

defineProps({
    header: {
        type: String,
        default: "",
    },
});
</script>
