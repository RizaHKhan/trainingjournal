<template>
    <Head title="Register" />

    <form @submit.prevent="submit">
        <Row column>
            <TextInput
                v-model="form.name"
                label="Name"
                autofocus
                autocomplete="name"
            />

            <TextInput
                v-model="form.email"
                label="Email"
                type="email"
                required
                autocomplete="username"
            />

            <TextInput
                v-model="form.password"
                label="Password"
                type="password"
                required
                autocomplete="new-password"
            />

            <TextInput
                v-model="form.password_confirmation"
                label="Password Confirmation"
                type="password"
                required
                autocomplete="new-password"
            />

            <Link
                :href="route('login')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
            >
                Already registered?
            </Link>

            <Button type="submit" :disabled="form.processing">
                Register
            </Button>
        </Row>
    </form>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/inertia-vue3"

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
    terms: false
})

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation")
    })
}
</script>
