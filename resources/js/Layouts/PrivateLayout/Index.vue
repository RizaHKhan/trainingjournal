<template>
    <div class="q-pa-sm">
        <Row justify="space-between">
            <div>
                <Link :href="route('dashboard')">
                    <Logo />
                </Link>
            </div>

            <div class="q-gutter-xs">
                <Modal label="Add Workout" color="green" title="Add Workout">
                    <Row column>
                        <Select
                            v-model="workout.program"
                            :options="$page.props.auth.user.programs"
                            option-label="name"
                            option-value="id"
                            emit-value
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
                        <Button @click="submit(closeModal)" class="primary"
                            >Workout</Button
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
        </Row>

        <header>
            <p class="text-h4">{{ header }}</p>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>

<script setup lang="ts">
import { date } from "quasar";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Logo from "@/Components/Logo.vue";

const workout = useForm({
    date: date.formatDate(new Date(), "YYYY/MM/DD"),
    program: "",
});

defineProps({
    header: {
        type: String,
        default: "",
    },
});

const submit = (callback: () => void) => {
    workout.get(`/workout/${workout.program}`, {
        onFinish: () => {
            callback();
        },
    });
};
</script>
