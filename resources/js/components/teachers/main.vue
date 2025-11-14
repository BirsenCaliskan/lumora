<template>
    <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 my-10">
        <h1 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
            Eğitmenlerimiz
        </h1>
        <div v-if="teachers.data && Object.keys(teachers.data).length" class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 max-sm:grid-cols-1 gap-6 max-md:gap-x-3.5">
            <router-link :to="{name: 'TeacherDetail',params: {url: data.url}}" :title="data.name" v-for="data in teachers.data" class="bg-white p-4 rounded-xl shadow-lg border border-gray-200 space-y-2.5 text-center group transition-all duration-300 hover:shadow-xl hover:border-theme-100">
                <figure class="w-full overflow-hidden rounded-2xl">
                    <img :src="`${$store.state.BASEURL}${data.picture}`" width="300" height="416" :alt="data.name" loading="lazy"
                         class="w-full h-auto rounded-2xl border border-gray-200 transition-transform duration-300 group-hover:scale-[1.03]">
                </figure>

                <div class="text-xl max-lg:text-base font-semibold text-theme-200 group-hover:text-theme-100 transition-colors">
                    {{ data.name }}
                </div>

                <div class="text-base max-lg:text-sm 3xs:max-lg:leading-4 text-gray-600">
                    {{ data.title }}
                </div>
            </router-link>
            <vue-eternal-loading :load="getData" :key="loadingKey" ref="infiniteLoading" v-if="teachers.last_page >= currentPage"/>
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
    name: "teachers",
    data() {
        return {
            teachers: {
                data: [],
                total: 0,
                last_page: 1,
            },
            currentPage: 1,
            loadingKey: 0,
        }
    },
    async mounted() {
        useHead({
            title: 'Eğitmenlerimiz | Lumora Academy - Uzman Kadromuzla Tanışın',
            link: [
                {rel: 'canonical', href: this.$store.state.BASEURL + '/egitmenlerimiz'}
            ],
            meta: [
                {property: 'og:url', content: this.$store.state.BASEURL + '/egitmenlerimiz'},
                {property: 'og:title', content: 'Eğitmenlerimiz | Lumora Academy - Uzman Kadromuzla Tanışın'},
                {
                    property: 'og:description',
                    content: 'Lumora Academy’nin alanında uzman, deneyimli ve ilham veren eğitmen kadrosuyla tanışın. Eğitim kalitesini belirleyen isimleri keşfedin.',
                },
                {
                    name: 'description',
                    content: 'Lumora Academy’nin alanında uzman, deneyimli ve ilham veren eğitmen kadrosuyla tanışın. Eğitim kalitesini belirleyen isimleri keşfedin.',
                },
            ],
        });
        await this.getData();
    },
    methods: {
        ...mapActions([
            'get'
        ]),
        async getData({loaded, complete} = {}) {
            const Loading = await pushModal('Loading');
            await this.get({
                url: '/api/instructors',
                props: {
                    page: this.currentPage
                }
            }).then(res => {
                Loading.close();
                if (this.currentPage === 1) {
                    this.teachers = res.data;
                } else {
                    this.teachers.data = [...this.teachers.data, ...res.data.data];
                    this.teachers.last_page = res.data.last_page;
                }
                this.currentPage++;
                if (this.currentPage > res.data.last_page) {
                    if (typeof complete === 'function') complete();
                } else {
                    if (typeof loaded === 'function') loaded();
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
