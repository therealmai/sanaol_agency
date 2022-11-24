<script>
import EditUserModal from "../components/Modal/EditUserModal.vue";
import ViewApplicationModal from "../components/Modal/ViewApplicationModal.vue"
import Sample from "../pages/Sample.vue";

export default {
  components: {
    EditUserModal,
    ViewApplicationModal
  },
  data() {
    return {
      isModalVisible: false,
      isApplicationModalVisible: false,
    };
  },
  methods: {
    showModal(name) {
      switch (name) {
        case "user":
          this.isModalVisible = true;
          break;
        case "application":
          this.isApplicationModalVisible = true;
          break;
      }
    },
    closeModal(name) {
      switch (name) {
        case "user":
          this.isModalVisible = false;
          break;
        case "application":
          this.isApplicationModalVisible = false;
          break;
      }
    },
  },
};
</script>

<template>
  <div class="flex flex-col justify-center w-full items-center pt-5">
    <button class="btn-primary" @click="showModal('user')">
      OPEN EDIT USER MODAL
    </button>
    <button class="btn-primary" @click="showModal('application')">
      View Application Modal
    </button>
  </div>
  <edit-user-modal v-show="isModalVisible" @close="closeModal('user')" />
  <view-application-modal v-show="isApplicationModalVisible" @close="closeModal('application')" />
</template>
