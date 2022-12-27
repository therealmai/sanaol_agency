<template>

<div class="flex flex-col w-full ">

  <div class="mb-10">
    <div class="flex flex-col mt-[76px]">
      <div class="flex flex-row justify-between">
        <h1 class="font-bold text-3xl text-secondary ml-[15%]">Events</h1>
          <router-link :to="'/events_management'" class=" mr-[13%]">
            <FilledButton text="Edit Events" class="w-[179px]"></FilledButton>
          </router-link>
      </div>
    </div>
    <CardCarousel class="flex justify-center ml-[150px]"></CardCarousel>
  </div>

    <div class="flex flex-row justify-between mb-[50px]">
      <h1 class="font-bold text-3xl text-secondary ml-[15%]">News articles</h1>
      <FilledButton text="Add Articles" class="w-[179px] mr-[13%]"></FilledButton>
   </div>

  <div class="flex flex-col items-center">
    <EventCard2Vue></EventCard2Vue>
    <br>
    <EventCard2Vue></EventCard2Vue>
    <br>
    <EventCard2Vue></EventCard2Vue>
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
}
</script>
  
<style>



</style>
