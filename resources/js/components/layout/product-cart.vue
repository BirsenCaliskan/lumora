<template>
    <router-link :to="`/${product.url}`" :title="product.name" class="bg-white block border border-gray-200 py-3.5 px-4 rounded-lg group hover:shadow-lg">
        <figure class="overflow-hidden mb-3.5">
            <img :src="`${$store.state.BASEURL2}${product.picture}`" :alt="product.name" class="max-w-full w-auto h-full rounded">
        </figure>
        <div class="text-md leading-5 line-clamp-2 h-10 font-elms-sans font-medium mb-4">{{ product.name }}</div>
        <div class="flex item-end gap-1.5 mb-5">
            <div class="text-sm leading-5 line-through text-gray-305" v-price-format="{price: product.list_price, currency: 'TRY'}"></div>
            <div class="text-lg leading-5 font-semibold text-theme-200" v-price-format="{price: product.discounted_price ?? product.list_price , currency: 'TRY'}"></div>
        </div>
        <button type="button" aria-label="add-product" class="block w-full bg-theme-100 border border-theme-100 rounded text-white text-center text-md leading-4 font-medium px-5 py-2.5 cursor-pointer group-hover:bg-white group-hover:text-black duration-200">
            SEPETE EKLE
        </button>
    </router-link>

</template>
<script>
export default {
    name: 'product-cart',
    props: ['product'],

}
</script>
<style scoped>

</style>
