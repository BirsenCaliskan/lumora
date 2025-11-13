<template>
    <template v-if="education && Object.keys(education).length">
        <div class="max-w-screen-xl xl:mx-auto mx-5 max-md:mx-0 flex items-start gap-8 py-7">
            <div class="grow min-w-0 mb-14 max-md:mb-7">
                <!-- video -->
                <div class="relative mb-10 max-md:-mx-5">
                    <div class="mask-b-from-10% mask-b-to-90% bg-no-repeat bg-cover bg-center aspect-[16/9]" :style="`background-image: url('${BASEURL2}${education.picture}')`">
                    </div>
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10 block w-fit text-theme-200 cursor-pointer opacity-50">
                        <svg viewBox="0 0 143 150" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="w-16 max-md:w-10 h-auto animate-ping duration-200">
                            <path d="M130.568 55.1475C134.17 57.0631 137.183 59.9227 139.284 63.4199C141.385 66.9171 142.495 70.9201 142.495 75C142.495 79.0799 141.385 83.0829 139.284 86.5801C137.183 90.0773 134.17 92.9369 130.568 94.8525L34.4775 147.105C19.005 155.527 0 144.577 0 127.26V22.7475C0 5.42249 19.005 -5.52001 34.4775 2.88749L130.568 55.1475Z"/>
                        </svg>
                    </div>
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10 block w-fit text-theme-200 cursor-pointer opacity-50">
                        <svg viewBox="0 0 143 150" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="w-16 max-md:w-10 h-auto animate-ping duration-100">
                            <path d="M130.568 55.1475C134.17 57.0631 137.183 59.9227 139.284 63.4199C141.385 66.9171 142.495 70.9201 142.495 75C142.495 79.0799 141.385 83.0829 139.284 86.5801C137.183 90.0773 134.17 92.9369 130.568 94.8525L34.4775 147.105C19.005 155.527 0 144.577 0 127.26V22.7475C0 5.42249 19.005 -5.52001 34.4775 2.88749L130.568 55.1475Z"/>
                        </svg>
                    </div>
                    <button type="button" @click="openVideoModal()" class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-20 block w-fit text-theme-200 cursor-pointer">
                        <svg viewBox="0 0 143 150" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="w-16 max-md:w-10 h-auto">
                            <path d="M130.568 55.1475C134.17 57.0631 137.183 59.9227 139.284 63.4199C141.385 66.9171 142.495 70.9201 142.495 75C142.495 79.0799 141.385 83.0829 139.284 86.5801C137.183 90.0773 134.17 92.9369 130.568 94.8525L34.4775 147.105C19.005 155.527 0 144.577 0 127.26V22.7475C0 5.42249 19.005 -5.52001 34.4775 2.88749L130.568 55.1475Z"/>
                        </svg>
                    </button>
                    <div class="absolute inset-0 flex flex-col justify-end gap-3">
                        <h1 class="text-6xl max-lg:text-3xl leading-[1.2] font-elms-sans font-bold text-center">
                            {{ education.name }}
                        </h1>
                        <div v-if="education.instructor_names && Object.keys(education.instructor_names).length" class="py-3 text-center space-y-2">
                            <div class="text-xl max-lg:text-base leading-[1.2] font-bold text-theme-100">
                                Eğitmenler
                            </div>
                            <div class="text-3xl max-lg:text-lg font-semibold">
                                <span v-for="(data,index) in education.instructor_names">
                                    {{ data }}<br v-if="index%2 === 0 && index > 0">
                                    <span v-else-if="Object.keys(education.instructor_names).length - 1 > index"> -</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- icons -->
                <div v-if="education.details && Object.keys(education.details).length" class="space-y-3 mb-14 max-md:mb-7">
                    <div class="text-3xl max-lg:text-2xl font-semibold font-elms-sans">
                        Kurs İçeriği
                    </div>
                    <div class="grid grid-cols-2 max-md:grid-cols-1 gap-4 text-base leading-5 max-lg:text-sm">
                        <div v-for="data in education.details" class="flex items-center space-y-3 text-center">
                            <i :class="data.icon" class="text-3xl text-center"></i>
                            <div>{{ data.name }}</div>
                        </div>
                    </div>
                </div>
                <!-- description -->
                <div v-if="education.detail_contents && Object.keys(education.detail_contents).length" class="grid grid-cols-2 max-lg:grid-cols-1 gap-6 mb-14 max-md:mb-7">
                    <div v-for="data in education.detail_contents" class="border border-gray-200 rounded-lg px-5 py-3.5 text-md" v-html="data.content"></div>
                </div>
                <!-- teacher -->
                <div v-if="education.instructors && Object.keys(education.instructors).length" class="mb-14 max-md:mb-7">
                    <div v-for="data in education.instructors" class="overflow-auto border border-gray-200 rounded-lg space-y-6 p-4 sm:p-6 lg:p-8">
                        <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-center">
                            {{ data.name }} <span class="text-red-400">Kimdir ?</span>
                        </h2>
                        <div class="">
                            <img :src="`${$store.state.BASEURL}${data.picture}`" width="393" height="546" :alt="data.name" loading="lazy" class="flex-none 2xl:w-[393px] md:w-[240px] w-full h-auto md:mr-3 rounded-3xl border border-red-301 float-left">
                            <div class="space-y-4">
                                <div class="text-red-400 font-semibold">{{ data.title }}</div>
                                <div v-html="data.resume"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- detail -->
                <div v-if="education.detail_list && Object.keys(education.detail_list).length" class="space-y-3">
                    <div class="">
                        <div class="max-w-sm mx-auto w-full py-6 rounded-lg text-xl leading-5 3xs:max-lg:text-base font-bold">
                            {{ education.name }} Hakkında
                        </div>
                        <div v-for="data in education.detail_list" :key="`accordion-${data.id}`" class="mb-3">
                            <button type="button" @click="accordionButton(data.id)" aria-label="button" :class="{'active': accordion === data.id}" class="w-full border border-gray-200 rounded text-md font-medium font-elms-sans text-left flex items-center justify-between gap-1 px-4 py-2 group [&.active]:rounded-b-none">
                                <span>{{ data.name }}</span>
                                <svg width="33" height="21" viewBox="0 0 33 21" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="size-5 group-[.active]:rotate-180 duration-150">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M18.9289 19.8043C18.2843 20.448 17.4106 20.8096 16.4997 20.8096C15.5888 20.8096 14.7151 20.448 14.0705 19.8043L1.10428 6.8426C0.785126 6.52329 0.53199 6.14425 0.359325 5.72712C0.186657 5.30999 0.0978394 4.86293 0.0979462 4.41147C0.098053 3.96002 0.18708 3.513 0.359947 3.09595C0.53281 2.6789 0.786121 2.29998 1.10542 1.98083C1.42473 1.66167 1.80377 1.40854 2.2209 1.23587C2.63803 1.0632 3.08509 0.974384 3.53655 0.974491C3.98801 0.974598 4.43502 1.06363 4.85207 1.23649C5.26912 1.40935 5.64804 1.66267 5.9672 1.98197L16.4997 12.5122L27.0322 1.97968C27.3491 1.65122 27.7283 1.38916 28.1476 1.20881C28.5669 1.02846 29.018 0.933428 29.4744 0.929247C29.9308 0.925068 30.3835 1.01183 30.806 1.18447C31.2286 1.35711 31.6125 1.61217 31.9354 1.93478C32.2583 2.25738 32.5137 2.64106 32.6868 3.06343C32.8598 3.48581 32.947 3.93841 32.9432 4.39484C32.9395 4.85127 32.8449 5.30238 32.6649 5.72185C32.485 6.14133 32.2233 6.52076 31.8951 6.83801L18.9289 19.8043Z"/>
                                </svg>
                            </button>
                            <div :class="{'active': accordion === data.id}" class="border border-t-0 border-gray-200 rounded-lg rounded-t-none px-4 h-0 opacity-0 overflow-hidden invisible scrollbar max-h-[300px] text-sm [&.active]:py-3 [&.active]:h-full [&.active]:overflow-y-auto [&.active]:opacity-100 [&.active]:visible duration-300" v-html="data.detail"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-none w-64 max-lg:hidden h-fit sticky top-20 z-10 space-y-4">
                <div class=""></div>
            </div>
        </div>
        <!-- educations -->
        <div v-if="newEducations && Object.keys(newEducations).length" class="pb-14 max-lg:py-8">
            <div class="max-w-screen-xl xl:mx-auto mx-5 space-y-6 max-lg:space-y-4">
                <div class="flex items-center justify-between ">
                    <h2 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
                        Yeni Eklenen Eğitimler
                    </h2>
                    <div class="flex items-center gap-2">
                        <button type="button" aria-label="prev" class="block 3xs:max-md:hidden w-fit px-2 py-1 [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-50 cursor-pointer prev-new-button">
                            <svg viewBox="0 0 55 55" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="size-6">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M18.1957 29.9291C17.552 29.2846 17.1904 28.4109 17.1904 27.4999C17.1904 26.589 17.552 25.7153 18.1957 25.0708L31.1574 12.1045C31.4767 11.7854 31.8557 11.5322 32.2729 11.3596C32.69 11.1869 33.1371 11.0981 33.5885 11.0982C34.04 11.0983 34.487 11.1873 34.904 11.3602C35.3211 11.5331 35.7 11.7864 36.0192 12.1057C36.3383 12.425 36.5915 12.804 36.7641 13.2211C36.9368 13.6383 37.0256 14.0853 37.0255 14.5368C37.0254 14.9882 36.9364 15.4353 36.7635 15.8523C36.5906 16.2694 36.3373 16.6483 36.018 16.9674L25.4878 27.4999L36.0203 38.0324C36.3488 38.3494 36.6108 38.7286 36.7912 39.1479C36.9715 39.5672 37.0666 40.0182 37.0708 40.4746C37.0749 40.931 36.9882 41.3837 36.8155 41.8063C36.6429 42.2288 36.3878 42.6127 36.0652 42.9356C35.7426 43.2585 35.3589 43.514 34.9366 43.687C34.5142 43.86 34.0616 43.9472 33.6052 43.9435C33.1487 43.9397 32.6976 43.8451 32.2781 43.6652C31.8587 43.4852 31.4792 43.2235 31.162 42.8954L18.1957 29.9291Z"/>
                            </svg>
                        </button>
                        <router-link :to="{name: 'Educations'}" title="Tümü" class="block text-base max-lg:text-sm w-fit">
                            Tümü
                        </router-link>
                        <button type="button" aria-label="next" class="block 3xs:max-md:hidden w-fit px-2 py-1 [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-50 cursor-pointer next-new-button">
                            <svg viewBox="0 0 60 60" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="size-6">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M40.15 27.35C40.8522 28.0531 41.2467 29.0062 41.2467 30C41.2467 30.9938 40.8522 31.9469 40.15 32.65L26.01 46.795C25.3065 47.4982 24.3525 47.8931 23.3578 47.8928C22.3632 47.8926 21.4094 47.4972 20.7062 46.7938C20.0031 46.0903 19.6082 45.1363 19.6084 44.1416C19.6086 43.147 20.004 42.1932 20.7075 41.49L32.1975 30L20.7075 18.51C20.024 17.8031 19.6456 16.856 19.6537 15.8727C19.6618 14.8895 20.0557 13.9488 20.7506 13.2531C21.4456 12.5575 22.386 12.1627 23.3692 12.1537C24.3524 12.1447 25.2999 12.5222 26.0075 13.205L40.1525 27.3475L40.15 27.35Z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <swiper
                    :observer="false"
                    :observe-parents="false"
                    :modules="[Autoplay,Navigation]"
                    :autoplay="{delay: 2500}"
                    :navigation="{nextEl: '.next-new-button',prevEl: '.prev-new-button'}"
                    :breakpoints="newEducationBreakpoints">
                    <swiper-slide v-for="data in newEducations" :key="`new-${data.id}`">
                        <product-cart :product="data"/>
                    </swiper-slide>
                </swiper>
            </div>

        </div>
        <!-- fixed button -->
        <div class="fixed bottom-0 inset-x-0 w-full md:hidden z-[99999999999]">
            <button type="button" @click="callModal" aria-label="Hemen Başvur" class="block w-full rounded-lg bg-gradient-to-r from-red-301 to-black text-white text-sm leading-5 text-center font-semibold px-6 py-2.5 cursor-pointer">
                Hemen Başvur
            </button>
        </div>
    </template>
    <div v-else class="text-center py-12">
        <svg class="mx-auto h-24 w-24 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
