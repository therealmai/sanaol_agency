<template>
  <div class="flex flex-col h-screen w-screen">
    <!-- Navbar -->
    <Navbar></Navbar>

    <!-- content -->
    <div class="flex-grow mb-auto relative">
      <router-view></router-view> 
    </div>

    <!-- Footer -->
    <Footer ></Footer>
  </div>
</template>

<script>
import Navbar from '../Navigation/Navbar.vue';
import Footer from '../Footer/Footer.vue';
export default {
  name: 'MainLayout',
  components:{
    Navbar,
    Footer
  }
};
</script>

<style>
</style>
