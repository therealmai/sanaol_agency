<template>
    <div class="w-full min-w-fit">
      <div class="flex py-4 px-8 bg-white">
        <span class="w-3/12 min-w-max text-lg font-bold text-[#393540]">USER</span>
        <span class="w-4/12 min-w-max text-lg font-bold text-[#393540]">EMAIL</span>
        <span class="w-2/12 min-w-max text-lg font-bold text-[#393540]">ROLE</span>
        <span class="w-3/12 min-w-max text-lg font-bold text-[#393540]">ACTIONS</span>
      </div>
      <template v-for="users in users">
        <UserItem :key="users.id" v-if="users.is_member"
          :id="users.id"
          :fname="users.fname"
          :lname="users.lname"
          :handle="users.insta_handle"
          :email="users.email"
          :user_type="users.user_type"
        />
      </template>

      <div class="flex justify-center w-full my-6">
        <PaginationController :pages="3" />
      </div>
    </div>
  </template>
  
  <script>
  import axiosClient from "../../axios";
  import PaginationController from "./PaginationController.vue";
  import UserItem from "./UserItem.vue";
  export default {
    name: "UserPagination",
    components: { UserItem, PaginationController },
    data() {
      return {
        users:[],
      }
    },
    methods: {
      loadUsers(){
          axiosClient.get("/users").then(({ data }) => (this.users = data));
      }
  },
  mounted() {
    this.loadUsers();
  }
  };
  
  </script>
  
  <style lang="postcss" scoped>
  </style>