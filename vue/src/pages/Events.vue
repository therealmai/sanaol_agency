<template>

<div class="flex flex-col w-full ">
  <div class="mb-10">
    <div class="flex flex-col mt-[76px]">
      <div class="flex flex-row justify-between">
        <h1 class="font-bold text-3xl text-secondary ml-[15%]">Events</h1><br><br><br>
          <router-link v-show="islog==true && usertype == 'admin'" :to="'/events_management'" class=" mr-[13%]">
            <FilledButton text="Edit Events" class="w-[179px]"></FilledButton>
          </router-link>
      </div>
    </div>
    <eventCarousel class="flex justify-center ml-[150px]" :events="events"></eventCarousel>
  </div>
    <div class="flex flex-row justify-between mb-[50px]">
      <h1 class="font-bold text-3xl text-secondary ml-[15%]">News articles</h1>
      <FilledButton v-show="islog==true && usertype == 'admin'"  text="Add Articles" class="w-[179px] mr-[13%]" @click="this.$router.push('/news/create')"></FilledButton>
   </div>

  <div class="flex flex-col space-y-6">
    <div v-for="item in News" :key="item.id">
      <Newscard 
      :id="item.id"
      :title="item.title"
      :author="item.author"
      :content="item.content"
      :date="item.date"
      :location="item.location"
      :image="item.image"
      :islog="islog"
      :usertype="usertype"
      @news_del="getNews"
      >
    </Newscard>
    </div>
  </div>

</div>

</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
import Modal from '../components/Modal/Modal.vue';
import TextInput from '../components/Input/TextInput.vue';
import SearchButton from '../components/Buttons/SearchButton.vue';
import Newscard from '../components/Cards/News/NewsCard.vue';
import EventCard from '../components/Cards/Events/EventCard.vue';
import PaginationButtonVue from '../components/Buttons/PaginationButton.vue';
import OutlineButton from '../components/Buttons/OutlineButton.vue';
import FilledButton from '../components/Buttons/FilledButton.vue';
import eventCarousel from '../components/EventsCarousel/EventCarousel.vue';
import axios from '../axios';

export default{
  data() {
    return {
      islog:'',
      usertype:'',
      News: [],
      events: [],
    }
  },
  components: {
    Navbar,
    Modal,
    TextInput,
    SearchButton,
    Newscard,
    EventCard,
    PaginationButtonVue,
    FilledButton,
    OutlineButton,
    eventCarousel
  },
  methods: {
    getNews() {
      axios.get('/news').then((response)=>{
        this.News = response.data.filter((news) => {
          return news.is_deleted == 0;
        });
      })
    },
    getEvents() {
      axios.get('events').then((res) => {
        this.events = res.data.slice(0,3); // only 3 events to display
      })
      .catch((err) => {
        console.log(err);
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
  created() {
    this.getEvents();
  },
}
</script>
  
<style>



</style>
