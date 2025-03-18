<script setup lang="ts">
import { Button, Toast } from 'primevue';
import { ref } from 'vue';

const sidebarOpen = ref(true);
</script>

<template>
    <div class="relative isolate flex min-h-svh w-full bg-surface-0 max-lg:flex-col lg:bg-surface-100 dark:bg-surface-900 dark:lg:bg-surface-950">
        <div class="fixed inset-y-0 left-0 w-64 max-lg:hidden"></div>

        <main class="flex flex-1 flex-col pb-2 lg:min-w-0 lg:pl-64 lg:pr-2 lg:pt-2">
            <div
                class="lg:shadow-xs grow p-6 lg:rounded-lg lg:bg-surface-0 lg:p-10 lg:ring-1 lg:ring-surface-950/5 dark:lg:bg-surface-900 dark:lg:ring-surface-0/10"
            >
                <div>
                    <Button
                        label="Menu"
                        @click="sidebarOpen = !sidebarOpen"
                    />
                </div>
                <div class="mx-auto max-w-6xl">
                    <slot />
                </div>
            </div>
        </main>
    </div>

    <Toast />
</template>
