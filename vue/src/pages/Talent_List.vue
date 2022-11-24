<template>
<body>
  <div style="padding-top: 96px; padding-left: 217.5px; padding-right: 217.5px; margin-bottom: 18px;">
    <h1 style=" font-weight: 700; color: #525252; ">Our Talents</h1>
    <p1>Add your template here</p1>
    <NumberInput :height="50" :disabled="false" title="Enter Age"></NumberInput>

  </div>
</body>

</template>

<script>
import Navbar from '../components/Navigation/Navbar.vue';
import Footer from '../components/Footer/Footer.vue';

export default{
  components: {
    Navbar,
    Footer,
  },
}
</script>

<style>
</style>
