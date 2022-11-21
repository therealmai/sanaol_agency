<template>

  <div class="flex justify-center gap-10">
    <div class="bg-lightgray w-[387.77px] h-[221.47px] border rounded-[8px]"></div>
    
    <div class=" w-[700px] h-[221.47px] flex flex-col justify-center items-start p-4">
        <!-- label -->
        <Label class="" :fontSize="16" :height="33" :width="102" text="EVENTS"></Label>
        <!-- subtitle -->
        <span class="font-bold text-[30px] text-primary pt-4">
          Lorem ipsum dolor sit amet
        </span>
        <!-- details -->
        <p class="font-medium text-[16px] text-detailText pt-0">
          <span>November 15, 2022</span> | <span>University of San Carlos - Talamban Campus</span>
        </p>
        <!-- description -->
        <p class="font-normal leading-normal text-[16px] text-secondary pt-0">
          Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        </p>
    </div>
  </div>

</template>

<script>
import Label from '../../Label/Label.vue';

export default {
  name: 'EventCard',
  components: {
    Label,
  },
};
</script>

<style>
</style>
