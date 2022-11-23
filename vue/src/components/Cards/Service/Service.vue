<template>

    <div>
        <div class="flex items-center justify-between ml-[15%] mr-[20%] mt-[25px] mb-[25px]">
            <div style="font-size: large; margin-bottom: 8px; font-weight: 500;"> {{ title }} </div>
             <!-- SHOW ONLY IF THE ACCOUNT IS ADMIN -->
            <div class="flex w-fit">
                <PrimaryButton text="Edit Section" color="white" width="100" fontSize="12" class="float-right"></PrimaryButton>
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
  import PrimaryButton from '../../Buttons/PrimaryButton.vue';
  export default {
    name: 'Service',
    components: {
        PrimaryButton
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
  