<template>
    <!-- video -->
    <div v-if="isPlaying" class="relative z-40">
        <iframe :src="education.teaser" class="aspect-[16/9] w-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <button type="button" @click="isPlaying = false" class="absolute left-4 top-4 inline-flex items-center justify-center size-12 bg-black/50 rounded-full backdrop-blur-sm transition-all border-2 border-white/20 hover:bg-black/70 hover:border-white/40 duration-300">
            <svg class="size-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M18.3,5.71L18.3,5.71c-0.39-0.39-1.02-0.39-1.41,0L12,10.59L7.11,5.7c-0.39-0.39-1.02-0.39-1.41,0l0,0 c-0.39,0.39-0.39,1.02,0,1.41L10.59,12L5.7,16.89c-0.39,0.39-0.39,1.02,0,1.41l0,0c0.39,0.39,1.02,0.39,1.41,0L12,13.41 l4.89,4.89c0.39,0.39,1.02,0.39,1.41,0l0,0c0.39-0.39,0.39-1.02,0-1.41L13.41,12l4.89-4.89C18.68,6.73,18.68,6.1,18.3,5.71z"/>
            </svg>
        </button>
    </div>
    <!-- image -->
    <div v-else class="relative mask-b-from-10% mask-b-to-90% bg-no-repeat bg-cover bg-center aspect-[16/9]" :style="`background-image: url('${BASEURL}${education.picture}')`">
        <button type="button" @click="isPlaying = true" class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10 block w-fit cursor-pointer">
            <svg viewBox="0 0 143 150" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-24 max-md:w-16 h-auto">
                <path d="M130.568 55.1475C134.17 57.0631 137.183 59.9227 139.284 63.4199C141.385 66.9171 142.495 70.9201 142.495 75C142.495 79.0799 141.385 83.0829 139.284 86.5801C137.183 90.0773 134.17 92.9369 130.568 94.8525L34.4775 147.105C19.005 155.527 0 144.577 0 127.26V22.7475C0 5.42249 19.005 -5.52001 34.4775 2.88749L130.568 55.1475Z" fill="white" fill-opacity="0.68"/>
            </svg>
        </button>
    </div>
    <!-- name and teacher -->
    <div class="mt-1 mt-5 mb-14 3xs:max-lg:mb-11 space-y-4">
        <h1 class="max-w-screen-sm sm:mx-auto mx-4 text-transparent bg-clip-text bg-gradient-to-r from-white to-red-301 to-80% text-6xl 3xs:max-lg:text-3xl leading-[1.2] font-bold text-center">
            {{ education.name }}
        </h1>
        <!-- teacher -->
        <div v-if="education.instructor_names && Object.keys(education.instructor_names).length" class="bg-gradient-to-l from-gray-709 from-15% via-red-301 via-50% to-gray-709 to-80% py-2">
            <div class="bg-gray-709 py-3 text-center space-y-2">
                <div class="text-xl 3xs:max-lg:text-base leading-[1.2] text-red-301 font-bold">Eğitmenler</div>
                <div class="text-4xl 3xs:max-lg:text-xl text-white font-semibold">
            <span v-for="(data,index) in education.instructor_names">
              {{ data }}<br v-if="index%2 === 0 && index > 0">
              <span v-else-if="Object.keys(education.instructor_names).length - 1 > index"> - </span>
            </span>
                </div>
            </div>
        </div>
    </div>
    <!-- icons -->
    <div v-if="education.details && Object.keys(education.details).length" class="max-w-screen-xl xl:mx-auto mx-4 grid grid-cols-6 3xs:max-md:grid-cols-2 gap-4 text-base leading-5 3xs:max-lg:text-sm mb-14 3xs:mb-7">
        <div v-for="data in education.details" class="space-y-3 text-center">
            <i :class="data.icon" class="text-3xl text-center"></i>
            <div>{{ data.name }}</div>
        </div>
    </div>
    <!-- button -->
    <div class="bg-gradient-to-l from-black from-gray-701 w-fit mx-auto rounded-lg p-px mb-16 3xs:max-lg:mb-12">
        <button type="button" @click="callModal" aria-label="Hemen Başvur" class="block w-fit rounded-lg bg-gradient-to-r from-red-301 to-black text-white text-sm leading-5 font-semibold px-8 py-2.5 cursor-pointer">
            Hemen Başvur
        </button>
    </div>
    <!-- detail -->
    <div v-if="education.detail_contents && Object.keys(education.detail_contents).length" class="max-w-screen-xl xl:mx-auto grid grid-cols-2 3xs:max-lg:grid-cols-1 gap-6 mb-14 3xs:mb-7">
        <div v-for="data in education.detail_contents" class="bg-gradient-to-b from-black via-red-800/60 to-black rounded-lg border border-white p-4 sm:p-6 lg:p-8" v-html="data.content"></div>
    </div>
    <!-- teacher -->
    <div class="max-w-screen-xl xl:mx-auto flex max-lg:flex-col gap-6 mb-14 3xs:mb-7">
        <div class="grow min-w-0 space-y-4 h-fit">
            <div v-if="education.instructors && Object.keys(education.instructors).length" class=" lg:border-x-4 border-white">
                <div v-for="data in education.instructors" class="overflow-auto bg-gradient-to-b from-black via-red-800/60 to-black rounded-lg space-y-6 p-4 sm:p-6 lg:p-8">
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
            <div v-if="education.detail_list && Object.keys(education.detail_list).length" class="space-y-3 mx-4">
                <div class="">
                    <div class="max-w-sm mx-auto w-full py-6 rounded-lg text-xl leading-5 3xs:max-lg:text-base font-bold">
                        {{ education.name }} Hakkında
                    </div>
                    <div v-for="data in education.detail_list" :key="`accordion-${data.id}`" class="mb-3">
                        <button type="button" @click="accordionButton(data.id)" aria-label="button" :class="{'active': accordion === data.id}" class="w-full border border-gray-300 rounded text-md font-medium font-elms-sans text-left flex items-center justify-between gap-1 px-4 py-2 group [&.active]:rounded-b-none">
                            <span>{{ data.name }}</span>
                            <svg width="33" height="21" viewBox="0 0 33 21" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="size-5 group-[.active]:rotate-180 duration-150">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M18.9289 19.8043C18.2843 20.448 17.4106 20.8096 16.4997 20.8096C15.5888 20.8096 14.7151 20.448 14.0705 19.8043L1.10428 6.8426C0.785126 6.52329 0.53199 6.14425 0.359325 5.72712C0.186657 5.30999 0.0978394 4.86293 0.0979462 4.41147C0.098053 3.96002 0.18708 3.513 0.359947 3.09595C0.53281 2.6789 0.786121 2.29998 1.10542 1.98083C1.42473 1.66167 1.80377 1.40854 2.2209 1.23587C2.63803 1.0632 3.08509 0.974384 3.53655 0.974491C3.98801 0.974598 4.43502 1.06363 4.85207 1.23649C5.26912 1.40935 5.64804 1.66267 5.9672 1.98197L16.4997 12.5122L27.0322 1.97968C27.3491 1.65122 27.7283 1.38916 28.1476 1.20881C28.5669 1.02846 29.018 0.933428 29.4744 0.929247C29.9308 0.925068 30.3835 1.01183 30.806 1.18447C31.2286 1.35711 31.6125 1.61217 31.9354 1.93478C32.2583 2.25738 32.5137 2.64106 32.6868 3.06343C32.8598 3.48581 32.947 3.93841 32.9432 4.39484C32.9395 4.85127 32.8449 5.30238 32.6649 5.72185C32.485 6.14133 32.2233 6.52076 31.8951 6.83801L18.9289 19.8043Z"/>
                            </svg>
                        </button>
                        <div :class="{'active': accordion === data.id}" class="border border-t-0 border-gray-300 rounded-lg rounded-t-none px-4 h-0 opacity-0 overflow-hidden invisible scrollbar max-h-[300px] text-sm [&.active]:py-3 [&.active]:h-full [&.active]:overflow-y-auto [&.active]:opacity-100 [&.active]:visible duration-300" v-html="data.detail"></div>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex-none w-[410px] lg:max-xl:w-80 3xs:max-lg:w-full space-y-4 h-fit">
            <call-form :education="education.id"/>
            <!-- certificate -->
            <div class="flex-none w-72 3xs:max-md:mx-auto space-y-2.5">
                <div class="block w-full rounded-lg bg-gradient-to-r from-red-301 to-black text-white text-sm leading-5 font-semibold px-6 py-2.5">
                    Sertifikalarımız
                </div>
                <div class="relative">
                    <img :src="`${BASEURL}assets/images/certificate1.webp`" width="288" height="204" alt="sertifika" class="w-full h-auto rounded-2xl">
                    <div class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">
                        <img :src="`${BASEURL}assets/images/check_icon.webp`" width="101" height="99" alt="check" class="w-[101px] h-auto">
                    </div>
                </div>
                <div class="relative">
                    <img :src="`${BASEURL}assets/images/certificate2.webp`" width="288" height="204" alt="sertifika" class="w-full h-auto rounded-2xl">
                    <div class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">
                        <img :src="`${BASEURL}assets/images/check_icon.webp`" width="101" height="99" alt="check" class="w-[101px] h-auto">
                    </div>
                </div>
                <div class="relative">
                    <img :src="`${BASEURL}assets/images/certificate3.webp`" width="288" height="204" alt="sertifika" class="w-full h-auto rounded-2xl">
                    <div class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2">
                        <img :src="`${BASEURL}assets/images/check_icon.webp`" width="101" height="99" alt="check" class="w-[101px] h-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "detail2"
}
</script>

<style scoped>

</style>
