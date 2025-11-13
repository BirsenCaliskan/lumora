<template>
  <div class="modal-sidebar fixed inset-y-0 left-0 z-[1045] max-w-[350px] w-full border-none bg-black bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out transform-none">
    <div class="w-full h-full overflow-y-auto overflow-x-hidden scrollbar">
      <div class="sticky top-0 z-10 bg-black flex items-center justify-between p-2 border-b-2 border-white">
        <router-link :to="{name: 'Home'}" class="block 3xs:w-44">
          <img :src="`${$store.state.BASEURL}assets/images/logo-white.webp`" width="473" height="93" alt="lumora academy" loading="lazy" class="w-full h-auto">
        </router-link>
        <button aria-label="button"  type="button" @click="closeModal" class="block relative w-9 h-9 ml-auto rounded-full border-[9px] border-transparent group hover:bg-black/5 duration-300">
          <span class="block absolute top-1/2 left-0 -translate-y-1/2 rotate-45 w-full h-[1.3px] bg-white group-hover:rotate-0 duration-500"></span>
          <span class="block absolute top-1/2 left-0 -translate-y-1/2 -rotate-45 w-full h-[1.3px] bg-white group-hover:rotate-0 duration-500"></span>
        </button>
      </div>
      <div class=" pt-2">
        <router-link :to="{name: 'Educations'}" title="Eğitimler" class="block w-full text-base leading-5 py-2 px-4">
          Eğitimler
        </router-link>
      </div>
      <div class="">
        <button type="button" @click="accordionButton('about')" aria-label="Biz Kimiz?" class="flex items-center justify-between gap-2 w-full px-4 py-2">
          <span>Biz Kimiz?</span>
          <svg viewBox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg" :class="{'active': accordion.id === 'about'}" class="w-4 h-auto [&.active]:rotate-180 duration-200">
            <path d="M1.66675 1.66666L15.0001 15L28.3334 1.66666" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        <div :class="{'active': accordion.id === 'about' }" class="h-0 scrollbar text-sm leading-5 overflow-x-hidden overflow-y-auto opacity-0 [&.active]:py-1 [&.active]:opacity-100 [&.active]:h-auto duration-300">
          <ul class="text-sm leading-5">
            <li>
              <router-link :to="{name: 'About'}" title="Hakkımızda" class="flex items-center gap-2.5 w-full px-2 py-1.5 group cursor-pointer">
                <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" alt="Hakkımızda" class="size-5 opacity-0 group-hover:opacity-100 duration-200">
                <div>Hakkımızda</div>
              </router-link>
            </li>
            <li>
              <router-link :to="{name: 'Magazines'}" title="Dergilerimiz" class="flex items-center gap-2.5 w-full px-2 py-1.5 group cursor-pointer">
                <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" alt="Dergilerimiz" class="size-5 opacity-0 group-hover:opacity-100 duration-200">
                <div>Dergilerimiz</div>
              </router-link>
            </li>
            <li>
              <router-link :to="{name: 'Teachers'}" title="Eğitmenlerimiz" class="flex items-center gap-2.5 w-full px-2 py-1.5 group cursor-pointer">
                <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" alt="Eğitmenlerimiz" class="size-5 opacity-0 group-hover:opacity-100 duration-200">
                <div>Eğitmenlerimiz</div>
              </router-link>
            </li>
            <li>
              <router-link :to="{name: 'Accreditations'}" title="Akreditasyonlarımız" class="flex items-center gap-2.5 w-full px-2 py-1.5 group cursor-pointer">
                <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" alt="Eğitmenlerimiz" class="size-5 opacity-0 group-hover:opacity-100 duration-200">
                <div>Akreditasyonlarımız</div>
              </router-link>
            </li>
            <li>
              <router-link :to="{name: 'News'}" title="Basında Biz" class="flex items-center gap-2.5 w-full px-2 py-1.5 group cursor-pointer">
                <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" alt="Basında Biz" class="size-5 opacity-0 group-hover:opacity-100 duration-200">
                <div>Basında Biz</div>
              </router-link>
            </li>
            <li>
              <router-link :to="{name: 'Blogs'}" title="Ken Academy Blog" class="flex items-center gap-2.5 w-full px-2 py-1.5 group cursor-pointer">
                <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" alt="Ken Academy Blog" class="size-5 opacity-0 group-hover:opacity-100 duration-200">
                <div>Ken Academy Blog</div>
              </router-link>
            </li>
            <li>
              <router-link :to="{name: 'Contact'}" title="İletişim" class="flex items-center gap-2.5 w-full px-2 py-1.5 group cursor-pointer">
                <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="20" height="20" alt="İletişim" class="size-5 opacity-0 group-hover:opacity-100 duration-200">
                <div>İletişim</div>
              </router-link>
            </li>
          </ul>
        </div>
      </div>
      <a :href="`${$store.state.BASEURL}demo-paneli/egitimlerim`" title="Demo Paneli" class="block w-full py-2 px-4 text-base leading-5">
        Demo Paneli
      </a>
      <div class="bg-gradient-to-l from-black from-gray-701 w-[-webkit-fill-available] rounded-lg p-px mx-2 mt-3">
        <a :href="`${$store.state.BASEURL}egitim-paneli`" title="Giriş" class="block w-full rounded-lg bg-gradient-to-r from-red-301 to-black text-white text-md leading-5 font-semibold text-center px-4 py-1.5">
          Giriş
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import {closeModal} from "jenesius-vue-modal";

export default {
  name: "mobil-menu",
  props: ['categories'],
  data(){
    return {
      topCategories: [],
      accordion: {
        id: null,
        child: null,
      },
    }
  },
  methods:{
    accordionButton(data,child){
      if(child){
        this.accordion.child = this.accordion.child === data ? null : data;
      }else{
        this.accordion.id = this.accordion.id === data ? null : data;
        this.accordion.child = null;
      }
    },
    closeModal(){
      closeModal();
    },
  }
}
</script>

<style scoped>
.modal-container:has(.modal-sidebar) {
display: grid;
  grid-auto-columns: max-content;
  justify-content: end;
}
.modal-list-enter-from .modal-sidebar,
.modal-list-leave-to .modal-sidebar{
  transform: translateX(-100%) !important;
}

</style>
