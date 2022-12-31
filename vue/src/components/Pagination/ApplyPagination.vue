<template>
  <div class="w-full min-w-fit">
    <div class="flex py-4 px-8 bg-white">
      <span class="w-3/12 min-w-max text-lg font-bold text-[#393540]"
        >USER</span
      >
      <span class="w-4/12 min-w-max text-lg font-bold text-[#393540]"
        >EMAIL</span
      >
      <span class="w-2/12 min-w-max text-lg font-bold text-[#393540]"
        >ROLE</span
      >
      <span class="w-3/12 min-w-max text-lg font-bold text-[#393540]"
        >ACTIONS</span
      >
    </div>

    <template v-for="user in users">
      <ApplyItem
        :key="user.id"
        v-if="!user.is_member"
        :id="user.id"
        :fname="user.fname"
        :lname="user.lname"
        :handle="user.insta_handle"
        :email="user.email"
        :user_type="user.user_type"
        @reload="loadUsers"
      />
    </template>

    <!-- <div class="flex justify-center w-full my-6">
        <PaginationController :pages="3" />
      </div> -->
  </div>
</template>

<script>
import axiosClient from "../../axios";
import PaginationController from "./PaginationController.vue";
import ApplyItem from "./ApplyItem.vue";
export default {
  name: "ApplyPagination",
  components: { ApplyItem, PaginationController },
  data() {
    return {
      users: [],
      isApproveModalVisible: false,
      isDenyModalVisible: false,
    };
  },
  methods: {
    loadUsers() {
      axiosClient.get("/users").then(({ data }) => {
        this.users = data;
        console.log(data);
      });
    },
  },
  mounted() {
    this.loadUsers();
  },
};
</script>

<style lang="postcss" scoped></style>

