<template>
  <div class="font-inter flex flex-col space-y-4">

      <div class="">
        <OutBtn text="BACK" class="w-[100px] ml-[44px] mt-[31.79px]"></OutBtn>
      </div>

      <div class="flex flex-row items-center justify-between ml-[12.5%] mr-[12.5%] mb-[25px]">
          <div class="font-bold text-[32px] mb-[8px] text-[#525252]"> News </div>

          <!-- SHOW ONLY IF THE ACCOUNT IS ADMIN -->
          <div class="flex flex-row gap-4 right-[314.44px]" v-if="isAdmin">
            <OutBtn text="DELETE" class="w-[123px]" @click="showModal"></OutBtn>
            <router-link :to="'/news/update/'+ id"><FilledBtn text="EDIT" class="w-[93px]"></FilledBtn></router-link>
          </div>
      </div>

      <div class="text-center mx-[20%] flex flex-col justify-center items-center">
          <img class="w-[770px]" :src="news.image"/>
          <div class="text-[32px] font-bold text-secondary"> {{news.title}} </div>
          <div class="text-[#989898] text-[20px] font-extralight"> {{ months[new Date(news.created_at).getMonth()-1]+' '+new Date(news.created_at).getDate()+', '+new Date(news.created_at).getFullYear() }} </div>
          <p class="text-justify max-w-[880px] mb-[50px] mt-[20px] text-secondary">
              {{news.content}}
          </p>
      </div>

  </div>
</template>

<script>
import Navbar from '../components/Navigation/Navbar.vue';
import FilledBtn from '../components/Buttons/FilledButton.vue';
import OutBtn from '../components/Buttons/OutlineButton.vue';

import axios from 'axios'

export default {
  name: 'News',
  data () {
    return {
      news: {
        title: 'Loading...',
        content: 'Loading...',
        image: 'https://www.solidbackgrounds.com/images/3840x2160/3840x2160-dark-gray-solid-color-background.jpg',
        created_at: 'January 01, 1700'
      },
      months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      isAdmin: true,
      isModalVisible: false,
      id: this.$route.params.id,
    }
  },
  mounted() {
    axios.get('http://127.0.0.1:8000/api/news/'+this.$route.params.id).then(
      (response) => {
        this.news = response.data.data
      }
    )
  },
  components: {
      FilledBtn,
      OutBtn,
      Navbar
  },
  computed: {

  },
  methods: {
    showModal() {
      this.isModalVisible = true;
    },
    closeModal() {
      this.isModalVisible = false;
    },
  }
};
</script>

<style>
</style>
