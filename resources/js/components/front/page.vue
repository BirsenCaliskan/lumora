<template>
    <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 my-10">
        <template v-if="page && Object.keys(page).length">
            <h1 class="text-2xl max-lg:text-lg font-elms-sans font-bold" v-html="page.name"></h1>

            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 space-y-7">
                <figure v-if="page.picture" class="text-center">
                    <img :src="`${$store.state.BASEURL}${page.picture}`" loading="lazy" width="800" height="400" :alt="page.name" class="w-auto h-full mx-auto max-h-96 rounded-lg border border-gray-200">
                </figure>
                <div class="space-y-6 text-gray-600 text-base max-md:text-sm" v-html="page.detail"></div>
            </div>
        </template>
        <div v-else class="text-center py-24 bg-white rounded-xl shadow-lg border border-gray-200 text-gray-700">
            <svg class="mx-auto size-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
            </svg>
            <h3 class="text-2xl font-bold mb-2 text-theme-200">Sayfa bulunamadı</h3>
            <p class="mb-6 text-gray-600">
                Aradığınız içerik artık mevcut değil. Lütfen ana sayfadan devam edin.
            </p>
        </div>
    </div>
</template>

<script>
import {mapActions} from "vuex";
import {useHead} from "@vueuse/head";
import {pushModal} from "jenesius-vue-modal";

export default {
    name: "page",
    data(){
        return {
            page: {
            }
        }
    },
    async mounted() {
        await this.getData();
    },
    methods: {
        ...mapActions([
            'get'
        ]),
        async getData(){
            const LoadModal = await pushModal('Loading');
            let link = this.$route.params.url;
            await this.get({
                url: '/api/page',
                props: {link }
            }).then(res => {
                this.page = res.data;
                useHead({
                    title: this.page.seo_title ?? this.page.name,
                    link: [
                        {rel: 'canonical', href: `${window.location.origin}/${this.page.url}`},
                    ],
                    meta: [
                        {property: 'og:url', content: `${window.location.origin}/${this.page.url}`},
                        {property: 'og:title', content: this.page.seo_title ?? this.page.name},
                        {property: 'og:description', content: this.page.seo_description},
                        {name: 'description', content: this.page.seo_description},
                    ],
                });
                LoadModal.close();
            })
        }
    }
}
</script>

<style scoped>

</style>
