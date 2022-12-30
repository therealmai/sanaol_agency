<template>

  <div class="flex flex-col content-center w-[440px] space-y-2 cursor-pointer" >
    
    <!-- Image -->
    <div class="bg-lightgray w-full h-[317.35px] border rounded-[8px]">
      <img :src="image" alt=""/>
    </div>
        
    <span class="font-bold leading-none text-[24px] text-primary pt-4" :class="
      hover != undefined ? `hover:bg-${hover}` : 'hover:bg-primaryHovered'
    ">
          {{ title }}
        </span>
        <!-- description -->
        <p class="font-mediem leading-none text-[16px] text-secondary w-full">
          {{ content }}
        </p>
  </div>
  <!-- </div> -->

</template>

<script>


export default {
  name: 'NewsCard',
  components: {
  },
  props: {
    title: {
      type: String,
      default: 'Lorem ipsum dolor sit amet'
    },
    content: {
      type: String,
      default: 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo'
    },
    image: {
      type: String,
      default: 'https://via.placeholder.com/880x495.png/0088aa?text=incidunt'
    },
    hover: String
  },
  computed: {
  },
};
</script>

<style>
</style>
