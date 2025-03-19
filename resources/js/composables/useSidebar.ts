import { useMediaQuery, useStorage } from '@vueuse/core';
import { computed, ref } from 'vue';

export function useSidebar() {
    const open = useStorage('sidebar:state', true);
    const openMobile = ref(false);
    const isMobile = computed(() => useMediaQuery('(max-width: 1024px)').value);

    const setOpen = (value: boolean) => {
        open.value = value;
    };

    const setOpenMobile = (value: boolean) => {
        openMobile.value = value;
    };

    const toggleSidebar = () => {
        return isMobile.value ? setOpenMobile(!openMobile.value) : setOpen(!open.value);
    };

    return {
        open,
        openMobile,
        isMobile,
        toggleSidebar,
    };
}
