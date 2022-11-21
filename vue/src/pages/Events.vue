<template>
  <div class="m-12">
    <div class="flex flex-row justify-center relative">
      <div>THIS IS THE EVENTS PAGE</div>
      <TextInput title="Name" :focus="false" default="Default Value"></TextInput>
    </div>
  </div>
</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
import Modal from '../components/Modal/Modal.vue';
import TextInput from '../components/Input/TextInput.vue';

export default{
  components: {
    Navbar,
    Modal,
    TextInput
  },
}
</script>

<style>
</style>
