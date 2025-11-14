<template>
    <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 my-10">
        <h1 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
            Dergilerimiz
        </h1>
        <div v-if="magazines.data && Object.keys(magazines.data).length"
             class="grid lg:grid-cols-4 md:grid-cols-3 xs:grid-cols-2 3xs:grid-cols-1 gap-6">
            <div v-for="data in magazines.data" :key="data.id" class="relative bg-white p-3 rounded-xl shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                <a :href="data.url" target="_blank" :title="data.name" class="block w-full cursor-pointer">
                    <figure class="relative overflow-hidden rounded-lg mb-3">
                        <img :src="`${$store.state.BASEURL}${data.picture}`" width="364" height="380" :alt="data.name" loading="lazy" class="w-full h-auto rounded transition-transform duration-300 hover:scale-[1.03]">
                    </figure>
                </a>
                <div class="text-center">
                    <a :href="data.url" target="_blank" :title="data.name" class="text-md leading-5 font-semibold text-theme-200 hover:text-red-301 duration-200 line-clamp-2">
                        {{ data.name }}
                    </a>
                </div>
            </div>
            <vue-eternal-loading :load="getData" :key="loadingKey" ref="infiniteLoading" v-if="magazines.last_page >= currentPage"/>
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
    name: "magazines",
    data() {
        return {
            magazines: {
                data: [],
                total: 0,
                last_page: 1,
            },
            currentPage: 1,
            loadingKey: 0,
        }
    },
    async mounted() {
        // SEO ve Metinler Lumora Academy'ye Güncellendi
        useHead({
            title: "Dergilerimiz | Lumora Academy – Eğitim ve Kariyer İçerikleriyle Dolu Yayınlar",
            link: [
                {rel: 'canonical', href: this.$store.state.BASEURL + '/dergilerimiz'}
            ],
            meta: [
                {property: 'og:url', content: this.$store.state.BASEURL + '/dergilerimiz'},
                {property: 'og:title', content: "Dergilerimiz | Lumora Academy – Eğitim ve Kariyer İçerikleriyle Dolu Yayınlar"},
                {
                    property: 'og:description',
                    content: 'Lumora Academy tarafından yayımlanan tüm dijital ve basılı dergilere bu sayfadan ulaşabilirsiniz. Eğitim, liderlik, kariyer gelişimi ve sektörel analizlerle dolu özel içerikler sizi bekliyor.',
                },
                {
                    name: 'description',
                    content: 'Lumora Academy tarafından yayımlanan tüm dijital ve basılı dergilere bu sayfadan ulaşabilirsiniz. Eğitim, liderlik, kariyer gelişimi ve sektörel analizlerle dolu özel içerikler sizi bekliyor.',
                },
            ],
        });
        await this.getData();
    },
    methods: {
        ...mapActions([
            'get'
        ]),
        // getData metodu aynı kalır.
        async getData({loaded, complete} = {}) {
            const Loading = await pushModal('Loading');
            await this.get({
                url: '/api/magazines',
                props: {
                    page: this.currentPage,
                }
            }).then(res => {
                Loading.close();
                if (this.currentPage === 1) {
                    this.magazines = res.data;
                } else {
                    this.magazines.data = [...this.magazines.data, ...res.data.data];
                    this.magazines.last_page = res.data.last_page;
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
