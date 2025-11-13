<template>
  <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mt-7 mb-14 3xs:max-lg:mb-7 3xs:max-lg:mt-3">
    <template v-if="teacher && Object.keys(teacher).length">
      <!-- title -->
      <h1 class="text-2xl 3xs:max-lg:text-lg w-fit font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 md:after:-mr-7">
        {{ teacher.name }}
      </h1>
      <!-- detail -->
      <div class="space-y-12 text-lg leading-7 3xs:max-md:text-base min-h-[546px]">
        <div class="">
          <img :src="`${$store.state.BASEURL}${teacher.picture}`" width="393" height="546" :alt="teacher.name" loading="lazy" class="flex-none 2xl:w-[393px] md:w-[290px] h-auto md:mr-3 rounded-3xl border border-red-301 float-left">
          <div v-if="teacher.resume && Object.keys(teacher.resume).length" class="space-y-4">
            <div class="text-red-400 font-semibold">{{ teacher.resume.title }}</div>
            <div v-html="teacher.resume.resume"></div>
          </div>
        </div>
      </div>
    </template>
    <div v-else class="text-center py-12">
      <svg class="mx-auto size-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
      </svg>
      <h3 class="text-lg font-medium mb-2">Sayfa bulunamadı</h3>
      <p class="mb-4">
        Aradığınız içerik artık mevcut değil.
      </p>
      <router-link :to="{name: 'Home'}" title="Anasayfaya Dön" class="bg-red-301 text-white px-4 py-2 rounded-lg hover:bg-red-400 transition-colors">
        Anasayfaya Dön
      </router-link>
    </div>
  </div>
</template>

<script>
import {mapActions} from "vuex";
import {useHead} from "@unhead/vue";
import {pushModal} from "jenesius-vue-modal";

export default {
  name: "detail",
  data() {
    return {
      teacher: {}
    }
  },
  async mounted() {
    await this.getData();
  },
  methods: {
    ...mapActions([
      'get',
    ]),
    async getData() {
      let Loading = await pushModal('Loading');
      let url = this.$route.params.url;
      await this.get({
        url: '/api/instructorDetail',
        props: {
          link: url
        }
      }).then(res => {
        Loading.close();
        this.teacher = res.data;
        useHead({
          title: res.data.seo_title,
          link: [
            {rel: 'canonical', href: this.$store.state.BASEURL + '/egitmen/' + url}
          ],
          meta: [
            {property: 'og:url', content: this.$store.state.BASEURL + '/egitmen/' + url},
            {property: 'og:title', content: res.data.seo_title},
            {
              property: 'og:description',
              content: res.data.seo_description,
            },
            {
              name: 'description',
              content: res.data.seo_description,
            },
          ],
        });
      })
    }
  }
}
</script>

<style scoped>

</style>