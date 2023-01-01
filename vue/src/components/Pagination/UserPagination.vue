<template>

  <div class="w-full min-w-fit justify-between">
    <div class="flex py-4 px-8 bg-white">
      <span class="w-3/12 text-lg font-bold text-[#393540]">USER</span>
      <span class="w-4/12 text-lg font-bold text-[#393540]">EMAIL</span>
      <span class="w-2/12 text-lg font-bold text-[#393540]">ROLE</span>
      <span class="w-3/12 text-lg font-bold text-[#393540]">ACTIONS</span>
    </div>

    <UserItem
      :key="users.id"
      v-for="users in users"
      :id="users.id"
      :fname="users.fname"
      :lname="users.lname"
      :handle="users.insta_handle"
      :email="users.email"
      :user_type="users.user_type"
      @reload="loadUsers"
    />
    <div class="flex justify-center w-full mt-6">
      <PaginationController :pages="5" />
    </div>
  </div>
</template>


    <div class="w-full min-w-fit justify-between">
      <div class="flex py-4 px-8 bg-white">
        <span class="w-3/12 text-lg font-bold text-[#393540]">USER</span>
        <span class="w-4/12 text-lg font-bold text-[#393540]">EMAIL</span>
        <span class="w-2/12 text-lg font-bold text-[#393540]">ROLE</span>
        <span class="w-3/12 text-lg font-bold text-[#393540]">ACTIONS</span>
      </div>
      <UserItem :key="users.id" v-for="users in user"
        :id="users.id"
        :fname="users.fname"
        :lname="users.lname"
        :handle="users.insta_handle"
        :email="users.email"
        :user_type="users.user_type"
      />
      <!-- <div class="flex justify-center w-full mt-6">
        <PaginationController :pages="5" />
      </div> -->
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
        user:[],
      }
    },
    methods: {
      loadUsers(){
          axiosClient.get("/users/currentUsers").then(({ data }) => (this.user = data));
      },

  },
  mounted() {
    this.loadUsers();
  },
};
</script>

<style lang="postcss" scoped></style>
