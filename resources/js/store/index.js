import { createStore } from 'vuex';
import axios from 'axios';
import Swal from "sweetalert2";

window.Swal = Swal;

window.axios = axios.create({
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
    },
    baseURL: baseURL,
});

const store = createStore({
    state() {
        return {
            BASEURL : baseURL,
            BASEURL2: 'https://kenacademyturkiye.com/',
            phoneCountry: [
                {id:1,name: 'Türkiye'},
                {id:2,name: 'Yurtdışı'},
            ],
            settings: settings,
            seoDetail: seoDetail,
            categories: [],
            staticPages: [
                {name: 'Hakkımızda', url: 'About'},
                {name: 'Dergilerimiz', url: 'Magazines'},
                {name: 'Eğitmenlerimiz', url: 'Teachers'},
                {name: 'Akreditasyonlarımız', url: 'Accreditations'},
                {name: 'Basında Biz', url: 'News'},
                {name: 'Bloglar', url: 'Blogs'},
            ]
        }
    },
    actions : {
        async get(context, { url, props }) {
            try {
                const result = await window.axios.get(url, { params: props });
                return (result.data.redirect)
                    ? top.location.reload()
                    : result;
            } catch (error) {

            }
        },
        async post(context, { url, props, config }) {
            try {
                const result = await window.axios.post(url, props, config);
                return (result.data.redirect)
                    ? top.location.reload()
                    : result;
            } catch (error) {

            }
        },
    }
});
export default store;
