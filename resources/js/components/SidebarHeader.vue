<script setup lang="ts">
import { ChevronsUpDown } from 'lucide-vue-next';
import { Button } from 'primevue';
import TieredMenu from 'primevue/tieredmenu';
import { ref } from 'vue';

const menu = ref();
const items = ref([
    {
        label: 'File',
        icon: 'pi pi-file',
        items: [
            {
                label: 'New',
                icon: 'pi pi-plus',
                items: [
                    {
                        label: 'Document',
                        icon: 'pi pi-file',
                    },
                    {
                        label: 'Image',
                        icon: 'pi pi-image',
                    },
                    {
                        label: 'Video',
                        icon: 'pi pi-video',
                    },
                ],
            },
            {
                label: 'Open',
                icon: 'pi pi-folder-open',
            },
            {
                label: 'Print',
                icon: 'pi pi-print',
            },
        ],
    },
    {
        label: 'Edit',
        icon: 'pi pi-file-edit',
        items: [
            {
                label: 'Copy',
                icon: 'pi pi-copy',
            },
            {
                label: 'Delete',
                icon: 'pi pi-times',
            },
        ],
    },
    {
        label: 'Search',
        icon: 'pi pi-search',
    },
    {
        separator: true,
    },
    {
        label: 'Share',
        icon: 'pi pi-share-alt',
        items: [
            {
                label: 'Slack',
                icon: 'pi pi-slack',
            },
            {
                label: 'Whatsapp',
                icon: 'pi pi-whatsapp',
            },
        ],
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
                class="flex w-full items-center justify-between rounded-md bg-transparent p-3 transition duration-150 dark:hover:bg-surface-800"
                @click="toggle"
            >
                <div>Logo</div>
                <div>Current Location</div>
                <div><ChevronsUpDown class="size-4" /></div>
            </button>
        </Button>

        <TieredMenu
            ref="menu"
            id="overlay_tmenu"
            :model="items"
            popup
        />
    </div>
</template>
