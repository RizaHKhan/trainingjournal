<template>
    <Head title="Forgot Password" />

    <div>
        Forgot your password? No problem. Just let us know your email address
        and we will email you a password reset link that will allow you to
        choose a new one.
    </div>

    <div v-if="status">
        {{ status }}
    </div>

    <form @submit.prevent="submit">
        <Row column>
            <TextInput
                v-model="form.email"
                label="Email"
                type="email"
                required
                autofocus
                autocomplete="username"
            />
            <Button :disabled="form.processing">
                Email Password Reset Link
            </Button>
        </Row>
    </form>
</template>

<script setup lang="ts">
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({
    status: String,
});

const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("password.email"));
};
</script>
