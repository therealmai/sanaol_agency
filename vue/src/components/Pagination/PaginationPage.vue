<template>
    <div
      class="
        text-[16px]
        flex
        items-center
        justify-center
        w-[28px]
        px-0
        font-bold
        hover:cursor-pointer
        rounded-[15%]
      "
      :class="[selected ? 'bg-primary text-white' : 'bg-white text-secondary']"
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