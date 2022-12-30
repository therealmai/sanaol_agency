<template>

  <div class="flex flex-col justify-center items-start w-[634.81px] space-y-2">
    
    <!-- Image -->
    <div class="bg-lightgray w-full h-[406.18px] border rounded-[8px]">
      <img :src="image" alt=""/>
    </div>
        <span class="font-bold text-[28px] text-primary pt-4">
          {{ title }}
        </span>
        <!-- description -->
        <p class="font-mediem leading-none text-[16px] text-secondary w-full">
          {{ content }}
        </p>
        <FilledButton class="w-[176px]" text="LEARN MORE" />
    </div>
  <!-- </div> -->

</template>

<script>

import FilledButton from '../../Buttons/FilledButton.vue';

export default {
  name: 'ServiceCard',
  components: {
    FilledButton
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
    }
  },
  computed: {
  },
};
</script>

<style>
</style>
