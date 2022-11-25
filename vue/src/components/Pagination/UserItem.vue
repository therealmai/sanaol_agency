<template>
    <div class="flex w-full py-4 pl-8 bg-white border-t border-divider">
      <span class="w-1/4 text-[#696969] text-textInput">{{image}} {{fname}} {{lname}} {{handle}}</span>
      <span class="w-1/4 text-[#696969] text-textInput">{{email}}</span>
      <span class="w-1/4 text-[#696969] text-textInput">{{user_type}}</span>
      <span class="w-1/4 grid grid-cols-2 text-[#696969] text-textInput gap-x-4">
        <LearnButton :fontSize="16" :height="31" :width="84" text="EDIT" />
        <DeleteButton :fontSize="16" :height="31" :width="84" text="DELETE" />
      </span>
    </div>
  </template>
  
  <script>
  import LearnButton from '../Buttons/LearnButton.vue';
  import DeleteButton from '../Buttons/DeleteButton.vue';
  export default {
    name: "UserItem",
    components: { LearnButton, DeleteButton },
    props: ['id','image','fname','lname','handle','email','user_type']
  };
  </script>
  
  <style lang="postcss" scoped>
  </style>