<template>
    <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mb-14 3xs:max-lg:mb-7 mt-3">
        <!-- title -->
        <div class="flex items-center justify-between">
            <h1 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
                Mesleki Eğitimler
            </h1>
            <button @click="openFilterModal" class="lg:hidden rounded-md text-sm transition-colors duration-300 font-semibold p-1 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="1.5" d="M21.25 12H8.895m-4.361 0H2.75m18.5 6.607h-5.748m-4.361 0H2.75m18.5-13.214h-3.105m-4.361 0H2.75m13.214 2.18a2.18 2.18 0 1 0 0-4.36a2.18 2.18 0 0 0 0 4.36Zm-9.25 6.607a2.18 2.18 0 1 0 0-4.36a2.18 2.18 0 0 0 0 4.36Zm6.607 6.608a2.18 2.18 0 1 0 0-4.361a2.18 2.18 0 0 0 0 4.36Z" />
                </svg>
            </button>
        </div>
        <!-- detail -->
        <div class="flex items-start gap-8">
            <!-- tab Button -->
            <div class="flex-none w-64 max-lg:hidden h-fit sticky top-20 z-10 space-y-4">
                <filter-form :menuList="menus" :category_id="category_url" :filterArray="filterList" @filterArray="filterChange($event)"/>
            </div>
            <!-- tab Body -->
            <div class="grow min-w-0 space-y-6">
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {useHead} from "@unhead/vue";
import {mapActions} from "vuex";
import {openModal, pushModal} from "jenesius-vue-modal";
import {defineAsyncComponent} from "vue";
import MobileFilterForm from './filter-modal.vue';

export default {
    name: "main-component",
    components: {
        ProductCart: defineAsyncComponent(_ => import('.././layout/product-cart.vue')),
        FilterForm: defineAsyncComponent(_ => import('./filter-form.vue')),
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
            category_url: null,
            filterList: {
                searchQuery: null,
                price: {
                    min: null,
                    max: null,
                },
                status: false
            },
            loadingKey: 0,
            filterStatus: false,

        }
    },
    async beforeRouteUpdate(to, from, next) {
        const newCategoryUrl = to.params.url ?? 'tum-egitimler';

        if (this.category_url !== newCategoryUrl || Object.keys(to.query).length > 0) {
            this.category_url = newCategoryUrl;

            this.filterList.searchQuery = to.query.search ?? null;
            this.filterList.price.min = to.query['price[min]'] ? parseFloat(to.query['price[min]']) : null;
            this.filterList.price.max = to.query['price[max]'] ? parseFloat(to.query['price[max]']) : null;
            this.filterList.status = Object.keys(to.query).length > 0;

            this.currentPage = 1;
            this.educations.data = [];
            this.loadingKey++;

            await this.getData();
        }
        next();
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
        const query = this.$route.query;
        this.category_url = this.$route.params.url ?? 'tum-egitimler';

        if (query.search) {
            this.filterList.searchQuery = query.search;
        }
        if (query['price[min]']) {
            this.filterList.price.min = parseFloat(query['price[min]']);
            this.filterList.status = true;
        }
        if (query['price[max]']) {
            this.filterList.price.max = parseFloat(query['price[max]']);
            this.filterList.status = true;
        }
        if (Object.keys(query).length > 0) {
            this.filterList.status = true;
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
                    category_url: this.category_url,
                    search: this.filterList.searchQuery,
                    price: this.filterList.price,
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
        },
        async filterChange(data){
            this.filterList = data;
            this.currentPage = 1;
            this.educations.data = [];
            this.loadingKey++;
            await this.getData();
        },
        async openFilterModal(){
            await pushModal(MobileFilterForm, {
                menuList: this.menus,
                category_id: this.category_url,
                filterArray: this.filterList,
                filterUpdateCallback: this.filterChange
            });
        }
    },

}
</script>

<style scoped>

</style>