</template>

<script>
import {mapActions, mapState} from "vuex";
import {openModal, pushModal} from "jenesius-vue-modal";
import {defineAsyncComponent} from "vue";
import {useHead} from "@unhead/vue";
import {Swiper, SwiperSlide} from "swiper/vue";
import {Autoplay, Navigation} from "swiper/modules";
import VideoModal from './video-modal.vue';

export default {
    name: "detail",
    components: {
        SwiperSlide, Swiper,
        ProductCart: defineAsyncComponent(() => import('../layout/product-cart.vue')),
        CallForm: defineAsyncComponent(() => import('.././layout/call_form.vue')),
    },
    setup() {
        return {
            Autoplay, Navigation
        }
    },
    data() {
        return {
            education: {
                details: {},
                detail_contents: [],
                instructors: [],
                detail_list: [],
            },
            isPlaying: false,
            newEducations: [],
            newEducationBreakpoints: {
                320: {
                    slidesPerView: 1.1,
                    spaceBetween: 10,
                },
                375: {
                    slidesPerView: 1.3,
                    spaceBetween: 15,
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
            accordion: null,
        }
    },
    async mounted() {
        await this.getData();
        await this.getNewEducations();
    },
    computed: {
        ...mapState([
            'BASEURL2'
        ])
    },
    methods: {
        ...mapActions([
            'get',
        ]),
        async getData() {
            let Loading = await pushModal('Loading');
            let url = this.$route.params.url;
            await this.get({
                url: '/api/educationDetail',
                props: {url}
            }).then(res => {
                Loading.close();
                this.education = res.data;
                useHead({
                    title: res.data.seo_title,
                    link: [
                        {rel: 'canonical', href: this.$store.state.BASEURL + '/egitim/' + url}
                    ],
                    meta: [
                        {property: 'og:url', content: this.$store.state.BASEURL + '/egitim/' + url},
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
        },
        async getNewEducations() {
            await this.get({
                url: '/api/newEducations',
                props: {limit: 6},
            }).then(res => {
                this.newEducations = res.data;
            })
        },
        async callModal() {
            await openModal('call_form', {
                education_id: this.education.id, emit: () => {
                }
            });
        },
        accordionButton(id) {
            this.accordion = (this.accordion === id) ? null : id
        },
        async openVideoModal() {
            if (this.education.teaser) {
                await openModal(VideoModal, {
                    videoUrl: this.education.teaser
                });
            }
        },
    }
}
</script>

<style scoped>

</style>
