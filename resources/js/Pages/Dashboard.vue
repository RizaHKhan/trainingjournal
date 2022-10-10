<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout header="Dashboard">
        <Row>
            <q-card v-for="(workout, index) in workouts" :key="index">
                <q-card-section class="text-h6 text-weight-bold">{{
                    workout.name
                }}</q-card-section>
                <q-card-section
                    >Max:
                    <span class="text-weight-bold">{{
                        workout.max
                    }}</span></q-card-section
                >
            </q-card>
        </Row>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    workouts: {
        type: Array,
    },
});
</script>
