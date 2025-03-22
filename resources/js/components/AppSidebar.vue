<script setup lang="ts">
import SidebarContent from '@/components/SidebarContent.vue';
import SidebarFooter from '@/components/SidebarFooter.vue';
import SidebarHeader from '@/components/SidebarHeader.vue';
import { cn } from '@/lib/utils';
import { Drawer } from 'primevue';
import { computed } from 'vue';

const emit = defineEmits(['update:openMobile']);

const props = defineProps({
    open: Boolean,
    openMobile: Boolean,
    isMobile: Boolean,
});

const openMobileComputed = computed({
    get: () => props.openMobile,
    set: (value) => emit('update:openMobile', value),
});
</script>

<template>
    <div
        v-if="!props.isMobile"
        :class="cn('fixed inset-y-0 left-0 text-white transition-all duration-200 ease-linear', [props.open ? 'w-64' : 'w-16'])"
        :data-state="props.open ? 'full' : 'collapsed'"
    >
        <nav class="flex h-full min-h-0 flex-col">
            <div class="flex flex-col border-b border-zinc-950/5 p-4 dark:border-white/5 [&>[data-slot=section]+[data-slot=section]]:mt-2.5">
                <SidebarHeader />
            </div>
            <div class="flex flex-1 flex-col overflow-y-auto p-4 [&>[data-slot=section]+[data-slot=section]]:mt-8">
                <SidebarContent />
            </div>
            <div
                class="flex flex-col border-t border-zinc-950/5 p-4 max-lg:hidden dark:border-white/5 [&>[data-slot=section]+[data-slot=section]]:mt-2.5"
            >
                <SidebarFooter />
            </div>
        </nav>
    </div>

    <Drawer
        v-else
        v-model:visible="openMobileComputed"
        :show-close-icon="false"
    >
        <template #header>
            <SidebarHeader />
        </template>
        <SidebarContent />
        <template #footer>
            <SidebarFooter />
        </template>
    </Drawer>
</template>
