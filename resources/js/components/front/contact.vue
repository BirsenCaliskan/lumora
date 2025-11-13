<template>
  <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mt-7 mb-14 3xs:max-lg:mb-7 3xs:max-lg:mt-3">
    <!-- title -->
    <h1 class="text-2xl 3xs:max-lg:text-lg w-fit font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 md:after:-mr-7">
      İletişim
    </h1>
    <!-- detail -->
    <div class="bg-gradient-to-r from-black from-[13%] via-red-301 via-[44%] to-black to-100% py-8">
      <div class="max-w-screen-lg lg:mx-auto mx-4 flex md:items-end 3xs:max-md:flex-col md:justify-between gap-5 text-base 3xs:max-lg:text-sm text-black text-center">
        <a :href="`mailto:${settings.email}`" :title="settings.email" class="flex flex-col items-center justify-center gap-2 w-xs 3xs:max-md:w-full h-40 bg-gray-304 rounded-3xl px-5 py-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-9 mx-auto">
            <path fill="currentColor" d="M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20zm8-7l8-5V6l-8 5l-8-5v2z"/>
          </svg>
          <div class="break-all">{{ settings.email }}</div>
        </a>
        <a :href="`tel:${settings.phone}`" :title="settings.phone" class="flex flex-col items-center justify-center gap-2 w-xs 3xs:max-md:w-full h-40 bg-gray-304 rounded-3xl px-5 py-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-9 mx-auto">
            <path fill="currentColor" fill-rule="evenodd" d="M4.063 1.25h3.751a.75.75 0 0 1 .702.486l1.456 3.87a.75.75 0 0 1 .035.401l-.73 3.912c.897 2.108 2.378 3.525 4.833 4.796l3.865-.75a.75.75 0 0 1 .41.036l3.882 1.48a.75.75 0 0 1 .483.7v3.584c0 1.626-1.432 2.945-3.108 2.58c-3.053-.664-8.71-2.353-12.672-6.315c-3.796-3.795-5.068-9.037-5.495-11.87c-.245-1.618 1.052-2.91 2.588-2.91" clip-rule="evenodd"/>
          </svg>
          <div class="break-all">{{ settings.phone }}</div>
        </a>
        <div class="flex flex-col items-center justify-center gap-2 w-xs 3xs:max-md:w-full h-40 bg-gray-304 rounded-3xl px-5 py-4">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="size-9 mx-auto">
            <path fill="currentColor" d="m7.385 15.293l-.192-.13a18 18 0 0 1-2.666-2.283C3.1 11.385 1.5 9.144 1.5 6.499C1.5 3.245 4.141 0 8 0s6.5 3.245 6.5 6.5c0 2.645-1.6 4.886-3.027 6.379a18 18 0 0 1-2.666 2.283q-.122.085-.192.13c-.203.135-.41.263-.615.393c-.205-.13-.412-.258-.615-.392M8 8.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4"/>
          </svg>
          <div class="break-all">{{ settings.address }}</div>
        </div>
      </div>
    </div>
  </div>
  <!-- form -->
  <div class="max-w-screen-lg lg:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mb-14 3xs:max-lg:mb-7">
    <h2 class="w-fit mx-auto text-2xl 3xs:max-lg:text-lg w-fit font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 after:-mx-7">
      Bizimle İletişime Geçin
    </h2>
    <form @submit.prevent="Save" class="grid grid-cols-2 3xs:max-md:grid-cols-1 gap-5">
      <div class="space-y-2">
        <label for="fullName" class="block text-sm leading-5">
          Adınız Soyadınız
        </label>
        <input type="text" id="fullName" name="name" v-model="contact.name" required class="block bg-white/[0.22] border border-white rounded w-full text-white text-sm px-5 py-3 appearance-none focus-visible:ring-white focus-visible:border-white" aria-label="input">
      </div>
      <div class="space-y-2">
        <label for="email" class="block text-sm leading-5">
          Email Adresiniz
        </label>
        <input type="email" id="email" name="email" v-model="contact.email" required class="block bg-white/[0.22] border border-white rounded w-full text-white text-sm px-5 py-3 appearance-none focus-visible:ring-white focus-visible:border-white" aria-label="input">
      </div>
      <div class="space-y-2">
        <label for="phone" class="block text-sm leading-5">
          Telefon Numaranız
        </label>
        <input type="tel" name="phone" v-maska="options" v-model="phone" @maska="contact.phone = $event.detail.unmasked" required placeholder="(999)-999-99-99" class="block bg-white/[0.22] border border-white rounded w-full text-white text-sm px-5 py-3 appearance-none focus-visible:ring-white focus-visible:border-white" aria-label="input">
      </div>
      <div class="space-y-2">
        <label for="subject" class="block text-sm leading-5">
          Konu
        </label>
        <input type="text" id="subject" name="subject" v-model="contact.subject" required class="block bg-white/[0.22] border border-white rounded w-full text-white text-sm px-5 py-3 appearance-none focus-visible:ring-white focus-visible:border-white" aria-label="input">
      </div>
      <div class="md:col-span-2 space-y-2">
        <label for="message" class="block text-sm leading-5">
          Mesajınız
        </label>
        <textarea rows="6" id="message" name="message" v-model="contact.message" required class="block bg-white/[0.22] border border-white rounded w-full text-white text-sm px-5 py-3 appearance-none focus-visible:ring-white focus-visible:border-white"></textarea>
      </div>
      <div class="md:col-span-2 bg-gradient-to-l from-black from-gray-701 w-fit mx-auto rounded-lg p-px mt-5">
        <button type="submit" aria-label="Gönder" class="block w-fit rounded-lg bg-gradient-to-r from-red-301 to-black text-white text-sm leading-5 font-semibold px-6 py-2.5 cursor-pointer">
          Gönder
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import {useHead} from "@unhead/vue";
import {vMaska} from "maska/vue";

export default {
  name: "contact",
  data(){
    return{
      contact: {
        name: null,
        email: null,
        phone: null,
        subject: null,
        message: null,
      },
      options: {
        mask: '(###) ### ## ##',
        eager: true,
      },
      phone: null,
    }
  },
  directives: {
    maska: vMaska
  },
  computed: {
    ...mapState([
        'settings'
    ])
  },
  mounted() {
    useHead({
      title: 'İletişim | Ken Academy – Bize Ulaşın',
      link: [
        {rel: 'canonical', href: window.location.origin+'/iletisim'}
      ],
      meta: [
        {property: 'og:url', content: window.location.origin+'/iletisim'},
        {property: 'og:title', content: 'İletişim | Ken Academy – Bize Ulaşın'},
        {
          property: 'og:description',
          content: 'Ken Academy ile iletişime geçin. Eğitimlerimiz, kayıt süreci ve diğer tüm sorularınız için bizimle kolayca iletişim kurabilirsiniz.',
        },
        {
          name: 'description',
          content: 'Ken Academy ile iletişime geçin. Eğitimlerimiz, kayıt süreci ve diğer tüm sorularınız için bizimle kolayca iletişim kurabilirsiniz.',
        },
      ],
    });
  },
  methods: {
    ...mapActions([
        'post'
    ]),
    async Save(){
      await this.post({
        url: '/api/contact',
        props: {
          form: this.contact
        }
      }).then(res => {
        Swal.fire({
          title: res.data.title,
          icon: res.data.icon,
          html: res.data.message,
        });
        if(res.data.icon === 'success'){
          this.contact = {
            name: null,
            email: null,
            phone: null,
            subject: null,
            message: null,
          };
        }
      });
    }
  }
}
</script>

<style scoped>

</style>