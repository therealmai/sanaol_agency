<template>
    <div class="w-full min-w-fit justify-between">
      <div class="flex py-4 px-8 bg-white">
        <span class="w-3/12 text-lg font-bold text-[#393540]">USER</span>
        <span class="w-4/12 text-lg font-bold text-[#393540]">EMAIL</span>
        <span class="w-2/12 text-lg font-bold text-[#393540]">ROLE</span>
        <span class="w-3/12 text-lg font-bold text-[#393540]">ACTIONS</span>
      </div>
  
      <ApplyItem :key="user.id" v-for="user in n"
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
  import ApplyItem from "./ApplyItem.vue";
  export default {
    name: "ApplyPagination",
    components: { ApplyItem, PaginationController },
    data() {
      return {
        n:[1,2,3,4,5,6,7,8],
        user:{},
      }
    },
    methods: {
      loadUsers(){
          axiosClient.get("/user").then(({ data }) => (this.user = data));
      }
  },
  created() {
    this.loadUsers();
  }
  };
  
  </script>
  
  <style lang="postcss" scoped>
  </style>