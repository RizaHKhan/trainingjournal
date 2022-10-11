<template>
    <Head title="Log in" />

    <div v-if="status">
        {{ status }}
    </div>

    <q-form @submit.prevent="submit" class="flex column q-gutter-sm">
        <TextInput
            type="email"
            v-model="form.email"
            autofocus
            autocomplete="username"
            label="Email"
            :error="!!form.errors.email"
            @focus="form.clearErrors('email')"
        >
            <template #error>
                {{ form.errors.email }}
            </template>
        </TextInput>

        <TextInput
            type="password"
            v-model="form.password"
            autocomplete="current-password"
            label="Password"
            :error="!!form.errors.password"
            @focus="form.clearErrors('password')"
        >
            <template #error>
                {{ form.errors.password }}
            </template>
        </TextInput>

        <Checkbox name="remember" v-model="form.remember" label="Remember me" />

        <Link v-if="canResetPassword" :href="route('password.request')">
            Forgot your password?
        </Link>

        <Link :href="route('register')">
            Not yet a member? Register first.
        </Link>
        <Button
            :disabled="form.processing"
            type="submit"
            label="Log in"
            class="full-width"
        />
    </q-form>
</template>

<script setup lang="ts">
import { Link, useForm } from "@inertiajs/inertia-vue3";

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
