<template>
<div class="flex grid grid-cols-2 mt-10 mb-14 mr-44 ml-44 gap-x-20">
    <div class="flex flex flex-col gap-2 items-start space-y-2">
    <div class="flex justify-between items-center ">
      <div class="text-3xl font-sans text-[#525252] font-bold">Current Users</div>
      <div class="flex gap-3">
        <Search :height="44" :width="450" />
      </div>
    </div>
    <UserPagination />
  </div>
  <div class="flex flex flex-col gap-2 items-start space-y-2">
    <div class="flex justify-between items-center ">
      <span class="text-3xl font-sans text-[#525252] font-bold">Applications</span>
      <div class="flex items-center gap-5">
        <Search :height="44" :width="450" />
      </div>
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