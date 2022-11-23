  <!-- Sample Page  -->
  <!-- A sample page to show how modal works  -->
  
<template>
<body class="flex flex-row justify-center items-center w-full h-full">
  <div>
      <button class="btn-primary" @click="showModal">OPEN MODAL</button>  

      <!-- Each modal must have a v-show property and close method to toggle its visibility  -->
      <Modal v-show="isModalVisible">
        <template v-slot:modal_content>
            <!-- insert code here -->
            REPLACE THIS
        </template>

        <template v-slot:modal_button>
            <!-- insert buttons to toggle display of modal -->
            <button class="btn-primary px-2 py-2" @click="closeModal">{{ text }}</button>
        </template>
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
        text: 'RETRY',
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
