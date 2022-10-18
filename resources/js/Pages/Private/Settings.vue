<template>
    <q-form @submit.prevent="submit">
        <p class="text-h6">User Settings</p>
        <Row column>
            <TextInput v-model="form.name" @focus="form.clearErrors('name')">
                <template #error>
                    {{ form.errors.name }}
                </template>
            </TextInput>
            <TextInput v-model="form.email" disable />
            <Select
                v-model="form.measurement_system"
                :options="[
                    { label: 'Imperial', value: 'imperial' },
                    { label: 'Metric', value: 'metric' }
                ]"
            />
            <Button type="submit" label="Save" />
        </Row>
    </q-form>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3"

const props = defineProps({
    auth: {
        type: Object,
        default: () => {}
    }
})

const form = useForm({ ...props.auth.user })

const submit = () => {
    form.put("/settings")
}
</script>
