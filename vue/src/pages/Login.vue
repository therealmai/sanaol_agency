<template>
<body>
 <div class="grid grid-flow-col grid-rows-2 sm:grid-rows-1 sm:grid-cols-2 gap-4">
  
  <div class="flex items-center justify-center">
    <!-- insert log in template here. -->
  </div>


 <!-- image -->
  <div class="w-full object-cover h-72 lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div>
</div>
</body>
</template>

<script>
import Navbar from '../components/Navigation/Navbar.vue';

export default{
  components: {
    Navbar,
  },
}
</script>

<style>
</style>
