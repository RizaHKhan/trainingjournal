<template>
    <Head title="Reset Password" />

    <form @submit.prevent="submit">
        <div>
            <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autofocus
                autocomplete="username"
            />
        </div>

        <div class="mt-4">
            <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
                autocomplete="new-password"
            />
        </div>

        <div class="mt-4">
            <TextInput
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
            />
        </div>

        <div class="flex items-center justify-end mt-4">
            <Button
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Reset Password
            </Button>
        </div>
    </form>
</template>

<script setup lang="ts">
import TextInput from "@/Components/TextInput.vue"
import { useForm } from "@inertiajs/inertia-vue3"

const props = defineProps({
    email: String,
    token: String
})

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: ""
})

const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation")
    })
}
</script>
