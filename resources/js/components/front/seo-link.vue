<template>
    <component :is="page" :key="`active-${page}`"/>
</template>

<script>
import {mapActions} from "vuex";
import {defineAsyncComponent} from "vue";
import {pushModal} from "jenesius-vue-modal";

export default {
    name: "seo-link",
    components: {
        PageComponent: defineAsyncComponent(_ => import('./page.vue')),
        CategoryComponent: defineAsyncComponent(_ => import('../educations/main.vue')),
        ProductComponent: defineAsyncComponent(_ => import('../educations/detail.vue')),
        ErrorComponent: defineAsyncComponent(_ => import('./error.vue'))
    },
    data(){
        return {
            page: null,
        }
    },
    mounted() {
        this.getSeoLink();
    },
    methods: {
        ...mapActions([
            'get',
        ]),
        async getSeoLink(){
            const Loading = await pushModal('Loading');
            let link = this.$route.params.url;
            await this.get({
                url: '/api/seo_link',
                props: {link},
            }).then(res => {
                this.page = res.data;
                Loading.close();
            })
        }
    }
}
</script>

<style scoped>

</style>
