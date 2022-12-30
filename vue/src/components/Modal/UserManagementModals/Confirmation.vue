<template>
  <div>
    <Modal>
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
import Modal from "../../Modal/Modal.vue";
import ConfirmButton from "../../Buttons/ConfirmButton.vue";
import CancelButton from "../../Buttons/CancelButton.vue";
import UpdateModal from "./UpdateModal.vue";
import DeniedModal from "./DeniedModal.vue";
import DeletedModal from "./DeletedModal.vue";
import ApprovedModal from "./ApprovedModal.vue";

import axios from '../../../axios'

export default {
  name: "Confirmation",

  data() {
    return {
      isUpdated: false,
      isApproved: false,
      isDenied: false,
      isDeleted: false,
      user: {},
    };
  },
  props: {
    confirmationType: String,
    text: String,
    id: String,
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
        console.log(this.id)
      axios.patch(`/users/approve/${this.id}`, {
        })
        .then((res) => {
          console.log(res)
          if (res.status == 200) {
            this.isSuccessfulModalVisible = true;
            setTimeout(() => {
              console.log("A4");
              this.isSuccessfulModalVisible = false;
              this.$emit("close");
              this.$router.go();
            }, 3000);
          }
        }).catch((err)=>{
            console.log(err)
        });
    },  
  },
};
</script>

<style></style>
