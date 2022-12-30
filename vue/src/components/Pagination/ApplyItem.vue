<template>
  <div
    class="flex min-w-max justify-between gap-x-2 py-1 px-8 bg-white border-t border-divider"
  >
    <div class="w-3/12 min-w-max grid grid-cols-4 grid-rows-4">
      <div class="text-[#696969] col-span-2 row-span-4">Image</div>
      <div class="text-[#696969] col-span-2 row-span-2">
        {{ fname }} {{ lname }}
      </div>
      <div class="text-[#696969] col-span-2 row-span-2">{{ handle }}</div>
    </div>
    <span class="w-4/12 min-w-max text-[#696969]">{{ email }}</span>
    <span class="w-2/12 min-w-max text-[#696969]">{{ user_type }}</span>
    <span
      class="flex flex-row justify-center flex-nowrap text-[#696969] gap-x-2"
    >
      <FilledButton
        class="w-[100px]"
        text="APPROVE"
        @click="showApproveModal"
      />
      <OutlineButton class="w-[100px]" text="DENY" @click="showDenyModal" />
    </span>
  </div>
  <ApproveApplicationModal
    v-show="isApproveModalVisible"
    @close="closeApproveModal"
    @confirm="approve"
  />
  <ApprovedModal v-show="isApprovedModal" />
  <DenyApplicationModal
    v-show="isDenyModalVisible"
    @close="closeDenyModal"
    @confirm="deny"
  />
  <DeniedModal  v-show="isDeniedModal"/>
</template>

<script>
import FilledButton from "../Buttons/FilledButton.vue";
import OutlineButton from "../Buttons/OutlineButton.vue";
import axiosClient from "../../axios";
import ApproveApplicationModal from "../Modal/UserManageModals/ApproveApplicationModal.vue";
import ApprovedModal from "../Modal/UserManageModals/ApprovedModal.vue";
import DenyApplicationModal from "../Modal/UserManageModals/DenyApplicationModal.vue";
import DeniedModal from "../Modal/UserManageModals/DeniedModal.vue";

export default {
  name: "ApplyItem",
  components: {
    FilledButton,
    OutlineButton,
    ApproveApplicationModal,
    ApprovedModal,
    DenyApplicationModal,
    DeniedModal,
  },
  data() {
    return {
      isApproveModalVisible: false,
      isApprovedModal: false,
      isDenyModalVisible: false,
      isDeniedModal: false,
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

  emits: ["close", "confirm"],
  methods: {
    approve() {
      axiosClient.patch(`users/approve/${this.id}`).then((res) => {
        this.isApproveModalVisible = false;
        this.isApprovedModal = true;
        setTimeout(() => {
          this.isApprovedModal = false;
          this.$emit("reload")
          // this.$router.go();
        }, 3000);
      });
    },
    deny() {
      axiosClient.patch(`users/delete/${this.id}`).then((res) => {
        this.isDenyModalVisible = false;
        this.isDeniedModal = true;
        setTimeout(() => {
          this.isDeniedMModal = false;
          // this.$router.go();
          this.$emit("reload")
        }, 3000);
      });
    },
    showDenyModal() {
      this.isDenyModalVisible = true;
    },
    closeDenyModal() {
      this.isDenyModalVisible = false;
    },
    showApproveModal() {
      this.isApproveModalVisible = true;
    },
    closeApproveModal() {
      this.isApproveModalVisible = false;
    },
  },
};
</script>

<style lang="postcss" scoped></style>
