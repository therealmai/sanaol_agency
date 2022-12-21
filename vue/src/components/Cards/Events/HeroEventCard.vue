<template>

  <div class="flex gap-10">
    <div class="bg-lightgray w-[387.77px] h-[221.47px] border rounded-[8px]">
      <img :src="image" alt=""/>
    </div>
    <div class="w-[1000px]">
      
    
      <div class="w-[800px] h-[221.47px] flex flex-col items-start p-2">
          <!-- label -->
          <Label class="" :fontSize="16" :height="33" :width="102" text="EVENTS"></Label>
          <!-- subtitle -->
          <span class="font-bold text-[30px] text-primary pt-4">
            {{ title }}
          </span>
          <!-- details -->
          <p class="font-medium text-[16px] text-detailText pt-0">
            <span>{{ date }}</span> | <span>{{ location }}</span>
          </p>
          <!-- description -->
          <p class="font-normal leading-normal text-[16px] text-secondary pt-0">
            {{ content }}
          </p>
      </div>
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
  props: {
    title: {
      type: String,
      default: 'Lorem ipsum dolor sit amet'
    },
    content: {
      type: String,
      default: 'Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo'
    },
    date: {
      type: String,
      default: 'November 15, 2022'
    },
    location: {
      type: String,
      default: 'University of San Carlos - Talamban Campus'
    },
    image: {
      type: String,
      default: 'https://via.placeholder.com/880x495.png/0088aa?text=incidunt'
    },
  }
};
</script>

<style>
</style>
