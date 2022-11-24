<script>
import EditUserModal from "../components/Modal/UserManagementModals/EditUserModal.vue";
import ViewApplicationModal from "../components/Modal/UserManagementModals/ViewApplicationModal.vue";
import UpdatedModal from "../components/Modal/UserManagementModals/UpdatedModal.vue";
import Sample from "../pages/Sample.vue";

export default {
  components: {
    EditUserModal,
    ViewApplicationModal,
    UpdatedModal,
  },
  data() {
    return {
      isModalVisible: false,
      isApplicationModalVisible: false,
      isUpdatedModalVisible: false,
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
        case "updated":
          this.isUpdatedModalVisible = true;
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
        case "updated":
          this.isUpdatedModalVisible = false;
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
    <button class="btn-primary" @click="showModal('updated')">
      Updated Modal
    </button>
  </div>
  <edit-user-modal
    v-show="isModalVisible"
    @close="closeModal('user')"
    imageUrl="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8cmFuZG9tJTIwcGVvcGxlfGVufDB8fDB8fA%3D%3D&w=1000&q=80"
  />
  <view-application-modal
    v-show="isApplicationModalVisible"
    @close="closeModal('application')"
  />
  <updated-modal
    v-show="isUpdatedModalVisible"
    @close="closeModal('updated')"
  />
</template>
