<template>
<div>
  <div class="flex flex-col">
    <!-- <div class="w-full object-cover h-screen lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div> -->
    <Carousel></Carousel>
  <!-- Service Container -->
  <div class="flex flex-row flex-wrap gap-4 justify-center ml-28 mt-16">
    <CardCarousel></CardCarousel>
  </div>
  <Divider></Divider>
  
  <div class="flex flex-row flex-wrap gap-16 justify-center ml-20 mr-20 mt-14 ">
    <ServiceCard text="Management Team"></ServiceCard>
    <ServiceCard text="Creative Team"></ServiceCard>
    
    <Divider></Divider>
  </div>

  <div class="flex flex-col flex-wrap gap-4 items-center mx-16 mt-16">
    <Label text="NEWS AND ARTICLES" :fontSize="16" :height="29" :width="252" :padding="2" :margin="16"></Label>
    <div class="flex flex-row flex-wrap gap-10 justify-center">
      <NewsCard title="Jastine Guzman emerges as Ms. International Queen 2022" hover="lightgray"></NewsCard>
      <NewsCard title="System bags multiple awards in Asian Content Creation Awards 2021" hover="lightgray"></NewsCard>
      <NewsCard title="Introducing the New Face of System: Kathleen Iza Monzales" hover="lightgray"></NewsCard>
    </div>
    <Divider></Divider>
  </div>
  
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
      news: []
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
      })
      .catch((err) => {
        console.log(err);
      })
    },

    getServices() {
      axios.get('services')
      .then((res) => {
        this.services = res.data;
      })
      .catch((err) => {
        console.log(err);
      })
    },

    getEvents() {
      axios.get('events')
      .then((res) => {
        this.events = res.data;
      })
      .catch((err) => {
        console.log(err);
      })
    },

    getNews() {
      axios.get('news')
      .then((res) => {
        this.news = res.data;
      })
      .catch((err) => {
        console.log(err);
      })
    },

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

