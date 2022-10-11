<template>
    <Head title="Welcome" />
    <div class="q-pa-sm">
        <div v-if="canLogin" class="flex justify-end">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                >Dashboard</Link
            >

            <template v-else>
                <Link :href="route('login')" class="q-mr-sm">Log in</Link>

                <Link v-if="canRegister" :href="route('register')"
                    >Register</Link
                >
            </template>
        </div>

        <div class="flex">
            <div class="flex column q-mx-auto">
                <p class="text-h4">The Training Journal</p>
                <p>Maintain your workout history in the cloud</p>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>
