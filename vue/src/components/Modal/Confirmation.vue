<template>
  <div>
    <Modal >
      <template #modal_content>
          <slot name="confirm_body"/>
      </template>

      <!-- buttons here -->
      <template #modal_button>
        <div class="flex flex-row space-x-6 ">
          <ConfirmButton text="CONFIRM" @click="update"></ConfirmButton>
          <CancelButton text="CANCEL" @click="closeModal"></CancelButton>
        </div>
      </template>

    </Modal>

  </div>

</template>
<script>

import Modal from "../Modal/Modal.vue";
import ConfirmButton from "../Buttons/ConfirmButton.vue";
import CancelButton from "../Buttons/CancelButton.vue";

export default {
  name: 'Confirmation',
  data() {
    return {
      isUpdated: false
    }
  },
  props: {
    text: String
  },
  components: {
    Modal,
    ConfirmButton,
    CancelButton,
  },
  methods:{
     closeModal(){ 
      this.$emit('close');
    },
     update(){
      this.$emit('update');
     }
  },
};
</script>

<style>
</style>
