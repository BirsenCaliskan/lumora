<template>
    <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mb-14 3xs:max-lg:mb-7 mt-3">
        <!-- title -->
        <h1 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
            Mesleki Eğitimler
        </h1>
        <!-- detail -->
        <div class="flex items-start gap-8">
            <!-- tab Button -->
            <div class="flex-none w-64 max-lg:hidden h-fit sticky top-6 z-10 space-y-4">
                <div v-if="menus && Object.keys(menus).length" class="space-y-3.5">
                    <!-- <h3 class="text-base font-medium">Kategoriler</h3> -->
                    <div class="space-y-1.5">
                        <template v-for="data in menus">
                            <button type="button" @click="category_id = data.id" :class="{'active': category_id == data.id}" :aria-label="data.name" class="flex items-center justify-between gap-2 w-full text-left rounded-lg px-3 py-2 text-sm cursor-pointer [&.active]:bg-theme-200 hover:bg-theme-200 [&.active]:text-white hover:text-white duration-200">
                                <span class="grow min-w-0">{{ data.name }}</span>
                                <span class="text-xs size-6 bg-theme-100 text-white rounded-full text-center py-1">{{ data.total }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="flex-none size-5">
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor" d="M16.06 10.94a1.5 1.5 0 0 1 0 2.12l-5.656 5.658a1.5 1.5 0 1 1-2.121-2.122L12.879 12L8.283 7.404a1.5 1.5 0 0 1 2.12-2.122l5.658 5.657Z" />
                                    </g>
                                </svg>
                            </button>
                        </template>
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="number" v-model="price.min" step="0.00" min="0" placeholder="0" class="basis-2/5 block bg-white border border-gray-300 rounded-lg text-black text-sm px-3 py-2 focus-visible:border-theme-200 focus-visible:outline-0 focus:shadow-md focus:shadow-theme-200/50 focus:accent-theme-200">
                    <div class="basis-1/6">-</div>
                    <input type="number" v-model="price.max" step="0.00" min="0" placeholder="0" class="basis-2/5 block bg-white border border-gray-300 rounded-lg text-black text-sm px-3 py-2 focus-visible:border-theme-200 focus-visible:outline-0 focus:shadow-md focus:shadow-theme-200/50 focus:accent-theme-200">
                </div>
            </div>
            <!-- tab Body -->
            <div class="grow min-w-0 space-y-6">
                <div class="relative">
                    <input
                        type="text"
                        id="search"
                        v-model="searchQuery"
                        placeholder="Eğitim adı veya kategori ara..."
                        class="block w-full bg-white border border-gray-300 rounded-full text-black text-sm px-3 py-2 focus-visible:border-theme-200 focus-visible:outline-0 focus:shadow-md focus:shadow-theme-200/50 focus:accent-theme-200"
                    >
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                </div>
                <template v-if="educations.data && Object.keys(educations.data).length">
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <template v-for="data in educations.data" :key="`product-${data.id}`">
                            <product-cart :product="data"/>
                        </template>
                        <vue-eternal-loading :load="getData" :key="loadingKey" ref="infiniteLoading" v-if="educations.last_page >= currentPage"/>
                    </div>
                </template>
                <div v-else class="text-center py-12">
                    <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Eğitim bulunamadı</h3>
                    <p class="text-gray-600 mb-4">
                        Aradığınız kriterlere uygun eğitim bulunamadı. Lütfen farklı anahtar kelimeler deneyin.
                    </p>
                    <button
                        @click="searchQuery = null"
                        class="bg-red-301 text-white px-4 py-2 rounded-lg hover:bg-red-400 transition-colors"
                    >
                        Filtreleri Temizle
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {useHead} from "@unhead/vue";
import {mapActions} from "vuex";
import {pushModal} from "jenesius-vue-modal";
import {defineAsyncComponent} from "vue";

export default {
    name: "main-component",
    components: {
        ProductCart: defineAsyncComponent(_ => import('.././layout/product-cart.vue')),
    },
    data() {
        return {
            menus: [],
            educations: {
                data: [],
                total: 0,
                last_page: 1,
            },
            currentPage: 1,
            category_id: 0,
            searchQuery: null,
            price: {
                min: 0,
                max: 0,
            },
            loadingKey: 0,
        }
    },
    async mounted() {
        useHead({
            title: 'Eğitimlerimiz | Ken Academy Türkiye - Profesyonel ve Güncel Eğitim Programları',
            link: [
                {rel: 'canonical', href: this.$store.state.BASEURL + '/egitimlerimiz'}
            ],
            meta: [
                {property: 'og:url', content: this.$store.state.BASEURL + '/egitimlerimiz'},
                {property: 'og:title', content: 'Eğitimlerimiz | Ken Academy Türkiye - Profesyonel ve Güncel Eğitim Programları'},
                {
                    property: 'og:description',
                    content: 'Ken Academy Türkiye’nin alanında uzman, deneyimli ve ilham veren eğitmen kadrosuyla tanışın. Eğitim kalitesini belirleyen isimleri keşfedin.',
                },
                {
                    name: 'description',
                    content: 'Ken Academy Türkiye’nin alanında uzman, deneyimli ve ilham veren eğitmen kadrosuyla tanışın. Eğitim kalitesini belirleyen isimleri keşfedin.',
                },
            ],
        });
        if (this.$route.query.category_id) {
            this.category_id = this.$route.query.category_id;
        }
        await this.getData();
    },
    methods: {
        ...mapActions([
            'get'
        ]),
        async getData({loaded, complete} = {}) {
            const Loading = await pushModal('Loading');
            await this.get({
                url: '/api/educations',
                props: {
                    page: this.currentPage,
                    category_id: this.category_id,
                    search: this.searchQuery,
                }
            }).then(res => {
                Loading.close();
                if (this.currentPage === 1 || res.data.educations.current_page === 1) {
                    this.educations = res.data.educations;
                    this.menus = res.data.menus;
                } else {
                    this.educations.data = [...this.educations.data, ...res.data.educations.data];
                    this.educations.last_page = res.data.educations.last_page;
                }
                this.currentPage++;
                if (this.currentPage > res.data.educations.last_page) {
                    if (typeof complete === 'function') complete(); // güvenli kontrol
                } else {
                    if (typeof loaded === 'function') loaded(); // güvenli kontrol
                }
            });
        }
    },
    watch: {
        async category_id() {
            this.currentPage = 1;
            this.educations.data = [];
            this.loadingKey++;
            this.searchQuery = null
            await this.getData();
        },
        async searchQuery(val) {
            if (val.length > 3 || val.length === 0) {
                this.currentPage = 1;
                this.educations.data = [];
                this.loadingKey++;
                await this.getData();
            }
        }
    }

}
</script>

<style scoped>

</style>
