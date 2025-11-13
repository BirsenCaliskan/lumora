<template>
    <div class="modal-sidebar fixed inset-y-0 left-0 z-[1045] max-w-[350px] w-full border-none bg-white bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out transform-none text-black flex flex-col">
        <header class="flex-none flex items-center justify-between p-4 border-b border-gray-200">
            <h3 class="text-xl font-bold text-gray-800">Filtreler</h3>
            <button @click="closeModal" class="text-gray-500 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6">
                    <path fill="currentColor" d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12l-4.89 4.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.01 0-1.4z"/>
                </svg>
            </button>
        </header>
        <main class="flex-grow overflow-y-auto overflow-x-hidden scrollbar p-4">
            <filter-form
                :menuList="menuList"
                :category_id="category_id"
                :filterArray="filterArray"
                @filterArray="handleFilterChange($event)"
            />
        </main>

    </div>
</template>

<script>
import { defineAsyncComponent } from 'vue';
import { closeModal } from 'jenesius-vue-modal';

export default {
    name: "MobileFilterForm",
    components: {
        FilterForm: defineAsyncComponent(_ => import('./filter-form.vue')),
    },
    props: {
        menuList: Array,
        category_id: String,
        filterArray: Object,
        filterUpdateCallback: Function,
    },
    methods: {
        closeModal() {
            closeModal();
        },
        handleFilterChange(data) {
            this.$emit('filterArray', data);
            this.closeModal();
        }
    }
}
</script>

<style scoped>
.modal-container:has(.modal-sidebar) {
    display: grid;
    grid-auto-columns: max-content;
    justify-content: start;
}
.modal-list-enter-from .modal-sidebar,
.modal-list-leave-to .modal-sidebar{
    transform: translateX(-100%) !important;
}
</style>
