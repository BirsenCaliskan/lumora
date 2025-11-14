<template>
    <div class="bg-theme-200 text-white pt-8">
        <div class="max-w-screen-xl xl:mx-auto md:mx-5 grid lg:grid-cols-4 md:grid-cols-2 max-md:grid-cols-1 md:gap-5 pb-14 max-h-fit max-md:divide-y divide-white max-md:*:py-4 max-md:*:px-5">
            <!-- social -->
            <div class="space-y-9">
                <div class="space-y-4">
                    <div class="text-2xl leading-5 font-bold">Bizimle İletişime Geçin!</div>
                    <div class="space-y-2">
                        <a v-if="settings.phone" :href="`tel:${settings.phone}`" :title="settings.phone" class="flex items-center gap-2.5 hover:text-theme-100 duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" class="flex-none size-4">
                                <path fill="none" stroke="currentColor" d="M4.72.5H2.5a2 2 0 0 0-2 2v2c0 5.523 4.477 10 10 10h2a2 2 0 0 0 2-2v-1.382a1 1 0 0 0-.553-.894l-2.416-1.208a1 1 0 0 0-1.396.578l-.297.893a1.21 1.21 0 0 1-1.385.804A6.05 6.05 0 0 1 3.71 6.547a1.21 1.21 0 0 1 .804-1.385l1.108-.37a1 1 0 0 0 .654-1.19L5.69 1.257A1 1 0 0 0 4.72.5Z" stroke-width="1"/>
                            </svg>
                            <div>{{ settings.phone }}</div>
                        </a>
                        <a v-if="settings.email" :href="`mailto:${settings.email}`" :title="settings.email" class="flex items-center gap-2.5 hover:text-theme-100 duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="flex-none size-4">
                                <path fill="none" stroke="currentColor" d="m.5 6.5l11.375 7h.25l11.375-7m0-2.5v16.5H23c-3-.5-8-.75-11-.75S4 20 1 20.5H.5V4c3-.5 8.5-.75 11.5-.75s8.5.25 11.5.75Z" stroke-width="1"/>
                            </svg>
                            <div>{{ settings.email }}</div>
                        </a>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="text-2xl leading-5 font-bold">Bizi Takip Edin!</div>
                    <div class="flex items-center gap-2.5 *:hover:text-theme-100 duration-200">
                        <a v-if="settings.facebook" :href="settings.facebook" target="_blank" title="facebook" class="flex-none block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="flex-none size-5">
                                <path fill="currentColor" d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131c.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg>
                        </a>
                        <a v-if="settings.instagram" :href="settings.instagram" target="_blank" title="instagram" class="flex-none block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" class="flex-none size-5">
                                <path fill="currentColor"
                                      d="M8 0C5.829 0 5.556.01 4.703.048C3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7C.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297c.04.852.174 1.433.372 1.942c.205.526.478.972.923 1.417c.444.445.89.719 1.416.923c.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417c.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046c.78.035 1.204.166 1.486.275c.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485c.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598c-.28.11-.704.24-1.485.276c-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598a2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485c-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486c.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276c.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92a.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217a4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334a2.667 2.667 0 0 1 0-5.334"/>
                            </svg>
                        </a>
                        <a v-if="settings.linkedin" :href="settings.linkedin" target="_blank" title="linkedin" class="flex-none block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1046.17" height="1000" viewBox="0 0 1046.16 1000" class="flex-none size-5">
                                <path fill="currentColor" d="M237.485 1000V325.301H13.229V1000zM125.386 233.127c78.202 0 126.879-51.809 126.879-116.553C250.808 50.37 203.591-.001 126.87-.001C50.161-.001-.002 50.371-.002 116.574c0 64.747 48.665 116.553 123.924 116.553h1.457zM361.61 1000h224.256V623.215c0-20.165 1.457-40.309 7.379-54.724c16.212-40.289 53.111-82.017 115.06-82.017c81.149 0 113.613 61.872 113.613 152.572v360.949h224.242V613.129c0-207.241-110.636-303.668-258.183-303.668c-120.977 0-174.094 67.622-203.603 113.679h1.497v-97.853H361.615c2.943 63.31 0 674.699 0 674.699z"/>
                            </svg>
                        </a>
                        <a v-if="settings.tiktok" :href="settings.tiktok" target="_blank" title="tiktok" class="flex-none block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="flex-none size-5">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 6v5q-4 0-6-2v7a7 7 0 1 1-5-6.7m0 6.7a2 2 0 1 0-2 2a2 2 0 0 0 2-2V1h5q2 5 6 5"/>
                            </svg>
                        </a>
                        <a v-if="settings.youtube" :href="settings.youtube" target="_blank" title="youtube" class="flex-none block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="flex-none size-5">
                                <path fill="currentColor" d="m11.7 3.6l.365-.002l.653.004c.872.006 2.46.026 4.06.086l.257.01c1.8.071 3.57.195 4.36.409c.509.138.972.406 1.35.778c.373.372.641.836.779 1.34c.793 3.19.61 8.23.015 11.5c-.138.508-.406.972-.779 1.34s-.836.64-1.35.778c-1.75.477-8.48.506-9.28.508l-.807-.004c-.817-.006-2.22-.024-3.68-.074l-.465-.017l-.444-.018c-1.69-.073-3.3-.195-4.04-.396a3.02 3.02 0 0 1-2.129-2.118c-.797-3.18-.579-8.22-.015-11.5a3.02 3.02 0 0 1 2.129-2.119c1.63-.444 7.56-.51 9.03-.522zM9.04 8v8l7-4z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- wo are we -->
            <div class="md:space-y-4">
                <div @click="accordionButton('about')" :class="{'active': accordion === 'about'}" class="flex items-center justify-between text-2xl leading-5 font-bold group max-md:cursor-pointer">
                    <div>Biz Kimiz?</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="448" height="512" viewBox="0 0 448 512" class="md:hidden size-5 rotate-180 group-[.active]:rotate-0 duration-300">
                        <path fill="currentColor" d="M201.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 173.3L54.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/>
                    </svg>
                </div>
                <ul :class="{'active': accordion === 'about'}" class="text-sm leading-5 transition-all ease-in-out overflow-hidden max-md:h-0 [&.active]:mt-4 [&.active]:h-full duration-300">
                    <li v-for="data in $store.state.staticPages">
                        <router-link :to="{name: data.url}" :title="data.name" class="block w-full py-1.5 group relative hover:text-theme-100 duration-100">
                            <span>{{ data.name }}</span>
                            <span class="absolute left-0 bottom-0 bg-theme-100 block w-0 h-0.5 group-hover:w-full duration-200"></span>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{name: 'Contact'}" title="İletişim" class="block w-full py-1.5 group relative hover:text-theme-100 duration-100">
                            <span>İletişim</span>
                            <span class="absolute left-0 bottom-0 bg-theme-100 block w-0 h-0.5 group-hover:w-full duration-200"></span>
                        </router-link>
                    </li>
                </ul>
            </div>
            <!-- agreements -->
            <div class="md:space-y-4">
                <div @click="accordionButton('agreement')" :class="{'active': accordion === 'agreement'}" class="flex items-center justify-between text-2xl leading-5 font-bold group max-md:cursor-pointer">
                    <div>Politikalarımız</div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="448" height="512" viewBox="0 0 448 512" class="md:hidden size-5 rotate-180 group-[.active]:rotate-0 duration-300">
                        <path fill="currentColor" d="M201.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L224 173.3L54.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/>
                    </svg>
                </div>
                <ul v-if="Object.keys(agreements).length > 0" :class="{'active': accordion === 'agreement'}" class="text-sm leading-5 transition-all ease-in-out overflow-hidden max-md:h-0 [&.active]:mt-4 [&.active]:h-full duration-300">
                    <li v-for="data in agreements" :key="`agreement-${data.id}`">
                        <router-link :to="`/${data.url}`" :title="data.name" class="block w-full py-1.5 group relative hover:text-theme-100 duration-100">
                            <span>{{ data.name }}</span>
                            <span class="absolute left-0 bottom-0 bg-theme-100 block w-0 h-0.5 group-hover:w-full duration-200"></span>
                        </router-link>
                    </li>
                </ul>
            </div>
            <!-- app -->
            <div class="space-y-4">
                <div class="space-y-3">
                    <div class="flex items-center justify-center gap-5">
                        <a href="https://apps.apple.com/tr/app/lumora academy/id6478239767" target="_blank" title="App Store" class="block w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="size-10 3xs:max-lg:size-8">
                                <defs>
                                    <linearGradient id="logosAppleAppStore0" x1="50%" x2="50%" y1="0%" y2="100%">
                                        <stop offset="0%" stop-color="#17c9fb"/>
                                        <stop offset="100%" stop-color="#1a74e8"/>
                                    </linearGradient>
                                </defs>
                                <path fill="url(#logosAppleAppStore0)" d="M56.064 0h143.872C230.9 0 256 25.1 256 56.064v143.872C256 230.9 230.9 256 199.936 256H56.064C25.1 256 0 230.9 0 199.936V56.064C0 25.1 25.1 0 56.064 0"/>
                                <path fill="#fff" d="m82.042 185.81l.024.008l-8.753 15.16c-3.195 5.534-10.271 7.43-15.805 4.235s-7.43-10.271-4.235-15.805l6.448-11.168l.619-1.072c1.105-1.588 3.832-4.33 9.287-3.814c0 0 12.837 1.393 13.766 8.065c0 0 .126 2.195-1.351 4.391m124.143-38.72h-27.294c-1.859-.125-2.67-.789-2.99-1.175l-.02-.035l-29.217-50.606l-.038.025l-1.752-2.512c-2.872-4.392-7.432 6.84-7.432 6.84c-5.445 12.516.773 26.745 2.94 31.046l40.582 70.29c3.194 5.533 10.27 7.43 15.805 4.234c5.533-3.195 7.43-10.271 4.234-15.805l-10.147-17.576c-.197-.426-.539-1.582 1.542-1.587h13.787c6.39 0 11.57-5.18 11.57-11.57s-5.18-11.57-11.57-11.57m-53.014 15.728s1.457 7.411-4.18 7.411H48.092c-6.39 0-11.57-5.18-11.57-11.57s5.18-11.57 11.57-11.57h25.94c4.188-.242 5.18-2.66 5.18-2.66l.024.012l33.86-58.648l-.01-.002c.617-1.133.103-2.204.014-2.373l-11.183-19.369c-3.195-5.533-1.299-12.61 4.235-15.804s12.61-1.3 15.805 4.234l5.186 8.983l5.177-8.967c3.195-5.533 10.271-7.43 15.805-4.234s7.43 10.27 4.235 15.804l-47.118 81.61c-.206.497-.269 1.277 1.264 1.414h28.164l.006.275s16.278.253 18.495 15.454"/>
                            </svg>
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.lumora academyturkiye.app&pli=1" target="_blank" title="Play Store" class="block w-fit">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 283" class="size-10 3xs:max-lg:size-8">
                                <path fill="#ea4335" d="M119.553 134.916L1.06 259.061a32.14 32.14 0 0 0 47.062 19.071l133.327-75.934z"/>
                                <path fill="#fbbc04" d="M239.37 113.814L181.715 80.79l-64.898 56.95l65.162 64.28l57.216-32.67a31.345 31.345 0 0 0 0-55.537z"/>
                                <path fill="#4285f4" d="M1.06 23.487A30.6 30.6 0 0 0 0 31.61v219.327a32.3 32.3 0 0 0 1.06 8.124l122.555-120.966z"/>
                                <path fill="#34a853" d="m120.436 141.274l61.278-60.483L48.564 4.503A32.85 32.85 0 0 0 32.051 0C17.644-.028 4.978 9.534 1.06 23.399z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-white py-6">
            <div class="max-w-screen-xl xl:mx-auto mx-5 flex items-center justify-between gap-5 max-md:flex-col text-sm leading-5 text-center">
                <div class=""><span class="font-bold">Lumora Academy</span> Telif Hakkı © {{ new Date().getFullYear() }} Tüm Hakları Saklıdır</div>
                <figure class="max-w-[300px]">
                    <img :src="`${$store.state.BASEURL}assets/images/bank.webp`" width="300" height="21" alt="bank" loading="lazy" class="w-full h-5">
                </figure>
            </div>
        </div>
    </div>

</template>

<script>
import {mapActions, mapState} from "vuex";

export default {
    name: "footer-component",
    data() {
        return {
            agreements: [],
            accordion: null
        }
    },
    async mounted() {
        await this.getAgreements();
    },
    computed: {
        ...mapState([
            'settings'
        ]),
    },
    methods: {
        ...mapActions([
            'get'
        ]),
        async getAgreements() {
            await this.get({
                url: '/api/pages',
                props: {yer: 0}
            }).then(res => {
                this.agreements = res.data;
            })
        },
        accordionButton(data) {
            this.accordion = this.accordion === data ? null : data;
        }
    },
}
</script>

<style scoped>

</style>
