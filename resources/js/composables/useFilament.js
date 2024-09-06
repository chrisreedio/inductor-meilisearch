import { inject } from "vue";

export function useFilament() {
    const wire = inject("wire");

    function openModal() {
        wire.mountTableAction();
    }

    return {
        wire,
        openModal,
    };
}
