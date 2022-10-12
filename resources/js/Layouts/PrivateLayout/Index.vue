<template>
    <q-layout view="hHh lpR fFf">
        <q-header elevated class="bg-primary text-white" height-hint="98">
            <q-toolbar>
                <q-btn
                    dense
                    flat
                    round
                    icon="menu"
                    @click="leftDrawerOpen = !leftDrawerOpen"
                />

                <q-toolbar-title>
                    <Link :href="route('dashboard')" class="logo">
                        <Logo />
                    </Link>
                </q-toolbar-title>
                <q-spacer />

                <Modal
                    label="Add Workout"
                    color="green"
                    title="Add Workout"
                    class="q-mr-sm"
                >
                    <Row column>
                        <Select
                            v-model="workout.program"
                            :options="auth.user.programs"
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

                <q-btn-dropdown :label="auth.user.name" flat>
                    <q-list>
                        <q-item clickable v-close-popup class="q-pa-none">
                            <Link href="/programs" class="flex full-width link"
                                ><p class="q-my-auto q-mx-auto">
                                    Program
                                </p></Link
                            >
                        </q-item>

                        <q-item clickable v-close-popup class="q-pa-none">
                            <Link href="/exercises" class="flex full-width link"
                                ><p class="q-my-auto q-mx-auto">
                                    Exercises
                                </p></Link
                            >
                        </q-item>

                        <q-item clickable v-close-popup class="q-pa-none">
                            <Link href="/settings" class="flex full-width link"
                                ><p class="q-my-auto q-mx-auto">
                                    Settings
                                </p></Link
                            >
                        </q-item>

                        <q-item clickable v-close-popup class="q-pa-none">
                            <q-item-section>
                                <Link
                                    href="/logout"
                                    method="post"
                                    class="flex full-width link q-my-auto"
                                    ><p class="q-my-auto q-mx-auto">
                                        Logout
                                    </p></Link
                                >
                            </q-item-section>
                        </q-item>
                    </q-list>
                </q-btn-dropdown>
            </q-toolbar>
        </q-header>

        <q-drawer show-if-above v-model="leftDrawerOpen" side="left" bordered>
            <!-- drawer content -->
        </q-drawer>

        <q-page-container>
            <q-page class="q-pa-sm">
                <slot />
            </q-page>
        </q-page-container>
    </q-layout>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { date } from "quasar";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";
import Logo from "@/Components/Logo.vue";

const workout = useForm({
    date: date.formatDate(new Date(), "YYYY/MM/DD"),
    program: "",
});

const leftDrawerOpen = ref(true);

defineProps({
    header: {
        type: String,
        default: "",
    },
    auth: {
        type: Object,
        default: () => {},
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
