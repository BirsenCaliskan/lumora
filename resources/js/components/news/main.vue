<template>
    <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 my-10">
        <h1 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
            Basında Biz
        </h1>
        <div v-if="news.data && Object.keys(news.data).length" class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 max-sm:grid-cols-1 gap-6 max-md:gap-x-3.5">

            <router-link :to="`/${data.url}`" :title="data.name" v-for="data in news.data" :key="data.id" class="block bg-white p-3 rounded-xl shadow-lg border border-gray-200 transition-all duration-300 hover:shadow-xl hover:border-theme-100 group">

                <figure class="relative overflow-hidden rounded-lg mb-3">
                    <img :src="`${$store.state.BASEURL}${data.picture}`" width="364" height="380" :alt="data.name" loading="lazy"
                         class="w-full h-auto rounded transition-transform duration-300 group-hover:scale-[1.03]">
                </figure>

                <div class="text-center pt-2">
                    <div class="text-md leading-5 font-semibold text-theme-200 group-hover:text-red-301 duration-200 line-clamp-2">
                        {{ data.name }}
                    </div>
                </div>
            </router-link>
            <vue-eternal-loading :load="getData" :key="loadingKey" ref="infiniteLoading" v-if="news.last_page >= currentPage"/>
        </div>
        <div v-else class="p-4 mb-4 text-sm rounded-lg bg-yellow-100 text-yellow-800" role="alert">
            Kayıt bulunamadı.
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex";
import {useHead} from "@unhead/vue";
import {pushModal} from "jenesius-vue-modal";

export default {
    name: "NewsPress", // Bileşen adı daha anlamlı hale getirildi.
    data(){
        return {
            news: {
                data: [],
                total: 0,
                last_page: 1,
            },
            currentPage: 1,
            loadingKey: 0,
        }
    },
    async mounted(){
        // SEO ve Metinler Lumora Academy'ye Güncellendi
        useHead({
            title: "Basında Biz | Lumora Academy – Medyada Lumora'nın Yeri ve Haberleri",
            link: [
                {rel: 'canonical', href: this.$store.state.BASEURL+'/basinda-biz'}
            ],
            meta: [
                {property: 'og:url', content: this.$store.state.BASEURL+'/basinda-biz'},
                {property: 'og:title', content: "Basında Biz | Lumora Academy – Medyada Lumora'nın Yeri ve Haberleri"},
                {
                    property: 'og:description',
                    content: 'Lumora Academy olarak eğitimlerimiz, etkinliklerimiz ve başarı hikayelerimiz ulusal ve sektörel basında sıkça yer alıyor. Basında Biz sayfamızda tüm medya yerleşimlerimizi keşfedebilirsiniz.',
                },
                {
                    name: 'description',
                    content: 'Lumora Academy olarak eğitimlerimiz, etkinliklerimiz ve başarı hikayelerimiz ulusal ve sektörel basında sıkça yer alıyor. Basında Biz sayfamızda tüm medya yerleşimlerimizi keşfedebilirsiniz.',
                },
            ],
        });
        await this.getData();
    },
    methods: {
        ...mapActions([
            'get'
        ]),
        async getData({ loaded, complete } = {}){
            const Loading = await pushModal('Loading');
            await this.get({
                url: '/api/newsPress',
                props: {
                    page: this.currentPage,
                }
            }).then(res => {
                Loading.close();
                if(this.currentPage === 1){
                    this.news = res.data;
                }else{
                    this.news.data = [...this.news.data, ...res.data.data];
                    this.news.last_page = res.data.last_page;
                }
                this.currentPage++;

                if (this.currentPage > res.data.last_page) {
                    if (typeof complete === 'function') complete();
                } else {
                    if (typeof loaded === 'function') loaded();
                }
            });
        }
    },
}
</script>

<style scoped>

</style>
