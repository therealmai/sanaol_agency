<template>
  <div class="font-inter flex flex-col space-y-4">
    <div class="font-inter flex flex-col space-y-4" v-show="!news.is_deleted">
      <div class="">
        <OutBtn text="BACK" class="w-[95px] ml-[44px] mt-[31.79px]" @click="$router.back()"></OutBtn>
      </div>

      <div class="flex flex-row items-center justify-between ml-[12.5%] mr-[12.5%] mb-[25px]">
          <div class="font-bold text-[32px] mb-[8px] text-[#525252]"> News </div>

          <!-- SHOW ONLY IF THE ACCOUNT IS ADMIN -->
          <div class="flex flex-row gap-4 right-[314.44px]" v-if="isAdmin">
            <OutBtn text="DELETE" class="w-[123px]" @click="showModal"></OutBtn>
            <router-link :to="'/news/edit/'+ id"><FilledBtn text="EDIT" class="w-[93px]"></FilledBtn></router-link>
          </div>
      </div>

      <div class="text-center mx-[20%] flex flex-col justify-center items-center">
          <img class="w-[770px]" :src="rootImgPath+this.news.image" alt=""/>
          <div class="text-[32px] font-bold text-secondary"> {{news.title}} </div>
          <div class="text-[#989898] text-[20px] font-extralight"> {{ months[new Date(news.created_at).getMonth()-1]+' '+new Date(news.created_at).getDate()+', '+new Date(news.created_at).getFullYear() }} </div>
          <p class="text-justify max-w-[880px] mb-[50px] mt-[20px] text-secondary">
              {{news.content}}
          </p>
      </div>
      <Modal v-show="isModalVisible" @close="closeModal"></Modal>
    </div>
    <div class="font-inter flex flex-col space-y-4" v-show="news.is_deleted">
      <h1>News Not Found!</h1>
    </div>
  </div>
  
</template>

<script>
import Navbar from '../components/Navigation/Navbar.vue';
import FilledBtn from '../components/Buttons/FilledButton.vue';
import OutBtn from '../components/Buttons/OutlineButton.vue';

import axios from '../axios'

export default {
  name: 'News',
  data () {
    
    return {
      news: {},
      months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      isAdmin: true,
      isModalVisible: false,
      id: this.$route.params.id,
      rootImgPath: '',
    }
  },
  mounted() {
    axios.get('news/'+this.$route.params.id).then(
      (response) => {
        this.news = response.data.data
        let prot = this.news.image.slice(0, 4);
        this.rootImgPath = prot === "http" ? '' : '/src/images/'
        console.log()
      }
    )
  },
  components: {
      FilledBtn,
      OutBtn,
      Navbar
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
