<template>
  <div v-if="accreditations && Object.keys(accreditations).length" class="space-y-5 3xs:max-lg:space-y-2.5 mt-7 mb-14 3xs:max-lg:mb-7">
    <!-- title -->
    <h1 class="max-w-screen-xl xl:mx-auto mx-4 w-fit text-2xl 3xs:max-lg:text-lg font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 md:after:-mr-7">
      Akreditasyonlarımız
    </h1>
    <div class="bg-gradient-to-r from-black from-[13%] via-red-301 via-[44%] to-black to-100% py-5">
      <swiper
          v-if="loopedAccreditations.length >= 6"
          :modules="[Autoplay]"
          :autoplay="{delay: 2500}"
          :breakpoints="accreditationsBreakpoints"
          :space-between="20"
          :loop-additional-slides="3"
          centered-slides
          @swiper="onSwiper"
          @slide-change="onSlideChange"
          class="max-w-screen-2xl 2xl:mx-auto mx-5 accreditationsSwiper">
        <swiper-slide v-for="data in loopedAccreditations" class="group">
          <figure class="h-fit relative pb-8 overflow-hidden">
            <img :src="`${$store.state.BASEURL}assets/images/${data.picture}`" width="511" height="361" :alt="data.name" loading="lazy" class="rounded-4xl size-full object-cover transition-all duration-300 group-[.swiper-slide-active]:scale-100 group-[.swiper-slide-active]:opacity-100 scale-50 opacity-50">
            <div class="absolute inset-x-0 bottom-0 text-center font-semibold text-lg 3xs:max-lg:text-base">
              {{data.name}}
            </div>
          </figure>
        </swiper-slide>
      </swiper>
    </div>
    <div class="max-w-screen-lg lg:mx-auto mx-4 space-y-5 3xs:max-lg:space-y-2.5">
      <h2 class="w-fit mx-auto text-2xl 3xs:max-lg:text-lg font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 after:-mx-7">
        {{activeSlide.name}}
      </h2>
      <div class="text-sm leading-5" v-html="activeSlide.detail"></div>
    </div>
  </div>
</template>

<script>
import "swiper/css";
import "swiper/css/autoplay";
import {Swiper, SwiperSlide} from "swiper/vue";
import {Autoplay} from "swiper/modules";
import {useHead} from "@unhead/vue";
import {mapState} from "vuex";
export default {
  name: "accreditations",
  components: {
    Swiper,
    SwiperSlide,
  },
  setup(){
    return {
      Autoplay
    }
  },
  data(){
    return {
      swiperInstance: null,
      activeSlide: {
        name: null,
        detail: null
      },
      accreditations: [
        {id: 1, name: 'CPD', picture: 'banner9.webp', detail: 'CPD, kapsamlı bir dizin ve akreditasyon platformudur.Bu platform, profesyonellerin, kuruluşların ve eğitim sağlayıcılarının CPD faaliyetlerini doğrulamalarına ve tanıtmalarına yardımcı olur, böylece bu faaliyetlerin tanınmış standartlara uygun olmasını sağlar. CPD, kullanıcıların akredite edilmiş CPD kurslarını, etkinliklerini ve sağlayıcılarını aramalarına ve doğrulamalarına olanak tanır. Bu sayede profesyoneller, katıldıkları eğitimlerin meşru olduğunu ve yüksek kalite standartlarına uygun olduğunu garanti altına alabilirler. Aynı zamanda, sahte veya düşük kaliteli eğitim sağlayıcılarına karşı tüketicileri korur, kursların ve sağlayıcıların akreditasyon durumlarını katılmadan önce kontrol etmelerine imkan tanır.'},
        {id: 2, name: 'EXEMPLAR GLOBAL', picture: 'banner10.webp', detail: 'Exemplar Global, uluslararası alanda tanınan bir akreditasyon ve sertifikasyon kuruluşudur. Profesyonellerin bilgi, beceri ve yetkinliklerini değerlendirme ve sertifikalandırma süreçlerinde yüksek standartlar sunar. Exemplar Global sertifikaları, birçok sektörde kabul görerek bireylerin kariyerlerini güçlendirmesine yardımcı olur.  Ken Academy olarak, Exemplar Global onaylı eğitim programlarımız ile sizlere uluslararası standartlarda bir öğrenme deneyimi sunuyoruz. Siz de bu ayrıcalıklı sertifikaya sahip olarak global alanda fark yaratabilirsiniz.'},
        {id: 3, name: 'ELQN', picture: 'banner17.webp', detail: 'Ken Academy olarak sunduğumuz eğitimler, Amerika merkezli prestijli bir kuruluş olan ELQN (European Learning Quality Network) tarafından akredite edilmektedir. 2004 yılında kurulan ELQN, eğitimde kalite standartlarını yükseltmek amacıyla kurulmuş ve kısa sürede Avrupa genelinde eğitim kurumları arasında saygın bir otorite haline gelmiştir. ELQN, öğrenme süreçlerinde şeffaflık, doğruluk ve sürdürülebilir gelişimi esas alarak, katılımcıların uluslararası düzeyde kabul gören yetkinlik belgelerine sahip olmasını amaçlamaktadır.'},
      ],
      accreditationsBreakpoints: {
        320: {
          slidesPerView: 2,
          spaceBetween: 5,
        },
        375: {
          slidesPerView: 2,
          spaceBetween: 10,
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
      },
    }
  },
  async mounted() {
    useHead({
      title: 'Akreditasyonlarımız | Ken Academy – Ulusal ve Uluslararası Geçerlilik',
      link: [
        {rel: 'canonical', href: window.location.origin+'/akreditasyonlarimiz'}
      ],
      meta: [
        {property: 'og:url', content: window.location.origin+'/akreditasyonlarimiz'},
        {property: 'og:title', content: 'Akreditasyonlarımız | Ken Academy – Ulusal ve Uluslararası Geçerlilik'},
        {
          property: 'og:description',
          content: 'Ken Academy olarak sahip olduğumuz ulusal ve uluslararası akreditasyonlar ile eğitim kalitemizi belgeliyoruz. Sertifikalarımız ve yetkinlik belgelerimizi inceleyin.',
        },
        {
          name: 'description',
          content: 'Ken Academy olarak sahip olduğumuz ulusal ve uluslararası akreditasyonlar ile eğitim kalitemizi belgeliyoruz. Sertifikalarımız ve yetkinlik belgelerimizi inceleyin.',
        },
      ],
    });
    await this.getData();
  },
  computed: {
    loopedAccreditations() {
      const original = this.accreditations || []
      const minCount = 9;
      if (original.length < minCount) {
        const factor = Math.ceil(minCount / original.length)
        const extended = Array(factor).fill(original).flat().slice(0, minCount)
        return extended
      }
      return original
    }
  },
  methods: {
    async getData(){
      this.activeSlide = {
        name: this.loopedAccreditations[0].name,
        detail: this.loopedAccreditations[0].detail
      };
    },
    onSwiper(swiper){
      this.swiperInstance = swiper;
    },
    onSlideChange(){
      const index = this.swiperInstance?.activeIndex || 0;
      let active = this.loopedAccreditations[index];
      this.activeSlide = {
        name: active.name,
        detail: active.detail
      };
    },
  }
}
</script>

<style scoped>

</style>