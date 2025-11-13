<template>
  <!-- founder -->
  <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mt-7 mb-14 3xs:max-lg:mb-7 3xs:max-lg:mt-3">
    <!-- title -->
    <h1 class="text-2xl 3xs:max-lg:text-lg w-fit font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 md:after:-mr-7">
     Hakkımızda
    </h1>
    <!-- detail -->
    <div class="flex items-center justify-between 3xs:max-md:flex-col 2xl:gap-24 gap-12 3xs:max-md:gap-3">
      <div class="flex-none 2xl:w-[393px] md:w-[290px] w-full">
        <img :src="`${$store.state.BASEURL}assets/images/about2.webp`" width="393" height="546" alt="Dr. Bülent Öz" loading="lazy" class="w-full h-auto rounded-3xl border border-red-301">
      </div>
      <div class="grow min-w-0">
    <div class="space-y-12 text-lg leading-7 3xs:max-md:text-base">
      <div class="text-xl 3xs:max-md:text-base">
        <div class="">
          Eğitim, hayat boyu süren bir maceradır. <br>
          Bilgiyle donatılan zihinler, karanlıkları aydınlatır ve her zorluğun üstesinden gelir. <br>
          Öğrenmek, sadece bireyi değil, tüm toplumu ileriye taşır ve daha güzel bir geleceğin kapılarını aralar. <br><br>
          "Zihinleri güçlendiriyoruz, Geleceği Şekillendiriyoruz.." <br><br>
          <div class="text-red-301">Dr.Bülent ÖZ</div>
          <div class="text-red-301">Ken Academy Türkiye Genel Müdür</div>
        </div>
      </div>
      <div class="">
        More Payroll Teknolojik İnsan Kaynakları Yönetimi ( Ken Academy Türkiye ) firmamız, <br>
        Güçlü insan kaynağı ve yenilikçi teknolojik altyapısıyla 5 şubede 76 kişilik ekibiyle dijital dünyanın makine öğrenimi dahil olmak üzere tüm ürünleri ile işletmelerimize ve insan kaynağı departmanlarına;
        Google Play Store, App Store ve AppGallery dahil tüm uygulama mağazaları aracılığı ile mobilde ve web'de dijital ürünler üretmektedir.
        <br>
        18 yıllık deneyim ve tecrübe ile.. <br>
        Kişisel gelişim eğitimleri, Sertifikalı meslek eğitimleri ve Kurumsal eğitimler olmak üzere sektörün öncü firmaları arasında yer almaktadır.
        <br>
        Bilgi ve teknoloji çağında geleceğe yön verme anlayışıyla hazırlanan eğitimlerle kendilerini geliştirmek isteyen ve aynı zamanda geleceklerini şekillendirmek isteyen bireyler için sertifikalı eğitimler düzenlemektedir.
      </div>
    </div>
      </div>
    </div>
  </div>
  <!-- our values -->
  <div class="max-w-screen-xl xl:mx-auto mx-4 space-y-7 3xs:max-lg:space-y-4 mb-14 3xs:max-lg:mb-7 3xs:max-lg:mt-3">
    <!-- title -->
    <h2 class="text-2xl 3xs:max-lg:text-lg w-fit mx-auto font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 after:-mx-7">
     Değerlerimiz
    </h2>
    <!-- logo -->
    <div class="grid grid-cols-2 3xs:max-md:grid-cols-1 gap-12">
      <a href="https://www.morepayroll.com/" target="_blank" title="More Payroll" class="block w-full">
        <img :src="`${$store.state.BASEURL}assets/images/more-logo.webp`" width="434" height="110" alt="More Payroll" loading="lazy" class="w-auto max-h-[110px] mx-auto">
      </a>
      <a href="https://www.morepayroll.com/" target="_blank" title="Ken Academy" class="block w-full">
        <img :src="`${$store.state.BASEURL}assets/images/ken-logo.webp`" width="529" height="90" alt="Ken Academy" loading="lazy" class="w-auto max-h-[90px] mx-auto">
      </a>
    </div>
    <!-- detail -->
    <div class="bg-gradient-to-t from-black from-[13%] via-red-301 via-80% to-black to-100% px-8 py-7 3xs:max-md:px-4 space-y-7 -mx-4 text-base 3xs:max-lg:text-sm leading-7">
      <ul class="list-decimal list-inside">
        <li>
          Yenilik: Sürekli olarak yeni teknolojik gelişmeleri takip ediyor ve eğitimde yenilikçi çözümler sunmak için bu teknolojileri kullanıyoruz.
        </li>
        <li>
          Kalite: Yüksek kaliteli eğitim materyalleri ve deneyimleri sunarak öğrencilerin başarısını destekliyor ve öğretmenlerin etkili bir şekilde öğretim yapmasını sağlıyoruz.
        </li>
        <li>
          Erişilebilirlik: Herkesin eğitime eşit erişim hakkına sahip olduğuna inanıyoruz. Bu nedenle, çeşitli coğrafi ve sosyal engelleri aşmak için çözümler geliştiriyoruz.
        </li>
        <li>
          İşbirliği: Öğrenciler, öğretmenler ve veliler arasında güçlü bir işbirliği ortamı oluşturarak, eğitim sürecini destekliyoruz.
        </li>
        <li>
          Öğrenci Odaklılık: Öğrencilerin ihtiyaçlarına odaklanıyor ve onların bireysel öğrenme hedeflerini destekleyen çözümler sunuyoruz.
        </li>
      </ul>
      <div class="">
        Uzaktan eğitim sistemiyle ilgili olarak vizyonumuz, misyonumuz ve değerlerimiz doğrultusunda öğrencilerin öğrenme deneyimini geliştirmek ve eğitime erişimi kolaylaştırmak için çalışmaya devam ediyoruz.
      </div>
    </div>
  </div>
  <!-- mission and vision -->
  <div class="max-w-screen-xl xl:mx-auto lg:mx-4 3xs:max-lg:space-y-4 mb-14 3xs:max-lg:mb-7 grid grid-cols-2 3xs:max-lg:grid-cols-1 text-base 3xs:max-lg:text-sm leading-7">
    <!-- vision -->
    <div class="">
        <!-- title -->
        <h2 class="text-2xl 3xs:max-lg:text-lg w-fit mx-auto font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 after:-mx-7">
          Vizyonumuz
        </h2>
        <div class="bg-gradient-to-t from-black from-[13%] via-red-301 via-80% to-black to-100% px-8 py-7 3xs:max-lg:px-4 h-full">
          <div class="">
            18 yıldır eğitim sektöründe faaliyet gösteren teknoloji şirketi olarak, vizyonumuz, eğitimde dönüşümü ve erişilebilirliği sağlayan yenilikçi uzaktan eğitim çözümleri sunmaktır. Öğrencilerin ve öğretmenlerin potansiyellerini tam anlamıyla ortaya çıkaran, sınırları kaldıran ve dünya çapında fark yaratan bir eğitim deneyimi sunmak için çalışıyoruz.
          </div>
          <ul class="list-disc list-inside text-base leading-7">
            <li>
              Bireylerin kendilerine yeni değerler kazandırmalarını sağlamak,
            </li>
            <li>
              Eğitim ve yönetim süreçlerimizi bilimsel ilkeler çerçevesinde geliştirmek,
            </li>
            <li>
              Eğitimlerimizle sektöre yön veren kuruluş olmak,
            </li>
            <li>
              Kamuoyu ile açık, doğru ve karşılaştırılabilir bilgi paylaşımında bulunmak,
            </li>
            <li>
              Bireyleri daha üretken ve başarılı kılmak,
            </li>
          </ul>
        </div>
    </div>
    <!-- mission -->
    <div class="">
        <!-- title -->
        <h2 class="text-2xl 3xs:max-lg:text-lg w-fit mx-auto font-bold after:content-[''] after:block after:h-1.5 after:rounded-full after:bg-red-301 after:mt-1 after:-mx-7">
          Misyonumuz
        </h2>
        <div class="bg-gradient-to-t from-black from-[13%] via-red-301 via-80% to-black to-100% px-8 py-7 3xs:max-lg:px-4 h-full">
          <div class="">
            Misyonumuz, öğrenme deneyimini zenginleştiren ve herkesin eğitime erişimini kolaylaştıran güvenilir ve etkili bir uzaktan eğitim sistemi sunmaktır. Teknolojiyi eğitimle birleştirerek, öğrencilerin coğrafi, sosyal veya ekonomik engellere takılmadan öğrenmelerini sağlamak için yenilikçi çözümler geliştiriyoruz. Öğretmenlerin, öğrencilerin bireysel ihtiyaçlarına uygun öğretim materyalleri ve interaktif araçlarla desteklenen öğretim yapabilmesini hedefliyoruz.
          </div>
          <ul class="list-disc list-inside">
            <li>
              Değişimleri doğru algılamak,
            </li>
            <li>
              Algılamarı hızlı analiz etmek,
            </li>
            <li>
              Analizleri pedagojik birikimlerle sentezlemek,
            </li>
            <li>
              Sentezleri ivedi bir şekilde paylaşmak,
            </li>
            <li>
              Paylaşım sonuçlarını etkin olarak izlemek,
            </li>
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
      title: 'Hakkımızda | Ken Academy – Eğitimde Güven ve Başarı',
      link: [
        {rel: 'canonical', href: window.location.origin+'/hakkimizda'}
      ],
      meta: [
        {property: 'og:url', content: window.location.origin+'/hakkimizda'},
        {property: 'og:title', content: 'Hakkımızda | Ken Academy – Eğitimde Güven ve Başarı'},
        {
          property: 'og:description',
          content: 'Ken Academy olarak, nitelikli eğitim çözümleri ve uzman kadromuzla binlerce öğrencinin kariyer yolculuğuna rehberlik ediyoruz. Bizi yakından tanıyın.',
        },
        {
          name: 'description',
          content: 'Ken Academy olarak, nitelikli eğitim çözümleri ve uzman kadromuzla binlerce öğrencinin kariyer yolculuğuna rehberlik ediyoruz. Bizi yakından tanıyın.',
        },
      ],
    });
  }
}
</script>

<style scoped>

</style>