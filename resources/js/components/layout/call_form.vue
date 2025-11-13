<template>
  <div :class="{'active': activeClass}" class="bg-black border-[6px] border-white rounded-lg px-6 py-9 [&.active]:3xs:max-lg:border-0 [&.active]:3xs:max-lg:p-0 space-y-3">
    <figure class="mx-auto lg:w-60 md:w-52 3xs:w-40">
      <img :src="`${$store.state.BASEURL}assets/images/logo-white.webp`" width="473" height="93" alt="lumora academy" class="w-full h-auto">
    </figure>
    <div class="text-base 3xs:max-lg:text-sm lg:text-center">
      Kariyer yolculuğunuza başlamak için aşağıdaki formu doldurduğunuzda detaylı bilgi için sizi arayacağız.
    </div>
    <form @submit.prevent="Save" class="space-y-2.5">
      <div>
        <input type="text" name="name" v-model="contact.name" required placeholder="Lütfen Ad Soyad Giriniz" class="block bg-white rounded w-full text-black text-sm px-5 py-3 focus-visible:ring-red-301 focus-visible:border-red-301" aria-label="input">
      </div>
      <div>
        <input type="email" name="email" v-model="contact.email" placeholder="Lütfen Mail Adresinizi Giriniz" class="block bg-white rounded w-full text-black text-sm px-5 py-3 focus-visible:ring-red-301 focus-visible:border-red-301" aria-label="input">
      </div>
      <div class="bg-gradient-to-r from-red-301 rounded text-white text-xs px-6 py-3">
        Lütfen GSM Numaranızı Başında "0" Olmadan Yazınız.
      </div>
      <div class="flex items-center gap-1">
        <v-select label="name"
                  :searchable="false"
                  :clearable="false"
                  v-model="contact.country"
                  :reduce="(option) => option.id"
                  :options="$store.state.phoneCountry" class="flex-none w-40 bg-white select-2 rounded">
        </v-select>
        <div>-</div>
        <div class="grow min-w-0">
          <input type="tel" name="phone" v-maska="options" v-model="phone" required @maska="contact.phone = $event.detail.unmasked" placeholder="(999)-999-99-99" class="block bg-white rounded w-full text-black text-sm px-5 py-3 focus-visible:ring-red-301 focus-visible:border-red-301" aria-label="input">
        </div>
      </div>
      <v-select label="name"
                :clearable="false"
                v-model="contact.educations_id"
                :reduce="(option) => option.id"
                :options="educationList" class="w-full bg-gradient-to-r from-red-301 select rounded">
      </v-select>
      <div class="bg-gradient-to-l from-black from-gray-701 w-fit mx-auto rounded-lg p-px mt-5">
        <button type="submit" aria-label="Hemen Başvur" class="block w-fit rounded-lg bg-gradient-to-r from-red-301 to-black text-white text-sm leading-5 font-semibold px-6 py-2.5 cursor-pointer">
          Hemen Başvur
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import {vMaska} from "maska/vue";
import {mapActions} from "vuex";
import {pushModal} from "jenesius-vue-modal";

export default {
  name: "call_form",
  props: ['education','activeClass'],
  directives: {
    maska: vMaska
  },
  data(){
    return {
      contact: {
        name: null,
        email: null,
        phone: null,
        educations_id: 1,
        country: 1,
      },
      phone: null,
      isValid: false,
      options: {
        mask: '(###) ### ## ##',
        eager: true,
      },
      educationList: [],
    }
  },
  async mounted(){
    if(this.education) this.contact.educations_id = this.education;
    await this.getEducations();
  },
  methods: {
    ...mapActions([
       'post',
        'get',
    ]),
    async getEducations(){
      await this.get({
        url: '/api/getEducations',
      }).then(res => {
        this.educationList = res.data;
      })
    },
    async Save(){
      const Loading = await pushModal('Loading');
      await this.post({
        url: '/api/addData',
        props: {...this.contact},
      }).then(res => {
        Loading.close();
        if(res.data.icon === 'success'){
          this.$emit('closeStatus',true);

          window.dataLayer = window.dataLayer || [];
          window.dataLayer.push({
            event: 'formSuccess',
            formName: 'ContactForm',
            status: 'success'
          });

          this.$router.push({
            path: this.$route.path,
            query: {
              ok: 'ok'
            }
          });

        }
        Swal.fire({
          title: res.data.title,
          icon: res.data.icon,
          html: res.data.message,
        })
      })
    },
  }
}
</script>

<style>

.select{
  --vs-selected-color: white;
  --vs-controls-color: white;
  --vs-dropdown-bg: #000 !important;
}
.select-2{
  --vs-selected-color: black;
  --vs-controls-color: white;
  --vs-dropdown-bg: #000 !important;
}
.vs__dropdown-menu{
  overflow-x: hidden !important;
  overflow-y: auto !important;
}
</style>
