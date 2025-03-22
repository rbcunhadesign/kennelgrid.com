<script setup lang="ts">
import AppSidebar from '@/components/AppSidebar.vue';
import { useSidebar } from '@/composables/useSidebar';
import { cn } from '@/lib/utils';
import { Button, Toast } from 'primevue';
import { unref } from 'vue';

const sidebar = useSidebar();
</script>

<template>
    <div class="relative isolate flex min-h-svh w-full bg-surface-0 max-lg:flex-col lg:bg-surface-100 dark:bg-surface-900 dark:lg:bg-surface-950">
        <AppSidebar
            :open="unref(sidebar.open)"
            :open-mobile="unref(sidebar.openMobile)"
            :is-mobile="unref(sidebar.isMobile)"
            @update:open-mobile="sidebar.setOpenMobile"
        />

        <main
            ref="main-content"
            :class="
                cn('flex flex-1 flex-col pb-2 transition-all duration-200 ease-linear lg:min-w-0 lg:pr-2 lg:pt-2', [
                    sidebar.open.value ? 'lg:pl-64' : 'lg:pl-16',
                ])
            "
        >
            <div
                class="lg:shadow-xs grow p-6 lg:rounded-lg lg:bg-surface-0 lg:p-10 lg:ring-1 lg:ring-surface-950/5 dark:lg:bg-surface-900 dark:lg:ring-surface-0/10"
            >
                <div class="text-right">
                    <Button
                        label="Menu"
                        @click.prevent="sidebar.toggleSidebar"
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
