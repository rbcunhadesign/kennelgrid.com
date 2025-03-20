<script setup lang="ts">
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
        <p>open: {{ String(props.open) }}</p>
        <p>openMobile: {{ String(props.openMobile) }}</p>
        <p>mobile {{ String(props.isMobile) }}</p>
    </div>

    <Drawer
        v-else
        v-model:visible="openMobileComputed"
        :show-close-icon="false"
    >
        <p>open: {{ String(props.open) }}</p>
        <p>openMobile: {{ String(props.openMobile) }}</p>
        <p>mobile {{ String(props.isMobile) }}</p>
    </Drawer>
</template>
