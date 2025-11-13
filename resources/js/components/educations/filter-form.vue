<template>
    <div class="space-y-4">
        <div v-if="menuList && Object.keys(menuList).length" class="space-y-3.5">
            <!-- <h3 class="text-base font-medium">Kategoriler</h3> -->
            <div class="space-y-1.5">
                <template v-for="data in menuList">
                    <button type="button" @click="selectCategory(data.url)" :class="{'active': categoryActive === data.url}" :aria-label="data.name" class="flex items-center justify-between gap-2 w-full text-left rounded-lg px-3 py-2 text-sm cursor-pointer [&.active]:bg-gray-100 hover:bg-gray-100 [&.active]:shadow duration-200">
                        <span class="grow min-w-0">{{ data.name }}</span>
                        <span class="text-xs size-6 bg-theme-100 text-white rounded-full text-center py-1">{{ data.total }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="flex-none size-5">
                            <g fill="none" fill-rule="evenodd">
                                <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/>
                                <path fill="currentColor" d="M16.06 10.94a1.5 1.5 0 0 1 0 2.12l-5.656 5.658a1.5 1.5 0 1 1-2.121-2.122L12.879 12L8.283 7.404a1.5 1.5 0 0 1 2.12-2.122l5.658 5.657Z"/>
                            </g>
                        </svg>
                    </button>
                </template>
            </div>
        </div>
        <div class="relative">
            <input
                type="text"
                id="search"
                v-model="filterList.searchQuery"
                placeholder="Eğitim Ara"
                class="block w-full bg-white border border-gray-300 rounded-lg text-black text-sm px-3 py-2 focus-visible:border-theme-200 focus-visible:outline-0 focus:shadow-md focus:shadow-theme-200/50 focus:accent-theme-200"
            >
            <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
        <div class="flex items-center">
            <div class="relative">
                <input type="number" v-model="filterList.price.min" step="0.00" min="0" placeholder="0" class="bg-white w-full border border-gray-300 rounded-lg text-black text-sm px-3 py-2 focus-visible:border-theme-200 focus-visible:outline-0 focus:shadow-md focus:shadow-theme-200/50 focus:accent-theme-200">
                <div class="absolute top-1/2 right-2 -translate-y-1/2 bg-white">₺</div>
            </div>
            <div class="flex-none w-fit px-2 text-base">-</div>
            <div class="relative">
                <input type="number" v-model="filterList.price.max" step="0.00" min="0" placeholder="100" class="bg-white w-full border border-gray-300 rounded-lg text-black text-sm px-3 py-2 focus-visible:border-theme-200 focus-visible:outline-0 focus:shadow-md focus:shadow-theme-200/50 focus:accent-theme-200">
                <div class="absolute top-1/2 right-2 -translate-y-1/2 bg-white">₺</div>
            </div>
        </div>
        <button type="button" @click="filterButton" class="w-full text-white bg-theme-100 rounded-md text-sm hover:bg-theme-200 transition-colors duration-300 font-semibold shadow-lg py-2 cursor-pointer" aria-label="aria-button">
            Filtrele
        </button>
        <button type="button" v-if="filterList.status" @click="resetButton" class="w-full rounded-md border border-gray-200 text-sm hover:bg-gray-200 transition-colors duration-300 font-semibold shadow-lg py-2 cursor-pointer" aria-label="aria-button">
            Temizle
        </button>
    </div>
</template>

<script>
export default {
    name: "filter-form",
    props: ['menuList','filterArray','category_id'],
    emits: [ 'filterArray'],
    data() {
        return {
            filterStatus: false,
            filterList: {
                searchQuery: null,
                price: {
                    min: null,
                    max: null
                },
                status: false
            },
            categoryActive: null,
        }
    },
    mounted() {
        this.filterList = this.filterArray;
        this.categoryActive = this.category_id;
        this.categoryActive = this.categoryActive ?? this.$route.params.url;
    },
    methods: {
        async filterButton(){
            this.filterList.status = true;

            const query = {};
            if (this.filterList.searchQuery && this.filterList.searchQuery.length > 0) {
                query.search = this.filterList.searchQuery;
            }
            if (this.filterList.price.min !== null || this.filterList.price.max !== null) {
                if (this.filterList.price.min !== null && this.filterList.price.min >= 0) {
                    query['price[min]'] = this.filterList.price.min;
                }
                if (this.filterList.price.max !== null && this.filterList.price.max > 0) {
                    query['price[max]'] = this.filterList.price.max;
                }
            }
            await this.$router.push({ params: { url: this.categoryActive }, query: query });
            this.$emit('filterArray', this.filterList);
        },
        async resetButton(){
            this.filterList = {
                price : {
                    min: null,
                    max: null,
                },
                searchQuery: null,
                status: false
            };

            await this.$router.push({ query: {} });
            await this.$router.push({ params: { url: this.categoryActive }, query: {} });
            this.$emit('filterArray', this.filterList);
        },
        selectCategory(url) {
            this.categoryActive = url;
            this.$router.push({ params: { url: url }, query: this.$route.query });
        },
    }
}
</script>

<style scoped>

</style>
