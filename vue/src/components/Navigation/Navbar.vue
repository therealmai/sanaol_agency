<template>

  <nav class=" bg-white drop-shadow-lg flex sticky top-0 z-50 justify-between items-center space-x-4 h-[77px] min-h-[77px] w-full">

    <div class="flex items-center ">
      <span class="p-6 m-6 bg-lightgray"></span>
      <p class="text-primary font-bold text-lg">System Name</p>
    </div>
    
    <div class="space-x-6 pr-4">
      <router-link :to="{ name: 'membership' }">
        <span class="font-medium px-2 py-2 rounded-l ">MEMBERSHIP</span>
      </router-link>
      <router-link :to="{ name: 'talent_list' }">
        <span class="font-medium px-2 py-2 rounded-l ">TALENTS</span>
      </router-link>
      <router-link :to="{ name: 'reminders' }">
        <span class="font-medium px-2 py-2 rounded-l ">REMINDERS</span>
      </router-link>
      <router-link :to="{ name: 'services' }">
        <span class="font-medium px-2 py-2 rounded-l ">SERVICES</span>
      </router-link>
      <router-link :to="{ name: 'events' }">
        <span class="font-medium px-2 py-2 rounded-l ">NEWS & EVENTS</span>
      </router-link>
      <router-link :to="{ name: 'login' }">
        <span class="font-medium px-2 py-2 rounded-l ">LOGIN</span>
      </router-link>
    </div>
</nav>

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