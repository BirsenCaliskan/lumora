<template>
  <div class="fixed inset-0 z-[1045] max-w-sm mx-auto transition duration-300 ease-in-out transform-none">
    <div class="w-full h-full flex items-center justify-center">
        <div class="relative w-full h-auto max-h-[520px] sm:max-h-screen overflow-y-auto scrollbar shadow-sm">
          <div class="absolute top-0 right-0 z-10 w-fit p-3">
            <button type="button" @click="closeModal" class="block w-fit block p-3 text-slate-405 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="size-4">
                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M2 30L30 2m0 28L2 2"></path>
              </svg>
            </button>
          </div>
          <call-form :education="education_id" @closeStatus="closeAction = $event"/>
          <div class="pb-6 px-6">
          </div>
        </div>
    </div>
  </div>
</template>

<script>
import {closeModal} from "jenesius-vue-modal";
import {defineAsyncComponent} from "vue";

export default {
  name: "modal",
  props: ['education_id'],
  components: {
    CallForm: defineAsyncComponent(()=> import('./call_form.vue')),
  },
  data(){
    return {
      closeAction: false,
    }
  },
  methods: {
    closeModal(){
      closeModal();
    },
  },
  watch: {
    closeAction(val){
      if(val === true){
        closeModal();
      }
    }
  }
}
</script>

<style scoped>

</style>