<template>
    <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-10 my-10">
        <div class="space-y-7">
            <h1 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
                Hakkımmızda
            </h1>
            <div class="flex items-center justify-between 3xs:max-md:flex-col 2xl:gap-24 gap-12 3xs:max-md:gap-6 bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                <div class="flex-none 2xl:w-[393px] md:w-[290px] w-full">
                    <img :src="`${$store.state.BASEURL}assets/images/about2.webp`" width="393" height="546" alt="Dr. Bülent Öz" loading="lazy" class="w-full h-auto border border-theme-200 rounded-lg shadow-md">
                </div>
                <div class="grow min-w-0 space-y-6 text-gray-600">
                    <div class="space-y-3 text-base max-md:text-sm">
                        <p>
                            Eğitim, hayat boyu süren bir maceradır. Bilgiyle donatılan zihinler, karanlıkları aydınlatır ve her zorluğun üstesinden gelir. Öğrenmek, sadece bireyi değil, tüm toplumu ileriye taşır ve daha güzel bir geleceğin kapılarını aralar.
                        </p>
                        <p class="text-xl font-bold italic pt-4">
                            "Zihinleri güçlendiriyoruz, Geleceği Şekillendiriyoruz.."
                        </p>
                        <div class="text-red-400 font-semibold">Dr. Bülent ÖZ</div>
                        <div class="text-red-400 font-medium">Lumora Academy Türkiye Genel Müdür</div>
                    </div>

                    <div class="pt-4 space-y-3 border-t border-gray-200">
                        <p>
                            More Payroll Teknolojik İnsan Kaynakları Yönetimi (Lumora Academy Türkiye) firmamız, güçlü insan kaynağı ve yenilikçi teknolojik altyapısıyla 5 şubede 76 kişilik ekibiyle dijital dünyanın makine öğrenimi dahil olmak üzere tüm ürünleri ile işletmelerimize ve insan kaynağı departmanlarına; Google Play Store, App Store ve AppGallery dahil tüm uygulama mağazaları aracılığı ile mobilde ve web'de dijital ürünler üretmektedir.
                        </p>
                        <p>
                            **18 yıllık deneyim ve tecrübe ile..** Kişisel gelişim eğitimleri, Sertifikalı meslek eğitimleri ve Kurumsal eğitimler olmak üzere sektörün öncü firmaları arasında yer almaktadır.
                        </p>
                        <p>
                            Bilgi ve teknoloji çağında geleceğe yön verme anlayışıyla hazırlanan eğitimlerle kendilerini geliştirmek isteyen ve aynı zamanda geleceklerini şekillendirmek isteyen bireyler için sertifikalı eğitimler düzenlemektedir.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-7">
            <h2 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
                Değerlerimiz
            </h2>
            <div class="grid grid-cols-2 3xs:max-md:grid-cols-1 gap-12 bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                <a href="https://www.morepayroll.com/" target="_blank" title="More Payroll" class="block w-full">
                    <img :src="`${$store.state.BASEURL}assets/images/more-logo.webp`" width="434" height="110" alt="More Payroll" loading="lazy" class="w-auto max-h-[110px] mx-auto">
                </a>
                <a href="https://www.morepayroll.com/" target="_blank" title="Lumora Academy" class="block w-full">
                    <img :src="`${$store.state.BASEURL}assets/images/ken-logo.webp`" width="529" height="90" alt="Lumora Academy" loading="lazy" class="w-auto max-h-[90px] mx-auto">
                </a>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 space-y-6 text-theme-200 text-base leading-7">
                <h3 class="text-xl font-semibold text-red-301">Temel İlkelerimiz:</h3>
                <ul class="list-disc list-inside space-y-3 pl-4">
                    <li class="pl-2">
                        **Yenilik:** Sürekli olarak yeni teknolojik gelişmeleri takip ediyor ve eğitimde yenilikçi çözümler sunmak için bu teknolojileri kullanıyoruz.
                    </li>
                    <li class="pl-2">
                        **Kalite:** Yüksek kaliteli eğitim materyalleri ve deneyimleri sunarak öğrencilerin başarısını destekliyor ve öğretmenlerin etkili bir şekilde öğretim yapmasını sağlıyoruz.
                    </li>
                    <li class="pl-2">
                        **Erişilebilirlik:** Herkesin eğitime eşit erişim hakkına sahip olduğuna inanıyoruz. Bu nedenle, çeşitli coğrafi ve sosyal engelleri aşmak için çözümler geliştiriyoruz.
                    </li>
                    <li class="pl-2">
                        **İşbirliği:** Öğrenciler, öğretmenler ve veliler arasında güçlü bir işbirliği ortamı oluşturarak, eğitim sürecini destekliyoruz.
                    </li>
                    <li class="pl-2">
                        **Öğrenci Odaklılık:** Öğrencilerin ihtiyaçlarına odaklanıyor ve onların bireysel öğrenme hedeflerini destekleyen çözümler sunuyoruz.
                    </li>
                </ul>
                <p class="pt-4 border-t border-gray-100">
                    Uzaktan eğitim sistemiyle ilgili olarak vizyonumuz, misyonumuz ve değerlerimiz doğrultusunda öğrencilerin öğrenme deneyimini geliştirmek ve eğitime erişimi kolaylaştırmak için çalışmaya devam ediyoruz.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 3xs:max-lg:grid-cols-1 gap-6 text-theme-200 text-base leading-7">

            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 space-y-4">
                <h2 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
                    Vizyonumuz
                </h2>
                <p>
                    18 yıldır eğitim sektöründe faaliyet gösteren teknoloji şirketi olarak, vizyonumuz, eğitimde dönüşümü ve erişilebilirliği sağlayan yenilikçi uzaktan eğitim çözümleri sunmaktır. Öğrencilerin ve öğretmenlerin potansiyellerini tam anlamıyla ortaya çıkaran, sınırları kaldıran ve dünya çapında fark yaratan bir eğitim deneyimi sunmak için çalışıyoruz.
                </p>
                <ul class="list-disc list-inside space-y-2 pl-4 pt-2">
                    <li class="pl-2">Bireylerin kendilerine yeni değerler kazandırmalarını sağlamak,</li>
                    <li class="pl-2">Eğitim ve yönetim süreçlerimizi bilimsel ilkeler çerçevesinde geliştirmek,</li>
                    <li class="pl-2">Eğitimlerimizle sektöre yön veren kuruluş olmak,</li>
                    <li class="pl-2">Kamuoyu ile açık, doğru ve karşılaştırılabilir bilgi paylaşımında bulunmak,</li>
                    <li class="pl-2">Bireyleri daha üretken ve başarılı kılmak.</li>
                </ul>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 space-y-4">
                <h2 class="text-2xl max-lg:text-lg font-elms-sans font-bold">
                    Misyonumuz
                </h2>
                <p>
                    Misyonumuz, öğrenme deneyimini zenginleştiren ve herkesin eğitime erişimini kolaylaştıran güvenilir ve etkili bir uzaktan eğitim sistemi sunmaktır. Teknolojiyi eğitimle birleştirerek, öğrencilerin coğrafi, sosyal veya ekonomik engellere takılmadan öğrenmelerini sağlamak için yenilikçi çözümler geliştiriyoruz. Öğretmenlerin, öğrencilerin bireysel ihtiyaçlarına uygun öğretim materyalleri ve interaktif araçlarla desteklenen öğretim yapabilmesini hedefliyoruz.
                </p>
                <ul class="list-disc list-inside space-y-2 pl-4 pt-2">
                    <li class="pl-2">Değişimleri doğru algılamak,</li>
                    <li class="pl-2">Algılamarı hızlı analiz etmek,</li>
                    <li class="pl-2">Analizleri pedagojik birikimlerle sentezlemek,</li>
                    <li class="pl-2">Sentezleri ivedi bir şekilde paylaşmak,</li>
                    <li class="pl-2">Paylaşım sonuçlarını etkin olarak izlemek.</li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import {useHead} from "@unhead/vue";

export default {
    name: "about",
    mounted() {
        useHead({
            // Marka Adı Güncellendi
            title: 'Hakkımızda | Lumora Academy – Eğitimde Güven ve Başarı',
            link: [
                {rel: 'canonical', href: window.location.origin+'/hakkimizda'}
            ],
            meta: [
                {property: 'og:url', content: window.location.origin+'/hakkimizda'},
                // Marka Adı Güncellendi
                {property: 'og:title', content: 'Hakkımızda | Lumora Academy – Eğitimde Güven ve Başarı'},
                {
                    property: 'og:description',
                    content: 'Lumora Academy olarak, nitelikli eğitim çözümleri ve uzman kadromuzla binlerce öğrencinin kariyer yolculuğuna rehberlik ediyoruz. Bizi yakından tanıyın.',
                },
                {
                    name: 'description',
                    content: 'Lumora Academy olarak, nitelikli eğitim çözümleri ve uzman kadromuzla binlerce öğrencinin kariyer yolculuğuna rehberlik ediyoruz. Bizi yakından tanıyın.',
                },
            ],
        });
    }
}
</script>

<style scoped>

</style>
