<template>
    <div class="min-h-screen flex flex-col justify-between *:w-[-webkit-fill-available]">
        <header-component/>
        <router-view :key="$route.params.url || $route.params"/>
        <footer-component/>
        <widget-container-modal/>
    </div>
</template>

<script>
import {defineAsyncComponent} from "vue";
import {container, config} from "jenesius-vue-modal";

config({
    store: {
        call_form: defineAsyncComponent(() => import('./components/layout/modal.vue')),
        Loading: defineAsyncComponent(() => import('./components/layout/loading.vue'))
    }
})
export default {
    name: 'App',
    components: {
        HeaderComponent: defineAsyncComponent(() => import('./components/layout/header.vue')),
        FooterComponent: defineAsyncComponent(() => import('./components/layout/footer.vue')),
        LoadingComponent: defineAsyncComponent(() => import('./components/layout/loading.vue')),
        WidgetContainerModal: container,
    },
}
</script>

<style>
.modal-container {
    z-index: 999999999999999999 !important;
    background-color: rgba(0, 0, 0, 0.78);
}
</style>
