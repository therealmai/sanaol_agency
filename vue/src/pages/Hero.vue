<template>
  <div class="flex-col">
    <!-- <div class="w-full object-cover h-screen lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div> -->
    <Carousel
    :herobanners="hero"
    />
  <!-- Service Container -->
  
  <div class="flex flex-row flex-wrap gap-4 justify-center ml-28 mt-16">
    <CardCarousel v-if="!isLoading.events"
    :events="events"
    />
  </div>
  <Divider></Divider>
  
  <div v-if="!isLoading.services" class="flex flex-row flex-wrap gap-16 justify-center ml-20 mr-20 mt-14 ">
    <ServiceCard v-for="service in services" 
    :key="service.id"
    :title="service.title"
    :content="service.content"
    :image="service.image"/>
    <Divider></Divider>
  </div>

  <div class="flex flex-col flex-wrap gap-4 items-center mx-16 mt-16">
    <Label text="NEWS AND ARTICLES" :fontSize="16" :height="29" :width="252" :padding="2" :margin="16"></Label>
    <div v-if="!isLoading.news" class="flex flex-row flex-wrap gap-10 justify-center">
      <NewsCard  v-for="news in news" 
      :key="news.id"
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
      hero: [],
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
      axios.get('herobanner')
      .then((res) => {
        this.hero = res.data.slice(0,3); // only 3 herobanners to display
        console.log(this.hero);
        this.isLoading.hero = false;
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
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getEvents() {
      axios.get('preview/events')
      .then((res) => {
        return Promise.all(res.data.slice(0,3).map(element => { // only 3 events to display
            axios.get('events/'+element.events_id)
            .then((res) => {
              this.events.push(res.data.data);
            })
          })
        )
      })
      .then(() => {
        this.isLoading.events = false;
      })
      .catch((err) => {
        console.log(err);
      })
    },
    getNews() {
      axios.get('preview/news')
      .then((res) => {
        return Promise.all(res.data.slice(0,3).map(element => { // only 3 news to display
            axios.get('news/'+element.news_id)
            .then((res) => {
              this.news.push(res.data.data);
            })
          })
        )
      })
      .then(() => {
        this.isLoading.news = false;
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
  
  