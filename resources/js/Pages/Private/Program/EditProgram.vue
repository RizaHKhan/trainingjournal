<template>
    <Head title="Edit Program" />
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <Row column>
                        <TextInput v-model="form.name" label="Program Name" />
                        <TextInput
                            v-model="form.description"
                            label="Program Description"
                        />
                        <Table
                            title="Exercises"
                            :rows="form.exercises"
                            cols="exercisesHeader"
                        >
                            <template #top>
                                <Row>
                                    <p class="text-h6 q-ma-none">Exercises</p>
                                    <Row justify="flex-end">
                                        <Select
                                            v-model="selectedExercise"
                                            map-options
                                            emit-value
                                            option-label="name"
                                            :options="
                                        exercises.filter(
                                            (exericse):boolean =>
                                                !program.exercises
                                                    .map((e:Exercise) => e.id)
                                                    .includes(exericse.id)
                                        )
                                    "
                                        />
                                        <Button
                                            label="Add Exercise"
                                            @click="handleAddExercise"
                                        />
                                    </Row>
                                </Row>
                            </template>
                            <template #body-cell-sets="{ row }">
                                <q-td>
                                    <TextInput
                                        v-model="row.sets"
                                        placeholder="Sets for this exercise"
                                    />
                                </q-td>
                            </template>
                            <template #body-cell-actions="{ row }">
                                <q-td>
                                    <Button
                                        icon="delete"
                                        @click="deleteExercise(row.id)"
                                    />
                                </q-td>
                            </template>
                        </Table>
                    </Row>
                </div>
                <Row justify="flex-end">
                    <Button label="Save" @click="update" />
                </Row>
            </div>
            <pre>{{ program }}</pre>
            <pre>{{ extras }}</pre>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue"
import { useForm } from "@inertiajs/inertia-vue3"

interface Exercise {
    id: number
    name: string
}

const props = defineProps({
    program: {
        type: Object,
        default: () => {}
    },
    exercises: {
        type: Array,
        default: () => []
    },
    extras: {
        type: Array,
        default: () => []
    }
})

const selectedExercise = ref({ name: "", sets: 5 })
const form = useForm({ ...props.program })

const deleteExercise = (id: number) => {
    console.log(form.exercises)
    form.exercises = form.exercises.filter(
        (exercise: Exercise) => exercise.id !== id
    )
}

const handleAddExercise = () => {
    form.exercises.push({ ...selectedExercise.value, sets: 5 })
    selectedExercise.value = { name: "", sets: 5 }
}

const update = () => {
    form.put(`/programs/${props.program.id}`)
}
</script>
