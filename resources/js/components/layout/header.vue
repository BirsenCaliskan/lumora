<template>
    <header :class="{'active': $route.name === 'EducationDetail' && scrollY < 100}" class="sticky inset-x-0 top-0 bg-white z-30 transition-all duration-300 shadow">
        <div class="relative max-w-screen-xl xl:mx-auto mx-5 flex items-center md:gap-8 gap-4 max-lg:py-1.5">
            <!-- mobil menu -->
            <div class="lg:hidden basis-1/6">
                <button type="button" @click="openMenu" aria-label="mobil menu" class="block w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="size-6">
                        <path fill="currentColor" d="M2 6.25C2 5.56 2.56 5 3.25 5h25.5a1.25 1.25 0 1 1 0 2.5H3.25C2.56 7.5 2 6.94 2 6.25m0 10c0-.69.56-1.25 1.25-1.25h25.5a1.25 1.25 0 1 1 0 2.5H3.25c-.69 0-1.25-.56-1.25-1.25M3.25 25a1.25 1.25 0 1 0 0 2.5h25.5a1.25 1.25 0 1 0 0-2.5z"/>
                    </svg>
                    <!--
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-6">
                        <path fill="currentColor" d="M0 96c0-17.7 14.3-32 32-32h384c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32m0 160c0-17.7 14.3-32 32-32h384c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32m448 160c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h384c17.7 0 32 14.3 32 32" />
                    </svg>
                    -->
                </button>
            </div>
            <!-- logo -->
            <div class="lg:basis-1/6 basis-4/6">
                <router-link :to="{name: 'Home'}" class="block lg:w-60 md:w-52 w-auto 3xs:max-lg:mx-auto">
                    <img :src="`${$store.state.BASEURL}assets/images/logo.webp`" width="250" height="25" alt="lsumora academy" loading="lazy" class="w-full h-auto">
                </router-link>
            </div>
            <!-- menu -->
            <div class="grow min-w-0 lg:flex hidden items-center justify-center gap-5 text-base leading-[1.2]">
                <div class="group/menu">
                    <router-link :to="{name: 'Educations'}" title="Eğitimler" class="flex items-center gap-3 lg:py-7 px-5 hover:text-theme-100 relative group duration-200">
                        <span>Eğitimler</span>
                        <span class="absolute left-0 bottom-6 bg-theme-100 block w-0 h-0.5 group-hover:w-full duration-200"></span>
                    </router-link>
                </div>
                <div class="relative group/menu">
                    <button type="button" aria-label="Biz Kimiz?" class="flex items-center gap-3 lg:py-7 px-5 hover:text-theme-100 duration-200 cursor-pointer">
                        <span>Biz Kimiz?</span>
                        <svg viewBox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4 h-auto group-hover/menu:rotate-180 duration-200">
                            <path d="M1.66675 1.66666L15.0001 15L28.3334 1.66666" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <div class="absolute inset-x-0 top-13 invisible w-60 max-h-60 h-auto scrollbar bg-white shadow text-sm leading-5 overflow-x-hidden overflow-y-auto rounded-2xl py-1 opacity-0 group-hover/menu:opacity-100 group-hover/menu:visible duration-300">
                        <ul class="text-sm leading-5">
                            <li v-for="data in $store.state.staticPages">
                                <router-link :to="{name: data.url}" :title="data.name" class="flex items-center gap-2.5 w-full px-2 py-1.5 hover:text-theme-100 group duration-200 cursor-pointer">
                                    <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" :alt="data.name" class="flex-none size-5 opacity-0 group-hover:opacity-100 duration-200">
                                    <div class="grow min-w-0">{{ data.name }}</div>
                                </router-link>
                            </li>
                        </ul>
                    </div>
                </div>
                <router-link :to="{name: 'Contact'}" title="İletişim" class="flex items-center gap-3 lg:py-7 px-5 hover:text-theme-100 relative group duration-200">
                    <div>İletişim</div>
                    <span class="absolute left-0 bottom-6 bg-theme-100 block w-0 h-0.5 group-hover:w-full duration-200"></span>
                </router-link>
            </div>
            <!-- search and login -->
            <div class="basis-1/6 w-fit flex items-center justify-end md:gap-2">
                <!-- search -->
                <div class="relative">
                    <div class="relative max-md:hidden" @mousedown="hideSearch = true">
                        <input type="text" name="name" v-model="searchName" placeholder="Eğitim Ara..." class="block bg-white border border-gray-300 rounded-full w-52 ml-auto text-black text-sm px-3 py-2 focus-visible:border-theme-200 focus-visible:outline-0 focus:shadow-md focus:shadow-theme-200/50 focus:accent-theme-200" aria-label="input">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="size-6 absolute top-1/2 -translate-y-1/2 right-3">
                            <path fill="currentColor" d="M10.68 11.74a6 6 0 0 1-7.922-8.982a6 6 0 0 1 8.982 7.922l3.04 3.04a.749.749 0 0 1-.326 1.275a.75.75 0 0 1-.734-.215ZM11.5 7a4.499 4.499 0 1 0-8.997 0A4.499 4.499 0 0 0 11.5 7"/>
                        </svg>
                    </div>
                    <button type="button" @click="openSearchModal()" aria-label="search-button" class="md:hidden flex-none block lg:py-7 md:px-5 px-1.5 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="size-5">
                            <path fill="currentColor" d="M10.68 11.74a6 6 0 0 1-7.922-8.982a6 6 0 0 1 8.982 7.922l3.04 3.04a.749.749 0 0 1-.326 1.275a.75.75 0 0 1-.734-.215ZM11.5 7a4.499 4.499 0 1 0-8.997 0A4.499 4.499 0 0 0 11.5 7"/>
                        </svg>
                    </button>
                    <div @mouseleave="hideSearch = false" :class="{'active': hideSearch}" class="absolute top-12 max-md:top-full rounded right-0 opacity-0 invisible max-h-80 h-0 overflow-y-auto scrollbar space-y-3 bg-white shadow-2xl [&.active]:visible [&.active]:h-auto [&.active]:opacity-100 duration-300">
                        <search-list :searchText="searchName" class="w-96"/>
                    </div>
                </div>
                <!-- user -->
                <template v-if="$store.state.user">
                    <a :href="`${$store.state.BASEURL}egitim-paneli`" title="" class="flex items-center gap-2.5 text-md leading-3-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="flex-none size-6 max-md:size-5">
                            <path fill="currentColor" d="M9.993 10.573a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9M10 0a6 6 0 0 1 3.04 11.174c3.688 1.11 6.458 4.218 6.955 8.078c.047.367-.226.7-.61.745c-.383.045-.733-.215-.78-.582c-.54-4.19-4.169-7.345-8.57-7.345c-4.425 0-8.101 3.161-8.64 7.345c-.047.367-.397.627-.78.582c-.384-.045-.657-.378-.61-.745c.496-3.844 3.281-6.948 6.975-8.068A6 6 0 0 1 10 0"/>
                        </svg>
                    </a>
                </template>
                <template v-else>
                    <a :href="`${$store.state.BASEURL}egitim-paneli`" title="" class="flex items-center gap-2.5 text-md leading-3-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" class="flex-none size-6 max-md:size-5">
                            <path fill="currentColor" d="M9.993 10.573a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9M10 0a6 6 0 0 1 3.04 11.174c3.688 1.11 6.458 4.218 6.955 8.078c.047.367-.226.7-.61.745c-.383.045-.733-.215-.78-.582c-.54-4.19-4.169-7.345-8.57-7.345c-4.425 0-8.101 3.161-8.64 7.345c-.047.367-.397.627-.78.582c-.384-.045-.657-.378-.61-.745c.496-3.844 3.281-6.948 6.975-8.068A6 6 0 0 1 10 0"/>
                        </svg>
                    </a>
                </template>
            </div>
        </div>
    </header>
