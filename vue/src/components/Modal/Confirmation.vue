<template>
  <div>
    <Modal >
      <template #modal_content>
          <slot name="confirm_body"/>
      </template>

      <!-- buttons here -->
      <template #modal_button>
        <div class="flex flex-row space-x-6 ">
          <FilledButton text="CONFIRM" @click="update"> </FilledButton>
          <OutlineButton text="Outline" @click="closeModal"></OutlineButton>
        </div>
      </template>

    </Modal>

  </div>

</template>
<script>

import Modal from "../Modal/Modal.vue";
import FilledButton from "../Buttons/FilledButton.vue";
import OutlineButton from "../Buttons/OutlineButton.vue";
import UpdateModal from "../Modal/UpdateModal.vue";

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
    FilledButton,
    OutlineButton,
    UpdateModal
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
