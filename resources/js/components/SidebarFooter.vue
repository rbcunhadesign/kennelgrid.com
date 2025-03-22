<script setup lang="ts">
import { SharedData, User } from '@/types';
import { router, usePage } from '@inertiajs/vue3';
import { ChevronsUpDown, CircleUser, LogOut } from 'lucide-vue-next';
import { Button } from 'primevue';
import TieredMenu from 'primevue/tieredmenu';
import { computed, ref } from 'vue';

const page = usePage<SharedData>();
const user = computed(() => page.props.auth.user as User);

const menu = ref();
const items = ref([
    {
        label: 'My account',
        icon: CircleUser,
    },
    {
        separator: true,
    },
    {
        label: 'Sign out',
        icon: LogOut,
        command: () => router.post(route('logout')),
    },
]);

const toggle = (event: Event) => {
    menu.value.toggle(event);
};
</script>

<template>
    <div>
        <Button
            v-slot="slotProps"
            as-child
        >
            <button
                v-bind="slotProps.a11yAttrs"
                type="button"
                class="flex w-full items-center justify-between rounded-md p-3"
                @click="toggle"
            >
                <div>Avatar</div>
                <div>{{ user.name }}</div>
                <div><ChevronsUpDown class="size-4" /></div>
            </button>
        </Button>
        <!-- @vue-ignore -->
        <TieredMenu
            ref="menu"
            id="overlay_tmenu"
            :model="items"
            popup
        >
            <template #itemicon="slotProps">
                <component
                    :is="slotProps.item.icon"
                    class="size-4"
                />
            </template>
        </TieredMenu>
    </div>
</template>
