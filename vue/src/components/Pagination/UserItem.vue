<template>
    <div class="flex min-w-max justify-between gap-x-2 py-1 px-8 bg-white border-t border-divider text-[#696969]">
      <div class="w-3/12 min-w-max grid grid-cols-4 grid-rows-4">
        <div class=" text-base col-span-1 row-span-4"><img width="34px" height="34px" :src="data.image"/></div>
        <div class=" text-base col-span-3 row-span-2">{{fname}} {{lname}}</div>
        <div class=" text-base col-span-3 row-span-2">{{handle}}</div>
      </div>
      <span class="w-4/12 min-w-max text-base ">{{email}}</span>
      <span class="w-2/12 min-w-max text-base ">{{user_type}}</span>
      <span class="flex flex-row justify-center flex-nowrap text-[#696969] gap-x-2">
        <FilledButton class="w-[100px]" text="EDIT" />
        <OutlineButton class="w-[100px]" text="DELETE" />
      </span>
    </div>
  </template>

  <script>
  import axiosClient from "../../axios";
  import FilledButton from '../Buttons/FilledButton.vue';
  import OutlineButton from '../Buttons/OutlineButton.vue';
  export default {
    name: "UserItem",
    components: { FilledButton, OutlineButton },
    data() {
      return {
        data:[],
      }
    },
    props: {
      id: Number,
      fname: String,
      lname: String,
      handle: String,
      email: String,
      user_type: String
    },
    methods: {
      loadImages(){
          axiosClient.get("/user/image/"+this.id).then(({ data }) => (this.data = data.data[0]));
      },
  },
  mounted() {
    this.loadImages();
  }
  };
  </script>

  <style lang="postcss" scoped>
  </style>
