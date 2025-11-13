<template>
  <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mb-14 3xs:max-lg:mb-7 3xs:max-lg:mt-3">
    <!-- title -->
    <h1 class="text-2xl 3xs:max-lg:text-lg w-fit font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 md:after:-mr-7">
      Dergilerimiz
    </h1>
    <!-- detail -->
    <div v-if="magazines.data && Object.keys(magazines.data).length" class="grid lg:grid-cols-4 md:grid-cols-3 xs:grid-cols-2 3xs:grid-cols-1 gap-x-6 gap-y-9 3xs:max-lg:gap-x-3.5 3xs:max-lg:gap-y-5">
      <div v-for="data in magazines.data" class="relative">
        <a :href="data.url" target="_blank" class="block w-full bg-gradient-to-b from-white via-black to-red-301 rounded p-1.5 cursor-pointer">
          <img :src="`${$store.state.BASEURL}${data.picture}`" width="364" height="380" :alt="data.name" loading="lazy" class="w-full h-auto rounded">
        </a>
        <div class="absolute bottom-5 inset-x-0 min-h-[50px] bg-gradient-to-r from-black from-0% via-red-301 via-[49%] to-white to-[93%] p-1 flex items-center justify-center mx-1.5">
          <div class="bg-gradient-to-r from-white from-[43%] to-black to-[62%] text-transparent bg-clip-text text-xs leading-4 font-bold">
            {{ data.name }}
          </div>
        </div>
      </div>
      <vue-eternal-loading :load="getData" :key="loadingKey" ref="infiniteLoading" v-if="magazines.last_page >= currentPage"/>
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
  name: "magazines",
  data(){
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
  async mounted(){
    useHead({
      title: "Dergilerimiz | Ken Academy Türkiye – Eğitim ve Kariyer İçerikleriyle Dolu Yayınlar",
      link: [
        {rel: 'canonical', href: this.$store.state.BASEURL+'/dergilerimiz'}
      ],
      meta: [
        {property: 'og:url', content: this.$store.state.BASEURL+'/dergilerimiz'},
        {property: 'og:title', content: "Dergilerimiz | Ken Academy Türkiye – Eğitim ve Kariyer İçerikleriyle Dolu Yayınlar"},
        {
          property: 'og:description',
          content: 'Ken Academy Türkiye tarafından yayımlanan tüm dijital ve basılı dergilere bu sayfadan ulaşabilirsiniz. Eğitim, liderlik, kariyer gelişimi ve sektörel analizlerle dolu özel içerikler sizi bekliyor.',
        },
        {
          name: 'description',
          content: 'Ken Academy Türkiye tarafından yayımlanan tüm dijital ve basılı dergilere bu sayfadan ulaşabilirsiniz. Eğitim, liderlik, kariyer gelişimi ve sektörel analizlerle dolu özel içerikler sizi bekliyor.',
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
        url: '/api/magazines',
        props: {
          page: this.currentPage,
        }
      }).then(res => {
        Loading.close();
        if(this.currentPage === 1){
          this.magazines = res.data;
        }else{
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