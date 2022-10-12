<template>
    <Head title="Dashboard" />
    <Row>
        <q-card v-for="(workout, index) in workouts" :key="index">
            <q-card-section class="text-h6 text-weight-bold">{{
                workout.name
            }}</q-card-section>
            <q-card-section
                >Max:
                <span class="text-weight-bold"
                    >{{ workout.max }} {{ auth.user.measurement.weight }}</span
                ></q-card-section
            >
        </q-card>
    </Row>
</template>

<script setup lang="ts">
defineProps({
    workouts: {
        type: Array,
    },
    auth: {
        type: Object,
        default: () => {},
    },
});
</script>
