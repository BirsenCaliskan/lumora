<template>
  <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mt-7 mb-14 3xs:max-lg:mb-7 3xs:max-lg:mt-3">
    <!-- title -->
    <h1 class="text-2xl 3xs:max-lg:text-lg w-fit font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 md:after:-mr-7">
      Basında Biz
    </h1>
    <!-- detail -->
    <div v-if="news.data && Object.keys(news.data).length" class="grid lg:grid-cols-4 md:grid-cols-3 xs:grid-cols-2 3xs:grid-cols-1 gap-x-6 gap-y-9 3xs:max-lg:gap-x-3.5 3xs:max-lg:gap-y-5">
      <div v-for="data in news.data" class="relative">
        <router-link :to="{name: 'Page',params: {url: data.url}}" :title="data.name" class="block w-full bg-gradient-to-b from-white via-black to-red-301 rounded p-1.5 cursor-pointer">
          <img :src="`${$store.state.BASEURL}${data.picture}`" width="364" height="380" :alt="data.name" loading="lazy" class="w-full h-auto rounded">
        </router-link>
        <div class="absolute bottom-5 inset-x-0 min-h-[50px] bg-gradient-to-r from-black from-0% via-red-301 via-[49%] to-white to-[93%] p-1 flex items-center justify-center mx-1.5">
          <div class="bg-gradient-to-r from-white from-[43%] to-black to-[62%] text-transparent bg-clip-text text-xs leading-4 font-bold">
            {{ data.name }}
          </div>
        </div>
      </div>
      <vue-eternal-loading :load="getData" :key="loadingKey" ref="infiniteLoading" v-if="news.last_page >= currentPage"/>
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
  name: "main-component",
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
    useHead({
      title: "Basında Biz | Ken Academy Türkiye – Medyada Ken Academy'nin Yeri ve Haberleri",
      link: [
        {rel: 'canonical', href: this.$store.state.BASEURL+'/basinda-biz'}
      ],
      meta: [
        {property: 'og:url', content: this.$store.state.BASEURL+'/basinda-biz'},
        {property: 'og:title', content: "Basında Biz | Ken Academy Türkiye – Medyada Ken Academy'nin Yeri ve Haberleri"},
        {
          property: 'og:description',
          content: 'Ken Academy Türkiye olarak eğitimlerimiz, etkinliklerimiz ve başarı hikayelerimiz ulusal ve sektörel basında sıkça yer alıyor. Basında Biz sayfamızda tüm medya yerleşimlerimizi keşfedebilirsiniz.',
        },
        {
          name: 'description',
          content: 'Ken Academy Türkiye olarak eğitimlerimiz, etkinliklerimiz ve başarı hikayelerimiz ulusal ve sektörel basında sıkça yer alıyor. Basında Biz sayfamızda tüm medya yerleşimlerimizi keşfedebilirsiniz.',
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