<template>
    <!-- swiper -->
    <div class="max-w-screen-xl xl:mx-auto mx-5 mt-8">
        <swiper>
            <swiper-slide>
                <figure>
                    <img :src="`${BASEURL}assets/images/banner1.webp`" width="1280" height="389" alt="lumora academy" fetchpriority="high" decoding="async" loading="eager" class="w-full h-auto">
                </figure>
            </swiper-slide>
        </swiper>
    </div>
    <!-- security -->
    <div class="max-w-screen-xl xl:mx-auto mx-5 grid grid-cols-4 max-lg:grid-cols-2 max-md:grid-cols-1 items-center text-sm leading-4 md:divide-x max-lg:divide-y divide-gray-300 mt-8">
        <div class="flex items-center gap-3.5 px-5 py-7">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="flex-none size-10">
                <path fill="currentColor" d="M21 6h-7.59l3.29-3.29L16 2l-4 4l-4-4l-.71.71L10.59 6H3a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8a2 2 0 0 0-2-2m0 14H3V8h18zM9 10v8l7-4z" />
            </svg>
            <div class="space-y-1.5">
                <div class="text-lg leading-5 font-elms-sans font-semibold">
                    Canlı Yayınlar
                </div>
                <div class="font-light">
                    Alanında uzman eğitmenlerle interaktif, canlı derslere katılım imkanı.
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3.5 px-5 max-lg:border-x-0 py-7">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" class="flex-none size-10">
                <path fill="currentColor" d="M32 6H4a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h15l.57-.7l.93-1.14l-.09-.16H4V8h28v8.56a8.4 8.4 0 0 1 2 1.81V8a2 2 0 0 0-2-2" class="clr-i-outline clr-i-outline-path-1" />
                <path fill="currentColor" d="M7 12h17v1.6H7z" class="clr-i-outline clr-i-outline-path-2" />
                <path fill="currentColor" d="M7 16h11v1.6H7z" class="clr-i-outline clr-i-outline-path-3" />
                <path fill="currentColor" d="M7 23h10v1.6H7z" class="clr-i-outline clr-i-outline-path-4" />
                <path fill="currentColor" d="M27.46 17.23a6.36 6.36 0 0 0-4.4 11l-1.94 2.37l.9 3.61l3.66-4.46a6.26 6.26 0 0 0 3.55 0l3.66 4.46l.9-3.61l-1.94-2.37a6.36 6.36 0 0 0-4.4-11Zm0 10.68a4.31 4.31 0 1 1 4.37-4.31a4.35 4.35 0 0 1-4.37 4.31" class="clr-i-outline clr-i-outline-path-5" />
                <path fill="none" d="M0 0h36v36H0z" />
            </svg>
            <div class="space-y-1.5">
                <div class="text-lg leading-5 font-elms-sans font-semibold">
                    E-Devlet Onaylı Sertifika
                </div>
                <div class="font-light">
                    Resmi geçerliliğe sahip sertifikanızla kariyerinizi güvence altına alın.
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3.5 px-5 md:border-b-0 py-7">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="flex-none size-10">
                <path fill="currentColor" d="m11.005 2l7.298 2.28a1 1 0 0 1 .702.955V7h2a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1l-3.22.001c-.387.51-.857.96-1.4 1.33L11.005 22l-5.38-3.668a6 6 0 0 1-2.62-4.958V5.235a1 1 0 0 1 .702-.954zm0 2.094l-6 1.876v7.404a4 4 0 0 0 1.558 3.169l.189.136l4.253 2.9L14.787 17h-4.782a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h7V5.97zm0 7.906v3h9v-3zm0-2h9V9h-9z" />
            </svg>
            <div class="space-y-1.5">
                <div class="text-lg leading-5 font-elms-sans font-semibold">
                    Güvenli Ödeme
                </div>
                <div class="font-light">
                    3D Secure ve SSL güvencesiyle kişisel verilerinizi koruyarak ödeme yapın.
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3.5 px-5 py-7">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="flex-none size-10">
                <path fill="currentColor" d="M18.6 6.62c-1.44 0-2.8.56-3.77 1.53L7.8 14.39c-.64.64-1.49.99-2.4.99C3.53 15.38 2 13.87 2 12s1.53-3.38 3.4-3.38c.91 0 1.76.35 2.44 1.03l1.13 1l1.53-1.34L9.22 8.2A5.37 5.37 0 0 0 5.4 6.62C2.42 6.62 0 9.04 0 12s2.42 5.38 5.4 5.38c1.44 0 2.8-.56 3.77-1.53l7.03-6.24c.64-.64 1.49-.99 2.4-.99c1.87 0 3.4 1.51 3.4 3.38s-1.53 3.38-3.4 3.38c-.9 0-1.76-.35-2.44-1.03L15 13.34l-1.5 1.34l1.28 1.12a5.4 5.4 0 0 0 3.82 1.57c2.98 0 5.4-2.41 5.4-5.37c0-3-2.42-5.38-5.4-5.38" />
            </svg>
            <div class="space-y-1.5">
                <div class="text-lg leading-5 font-elms-sans font-semibold">
                    Ömür Boyu Erişim
                </div>
                <div class="font-light">
                    Satın aldığınız tüm eğitim içeriklerine dilediğiniz zaman sınırsız erişim.
                </div>
            </div>
        </div>
    </div>
    <!-- popular education -->
    <div class="max-w-screen-xl xl:mx-auto mx-5 grid grid-cols-3 max-md:grid-cols-1 items-center gap-6 mt-8">
        <div class="space-y-3.5">
            <h1 class="text-3xl max-lg:text-2xl font-semibold font-elms-sans">
                Kariyerinizi bügünden dönüştürün, geleceği yönetin!
            </h1>
            <div class="text-md max-lg:text-s max-lg:leading-5 text-gray-500 font-light">
                Alanında uzman, sektör tecrübeli eğitmenlerle; iş dünyasının en çok talep ettiği mesleki yetkinlikleri hızla edinin ve değişen iş piyasasında kariyerinizi emin adımlarla zirveye taşıyın.
            </div>
        </div>
        <div :class="{'animate-pulse': !popularEducations}" class="md:col-span-2" v-if="popularEducations && Object.keys(popularEducations).length">
            <swiper
                :observer="false"
                :observe-parents="false"
                :modules="[Autoplay,Navigation,Pagination]"
                :autoplay="{delay: 3000}"
                :pagination="{el: '.swiper-pagination', clickable: true, dynamicBullets: true,}"
                :navigation="{nextEl: '.next-popular-button',prevEl: '.prev-popular-button'}"
                :breakpoints="popularEducationBreakpoints"
                class="md:px-[12px_!important] py-[16px_!important]">
                <swiper-slide v-for="data in popularEducations" :key="`popular-${data.id}`">
                    <product-cart :product="data"/>
                </swiper-slide>
                <div class="flex items-center justify-center gap-2 mt-2">
                    <button type="button" aria-label="prev" class="block 3xs:max-md:hidden w-fit px-2 py-1 text-theme-200 [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-50 cursor-pointer prev-popular-button">
                        <svg viewBox="0 0 55 55" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="size-6">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1957 29.9291C17.552 29.2846 17.1904 28.4109 17.1904 27.4999C17.1904 26.589 17.552 25.7153 18.1957 25.0708L31.1574 12.1045C31.4767 11.7854 31.8557 11.5322 32.2729 11.3596C32.69 11.1869 33.1371 11.0981 33.5885 11.0982C34.04 11.0983 34.487 11.1873 34.904 11.3602C35.3211 11.5331 35.7 11.7864 36.0192 12.1057C36.3383 12.425 36.5915 12.804 36.7641 13.2211C36.9368 13.6383 37.0256 14.0853 37.0255 14.5368C37.0254 14.9882 36.9364 15.4353 36.7635 15.8523C36.5906 16.2694 36.3373 16.6483 36.018 16.9674L25.4878 27.4999L36.0203 38.0324C36.3488 38.3494 36.6108 38.7286 36.7912 39.1479C36.9715 39.5672 37.0666 40.0182 37.0708 40.4746C37.0749 40.931 36.9882 41.3837 36.8155 41.8063C36.6429 42.2288 36.3878 42.6127 36.0652 42.9356C35.7426 43.2585 35.3589 43.514 34.9366 43.687C34.5142 43.86 34.0616 43.9472 33.6052 43.9435C33.1487 43.9397 32.6976 43.8451 32.2781 43.6652C31.8587 43.4852 31.4792 43.2235 31.162 42.8954L18.1957 29.9291Z"/>
                        </svg>
                    </button>
                    <div class="swiper-pagination static translate-x-0"></div>
                    <button type="button" aria-label="next" class="block 3xs:max-md:hidden w-fit px-2 py-1 text-theme-200 [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-50 cursor-pointer next-popular-button">
                        <svg viewBox="0 0 60 60" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="size-6">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M40.15 27.35C40.8522 28.0531 41.2467 29.0062 41.2467 30C41.2467 30.9938 40.8522 31.9469 40.15 32.65L26.01 46.795C25.3065 47.4982 24.3525 47.8931 23.3578 47.8928C22.3632 47.8926 21.4094 47.4972 20.7062 46.7938C20.0031 46.0903 19.6082 45.1363 19.6084 44.1416C19.6086 43.147 20.004 42.1932 20.7075 41.49L32.1975 30L20.7075 18.51C20.024 17.8031 19.6456 16.856 19.6537 15.8727C19.6618 14.8895 20.0557 13.9488 20.7506 13.2531C21.4456 12.5575 22.386 12.1627 23.3692 12.1537C24.3524 12.1447 25.2999 12.5222 26.0075 13.205L40.1525 27.3475L40.15 27.35Z"/>
                        </svg>
                    </button>
                </div>
            </swiper>
        </div>
    </div>
    <!-- categories -->
    <div v-if="categories && Object.keys(categories).length" class="max-w-screen-xl xl:mx-auto mx-5 grid grid-cols-3 max-md:grid-cols-1 gap-5 mt-8">
        <template v-for="data in categories">
            <router-link :to="`/${data.url}`" :title="data.name" class="block relative group">
                <figure class="overflow-hidden">
                    <!-- <img :src="`${$store.state.BASEURL}${data.picture}`" :alt="data.name" class="w-full h-auto group-hover:scale-125 duration-300"> -->
                    <img :src="`${$store.state.BASEURL}assets/images/${(data.name).toLocaleLowerCase()}.webp`" :alt="data.name" class="w-full h-auto group-hover:scale-125 duration-300">
                </figure>
                <div class="absolute bottom-3 inset-x-0 text-right bg-transparent">
                    <div class="flex items-stretch justify-end">
                        <div class="border-l-[52px] border-b-[52px] max-lg:border-l-[44px] max-lg:border-b-[44px] border-l-transparent border-b-white"></div>
                        <div class="bg-white w-fit px-5 py-2.5 text-2xl max-lg:text-lg max-lg:leading-6 font-elms-sans font-extrabold">
                            <div class="bg-gradient-to-l from-theme-100 to-theme-300 bg-clip-text text-transparent">
                                {{ data.name }} Eğitimleri
                            </div>
                        </div>
                    </div>
                </div>
            </router-link>
        </template>
    </div>
    <!-- job educations -->
    <div v-if="jobEducations && Object.keys(jobEducations).length" class="bg-theme-200 py-14 max-lg:py-8 mt-8">
        <div class="max-w-screen-xl xl:mx-auto mx-5 space-y-6 max-lg:space-y-4">
            <div class="flex items-center justify-between text-white">
                <h2 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
                    Mesleki Eğitimler
                </h2>
                <div class="flex items-center gap-2">
                    <button type="button" aria-label="prev" class="block 3xs:max-md:hidden w-fit px-2 py-1 [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-50 cursor-pointer prev-job-button">
                        <svg viewBox="0 0 55 55" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="size-6">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1957 29.9291C17.552 29.2846 17.1904 28.4109 17.1904 27.4999C17.1904 26.589 17.552 25.7153 18.1957 25.0708L31.1574 12.1045C31.4767 11.7854 31.8557 11.5322 32.2729 11.3596C32.69 11.1869 33.1371 11.0981 33.5885 11.0982C34.04 11.0983 34.487 11.1873 34.904 11.3602C35.3211 11.5331 35.7 11.7864 36.0192 12.1057C36.3383 12.425 36.5915 12.804 36.7641 13.2211C36.9368 13.6383 37.0256 14.0853 37.0255 14.5368C37.0254 14.9882 36.9364 15.4353 36.7635 15.8523C36.5906 16.2694 36.3373 16.6483 36.018 16.9674L25.4878 27.4999L36.0203 38.0324C36.3488 38.3494 36.6108 38.7286 36.7912 39.1479C36.9715 39.5672 37.0666 40.0182 37.0708 40.4746C37.0749 40.931 36.9882 41.3837 36.8155 41.8063C36.6429 42.2288 36.3878 42.6127 36.0652 42.9356C35.7426 43.2585 35.3589 43.514 34.9366 43.687C34.5142 43.86 34.0616 43.9472 33.6052 43.9435C33.1487 43.9397 32.6976 43.8451 32.2781 43.6652C31.8587 43.4852 31.4792 43.2235 31.162 42.8954L18.1957 29.9291Z"/>
                        </svg>
                    </button>
                    <router-link :to="{name: 'Educations'}" title="Tümü" class="block text-base max-lg:text-sm w-fit">
                        Tümü
                    </router-link>
                    <button type="button" aria-label="next" class="block 3xs:max-md:hidden w-fit px-2 py-1 [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-50 cursor-pointer next-job-button">
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
                :navigation="{nextEl: '.next-job-button',prevEl: '.prev-job-button'}"
                :breakpoints="jobEducationBreakpoints">
                <swiper-slide v-for="data in jobEducations" :key="`job-${data.id}`">
                    <product-cart :product="data"/>
                </swiper-slide>
            </swiper>
        </div>

    </div>
    <!-- two grid -->
    <div v-if="twoGrids && Object.keys(twoGrids).length" class="max-w-screen-xl xl:mx-auto mx-5 grid grid-cols-2 max-lg:grid-cols-1 gap-9 items-center my-16">
        <template v-for="data in twoGrids">
            <div class="">
                <img :src="`${$store.state.BASEURL}assets/images/banner2.webp`" :alt="data.name">
            </div>
            <div class="space-y-2 lg:px-8">
                <h3 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
                    {{ data.name }}
                </h3>
                <div class="text-md max-lg:text-s" v-html="data.detail"></div>
            </div>
        </template>
    </div>
    <!-- new educations -->
    <div v-if="newEducations && Object.keys(newEducations).length" class="bg-theme-200 py-14 max-lg:py-8">
        <div class="max-w-screen-xl xl:mx-auto mx-5 space-y-6 max-lg:space-y-4">
            <div class="flex items-center justify-between text-white">
                <h2 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
                    Yeni Eklenen Eğitimler
                </h2>
                <div class="flex items-center gap-2">
                    <button type="button" aria-label="prev" class="block 3xs:max-md:hidden w-fit px-2 py-1 [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-50 cursor-pointer prev-new-button">
                        <svg viewBox="0 0 55 55" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="size-6">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1957 29.9291C17.552 29.2846 17.1904 28.4109 17.1904 27.4999C17.1904 26.589 17.552 25.7153 18.1957 25.0708L31.1574 12.1045C31.4767 11.7854 31.8557 11.5322 32.2729 11.3596C32.69 11.1869 33.1371 11.0981 33.5885 11.0982C34.04 11.0983 34.487 11.1873 34.904 11.3602C35.3211 11.5331 35.7 11.7864 36.0192 12.1057C36.3383 12.425 36.5915 12.804 36.7641 13.2211C36.9368 13.6383 37.0256 14.0853 37.0255 14.5368C37.0254 14.9882 36.9364 15.4353 36.7635 15.8523C36.5906 16.2694 36.3373 16.6483 36.018 16.9674L25.4878 27.4999L36.0203 38.0324C36.3488 38.3494 36.6108 38.7286 36.7912 39.1479C36.9715 39.5672 37.0666 40.0182 37.0708 40.4746C37.0749 40.931 36.9882 41.3837 36.8155 41.8063C36.6429 42.2288 36.3878 42.6127 36.0652 42.9356C35.7426 43.2585 35.3589 43.514 34.9366 43.687C34.5142 43.86 34.0616 43.9472 33.6052 43.9435C33.1487 43.9397 32.6976 43.8451 32.2781 43.6652C31.8587 43.4852 31.4792 43.2235 31.162 42.8954L18.1957 29.9291Z"/>
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
    <!-- comments -->
    <div v-if="comments && Object.keys(comments).length" class="max-w-screen-xl xl:mx-auto mx-5 space-y-6 max-lg:space-y-4 my-8">
        <h2 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
            Kursiyerlerimizin Yorumları
        </h2>
        <!-- detail -->
        <swiper
            :observer="false"
            :observe-parents="false"
            :modules="[Autoplay,Navigation]"
            :autoplay="{delay: 2500}"
            :autoHeight="false"
            :navigation="{nextEl: '.next-comment-button',prevEl: '.prev-comment-button'}"
            :breakpoints="commentBreakpoints"
            class="commentSwiper">
            <swiper-slide v-for="data in comments" :key="`comment-${data.id}`" class="h-full">
                <div class="bg-white border border-gray-100 rounded-lg h-full flex flex-col justify-between gap-2 px-5 py-3">
                    <div class="grow min-w-0 text-sm max-lg:text-s">
                        Merhaba, <br>
                        {{ data.comment }}
                    </div>
                    <div class="flex-none flex items-center gap-2">
                        <img :src="`${$store.state.BASEURL2}${data.picture}`" width="120" height="120" :alt="data.name" loading="lazy" fetchpriority="low" decoding="async" class="float-right size-16 rounded-full object-cover">
                        <div class="">
                            {{ data.name }}
                        </div>
                    </div>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import {Vue3Marquee} from 'vue3-marquee';
