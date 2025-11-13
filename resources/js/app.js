import { createApp } from 'vue';
import App from './App.vue';
import store from "./store/index.js";
import router from "./router/index.js";
import { createHead } from '@unhead/vue';
import vSelect from 'vue-select';
import { VueEternalLoading } from '@ts-pro/vue-eternal-loading';
import '../css/app.css';

import "swiper/css";
import "swiper/css/autoplay";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "vue-select/dist/vue-select.css";

const app = createApp(App);

app.use(router)
    .use(store)
    .use(createHead());
app.component('VueEternalLoading', VueEternalLoading)
    .component('v-select', vSelect);

app.directive('price-format',(el,binding) => {
    let price = binding.value.price,
        currency = binding.value.currency ?? 'TRY';

    if (typeof price === 'number' || (typeof price === 'string' && !isNaN(parseFloat(price)))) {
        const number = parseFloat(price);

        const formatter = new Intl.NumberFormat('tr-TR', {
            style: 'currency',
            currency: currency,
            minimumFractionDigits: 2,
        });

        el.textContent = formatter.format(number);
    } else {
        el.textContent = '-';
    }
});

app.mount('#app');
