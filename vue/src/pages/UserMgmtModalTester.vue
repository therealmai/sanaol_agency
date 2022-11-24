<script>
import EditUserModal from "../components/Modal/UserManagementModals/EditUserModal.vue";
import ViewApplicationModal from "../components/Modal/UserManagementModals/ViewApplicationModal.vue";
import DeletedConfirmationModal from "../components/Modal/UserManagementModals/DeletedConfirmationModal.vue";
import DeniedConfirmationModal from "../components/Modal/UserManagementModals/DeniedConfirmationModal.vue";
import ApprovedConfirmationModal from "../components/Modal/UserManagementModals/ApprovedConfirmModal.vue";

export default {
  components: {
    EditUserModal,
    ViewApplicationModal,
    DeletedConfirmationModal,
    DeniedConfirmationModal,
    ApprovedConfirmationModal,
  },
  data() {
    return {
      isModalVisible: false,
      isApplicationModalVisible: false,
      isDeletedVisible: false,
      isDeniedVisible: false,
      isApprovedVisible: false,
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
        case "deleted":
          this.isDeletedVisible = true;
          break;
        case "denied":
          this.isDeniedVisible = true;
          break;
        case "approved":
          this.isApprovedVisible = true;
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
        case "deleted":
          this.isDeletedVisible = false;
          break;
        case "denied":
          this.isDeniedVisible = false;
          break;
        case "approved":
          this.isApprovedVisible = false;
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
    <button class="btn-primary" @click="showModal('deleted')">
      Deleted Modal
    </button>
    <button class="btn-primary" @click="showModal('denied')">
      Denied Modal
    </button>
    <button class="btn-primary" @click="showModal('approved')">
      Approved Modal
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
  <deleted-confirmation-modal
    v-show="isDeletedVisible"
    @close="closeModal('deleted')"
  />
  <denied-confirmation-modal
    v-show="isDeniedVisible"
    @close="closeModal('denied')"
  />
  <approved-confirmation-modal
    v-show="isApprovedVisible"
    @close="closeModal('approved')"
  />
</template>
