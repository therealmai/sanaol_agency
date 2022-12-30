<template>
  <div class="w-full min-w-fit justify-between">
    <div class="flex py-4 px-8 bg-white">
      <span class="w-3/12 text-lg font-bold text-[#393540]">USER</span>
      <span class="w-4/12 text-lg font-bold text-[#393540]">EMAIL</span>
      <span class="w-2/12 text-lg font-bold text-[#393540]">ROLE</span>
      <span class="w-3/12 text-lg font-bold text-[#393540]">ACTIONS</span>
    </div>
    <div>"awda"</div>
    <div v-for="user in users">{{user.handle}}</div>

    <ApplyItem
      v-for="user in users"
      :key="user.id"
      :id="user.id"
      :image="user.image"
      :fname="user.fname"
      :lname="user.lname"
      :handle="user.handle"
      :email="user.email"
      :user_type="user.user_type"
    />

    <div>"awda"</div>
    <!-- <div class="flex justify-center w-full mt-6">
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
  components: {
    ApplyItem,
    PaginationController,
  },
  data() {
    return {
      users: {},
    };
  },
  methods: {
    loadUsers() {
      axiosClient.get("/users/applications").then(({ data }) => {
        this.user = data;
        console.log(data)
      });
    },
  },
  created() {
    this.loadUsers();
  },
};
</script>
