<template>

<div class="flex flex-col w-full ">

  <div class="mb-10">
    <div class="flex flex-col mt-[76px]">
      <div class="flex flex-row justify-between">
        <h1 class="font-bold text-3xl text-secondary ml-[15%]">Events</h1>
          <router-link v-show="islog==true && usertype == 'admin'" :to="'/events_management'" class=" mr-[13%]">
            <FilledButton text="Edit Events" class="w-[179px]"></FilledButton>
          </router-link>
      </div>
    </div>
    <CardCarousel class="flex justify-center ml-[150px]"></CardCarousel>
  </div>

    <div class="flex flex-row justify-between mb-[50px]">
      <h1 class="font-bold text-3xl text-secondary ml-[15%]">News articles</h1>
      <FilledButton v-show="islog==true && usertype == 'admin'"  text="Add Articles" class="w-[179px] mr-[13%]"></FilledButton>
   </div>

  <div class="flex flex-col space-y-6">
    <div v-for="item in News" :key="item.id">
      <EventCard2Vue 
      :id="item.id"
      :title="item.title"
      :author="item.author"
      :content="item.content"
      :date="item.date"
      :location="item.location"
      :image="item.image"
      :islog="islog"
      :usertype="usertype">
    </EventCard2Vue>
    </div>
  </div>

  <div class="mt-[20px] mb-[20px]">
    <PaginationButtonVue class="flex flex-col items-center"></PaginationButtonVue>
  </div>
</div>

</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
import Modal from '../components/Modal/Modal.vue';
import TextInput from '../components/Input/TextInput.vue';
import SearchButton from '../components/Buttons/SearchButton.vue';
import EventCard2Vue from '../components/Cards/Events/EventCard2.vue';
import EventCard from '../components/Cards/Events/EventCard.vue';
import PaginationButtonVue from '../components/Buttons/PaginationButton.vue';
import OutlineButton from '../components/Buttons/OutlineButton.vue';
import FilledButton from '../components/Buttons/FilledButton.vue';
import CardCarousel from '../components/HeroBanner/CardCarousel.vue';
import axios from '../axios';

export default{
  data() {
    return {
      islog:'',
      usertype:'',
      News: []
    }
  },
  components: {
    Navbar,
    Modal,
    TextInput,
    SearchButton,
    EventCard2Vue,
    EventCard,
    PaginationButtonVue,
    FilledButton,
    OutlineButton,
    CardCarousel
  },
  methods: {
    getNews() {
      axios.get('/news').then((response)=>{
        this.News = response.data;
        console.log(this.News);
      })
    }
  },
  mounted () {
    this.islog = this.$store.state.isLoggedIn;
    if(this.islog == true){
      this.usertype = this.$store.state.user.data.user_type;
    }
    this.getNews();
  },
}
</script>
  
<style>



</style>
