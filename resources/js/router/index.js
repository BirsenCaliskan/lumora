import {createRouter,createWebHistory} from "vue-router";

import {closeModal} from "jenesius-vue-modal";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/', name: 'Home', component: () => import('@/components/front/homepage.vue')},

        {path: '/tum-egitimler', name: 'Educations', component: () => import('@/components/educations/main.vue')},
        {path: '/egitim/:url', name: 'EducationDetail', component: () => import('@/components/educations/detail.vue')},

        {path: '/egitmenlerimiz', name: 'Teachers', component: () => import('@/components/teachers/main.vue')},
        {path: '/egitmen/:url', name: 'TeacherDetail', component: () => import('@/components/teachers/detail.vue')},

        {path: '/hakkimizda', name: 'About', component: () => import('@/components/front/about.vue')},
        {path: '/akreditasyonlarimiz', name: 'Accreditations', component: () => import('@/components/front/accreditations.vue')},
        {path: '/dergilerimiz', name: 'Magazines', component: () => import('@/components/front/magazines.vue')},
        {path: '/basinda-biz', name: 'News', component: () => import('@/components/news/main.vue')},
        {path: '/blog-yazilarimiz', name: 'Blogs', component: () => import('@/components/front/blogs.vue')},
        {path: '/iletisim', name: 'Contact', component: () => import('@/components/front/contact.vue')},

        //agreement
       // {path: '/:url', name: 'Page', component: () => import('@/components/front/page.vue')},
        {path: '/:url', name: 'SeoLink', component: () => import('@/components/front/seo-link.vue')}
    ],
    scrollBehavior(to,from,savedposition){
        return {top: 0}
    }
});
router.afterEach((to,from,next)=> {
    closeModal();
});
export default router;
