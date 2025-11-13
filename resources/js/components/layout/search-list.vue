<template>
    <div v-if="searchList && Object.keys(searchList).length" class="divide-y divide-gray-100 text-sm">
        <template v-for="data in searchList">
            <router-link :to="`/${data.url}`" :title="data.name" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-50 duration-150">
                <figure class="flex-none">
                    <img :src="`${$store.state.BASEURL2}${data.picture}`" width="176" height="96" :alt="data.name" class="size-16 object-cover object-top">
                </figure>
                <div class="grow min-w-0 line-clamp-2">{{ data.name }}</div>
            </router-link>
        </template>
    </div>
</template>

<script>
import {mapActions} from "vuex";
import {debounce} from "lodash";

export default {
    name: "search-list",
    props: ['searchText'],
    data() {
        return {
            searchList: [],
        }
    },
    mounted() {
        this.searchDebounced = debounce(this.getSearch, 400);
    },
    methods: {
        ...mapActions([
            'get'
        ]),
        async getSearch() {
            await this.get({
                url: '/api/searchEducation',
                props: {name: this.searchText},
            }).then(res => {
                this.searchList = res.data;
            });
        },
    },
    watch: {
        searchText(val) {
            if (val && val.length > 3) {
                this.searchDebounced();
            } else {
                this.searchList = [];
            }
        }
    }
}
</script>

<style scoped>

</style>
