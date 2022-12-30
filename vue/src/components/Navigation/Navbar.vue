<template>
  <nav class=" bg-white drop-shadow-lg flex sticky top-0 z-50 justify-between items-center space-x-4 h-[77px] min-h-[77px] w-full">
      <a href="/" class="pl-[27px] flex items-center space-x-3" >
        <img class="w-[37.58px]" src="../../assets/sanaol-logo.png">
        <p class="text-primary font-bold text-lg">Sanaol Agency</p>
      </a>
    <div class="space-x-6 pr-4">
      <!-- display if user is admin (go to store/index.js to change role of user) -->
      <span v-if="isLog == true">
        <router-link  v-show="user.user_type == 'admin' " :to="{ name: 'usermanagement' }">
          <span class="font-medium px-2 py-2 rounded-l ">USERS</span>
        </router-link>
        <router-link v-show="user.user_type == 'talent'" :to="{ name: 'profile', params: {id:`${user.id}`}}">
          <span class="font-medium px-2 py-2 rounded-l ">PROFILE</span>
        </router-link>
        <router-link :to="{ name: 'talent_list' }">
          <span class="font-medium px-2 py-2 rounded-l ">TALENTS</span>
        </router-link>
        <router-link v-show="user.user_type == 'talent'"  :to="{ name: 'reminders' }">
          <span class="font-medium px-2 py-2 rounded-l ">REMINDERS</span>
        </router-link>
        <router-link :to="{ name: 'services' }">
          <span class="font-medium px-2 py-2 rounded-l ">SERVICES</span>
        </router-link>
        <router-link :to="{ name: 'events' }">
          <span class="font-medium px-2 py-2 rounded-l ">NEWS & EVENTS</span>
        </router-link>
        <span @click="logout" class="bg-[#F6F5FF] p-2 rounded-[7px] text-primary pr-6 pl-6 cursor-pointer">{{ user.fname.toUpperCase() }}</span>
      </span>
      <span v-else>
        <!-- for users that are not logged in the system -->
        <router-link :to="{ name: 'membership' }">
          <span class="font-medium px-2 py-2 rounded-l ">MEMBERSHIP</span>
        </router-link>
        <router-link :to="{ name: 'talent_list' }">
          <span class="font-medium px-2 py-2 rounded-l ">TALENTS</span>
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
      </span>
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
      isLog: ''
    } 
  },
  setup () {
    const store = useStore();
    return {
      isLog: computed(() => store.state.isLoggedIn),
      user: computed(() => store.state.user.data),
    }
  },
  methods:{
    logout(){
        this.$store.dispatch('logout').then((response)=> {
            this.$router.push('/login');
        }).catch(err => {
            console.log(err)
        });
      }
  }
}
</script>

<style scoped>

</style>