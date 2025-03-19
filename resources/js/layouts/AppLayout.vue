<script setup lang="ts">
import AppSidebar from '@/components/AppSidebar.vue';
import { useSidebar } from '@/composables/useSidebar';
import { useMotion } from '@vueuse/motion';
import { Button, Toast } from 'primevue';
import { onMounted, unref, useTemplateRef, watch } from 'vue';

const sidebar = useSidebar();

const target = useTemplateRef('main-content');

const motionInstance = useMotion(target, {
    initial: {
        paddingLeft: sidebar.open.value && !sidebar.isMobile.value ? 300 : 8,
    },
    enter: {
        paddingLeft: 300,
        transition: {
            type: 'spring',
            stiffness: 180,
            damping: 25,
            mass: 0.5,
        },
    },
    leave: {
        paddingLeft: 8,
        transition: {
            type: 'spring',
            stiffness: 180,
            damping: 25,
            mass: 0.5,
        },
    },
});

onMounted(() => {
    if (sidebar.open.value) {
        motionInstance.apply('initial');
    } else {
        motionInstance.apply('leave');
    }
});

watch(sidebar.open, (open) => {
    if (open) {
        motionInstance.apply('enter');
    } else {
        motionInstance.apply('leave');
    }
});

watch(sidebar.isMobile, (isMobile) => {
    if (isMobile) {
        motionInstance.apply('leave');
    }

    if (!isMobile && sidebar.open.value) {
        motionInstance.apply('enter');
    }
});
</script>

<template>
    <div class="relative isolate flex min-h-svh w-full bg-surface-0 max-lg:flex-col lg:bg-surface-100 dark:bg-surface-900 dark:lg:bg-surface-950">
        <AppSidebar
            :open="unref(sidebar.open)"
            :open-mobile="unref(sidebar.openMobile)"
            :is-mobile="unref(sidebar.isMobile)"
        />

        <main
            ref="main-content"
            class="flex flex-1 flex-col pb-2 transition lg:min-w-0 lg:pr-2 lg:pt-2"
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
