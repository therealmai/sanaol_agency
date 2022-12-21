<template>

  <div class="flex flex-col justify-center content-center w-[440px] space-y-2 cursor-pointer" >
    
    <!-- Image -->
    <div class="bg-lightgray w-full h-[317.35px] border rounded-[8px]"></div>
        
    <span class="font-bold leading-none text-[24px] text-primary pt-4" :class="
      hover != undefined ? `hover:bg-${hover}` : 'hover:bg-primaryHovered'
    ">
          {{ title }}
        </span>
        <!-- description -->
        <p class="font-mediem leading-none text-[16px] text-secondary w-full">
          Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
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
    title: String,
    hover: String
  },
  computed: {
  },
};
</script>

<style>
</style>
