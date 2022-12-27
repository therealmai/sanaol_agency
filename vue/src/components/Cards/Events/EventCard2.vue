<template>

    <div class="flex flex-row justify-center gap-10 w-[70%] space-y-10">
      <img class="bg-lightgray w-[50%] rounded-[8px]"/>
      
      <div class=" flex flex-col justify-center  w-[50%] items-start p-4">
          <!-- subtitle -->
          <span class="font-bold text-[30px] text-primary pt-4">
            Lorem ipsum dolor sit amet
          </span>
          <!-- details -->
          <p class="font-medium text-[16px] text-detailText pt-0">
            <span>November 15, 2022</span> | <span>University of San Carlos - Talamban Campus</span>
          </p>
          <!-- description -->
          <p class="font-normal leading-normal text-[16px] text-secondary pt-0 text-justify">
            Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          </p>
        <div class="flex items-center  ml-[60%] gap-[2%] mt-[25px] mb-[25px]" >
            <OutlineButton text="Delete" class="w-[123px]"></OutlineButton>
            <FilledButton text="Edit" class="w-[123px]"></FilledButton>
        </div>
      </div>
     
    </div>
    
  </template>
  
  <script>
  import Label from '../../Label/Label.vue';
  import OutlineButton from '../../Buttons/OutlineButton.vue';
  import FilledButton from '../../Buttons/FilledButton.vue';
  export default {
    name: 'EventCard2',
    components: {
      Label,
      OutlineButton,
      FilledButton,

    },
  };
  </script>
  
  <style>
  </style>
  