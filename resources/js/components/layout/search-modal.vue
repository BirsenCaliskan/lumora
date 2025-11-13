<template>
    <div class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0">
        <div class="relative w-full max-h-full">
            <!-- Modal content -->
            <div class="flex flex-col h-screen relative bg-white shadow-sm ">
                <!-- Modal header -->
                <div class="flex-none bg-white flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-100">
                    <h3 class="text-xl font-semibold font-elms-sans">
                        Eğitim Ara
                    </h3>
                    <button type="button" @click="closeModal" aria-label="close-modal" class="text-gray-400 bg-transparent size-8 ms-auto inline-flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 h-fit overflow-y-auto scrollbar">
                    <div>
                        <input type="text" name="name" v-model="searchText" placeholder="Eğitim Ara..." class="block bg-white border rounded w-full text-black text-sm px-3 py-2 border-theme-200 focus-visible:outline-0 focus:shadow-lg focus:shadow-theme-200 focus:accent-theme-200" aria-label="input">
                    </div>
                    <search-list :searchText="searchText"/>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {defineAsyncComponent} from "vue";
import {closeModal} from "jenesius-vue-modal";

export default {
    name: "search-modal",
    components: {
        SearchList: defineAsyncComponent(_ => import('./search-list.vue')),
    },
    data(){
        return{
            searchText: null,
        }
    },
    methods: {
        closeModal(){
            closeModal();
        }
    }
}
</script>

<style scoped>

</style>
