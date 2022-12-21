<template>

  <nav class=" bg-white drop-shadow-lg flex sticky top-0 z-50 justify-between items-center space-x-4 h-[77px] min-h-[77px] w-full">

    <div class="flex items-center ">
      <span class="p-6 m-6 bg-lightgray"></span>
      <p class="text-primary font-bold text-lg">System Name</p>
    </div>
    
    <div class="space-x-6 pr-4">
      
      <!-- display if user is admin (go to store/index.js to change role of user) -->
      
      <router-link  v-show="user.user_type == 'general' " :to="{ name: 'usermanagement' }">
        <span class="font-medium px-2 py-2 rounded-l ">USERS</span>
      </router-link>
      <router-link v-show="user.user_type == 'GENERAL' " :to="{ name: 'membership' }">
        <span class="font-medium px-2 py-2 rounded-l ">MEMBERSHIP</span>
      </router-link>
      <router-link v-show="user.user_type == 'TALENT'" :to="{ name: 'Profile' }">
        <span class="font-medium px-2 py-2 rounded-l ">PROFILE</span>
      </router-link>

      <router-link :to="{ name: 'talent_list' }">
        <span class="font-medium px-2 py-2 rounded-l ">TALENTS</span>
      </router-link>
      <router-link v-show="user.user_type == 'ADMIN' || user.user_type == 'TALENT'"  :to="{ name: 'reminders' }">
        <span class="font-medium px-2 py-2 rounded-l ">REMINDERS</span>
      </router-link>
      <router-link :to="{ name: 'services' }">
        <span class="font-medium px-2 py-2 rounded-l ">SERVICES</span>
      </router-link>
      <router-link :to="{ name: 'events' }">
        <span class="font-medium px-2 py-2 rounded-l ">NEWS & EVENTS</span>
      </router-link>
      
      
      <span v-if="user.name != null" class="bg-[#F6F5FF] p-2 rounded-[7px] text-primary pr-6 pl-6 cursor-pointer">{{ user.name }}</span>
      <router-link v-else :to="{ name: 'login' }"> 
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
  data() {
    return {
      
    }
  },
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