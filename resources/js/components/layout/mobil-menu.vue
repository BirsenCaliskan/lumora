<template>
    <div class="modal-sidebar fixed inset-y-0 left-0 z-[1045] max-w-[350px] w-full border-none bg-white bg-clip-padding shadow-2xl outline-none transition duration-300 ease-in-out transform-none text-theme-200">
        <div class="w-full h-full overflow-y-auto overflow-x-hidden scrollbar">
            <div class="sticky top-0 z-10 bg-white flex items-center justify-between p-4 border-b border-gray-200">
                <router-link :to="{name: 'Home'}" class="block w-40" @click="closeModal">
                    <img :src="`${$store.state.BASEURL}assets/images/logo.webp`" width="250" height="25" alt="lumora academy" loading="lazy" class="w-full h-auto">
                </router-link>
                <button aria-label="kapat" type="button" @click="closeModal" class="block size-8 rounded-full text-gray-700 hover:bg-gray-100 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6">
                        <path fill="currentColor" d="M18.3 5.71a.996.996 0 0 0-1.41 0L12 10.59L7.11 5.7A.996.996 0 1 0 5.7 7.11L10.59 12l-4.89 4.89a.996.996 0 1 0 1.41 1.41L12 13.41l4.89 4.89a.996.996 0 1 0 1.41-1.41L13.41 12l4.89-4.89c.38-.38.38-1.01 0-1.4z"/>
                    </svg>
                </button>
            </div>

            <div class="border-b border-gray-100 py-2">
                <button type="button" @click="accordionButton('education')" aria-label="Eğitimler" class="flex items-center justify-between gap-2 w-full px-4 py-3 text-base leading-5 font-medium hover:bg-gray-50 transition-colors">
                    <span>Eğitimler</span>
                    <svg viewBox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg" :class="{'active': accordion.id === 'about'}"
                         class="w-4 h-auto [&.active]:rotate-180 duration-200 stroke-current text-theme-200">
                        <path d="M1.66675 1.66666L15.0001 15L28.3334 1.66666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div :class="{'active': accordion.id === 'education' }"
                     class="h-0 scrollbar text-sm leading-5 overflow-x-hidden overflow-y-auto opacity-0 [&.active]:py-1 [&.active]:opacity-100 [&.active]:h-auto duration-300">
                    <ul class="text-sm leading-5">
                        <li>
                            <router-link :to="{name: 'Educations'}" title="Tüm Eğitimler" :active-class="'text-theme-100'" class="flex items-center gap-2.5 w-full px-8 py-2 text-gray-700 hover:text-theme-100 group transition-colors duration-200">
                                <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" alt="Tüm Eğitimler" class="size-4 opacity-70 group-hover:opacity-100 duration-200">
                                <div class="grow min-w-0">Tüm Eğitimler</div>
                            </router-link>
                        </li>
                        <template v-if="categories && Object.keys(categories).length">
                            <li v-for="data in categories" :key="`mobil-menu-${data.id}`">
                                <router-link :to="`/${data.url}`" :title="data.name" :active-class="'text-theme-100'" class="flex items-center gap-2.5 w-full px-8 py-2 text-gray-700 hover:text-theme-100 group transition-colors duration-200">
                                    <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" :alt="data.name" class="size-4 opacity-70 group-hover:opacity-100 duration-200">
                                    <div class="grow min-w-0">{{ data.name }}</div>
                                </router-link>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
            <div class="border-b border-gray-100 py-2">
                <button type="button" @click="accordionButton('about')" aria-label="Biz Kimiz?" class="flex items-center justify-between gap-2 w-full px-4 py-3 text-base leading-5 font-medium hover:bg-gray-50 transition-colors">
                    <span>Biz Kimiz?</span>
                    <svg viewBox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg" :class="{'active': accordion.id === 'about'}"
                         class="w-4 h-auto [&.active]:rotate-180 duration-200 stroke-current text-theme-200">
                        <path d="M1.66675 1.66666L15.0001 15L28.3334 1.66666" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <div :class="{'active': accordion.id === 'about' }"
                     class="h-0 scrollbar text-sm leading-5 overflow-x-hidden overflow-y-auto opacity-0 [&.active]:py-1 [&.active]:opacity-100 [&.active]:h-auto duration-300">
                    <ul class="text-sm leading-5">
                        <li v-for="data in $store.state.staticPages" :key="`mobil-menu-${data.id}`">
                            <router-link :to="{name: data.url}" :title="data.name" :active-class="'text-theme-100'" class="flex items-center gap-2.5 w-full px-8 py-2 text-gray-700 hover:text-theme-100 group transition-colors duration-200">
                                <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" :alt="data.name" class="size-4 opacity-70 group-hover:opacity-100 duration-200">
                                <div class="grow min-w-0">{{ data.name }}</div>
                            </router-link>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="space-y-2 pt-2 px-4">
                <router-link :to="{name: 'Contact'}" title="İletişim" :active-class="'text-theme-100'" class="block w-full py-2 text-base leading-5 font-medium hover:text-theme-100 transition-colors">
                    İletişim
                </router-link>

                <div class="w-full pt-1">
                    <a :href="`${$store.state.BASEURL}egitim-paneli`" title="Giriş"
                       class="block w-full rounded-lg bg-theme-100 hover:bg-theme-200 text-white text-md leading-5 font-semibold text-center px-4 py-2 transition-colors duration-300">
                        Giriş
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {closeModal} from "jenesius-vue-modal";

export default {
    name: "mobil-menu",
    props: ['categories'],
    data(){
        return {
            accordion: {
                id: null,
                child: null,
            },
        }
    },
    methods:{
        accordionButton(data){
            this.accordion.id = this.accordion.id === data ? null : data;
            this.accordion.child = null;
        },
        closeModal(){
            closeModal();
        },
    }
}
</script>

<style scoped>

.modal-list-enter-from .modal-sidebar,
.modal-list-leave-to .modal-sidebar{
    transform: translateX(-100%) !important;
}

</style>
