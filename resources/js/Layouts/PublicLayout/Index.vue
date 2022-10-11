<template>
    <div class="q-pa-sm">
        <Row row justify="space-between">
            <Logo />

            <div v-if="canLogin" class="flex justify-end">
                <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                    >Dashboard</Link
                >

                <template v-else>
                    <Link
                        :href="route('login')"
                        as="button"
                        class="btn q-my-auto q-mr-sm"
                        >Log in</Link
                    >

                    <Link
                        v-if="canRegister"
                        as="button"
                        class="btn"
                        :href="route('register')"
                        >Register</Link
                    >
                </template>
            </div>
        </Row>

        <Row class="q-mx-auto" style="width: 500px">
            <slot />
        </Row>
    </div>
</template>

<script setup lang="ts">
import Logo from "@/Components/Logo.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>