</template>

<script>
import {openModal} from "jenesius-vue-modal";
import mobilMenu from "@/components/layout/mobil-menu.vue";
import searchModal from "@/components/layout/search-modal.vue";
import {mapActions} from "vuex";
import {throttle} from 'lodash';
import {defineAsyncComponent} from "vue";

export default {
    name: "header_component",
    components: {
      SearchList: defineAsyncComponent(_ => import('./search-list.vue'))
    },
    data() {
        return {
            scrollY: 0,
            accordion: null,
            searchName: null,
            searchDebounced: null,
            hideSearch: false,
        }
    },
    async mounted() {
        this.scrollHandler = throttle(this.handleScroll, 100);
        window.addEventListener('scroll', this.scrollHandler);
        await this.getCategories();
    },
    beforeUnmount() {
        window.removeEventListener('scroll', this.scrollHandler);
    },
    methods: {
        ...mapActions([
            'get',
        ]),
        async getCategories() {
            await this.get({
                url: '/api/categoryList',
            }).then(res => {
                this.$store.state.categories = res.data;
            })
        },
        async openMenu() {
            await openModal(mobilMenu, {categories: this.$store.state.categories})
        },
        async openSearchModal(){
            await openModal(searchModal,{});
        },
        handleScroll() {
            this.scrollY = window.scrollY;
        },

    },
    watch: {
        searchName(val) {
            if (val) {
                this.hideSearch = true;
            } else {
                this.hideSearch = false;
            }
        },
    }
}
</script>

<style scoped>

</style>
