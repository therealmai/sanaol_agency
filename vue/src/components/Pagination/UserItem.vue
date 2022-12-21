<template>
    <div class="flex py-1 px-8 bg-white border-t border-divider text-[#696969]">
      <div class="w-3/12 grid grid-cols-6 grid-rows-4">
        <div class=" items-center text-base col-span-1 row-span-4"><img class="mt-2 ml-3 rounded-full w-10 h-10" :src="data.image"/></div>
        <div class="text-[#3a3541] opacity-80 font-bold text-lg col-span-5 row-span-2">{{fname}} {{lname}}</div>
        <div class="text-[#3a3541] opacity-70 font-normal text-base col-span-5 row-span-2">{{handle}}</div>
      </div>
      <span class="text-[#3a3541] opacity-70 w-4/12 font-normal text-base mt-2">{{email}}</span>
      <span class="text-[#3a3541] opacity-70 w-2/12 font-normal text-base capitalize mt-2">{{user_type}}</span>
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
      id: String,
      fname: String,
      lname: String,
      handle: String,
      email: String,
      user_type: String,
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