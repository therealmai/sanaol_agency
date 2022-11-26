<template>

  <div class="flex flex-col justify-center items-start w-[634.81px] space-y-2">
    
    <!-- Image -->
    <div class="bg-lightgray w-full h-[406.18px] border rounded-[8px]"></div>
        <span class="font-bold text-[28px] text-primary pt-4">
          {{ text }}
        </span>
        <!-- description -->
        <p class="font-mediem leading-none text-[16px] text-secondary w-full">
          Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        </p>
        <FilledButton class="w-[176px]" text="LEARN MORE"/>
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
    text: String,
  },
  computed: {
  },
};
</script>

<style>
</style>
