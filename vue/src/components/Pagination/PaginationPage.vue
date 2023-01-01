<template>
    <div
      class="
        text-[20px]
        flex
        items-center
        justify-center
        w-[38px]
        uppercase
        font-bold
        hover:cursor-pointer
        rounded-[50%]
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