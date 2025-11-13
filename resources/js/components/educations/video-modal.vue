<template>
    <div class="fixed inset-0 z-[99999999999999] bg-black/90 flex items-center justify-center p-4">
        <div class="w-full max-w-screen-lg relative">

            <button @click="closeModal" type="button" aria-label="Kapat"
                    class="absolute -top-12 right-0 size-8 bg-white/20 hover:bg-white/40 text-white rounded-full flex items-center justify-center transition-colors duration-200 backdrop-blur-sm z-50">
                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class="relative z-40 rounded-xl overflow-hidden shadow-2xl">
                <iframe
                    :src="videoUrl"
                    class="aspect-[16/9] w-full"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>

        </div>
    </div>
</template>

<script>
import { closeModal } from 'jenesius-vue-modal';
export default {
    name: "video-modal",
    props: {
        videoUrl: {
            type: String,
            required: true
        }
    },
    methods: {
        closeModal() {
            closeModal();
        }
    }
}
</script>

<style scoped>

</style>
