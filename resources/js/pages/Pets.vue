<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout>
        Pets Page
        <Link :href="route('dashboard')">Dashboard</Link>
    </AppLayout>
</template>
