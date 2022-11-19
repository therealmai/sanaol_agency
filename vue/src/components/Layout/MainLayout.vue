<template>
  <div>
    <!-- Navbar -->
    <Navbar></Navbar>

    <!-- content -->
    <router-view></router-view>

    <!-- Footer -->
    <Footer></Footer>
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
