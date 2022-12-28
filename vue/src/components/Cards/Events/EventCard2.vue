<template>

    <div class="flex flex-row gap-10 ml-[100px] space-y-16 justify-center" >
     <img :src="image" alt="" class="w-[500px] rounded-[8px] bg-cover cursor-pointer" @click="this.$router.push('/news/'+id)">

      <div class=" flex flex-col w-[500px] items-start p-4">
          <!-- subtitle -->
          <span class="font-bold text-[30px] text-primary pt-4 cursor-pointer" @click="this.$router.push('/news/'+id)">
            {{ title }}
          </span>
          <!-- details -->
          <p class="font-medium text-[16px] text-detailText pt-0">
            <span>{{ date }}</span> | <span>{{ location }}</span>
          </p>
          <!-- description -->
          <p class="font-normal leading-normal text-[16px] text-secondary pt-0 text-justify">
            {{ content }}
          </p>
        <div v-show="islog==true && usertype=='admin'" class="flex items-center  ml-[60%] gap-[2%] mt-[25px] mb-[25px]" >
            <OutlineButton text="Delete" class="w-[123px]"></OutlineButton>
            <FilledButton text="Edit" class="w-[123px]"></FilledButton>
        </div>
      </div>
     
    </div>
    
  </template>
  
  <script>
  import Label from '../../Label/Label.vue';
  import OutlineButton from '../../Buttons/OutlineButton.vue';
  import FilledButton from '../../Buttons/FilledButton.vue';
  export default {
    name: 'EventCard2',
    components: {
      Label,
      OutlineButton,
      FilledButton,
    },
    props: {
      id: Number,
      title: String,
      author: String,
      content: String,
      date: String,
      location: String,
      image: String,
      islog:Boolean,
      usertype: String
    },
  };
  </script>
  
  <style>
  </style>
  