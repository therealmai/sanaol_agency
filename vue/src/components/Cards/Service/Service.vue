
<template>
    <div>
        <div class="flex items-center justify-between ml-[15%] mr-[20%] mt-[25px] mb-[25px]">
            <div class="text-[20px] font-bold mb-[8px]"> {{ title }} </div>
             <!-- SHOW ONLY IF THE ACCOUNT IS ADMIN -->
            <div class="flex w-fit">
                <FilledButton text="Edit Section" class="w-[186px]"></FilledButton>
            </div>
        </div>

        <div class="text-center mx-[20%] bg-[#D9D9D9]">
            <!-- use {{ image }} for img src given the filepath -->
            <img :src="image" alt="">
        </div>

        <p class="text-justify my-[10px] mx-[20%]">
            {{ content }}
        </p>
    </div>
  
  </template>
  
  <script>
  import FilledButton from '../../Buttons/FilledButton.vue';
  export default {
    name: 'Service',
    components: {
        FilledButton
    },
    props: {
        title: String,
        content: String,
        image: String
    },
    computed: {
    },
  };
  </script>
  
  <style>
  </style>
  