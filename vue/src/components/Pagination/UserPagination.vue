<template>
    <div class="w-full">
      <div class="flex justify-between py-4 pl-8 bg-white">
        <span class="w-1/4 font-bold text-textInput">USER</span>
        <span class="w-1/4 font-bold text-textInput">EMAIL</span>
        <span class="w-1/4 font-bold text-textInput">ROLE</span>
        <span class="w-1/4 font-bold text-textInput">ACTIONS</span>
      </div>
  
      <UserItem :key="user.id" v-for="user in n"
        :id="user.id"
        :image="user.image"
        :fname="user.fname"
        :lname="user.lname"
        :handle="user.handle"
        :email="user.email"
        :user_type="user.user_type"
      />
      <div class="flex justify-center w-full mt-6">
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
        n:[1,2,3,4,5],
        User:{},
      }
    },
    methods: {
      loadUsers(){
          axiosClient.get("/user").then(({ data }) => (this.user = data.data));
      }
  },
  created() {
    this.loadUsers();
  }
  };
  
  </script>
  
  <style lang="postcss" scoped>
  </style>