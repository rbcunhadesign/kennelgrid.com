<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout>
        Hello World!
        <Link :href="route('pets')">Pets</Link>
    </AppLayout>
</template>
