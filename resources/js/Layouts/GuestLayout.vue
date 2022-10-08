<template>
    <div class="q-pa-sm">
        <div>
            <Link href="/">
                <ApplicationLogo />
            </Link>
        </div>

        <div>
            <slot />
        </div>
    </div>
</template>

<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";
</script>
