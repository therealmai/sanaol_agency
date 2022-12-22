<template>
  <div class="h-screen w-screen">
  <!-- <div class="h-screen w-screen"> -->
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
  watch: {
        $route: {
            immediate: true,
            handler(to, from) {
                document.title = (to.meta.title + ' | Sanaol Agency') || 'Sanaol Agency';
            }
        },
    }
};
</script>

<style scoped>
</style>
