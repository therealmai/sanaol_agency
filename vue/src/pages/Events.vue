<template>

<body>
  <div>
    <div>THIS IS THE EVENTS PAGE</div>
    <FilledButton text="Edit" height="25" width="100" color="White" fontSize="12" @click="$router.push('Edit_Events')"/>
  </div>
</body>

</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
import Modal from '../components/Modal/Modal.vue';
import TextInput from '../components/Input/TextInput.vue';
import FilledButton from '../components/Buttons/FilledButton.vue';

export default{
  components: {
    Navbar,
    Modal,
    TextInput,
    FilledButton
  },
}
</script>

<style>
</style>
