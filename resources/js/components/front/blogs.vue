<template>
  <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mt-7 mb-14 3xs:max-lg:mb-7 3xs:max-lg:mt-3">
    <!-- title -->
    <h1 class="text-2xl 3xs:max-lg:text-lg w-fit font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 md:after:-mr-7">
      Bloglar
    </h1>
    <!-- detail -->
    <div v-if="blogs.data && Object.keys(blogs.data).length" class="grid xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 2xs:grid-cols-2 3xs:grid-cols-1 gap-x-6 gap-y-9 3xs:max-lg:gap-x-3.5 3xs:max-lg:gap-y-5">
      <router-link :to="`/${data.url}`" :title="data.name" v-for="data in blogs.data" class="space-y-2.5 3xs:max-lg:space-y-1.5 text-center">
        <figure class="w-full">
          <img :src="`${$store.state.BASEURL}${data.picture}`" width="300" height="416" :alt="data.name" loading="lazy" class="w-full h-auto border border-red-301 rounded-3xl">
        </figure>
        <div class="text-xl leading-5 3xs:max-lg:text-base font-semibold">
          {{ data.name }}
        </div>
        <div class="text-lg leading-5 3xs:max-lg:text-base 3xs:max-lg:leading-4">
          {{ data.title }}
        </div>
      </router-link>
      <vue-eternal-loading :load="getData"  v-if="blogs.last_page >= currentPage"/>
    </div>
    <div v-else class="p-4 mb-4 text-sm rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
      Kayıt bulunamadı.
    </div>
  </div>
</template>

<script>
import {mapActions} from "vuex";
import {useHead} from "@unhead/vue";
import {pushModal} from "jenesius-vue-modal";

export default {
  name: "blogs",
  data(){
    return {
      blogs: {
        data: [],
        total: 0,
        last_page: 1,
      },
      currentPage: 1
    }
  },
  async mounted(){
    useHead({
      title: 'Ken Academy Türkiye Blog - Eğitim, Kişisel Gelişim ve Kariyer Yazıları',
      link: [
        {rel: 'canonical', href: this.$store.state.BASEURL+'/egitmenlerimiz'}
      ],
      meta: [
        {property: 'og:url', content: this.$store.state.BASEURL+'/egitmenlerimiz'},
        {property: 'og:title', content: 'Ken Academy Türkiye Blog - Eğitim, Kişisel Gelişim ve Kariyer Yazıları'},
        {
          property: 'og:description',
          content: 'Ken Academy Türkiye’nin blog sayfasında eğitim, kişisel gelişim, kariyer planlama ve motivasyon konularında faydalı içeriklere ulaşın. Güncel yazılarla öğrenmeye devam edin!',
        },
        {
          name: 'description',
          content: 'Ken Academy Türkiye’nin blog sayfasında eğitim, kişisel gelişim, kariyer planlama ve motivasyon konularında faydalı içeriklere ulaşın. Güncel yazılarla öğrenmeye devam edin!',
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
        url: '/api/blogs',
        props: {
          page: this.currentPage
        }
      }).then(res => {
        Loading.close();
        if(this.currentPage === 1){
          this.blogs = res.data;
        }else{
          this.blogs.data = [...this.blogs.data, ...res.data.data];
          this.blogs.last_page = res.data.last_page;
        }
        this.currentPage++;
        if (this.currentPage > res.data.last_page) {
          if (typeof complete === 'function') complete(); // güvenli kontrol
        } else {
          if (typeof loaded === 'function') loaded(); // güvenli kontrol
        }
      });
    }
  }
}
</script>

<style scoped>

</style>
