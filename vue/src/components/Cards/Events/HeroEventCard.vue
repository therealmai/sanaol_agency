<template>

  <div class="flex gap-10">
    <div class="bg-lightgray w-[387.77px] h-[221.47px] border rounded-[8px]">
      <img :src="image" alt=""/>
    </div>
    <div class="w-[1000px]">
      <div class="w-[800px] h-[221.47px] flex flex-col items-start p-2">
          <!-- label -->
          <Label class="" :fontSize="16" :height="33" :width="102" text="EVENTS" @click="navigate"></Label>
          <!-- subtitle -->
          <span class="font-bold text-[30px] text-primary pt-4" style="max-width:713px">
            {{ title }}
          </span>
          <!-- details -->
          <p class="font-medium text-[16px] text-detailText pt-0">
            <span>{{ date }}</span> | <span>{{ location }}</span>
          </p>
          <!-- description -->
          <p class="font-normal leading-normal text-[16px] text-secondary pt-0" style="overflow: hidden; text-overflow: ellipsis;max-width: 700px; white-space: nowrap;">
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
    },
    content: {
      type: String,
      },
    date: {
      type: String,
      },
    location: {
      type: String,
      },
    image: {
      type: String,
      },
    id: String,
  },
  methods : {
    navigate() {
      this.$router.push('/events');
    },
  }
};
</script>

<style>
</style>
