<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <q-form @submit.prevent="submit" class="flex column q-gutter-sm">
            <TextInput
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autofocus
                autocomplete="username"
                label="Email"
            />

            <TextInput
                type="password"
                v-model="form.password"
                required
                autocomplete="current-password"
                label="Password"
            />

            <Checkbox
                name="remember"
                v-model="form.remember"
                label="Remember me"
            />

            <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="underline text-sm text-gray-600 hover:text-gray-900"
            >
                Forgot your password?
            </Link>
            <Button
                :disabled="form.processing"
                type="submit"
                label="Log in"
                class="full-width"
            />
        </q-form>
    </GuestLayout>
</template>

<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>
