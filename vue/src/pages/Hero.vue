<template>
  <div class="flex-col">
    <!-- <div class="w-full object-cover h-screen lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div> -->
    <Carousel v-if="!isLoading.hero"
    :images="hero.images"
    :header="getHeader"
    :subheader="getSubheader"/>
    <div v-else>Insert loading overlay here</div>
  <!-- Service Container -->
  <div class="flex flex-row flex-wrap gap-4 justify-center ml-28 mt-16">
    <CardCarousel v-if="!isLoading.events"
    :events="events"
    :preview="hero.preview_events"/>
    <div v-else>Insert loading overlay here</div>
  </div>
  <Divider></Divider>
  
  <div v-if="!isLoading.services"  class="flex flex-row flex-wrap gap-16 justify-center ml-20 mr-20 mt-14 ">
    <ServiceCard v-for="index in 2"
    :key="index"
    :title="services[index].title"
    :content="services[index].content"
    :image="services[index].image"/>
    <Divider></Divider>
  </div>
  <div v-else>Insert loading overlay here</div>

  <div class="flex flex-col flex-wrap gap-4 items-center mx-16 mt-16">
    <Label text="NEWS AND ARTICLES" :fontSize="16" :height="29" :width="252" :padding="2" :margin="16"></Label>
    <div  v-if="!isLoading.news" class="flex flex-row flex-wrap gap-10 justify-center">
      <!-- for v-for it should be v-for="index in hero.preview_news" during production -->
      <NewsCard  v-for="index in 3"
      :key="index"
      :title="news[index].title"
      :content="news[index].content"
      :image="news[index].image"
      hover="lightgray"/>
    </div>
    <div v-else>Insert loading overlay here</div>
    <Divider></Divider>
  </div>
  
</div>
</template>


<script>
import FilledButton from '../components/Buttons/FilledButton.vue';
import Navbar from '../components/Navigation/Navbar.vue';
import EventCard from '../components/Cards/Events/EventCard.vue';
import ServiceCard from '../components/Cards/Service/ServiceCard.vue';
import NewsCard from '../components/Cards/News/NewsCard.vue';
import Divider from '../components/Divider/Divider.vue';
import Label from '../components/Label/Label.vue';
import Carousel from '../components/HeroBanner/Carousel.vue';
import CardCarousel from '../components/HeroBanner/CardCarousel.vue';
import axios from '../axios';
import store from '../store';
export default{
  components: {
    FilledButton,
    Navbar,
    EventCard,
    ServiceCard,
    NewsCard,
    Divider,
    Label,
    Carousel,
    CardCarousel
  },
  data() {
    return {
      hero: {},
      services: [],
      events: [],
      news: [],
      isLoading: {
        hero: true,
        services: true,
        events: true,
        news: true
      }
    }
  },
  methods: {
    getHeroBanner() {
      const params = 1; // sample params for herobanner
      axios.get('herobanner/'+params)
      .then((res) => {
        this.hero = res.data.data;
        return axios.get('herobanner/image/'+this.hero.id)
      })
      .then((res) => {
        this.hero['images'] = res.data.data;
        this.isLoading.hero = false;
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getServices() {
      axios.get('services')
      .then((res) => {
        this.services = res.data;
        this.isLoading.services = false;
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getEvents() {
      axios.get('events')
      .then((res) => {
        this.events = res.data;
        this.isLoading.events = false;
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getNews() {
      axios.get('news')
      .then((res) => {
        this.news = res.data;
        this.isLoading.news = false;
      })
      .catch((err) => {
        console.log(err);
      })
    },

  },
  computed: {
    getHeader() {
      return store.state.user !== null ? this.hero.header_gen : this.hero.header_tal;
    },
    getSubheader() {
      return store.state.user !== null ? this.hero.subheader_gen : this.hero.subheader_tal;
    }
  },
  mounted() {
    this.getHeroBanner();
    this.getServices();
    this.getEvents();
    this.getNews();
  }
}
</script>

<style>
</style>