import {Swiper, SwiperSlide} from "swiper/vue";
import {Autoplay, Navigation,Pagination} from "swiper/modules";
import {defineAsyncComponent} from "vue";
import {pushModal} from "jenesius-vue-modal";
import {useHead} from "@unhead/vue";

export default {
    name: "homepage",
    components: {
        Vue3Marquee,
        Swiper,
        SwiperSlide,
        ProductCart: defineAsyncComponent(() => import('../layout/product-cart.vue'))
    },
    setup() {
        return {
            Autoplay, Navigation, Pagination
        }
    },
    data() {
        return {
            popularEducationBreakpoints: {
                320: {
                    slidesPerView: 1.1,
                    spaceBetween: 10,
                },
                375: {
                    slidesPerView: 1.3,
                    spaceBetween: 15,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
            popularEducations: [],
            jobEducationBreakpoints: {
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
            jobEducations: [],
            categories: [],
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
            newEducations: [],
            comments: [],
            commentBreakpoints: {
                320: {
                    slidesPerView: 1.1,
                    spaceBetween: 6,
                },
                375: {
                    slidesPerView: 1.3,
                    spaceBetween: 6,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
            },
            accreditations: [
                {id: 1, name: 'CPD', picture: 'banner9.webp'},
                {id: 2, name: 'EXEMPLAR GLOBAL', picture: 'banner10.webp'},
                {id: 3, name: 'ELQN', picture: 'banner17.webp',},
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
            twoGrids: [],
        }
    },
    computed: {
        ...mapState([
            'BASEURL',
        ]),
    },
    async mounted() {
        useHead({
            title: this.$store.state.seoDetail.seo_title,
            link: [
                {rel: 'canonical', href: window.location.origin}
            ],
            meta: [
                {property: 'og:url', content: window.location.origin,},
                {property: 'og:title', content: this.$store.state.seoDetail.seo_title},
                {
                    property: 'og:description',
                    content: this.$store.state.seoDetail.seo_description,
                },
                {
                    name: 'description',
                    content: this.$store.state.seoDetail.seo_description,
                },
            ],
        });
        await Promise.all([
            this.getPopularEducations(),
            this.getCategories(),
            this.getJobEducations(),
            this.getNewEducations(),
            this.getComments(),
            this.getTwoGrids(),
        ]);
    },
    methods: {
        ...mapActions([
            'get',
        ]),
        async getPopularEducations() {
            const Loading = await pushModal('Loading');
            await this.get({
                url: '/api/popularEducations',
                props: {limit: 10}
            }).then(res => {
                this.popularEducations = res.data;
                Loading.close();
            });
        },
        async getJobEducations() {
            await this.get({
                url: '/api/jobEducations',
                props: {limit: 10},
            }).then(res => {
                this.jobEducations = res.data;
            })
        },
        async getNewEducations() {
            await this.get({
                url: '/api/newEducations',
                props: {limit: 10},
            }).then(res => {
                this.newEducations = res.data;
            })
        },
        async getComments() {
            await this.get({
                url: '/api/getComments',
                props: {
                    limit: 6
                }
            }).then(res => {
                this.comments = res.data;
            })
        },
        async getCategories(){
            await  this.get({
                url: '/api/categories',
            }).then(res => {
                this.categories = res.data;
            });
        },
        async getTwoGrids() {
            await this.get({
                url: '/api/pages',
                props: {yer: 2}
            }).then(res => {
                this.twoGrids = res.data;
            })
        },
    }
}
</script>

<style>
.commentSwiper .swiper-slide {
    height: auto !important;
}
.swiper-pagination-bullet-active {
    background-color: var(--color-theme-200) !important;
}
.swiper-pagination {
    position: static !important;
    transform: translateX(0) !important;
}
</style>
