<template>
    <Head title="Workout" />
    <Row justify="center">
        <p class="text-h6">{{ form.date }}</p>
    </Row>
    <Table :rows="exercises" cols="workoutHeader" :hide-pagination="true">
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
        <template #body-cell-comment="{ row }">
            <q-td>
                <TextInput v-model="row.comment" />
            </q-td>
        </template>
    </Table>
    <Row justify="flex-end">
        <Button label="Save" @click="saveWorkoutData" />
    </Row>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/inertia-vue3"

const props = defineProps({
    exercises: {
        type: Array,
        default: () => []
    },
    date: {
        type: String,
        default: ""
    },
    workoutId: {
        type: Number,
        default: -1
    },
    programId: {
        type: Number,
        default: -1
    }
})

const form = useForm({
    date: props.date,
    program_id: props.programId,
    exercises: [...props.exercises]
})

const saveWorkoutData = () => {
    if (props.workoutId > 0) {
        form.put(`/workout/${props.workoutId}`, { exercises: form.exercises })
    } else {
        form.post("/workout")
    }
}
</script>
