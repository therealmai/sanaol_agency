<template>
  <div>
    <!-- Navbar -->
    <Navbar></Navbar>

    <!-- content -->
    <router-view></router-view>

    <!-- Footer -->
    
  </div>
</template>

<script>
import Navbar from '../Navigation/Navbar.vue';
export default {
  name: 'MainLayout',
  components:{
    Navbar
  }
};
</script>

<style>
</style>
