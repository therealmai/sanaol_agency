<template>
    <div class="w-full min-w-fit">
      <div class="flex py-4 px-8 bg-white">
        <span class="w-3/12 min-w-max text-lg font-bold text-[#393540]">USER</span>
        <span class="w-4/12 min-w-max text-lg font-bold text-[#393540]">EMAIL</span>
        <span class="w-2/12 min-w-max text-lg font-bold text-[#393540]">ROLE</span>
        <span class="w-3/12 min-w-max text-lg font-bold text-[#393540]">ACTIONS</span>
      </div>
      
        <UserItem v-for="user in members" :key="user.id"
          :id="user.id"
          :fname="user.fname"
          :lname="user.lname"
          :handle="user.insta_handle"
          :email="user.email"
          :user_type="user.user_type"
        />
     
      
      <div class="flex justify-center w-full my-6">
        <VueTailwindPagination
      :current="currentPage"
      :total="total"
      :per-page="perPage"
      @page-changed="onPageClick($event)"
    />
      </div>
    </div>
  </template>
  
  <script>
  import axiosClient from "../../axios";
  import PaginationController from "./PaginationController.vue";
  import UserItem from "./UserItem.vue";
  import VueTailwindPagination from "@ocrv/vue-tailwind-pagination";
  export default {
    name: "UserPagination",
    components: { UserItem, PaginationController, VueTailwindPagination },
    data() {
      return {
        currentPage: 0,
        perPage: 0,
        total: 0,
        users:{
          type:Object,
          default:null
        },
        members:{},
      }
    },
    computed: {
  
},
    methods: {
      checkMember(data) {
    return data.filter(data => data.is_member == true)
  },
            async getData(){
                var response = axiosClient.get(`users/page?page=${this.currentPage}`)
                  var responseData = response;
                  var userData = (await response).data.data;
                  this.currentPage = responseData.current_page;
                  this.perPage = responseData.per_page;
                  this.total = responseData.total;
                  this.members = this.checkMember(userData);
                  console.log(members);
            },
            onPageClick(event){
              this.currentPage = event;
              this.getData(this.currentPage);
            }
            
        },
  mounted() {
    this.currentPage = 1;
    this.getData();
  }
  };
  
  </script>
  
  <style lang="postcss" scoped>
  </style>