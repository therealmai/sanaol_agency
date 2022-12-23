<template>
  <div class="font-inter flex flex-col space-y-4">
    <div class="">
      <OutBtn text="BACK" class="w-[95px] ml-[44px] mt-[31.79px]" @click="$router.back()"></OutBtn>
    </div>
    <div class="font-inter flex flex-col space-y-4" v-show="!news.is_deleted">
      <div class="flex flex-row items-center justify-between ml-[12.5%] mr-[12.5%] mb-[25px]">
          <div class="font-bold text-[32px] mb-[8px] text-[#525252]"> News </div>

          <!-- SHOW ONLY IF THE ACCOUNT IS ADMIN -->
          <div class="flex flex-row gap-4 right-[314.44px]" v-show="userType == 'admin'">
            <OutBtn text="DELETE" class="w-[123px]" @click="showModal"></OutBtn>
            <FilledBtn text="EDIT" class="w-[93px]" @click="this.$router.push('/news/edit/'+id)"></FilledBtn>
          </div>
      </div>

      <div class="text-center mx-[20%] flex flex-col justify-center items-center">
          <img class="w-[660px] aspect-[880/495]" style="" :src="news.image"/>
          <div class="text-[32px] font-bold text-secondary"> {{news.title}} </div>
          <div class="text-[#989898] text-[20px] font-extralight"> {{months[new Date(news.created_at).getMonth()]+' '+new Date(news.created_at).getDate()+', '+new Date(news.created_at).getFullYear()}} </div>
          <p class="text-justify max-w-[880px] mb-[50px] mt-[20px] text-secondary">
              {{news.content}}
          </p>
      </div>
      <Modal v-show="isModalVisible" @close="closeModal"></Modal>
    </div>
    <div class="font-inter flex flex-col space-y-4 items-center" v-show="news.is_deleted">
      <div class="items-center">
      <center><h1>Error 404!</h1>
      <h1>The news article you have been looking for seems to</h1>
      <h1>have been deleted or moved to another location.</h1>
      <br /><br />
      <h1>Please go back!</h1></center>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from '../components/Navigation/Navbar.vue';
import FilledBtn from '../components/Buttons/FilledButton.vue';
import OutBtn from '../components/Buttons/OutlineButton.vue';

import Modal from '../components/Modal/News Modals/DeleteNews.vue'

import axios from '../axios';

import { useStore } from 'vuex'
import { computed } from 'vue'

export default {
  name: 'News',
  data () {
    return {
      news: {
        title: 'Loading...',
        content: 'Loading...',
        image: 'https://www.macmillandictionary.com/us/external/slideshow/full/Grey_full.png',
        created_at: 'January 1, 2000'
      },
      months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      isAdmin: true,
      isModalVisible: false,
      id: this.$route.params.id,
      userType: ''
    }
  },
  mounted() {
    axios.get('http://127.0.0.1:8000/api/news/'+this.$route.params.id).then((response) => {
      this.news = response.data.data
    }).catch((err) => {
      console.log(err)
    })
    this.userType = this.user['user_type']
    console.log(this.userType);
  },
  components: {
      FilledBtn,
      OutBtn,
      Modal
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
  },
  setup() {
    const store = useStore();

    return {
      user: computed(() => store.state.user.data),
    }
  },
};
</script>

<style>
</style>
