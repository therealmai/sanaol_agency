<template>
    <div
      class="
        text-[20px]
        flex
        items-center
        justify-center
        w-[38px]
        uppercase
        text-black
        font-bold
        hover:cursor-pointer
      "
      :class="[selected ? 'bg-[#6B6B6B]' : 'bg-white']"
      @click="$emit('updatePage', page)"
    >
      {{ page }}
    </div>
  </template>
  
  <script>
  export default {
    name: "PaginationPage",
    props: {
      page: Number,
      selected: Boolean,
    },
    emits: ["updatePage"],
  };
  </script>
  
  <style lang="postcss" scoped>
  </style>