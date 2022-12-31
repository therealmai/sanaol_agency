<template>
    
    <div class="flex flex-row gap-10 ml-[100px] space-y-16 justify-center" >
     <img :src="rootImgPath+image" alt="" class="w-[500px] rounded-[8px] bg-cover cursor-pointer" @click="this.$router.push('/news/'+id)">
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
            <router-link :to="'/news/' + id">
            <OutlineButton text="Delete" class="w-[123px]"  @click='deleteNews(), refreshPage()'></OutlineButton>
            </router-link>
            <router-link :to="'/news/edit' + id">
            <FilledButton text="Edit" class="w-[123px]" @click='editNews'></FilledButton>
            </router-link>
        </div>
      </div>
     
    </div>
    
  </template>
  
  <script>
  import OutlineButton from '../../Buttons/OutlineButton.vue';
  import FilledButton from '../../Buttons/FilledButton.vue';

  export default {
    name: 'NewsCard',
    components: {
      OutlineButton,
      FilledButton,

    },
    data () {
      let prot = this.image.slice(0, 4);

      return {
        rootImgPath: prot === "http" ? '' : '/src/images/'
      }
    },
    props: {
      title: String,
      date: Number,
      location: String,
      content: String,
      id: Number,
      image: String,
      author: String,
      islog: String,
      usertype: String,

    },
    methods: {
      refreshPage() {
            location.reload();
        },
        deleteEvent(id) {
      axios.patch(`news/delete/${id}`)
        .then(response => {
          console.log('Nothing to see here');
        })
        .catch(error => {
          console.log(error);
        });
    },
    }
  };
  </script>
  
  <style>
  </style>
  