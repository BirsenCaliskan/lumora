<template>
    <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-10 my-12">
        <div class="text-center space-y-2">
            <h1 class="text-4xl max-lg:text-2xl font-elms-sans font-bold text-theme-200">
                Bizimle İletişime Geçin
            </h1>
            <p class="text-gray-600">
                Tüm sorularınız ve önerileriniz için aşağıdaki formu kullanabilir veya iletişim bilgilerimizden bize ulaşabilirsiniz.
            </p>
        </div>
        <div class="grid lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-lg border border-gray-200 space-y-6 h-fit sticky lg:top-20">
                <h2 class="text-2xl font-semibold text-theme-200 border-b pb-3 mb-4">
                    Kurumsal İletişim
                </h2>

                <a v-if="settings.phone" :href="`tel:${settings.phone}`" :title="settings.phone" class="flex items-start gap-4 hover:text-theme-100 duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" class="flex-none size-6 text-theme-100 mt-1">
                        <path fill="none" stroke="currentColor" d="M4.72.5H2.5a2 2 0 0 0-2 2v2c0 5.523 4.477 10 10 10h2a2 2 0 0 0 2-2v-1.382a1 1 0 0 0-.553-.894l-2.416-1.208a1 1 0 0 0-1.396.578l-.297.893a1.21 1.21 0 0 1-1.385.804A6.05 6.05 0 0 1 3.71 6.547a1.21 1.21 0 0 1 .804-1.385l1.108-.37a1 1 0 0 0 .654-1.19L5.69 1.257A1 1 0 0 0 4.72.5Z" stroke-width="1"/>
                    </svg>
                    <div class="text-lg font-medium">{{ settings.phone }}</div>
                </a>

                <a v-if="settings.email" :href="`mailto:${settings.email}`" :title="settings.email" class="flex items-start gap-4 hover:text-theme-100 duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="flex-none size-6 text-theme-100 mt-1">
                        <path fill="none" stroke="currentColor" d="m.5 6.5l11.375 7h.25l11.375-7m0-2.5v16.5H23c-3-.5-8-.75-11-.75S4 20 1 20.5H.5V4c3-.5 8.5-.75 11.5-.75s8.5.25 11.5.75Z" stroke-width="1"/>
                    </svg>
                    <div class="text-lg font-medium">{{ settings.email }}</div>
                </a>

                <div class="flex items-start gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="flex-none size-6 text-theme-100 mt-1">
                        <path fill="currentColor" d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5s-1.12 2.5-2.5 2.5z"/>
                    </svg>
                    <div class="text-lg font-medium">{{ settings.address }}</div>
                </div>
            </div>
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                <h2 class="text-2xl font-semibold text-theme-200 border-b pb-3 mb-4">
                    Bize Yazın
                </h2>
                <form @submit.prevent="Save" class="grid grid-cols-2 3xs:max-md:grid-cols-1 gap-5 text-theme-200">
                    <div class="space-y-2">
                        <label for="fullName" class="block text-sm leading-5">
                            Adınız Soyadınız
                        </label>
                        <input type="text" id="fullName" name="name" v-model="contact.name" required class="block bg-gray-50 border border-gray-300 rounded w-full text-theme-200 text-sm px-5 py-3 focus-visible:border-theme-100 focus-visible:outline-none focus:shadow-md focus:shadow-theme-100/30" aria-label="input">
                    </div>
                    <div class="space-y-2">
                        <label for="email" class="block text-sm leading-5">
                            Email Adresiniz
                        </label>
                        <input type="email" id="email" name="email" v-model="contact.email" required class="block bg-gray-50 border border-gray-300 rounded w-full text-theme-200 text-sm px-5 py-3 focus-visible:border-theme-100 focus-visible:outline-none focus:shadow-md focus:shadow-theme-100/30" aria-label="input">
                    </div>
                    <div class="space-y-2">
                        <label for="phone" class="block text-sm leading-5">
                            Telefon Numaranız
                        </label>
                        <input type="tel" name="phone" v-maska="options" v-model="phone" @maska="contact.phone = $event.detail.unmasked" required placeholder="(999)-999-99-99" class="block bg-gray-50 border border-gray-300 rounded w-full text-theme-200 text-sm px-5 py-3 focus-visible:border-theme-100 focus-visible:outline-none focus:shadow-md focus:shadow-theme-100/30" aria-label="input">
                    </div>
                    <div class="space-y-2">
                        <label for="subject" class="block text-sm leading-5">
                            Konu
                        </label>
                        <input type="text" id="subject" name="subject" v-model="contact.subject" required class="block bg-gray-50 border border-gray-300 rounded w-full text-theme-200 text-sm px-5 py-3 focus-visible:border-theme-100 focus-visible:outline-none focus:shadow-md focus:shadow-theme-100/30" aria-label="input">
                    </div>
                    <div class="md:col-span-2 space-y-2">
                        <label for="message" class="block text-sm leading-5">
                            Mesajınız
                        </label>
                        <textarea rows="6" id="message" name="message" v-model="contact.message" required class="block bg-gray-50 border border-gray-300 rounded w-full text-theme-200 text-sm px-5 py-3 focus-visible:border-theme-100 focus-visible:outline-none focus:shadow-md focus:shadow-theme-100/30"></textarea>
                    </div>
                    <div class="md:col-span-2 w-fit mx-auto mt-5">
                        <button type="submit" aria-label="Gönder" class="block w-fit rounded-lg bg-theme-100 border border-theme-100 text-white text-md leading-5 font-semibold px-8 py-3 cursor-pointer hover:bg-theme-200 hover:border-theme-200 transition-colors duration-300">
                            MESAJI GÖNDER
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapState} from "vuex";
import {useHead} from "@unhead/vue";
import {vMaska} from "maska/vue";

export default {
    name: "Contact",
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
            'settings',
        ]),
    },
    mounted() {
        // SEO Bilgileri (Örnek olarak eklendi)
        useHead({
            title: 'İletişim | Lumora Academy',
            link: [
                {rel: 'canonical', href: this.$store.state.BASEURL + '/iletisim'}
            ],
            meta: [
                {property: 'og:url', content: this.$store.state.BASEURL + '/iletisim'},
                {property: 'og:title', content: 'İletişim | Lumora Academy'},
                {
                    name: 'description',
                    content: 'Lumora Academy ile hemen iletişime geçin. Telefon, e-posta veya iletişim formu aracılığıyla bize ulaşabilirsiniz.',
                },
                {
                    property: 'og:description',
                    content: 'Lumora Academy ile hemen iletişime geçin. Telefon, e-posta veya iletişim formu aracılığıyla bize ulaşabilirsiniz.',
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
