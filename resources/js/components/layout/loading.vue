<template>
  <div class="fixed inset-0 flex items-center justify-center">
    <img :src="`${$store.state.BASEURL}assets/images/favicon.webp`" width="84" height="80" alt="Ken Academy" class="size-10 animate-pulse">
  </div>
</template>

<script>
export default {
  name: "loading",
  props: ['emit'],
  mounted() {
    document.querySelector('body').classList.add('overflow-hidden');
  },
  beforeUnmount() {
    document.querySelector('body').classList.remove('overflow-hidden');
  }
}
</script>

<style scoped>

</style>