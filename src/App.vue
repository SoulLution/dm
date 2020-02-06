<template>
  <div id="app">
    <router-view/>
    <v-footer />
  </div>
</template>

<script>
  import vFooter from '@/components/footer.vue'
export default {
  name: 'App',
  components: { vFooter }
}
</script>

<style lang="scss">
  @import '@/assets/main.scss';
</style>
