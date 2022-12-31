<template>
  <div class="flex-col">
    <!-- <div class="w-full object-cover h-screen lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div> -->

  <!-- Hero Banner -->
    <Carousel
    :herobanners="hero"
    :role="userType"
    />

  <!-- Events -->
  <div class="flex flex-row flex-wrap gap-4 justify-center ml-28 mt-16">
    <CardCarousel v-if="!isLoading.events"
    :events="events"
    :role="userType"
    />
  </div>
  <Divider></Divider>

  <!-- Services -->
  <div class="flex flex-row flex-wrap gap-16 justify-center ml-20 mr-20 mt-14 ">
    <ServiceCard v-for="service in services" v-if="!isLoading.services"
    :key="service.id"
    :title="service.title"
    :content="service.content"
    :image="service.image"/>
    <Divider></Divider>
  </div>

  <!-- News -->
  <div class="btn-edit" v-if="userType == 'admin'">
      <router-link :to="'/hero/edit/prev/news'"><FilledButton text="Edit Previous News" class="w-[220px]" color="white"></FilledButton></router-link>
  </div>
  <div class="flex flex-col flex-wrap gap-4 items-center mx-16 mt-16">
    <Label text="NEWS AND ARTICLES" :fontSize="16" :height="29" :width="252" :padding="2" :margin="16"></Label>

    <div id="section-news" class="flex flex-row flex-wrap gap-10 justify-center">
      <NewsCard  v-for="news in news" v-if="!isLoading.news"
      :key="news.id"
      :id="news.id"
      :title="news.title"
      :content="news.content"
      :image="news.image"
      hover="lightgray"/>
    </div>
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
import { computed, toRaw } from 'vue';
import { useStore } from 'vuex';


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
  setup() {
    const store = useStore();

    return {
      user: computed(() => store.state.user.data)
    }
  },
  methods: {
    getHeroBanner() {
      axios.get('herobanner')
      .then((res) => {
        this.hero = res.data.slice(0,3); // only 3 herobanners to display
        this.isLoading.hero = false;
        this.hero = this.__prependImages(this.hero);
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getServices() {
      axios.get('services')
      .then((res) => {
        this.services = res.data.slice(0,2); // only 2 services to display
        this.isLoading.services = false;
        this.services = this.__prependImages(this.services);
        // console.log(this.services)
      })
      .then(() => {
        this.isLoading.events = false;
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getEvents() {
      axios.get('preview/featured-events')
      .then((res) => {
        this.events = res.data;
        console.log(this.events)
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getNews() {
      axios.get('preview/featured-news')
      .then((res) => {
        this.news = res.data;
      })
      .finally(() => {
        this.isLoading.news = false;
      })
      .catch((err) => {
        console.log(err);
      })
    },
    __prependImages(arr) {
      let result = arr.slice();
      for(var obj of result) {
        let prot = obj.image.slice(0, 4);
        let base = prot === "http" ? '' : '/src/images/';
        obj.image = base + obj.image;
      }
      return result;
    }
  },
  created() {
    this.userType = this.user != null ? this.user['user_type'] : null;
    this.getHeroBanner();
    this.getServices();
    this.getEvents();
    this.getNews();
  },
  data() {
    return {
      hero: [],
      services: [],
      events: [],
      news: [],
      isLoading: {
        hero: true,
        services: true,
        events: true,
        news: true
      },
      userType: ''
    }
  }
}

</script>

  <style>
  </style>

