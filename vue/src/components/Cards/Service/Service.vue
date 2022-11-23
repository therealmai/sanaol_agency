<template>

    <div>
        <div class="flex items-center justify-between" style="margin-left: 15%; margin-right: 20%; margin-top: 25px; margin-bottom: 15px;">
            <div style="font-size: large; margin-bottom: 8px; font-weight: 500;"> {{ title }} </div>
             <!-- SHOW ONLY IF THE ACCOUNT IS ADMIN -->
            <div class="flex w-fit">
                <PrimaryButton text="Edit Section" color="white" width="100" fontSize="12" class="float-right"></PrimaryButton>
            </div>
        </div>

        <div style="background-color: #D9D9D9; text-align:center; margin-left: 20%; margin-right: 20%;">
            <!-- use {{ image }} for img src given the filepath -->
            <img :src="image" alt="">
        </div>
        <p style="text-align: justify; margin-top: 10px;margin-left: 20%; margin-right: 20%; margin-bottom: 10px;">
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
  