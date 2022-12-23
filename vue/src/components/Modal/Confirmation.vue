<template>
  <div>
    <Modal >
      <template #modal_content>
        <slot name="confirm_body" />
      </template>

      <!-- buttons here -->
      <template #modal_button>

        <div class="flex flex-row space-x-6">
          <ConfirmButton
            v-if="confirmationType === 'denied'"
            text="CONFIRM"
            @click="denied"
          ></ConfirmButton>
          <ConfirmButton
            v-else-if="confirmationType === 'deleted'"
            text="CONFIRM"
            @click="deleted"
          ></ConfirmButton>
          <ConfirmButton
            v-else-if="confirmationType === 'approved'"
            text="CONFIRM"
            @click="approved"
          ></ConfirmButton>
          <ConfirmButton v-else text="CONFIRM" @click="update"></ConfirmButton>
          <CancelButton text="CANCEL" @click="closeModal"></CancelButton>

        <div class="flex flex-row space-x-6 ">
          <FilledButton text="CONFIRM" @click="update" class="w-[100px]"> </FilledButton>
          <OutlineButton text="CANCEL" @click="closeModal" class="w-[100px]"></OutlineButton>

        </div>
      </template>
    </Modal>


    <ApprovedModal v-show="isApproved" :text="text" @close="closeModal">
    </ApprovedModal>
    <UpdateModal v-show="isUpdated" :text="text" @close="closeModal">
    </UpdateModal>
    <DeletedModal v-show="isDeleted" :text="text" @close="closeModal">
    </DeletedModal>
    <DeniedModal
      v-show="isDenied"
      text="text"
      @close="closeModal"
    ></DeniedModal>


  </div>
</template>
<script>
import Modal from "../Modal/Modal.vue";
import FilledButton from "../Buttons/FilledButton.vue";
import OutlineButton from "../Buttons/OutlineButton.vue";
import UpdateModal from "../Modal/UpdateModal.vue";
import DeniedModal from "../Modal/DeniedModal.vue";
import DeletedModal from "../Modal/DeletedModal.vue";
import ApprovedModal from "../Modal/ApprovedModal.vue";

export default {
  name: "Confirmation",
  data() {
    return {
      isUpdated: false,
      isApproved: false,
      isDenied: false,
      isDeleted: false,
    };
  },
  props: {
    confirmationType: String,
    text: String,
  },
  components: {
    Modal,

    ConfirmButton,
    CancelButton,
    UpdateModal,
    DeniedModal,
    DeletedModal,
    ApprovedModal,
  },
  methods: {
    closeModal() {
      this.isUpdated = false;
      this.isApproved = false;
      this.isDenied = false;
      this.isDeleted = false;
      this.$emit("close");
    },
    update() {
      this.isUpdated = true;
    },
    denied() {
      this.isDenied = true;
    },
    deleted() {
      this.isDeleted = true;
    },
    approved() {
      this.isApproved = true;
    },

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

<style></style>
