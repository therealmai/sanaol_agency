<template>
<div class="grid grid-cols-2 mx-6 my-2 gap-x-5">
  <div class="col-span-1 overflow-auto flex flex-col gap-2 items-start space-y-2">
    <div class="flex justify-between min-w-full items-center ">
      <div class="text-3xl font-sans text-[#525252] font-bold">Current Users</div>
      <div class="justify-self-end"><Search :height="44" :width="100" /></div>
    </div>
    <UserPagination />
  </div>
  <div class="col-span-1 overflow-auto flex flex-col gap-2 items-start space-y-2">
    <div class="flex justify-between min-w-full items-center ">
      <div class="text-3xl font-sans text-[#525252] font-bold">Applications</div>
      <div class="justify-self-end"><Search :height="44" :width="100" /></div>
    </div>
    <ApplyPagination />
  </div>
</div>
  </template>

<script>
import Navbar from '../components/Navigation/Navbar.vue';
import UserPagination from "../components/Pagination/UserPagination.vue";
import ApplyPagination from "../components/Pagination/ApplyPagination.vue";
import Search from "../components/Input/Search.vue";
import Divider from '../components/Divider/Divider.vue';
import Label from '../components/Label/Label.vue';

export default{
  components: {
    Navbar,
    UserPagination,
    ApplyPagination,
    Search,
    Divider,
    Label
  },
}
</script>

<style>
</style>