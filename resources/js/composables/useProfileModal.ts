import { reactive, toRefs, ref } from 'vue';

export default function useProfileModal() {
    const isOpen = ref(false);
    const state = reactive({
        // isOpen: false,
    });

    const toggle = (isAllowed: boolean) => {
        console.log("triggered");
        if (isAllowed)
            isOpen.value = !isOpen.value

        console.log('isOpen:', isOpen.value);
    }

    return {
        ...toRefs(state),
        toggle,
        isOpen,
    }
}