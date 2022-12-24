<template>

<body class="flex flex-col">

  <div class="flex items-center justify-between pl-[15%] pr-[10%] mt-[76px] mb-[-100px] w-full">
    <h1 class="font-bold text-3xl mb-[20%] pb-[15%]" style="color: #525252;">Events</h1>
    <div class="float-right pl-[47%] ml-[8%]  mb-[17%] w-full">
        <FilledButton text="Edit Events" class="w-[177px]"></FilledButton>
      <div class="float-right mr-[3%]" style="align-content: center;">
        <CardCarousel ></CardCarousel>
      </div>
    </div>

  </div>

  <div class="flex items-center justify-between pl-[15%] pr-[10%] mb-[] w-full">
    <h1 class="font-bold text-3xl pb-[50px] w-full" style="color: #525252;">News articles</h1>
      <div class="float-right mb-[2px] mr-[105px]">
          <FilledButton text="Add Article" class="w-[179px]"></FilledButton>
      </div>

  </div>
  <div>
    <EventCard2Vue></EventCard2Vue>
    <br>
    <EventCard2Vue></EventCard2Vue>
    <br>
    <EventCard2Vue></EventCard2Vue>

  </div>
    <br>
    <br>
  <div class="mt-[10px]">
    <PaginationButtonVue class="flex flex-col items-center"></PaginationButtonVue>
  </div>
</body>

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
export default{
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
