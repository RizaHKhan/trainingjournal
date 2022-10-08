<template>
    <div class="q-pa-sm">
        <nav class="flex justify-between">
            <div class="shrink-0 flex items-center">
                <Link :href="route('dashboard')">
                    <ApplicationLogo class="block h-9 w-auto" />
                </Link>
            </div>

            <q-btn-dropdown :label="$page.props.auth.user.name" flat>
                <q-list>
                    <q-item clickable v-close-popup :href="route('programs')">
                        <q-item-section>
                            <q-item-label>Programs</q-item-label>
                        </q-item-section>
                    </q-item>

                    <q-item clickable v-close-popup>
                        <q-item-section>
                            <Link
                                href="/logout"
                                method="post"
                                class="flex full-width"
                                >Logout</Link
                            >
                        </q-item-section>
                    </q-item>
                </q-list>
            </q-btn-dropdown>
        </nav>

        <header>
            <p class="text-h4">{{ header }}</p>
        </header>

        <main>
            <slot />
        </main>
    </div>
</template>

<script setup lang="ts">
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    header: {
        type: String,
        default: "",
    },
});
</script>
