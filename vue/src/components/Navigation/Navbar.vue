<template>
  <div class="bg-primary absolute-top flex justify-between items-center h-[77px] min-h-[77px] w-full">
    <span class="text-2xl text-primary font-bold">{{user.name}}</span>
  </div>
</template>

<script>
import { computed, reactive, toRefs } from 'vue'
import { useStore } from 'vuex'

export default {
  name: "Navbar",
  setup () {
    const store = useStore();
    return {
      user: computed(() => store.state.user.data),
    }
  }
}
</script>

<style scoped>

</style>