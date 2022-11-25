<template>
    <div class="flex min-w-max justify-between gap-x-2 py-1 px-8 bg-white border-t border-divider ">
      <div class="w-3/12 min-w-max grid grid-cols-4 grid-rows-4">
        <div class="text-[#696969] col-span-2 row-span-4">Image</div>
        <div class="text-[#696969] col-span-2 row-span-2">JohnDoe</div>
        <div class="text-[#696969] col-span-2 row-span-2">@jonny</div>
      </div>
      <span class="w-4/12 min-w-max text-[#696969]">gwaposijade@gmail.com</span>
      <span class="w-2/12 min-w-max text-[#696969]">Application</span>
      <span class="w-3/12 min-w-max grid grid-cols-2 text-[#696969] gap-x-2">
        <LearnButton :fontSize="16" :height="31" :width="84" text="APPROVE" />
        <DeleteButton :fontSize="16" :height="31" :width="84" text="DENY" />
      </span>
    </div>
  </template>
  
  <script>
  import LearnButton from '../Buttons/LearnButton.vue';
  import DeleteButton from '../Buttons/DeleteButton.vue';
  export default {
    name: "ApplyItem",
    components: { LearnButton, DeleteButton },
    props: ['id','image','fname','lname','handle','email','user_type']
  };
  </script>
  
  <style lang="postcss" scoped>
  </style>