<template>
  <nav class=" bg-white drop-shadow-lg absolute-top fixed top-0  flex justify-between items-center space-x-4 h-[64px] min-h-[64px] w-full">
    <div class="flex items-center ">
      <span class="p-6 m-6 bg-lightgray"></span>
      <p class="text-primary font-bold text-lg">System Name</p>
    </div>
    
    <div class="space-x-6 pr-4">
      <router-link :to="{ name: 'membership' }">
        <span class="font-medium px-2 py-2 rounded-l ">MEMBERSHIP</span>
      </router-link>
      <router-link :to="{ name: 'talent' }">
        <span class="font-medium px-2 py-2 rounded-l ">TALENTS</span>
      </router-link>
      <router-link :to="{ name: 'services' }">
        <span class="font-medium px-2 py-2 rounded-l ">SERVICES</span>
      </router-link>
      <router-link :to="{ name: 'events' }">
        <span class="font-medium px-2 py-2 rounded-l ">NEWS & EVENTS</span>
      </router-link>
      <router-link :to="{ name: 'login' }">
        <!-- if a user is log in to the system this the user name will be displayed -->
        <span class="font-medium px-2 py-2 rounded-l ">{{user.name}}</span>
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