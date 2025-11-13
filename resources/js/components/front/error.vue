<template>
    <main class="flex-grow min-h-[50vh] flex items-center justify-center p-5">
        <div class="text-center space-y-8 max-w-lg mx-auto">
            <h1 class="text-9xl max-md:text-7xl font-elms-sans font-extrabold text-theme-200">
                404
            </h1>
            <h2 class="text-3xl max-lg:text-2xl font-semibold font-elms-sans text-gray-800">
                Sayfa Bulunamadı
            </h2>
            <p class="text-base max-lg:text-sm text-gray-600 font-light leading-relaxed">
                Aradığınız sayfa mevcut değil veya başka bir adrese taşınmış olabilir. Lütfen menüyü kullanarak aradığınız içeriği bulmaya çalışın.
            </p>
            <router-link :to="{name: 'Home'}" title="Ana Sayfaya Dön" class="inline-block px-8 py-3 text-white bg-theme-100 rounded-full text-sm hover:bg-theme-200 transition-colors duration-300 font-semibold shadow-lg">
                Ana Sayfaya Dön
            </router-link>
        </div>
    </main>

</template>

<script>
import {useHead} from "@unhead/vue";

export default {
    name: "error",
    setup() {
        useHead({
            title: '404 Sayfa Bulunamadı - Lumora Academy',
            meta: [
                {
                    name: 'description',
                    content: 'Aradığınız sayfa bulunamadı.',
                },
            ],
        });
    },
}
</script>

<style scoped>

</style>
