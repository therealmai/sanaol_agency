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
    <div class="flex justify-center pt-10 mb-10">
        <nav aria-label="Page navigation">
          <ul class="flex list-style-none">
            <li class="page-item"><a
                class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
                href="#" aria-label="Previous">
                <span aria-hidden="true">&lsaquo;</span>
              </a></li>
            <li class="page-item"><a
                class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
                href="#">1</a></li>
            <li class="page-item"><a
                class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
                href="#">2</a></li>
            <li class="page-item"><a
                class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
                href="#">3</a></li>
            <span class="rounded-md px-4 py-2 text-gray-500">...</span>
            <li class="page-item"><a
                class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
                href="#">11</a></li>
            <li class="page-item"><a
                class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
                href="#">12</a></li>
            <li class="page-item"><a
                class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
                href="#">13</a></li>
            <li class="page-item"><a
                class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
                href="#" aria-label="Next">
                <span aria-hidden="true">&rsaquo;</span>
              </a></li>
          </ul>
        </nav>
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
