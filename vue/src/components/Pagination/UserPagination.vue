<template>
    <div class="w-full min-w-fit">
      <div class="flex py-4 px-8 bg-white">
        <span class="w-3/12 min-w-max text-lg font-bold text-[#393540]">USER</span>
        <span class="w-4/12 min-w-max text-lg font-bold text-[#393540]">EMAIL</span>
        <span class="w-2/12 min-w-max text-lg font-bold text-[#393540]">ROLE</span>
        <span class="w-3/12 min-w-max text-lg font-bold text-[#393540]">ACTIONS</span>
      </div>
      <template v-for="(user,page) in users.data" >
        <UserItem v-if="users.is_member" :key="page"
          :id="user.id"
          :fname="user.fname"
          :lname="user.lname"
          :handle="user.insta_handle"
          :email="user.email"
          :user_type="user.user_type"
        />
      </template>
      
      <div class="flex justify-center w-full my-6">
        <TailwindPagination :data="users" @pagination-change-page="list"></TailwindPagination>
      </div>
    </div>
  </template>
  
  <script>
  import axiosClient from "../../axios";
  import PaginationController from "./PaginationController.vue";
  import UserItem from "./UserItem.vue";
  import { TailwindPagination } from 'laravel-vue-pagination';
  export default {
    name: "UserPagination",
    components: { UserItem, PaginationController, TailwindPagination },
    data() {
      return {
        users:{
          type:Object,
          default:null
        },
      }
    },
    methods: {
            async list(page=1){
                await axiosClient.get(`api/users/page?page=${page}`).then(({data})=>{
                    this.users = data
                }).catch(({ response })=>{
                    console.error(response)
                })
            }
        },
  mounted() {
    this.list();
  }
  };
  
  </script>
  
  <style lang="postcss" scoped>
  </style>