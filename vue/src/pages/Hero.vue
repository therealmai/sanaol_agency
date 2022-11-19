<template>
  <div class="flex flex-col">
    <div class="w-full object-cover h-screen lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div>
 
  <!-- Service Container -->
  <div class="flex flex-row flex-wrap gap-4 justify-center ml-20 mr-20 mt-16">
    <EventCard></EventCard>
    <Divider></Divider>
  </div>
  
  <div class="flex flex-row flex-wrap gap-16 justify-center ml-20 mr-20 mt-14 ">
    <ServiceCard text="Management Team"></ServiceCard>
    <ServiceCard text="Creative Team"></ServiceCard>
    
    <Divider></Divider>
  </div>

  <div class="flex flex-col flex-wrap gap-4 items-center ml-20 mr-20 mt-16">
    <Label text="NEWS AND ARTICLES" :fontSize="24" :height="29" :width="252" :padding="2" :margin="16"></Label>
    <div class="flex flex-row flex-wrap gap-12 justify-center">
      <NewsCard title="Jastine Guzman emerges as Ms. International Queen 2022" hover="lightgray"></NewsCard>
      <NewsCard title="System bags multiple awards in Asian Content Creation Awards 2021" hover="lightgray"></NewsCard>
      <NewsCard title="Introducing the New Face of System: Kathleen Iza Monzales" hover="lightgray"></NewsCard>
    </div>
    <Divider></Divider>
  </div>
  
</div>
</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
import PrimaryButton from '../components/Buttons/PrimaryButton.vue';
import EventCard from '../components/Cards/Events/EventCard.vue';
import ServiceCard from '../components/Cards/Service/ServiceCard.vue';
import NewsCard from '../components/Cards/News/NewsCard.vue';
import Divider from '../components/Divider/Divider.vue';
import Label from '../components/Label/Label.vue';

export default{
  components: {
    Navbar,
    PrimaryButton,
    EventCard,
    ServiceCard,
    NewsCard,
    Divider,
    Label
  },
}
</script>

<style>
</style>

