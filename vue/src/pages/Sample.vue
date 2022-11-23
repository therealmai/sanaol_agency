

  <!-- Sample Page  -->
  <!-- A sample page to show how modal works  -->

<template>
<body class="flex flex-row justify-center items-center w-full h-full">
  <div>
      <button class="btn-primary" @click="showModal">OPEN MODAL</button>  
      <!-- Each modal must have a v-show property and close method to toggle its visibility  -->
      <Modal v-show="isModalVisible" @close="closeModal" text="Retry">
        <div slot=""></div>
      </Modal> 

  </div>
</body>
</template>

<script>

import Modal from '../components/Modal/Modal.vue';

export default {
  name: 'Sample',
  components: {
    Modal,
  },
  data() {
      return {
        isModalVisible: false,
      };
    },
    methods: {
      showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      }
    }
};
</script>

<style>
</style>
