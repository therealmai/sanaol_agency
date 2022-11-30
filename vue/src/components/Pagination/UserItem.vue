<template>
    <div class="flex min-w-max justify-between gap-x-2 py-1 px-8 bg-white border-t border-divider text-[#696969]">
      <div class="w-3/12 min-w-max grid grid-cols-4 grid-rows-4">
        <div class=" text-base col-span-2 row-span-4">Image</div>
        <div class=" text-base col-span-2 row-span-2">JohnDoe</div>
        <div class=" text-base col-span-2 row-span-2">@jonny</div>
      </div>
      <span class="w-4/12 min-w-max text-base ">gwaposijade@gmail.com</span>
      <span class="w-2/12 min-w-max text-base ">Admin</span>
      <span class="w-3/12 min-w-max text-base grid grid-cols-2  gap-x-2">
        <FilledButton :fontSize="16" :height="31" :width="84" text="EDIT" />
        <OutlineButton :fontSize="16" :height="31" :width="84" text="DELETE" />
      </span>
    </div>
  </template>
  
  <script>
  import FilledButton from '../Buttons/FilledButton.vue';
  import OutlineButton from '../Buttons/OutlineButton.vue';
  export default {
    name: "UserItem",
    components: { FilledButton, OutlineButton },
    props: ['id','image','fname','lname','handle','email','user_type']
  };
  </script>
  
  <style lang="postcss" scoped>
  </style>