<template>
  <div
    class="flex min-w-max justify-between gap-x-2 py-1 px-8 bg-white border-t border-divider text-[#696969]"
  >
    <div class="w-3/12 min-w-max grid grid-cols-4 grid-rows-4">
      <div class="text-base col-span-1 row-span-4">
        <img width="34px" height="34px" :src="data.image" />
      </div>
      <div class="text-base col-span-3 row-span-2">{{ fname }} {{ lname }}</div>
      <div class="text-base col-span-3 row-span-2">{{ handle }}</div>
    </div>
    <span class="w-4/12 min-w-max text-base">{{ email }}</span>
    <span class="w-2/12 min-w-max text-base">{{ user_type }}</span>
    <span
      class="flex flex-row justify-center flex-nowrap text-[#696969] gap-x-2"
    >
      <FilledButton
        class="w-[100px]"
        text="EDIT"
        @click="() => (this.isEditModalVisible = true)"
      />
      <OutlineButton
        class="w-[100px]"
        text="DELETE"
        @click="() => (this.isDeleteModalVisible = true)"
      />
    </span>
  </div>
  <EditUserModal
    v-show="isEditModalVisible"
    @close="closeEditModal"
    :id="id"
    :fname="fname"
    :lname="lname"
    :handle="handle"
    :email="email"
    :user_type="user_type"
  />
  <DeleteUserConfirmationModal
    :name="fname"
    v-show="isDeleteModalVisible"
    @close="closeDeleteModal"
    @confirm="deleteUser"
  />
  <SuccessDeleteModal v-show="isDeleteSuccessModalVisible"/>
</template>

<script>
import axios from "../../axios";
import FilledButton from "../Buttons/FilledButton.vue";
import OutlineButton from "../Buttons/OutlineButton.vue";
import EditUserModal from "../Modal/UserManageModals/EditUserModal.vue";
import DeleteUserConfirmationModal from "../Modal/UserManageModals/DeleteUserConfirmationModal.vue";
import SuccessDeleteModal from "../Modal/UserManageModals/SuccessDeleteModal.vue"

export default {
  name: "UserItem",
  components: {
    FilledButton,
    OutlineButton,
    DeleteUserConfirmationModal,
    EditUserModal,
    SuccessDeleteModal
  },
  data() {
    return {
      isDeleteModalVisible: false,
      isDeleteSuccessModalVisible: false,
      isEditModalVisible: false,
      image: String,
      data: String,
    };
  },
  props: {
    id: Number,
    fname: String,
    lname: String,
    handle: String,
    email: String,
    user_type: String,
  },
  emits: ["reload"],
  methods: {
    loadImages() {
      axios.get("/user/image/" + this.id).then((res) => {
        if (res.status == 200) {
          this.data.image = res.data?.image;
        } else {
          console.log("Failed to get images");
        }
      });
    },
    showEditModal() {
      this.isEditModalVisible = true;
    },
    closeEditModal() {
      this.isEditModalVisible = false;
    },
    showDeleteModal() {
      this.isDeleteModalVisible = true;
    },
    closeDeleteModal() {
      this.isDeleteModalVisible = false;
    },
    closeDeleteSuccesModal() {
      this.isDeleteSuccessModalVisible = false;
    },
    showDeleteSuccesModal() {
      this.isDeleteSuccessModalVisible = true;
    },
    deleteUser() {
      axios.patch(`users/delete/${this.id}`).then((res) => {
        if (res.status == 200) {
          this.closeDeleteModal();
          this.showDeleteSuccesModal();
          setTimeout(() => {
            this.closeDeleteSuccesModal();
            this.$emit("reload");
          }, 1500);
        }
      });
    },
  },
  mounted() {
    this.loadImages();
  },
};
</script>

<style lang="postcss" scoped></style>
