<script setup lang="ts">
import { useMotion } from '@vueuse/motion';
import { onMounted, useTemplateRef, watch } from 'vue';

const props = defineProps({
    open: Boolean,
    openMobile: Boolean,
    isMobile: Boolean,
});

const target = useTemplateRef('sidebar-container');

const motionInstance = useMotion(target, {
    initial: {
        x: props.open && !props.isMobile ? 0 : -300,
    },
    enter: {
        x: 0,
        transition: {
            type: 'spring',
            stiffness: 180,
            damping: 25,
            mass: 0.5,
        },
    },
    leave: {
        x: -300,
        transition: {
            type: 'spring',
            stiffness: 180,
            damping: 25,
            mass: 0.5,
        },
    },
});

onMounted(() => {
    if (props.open) {
        motionInstance.apply('initial');
    } else {
        motionInstance.apply('leave');
    }
});

watch(
    () => props.open,
    (open) => {
        if (open) {
            motionInstance.apply('enter');
        } else {
            motionInstance.apply('leave');
        }
    },
);

watch(
    () => props.isMobile,
    (isMobile) => {
        if (!isMobile && props.open) {
            motionInstance.apply('enter');
        } else {
            motionInstance.apply('leave');
        }
    },
);
</script>

<template>
    <div
        v-if="!props.isMobile"
        class="fixed inset-y-0 left-0 w-64 text-white"
        ref="sidebar-container"
    >
        <p>open: {{ String(props.open) }}</p>
        <p>openMobile: {{ String(props.openMobile) }}</p>
        <p>mobile {{ String(props.isMobile) }}</p>
    </div>

    <div v-else></div>
</template>
