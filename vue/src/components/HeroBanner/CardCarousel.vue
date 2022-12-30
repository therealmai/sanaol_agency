<template>
  <div class="btn-edit" v-if="role == 'admin'">
      <router-link :to="'/hero/edit/prev/events'"><FilledButton text="Edit Previous Events" class="w-[220px]" color="white"></FilledButton></router-link>
  </div>
  <div id="carouselControls" class="carousel slide relative" data-bs-ride="carousel">
    <div class="carousel-inner justify-center relative overflow-hidden">
      <div class="carousel-item justify-center float-left w-full"
      v-for="event, index in events"
      v-bind:class="{'active relative': (index === 1)}"
      :key="event.id"
      >
        <HeroEventCard
        :title="event.title"
        :content="event.content"
        :date="event.date"
        :location="event.location"
        :image="event.image"
        />
      </div>
    </div>
    <button
      class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline -left-36"
      type="button"
      data-bs-target="#carouselControls"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon bg-gray-700 inline-block bg-no-repeat" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
      type="button"
      data-bs-target="#carouselControls"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon bg-gray-700 inline-block bg-no-repeat" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</template>

<script>
import HeroEventCard from '../Cards/Events/HeroEventCard.vue';
import FilledButton from '../Buttons/FilledButton.vue';

export default {
  name: "CardCarousel",
  components: {
    HeroEventCard,
    FilledButton
  },
  props: {
    events: Array,
    role: String
  }
};
</script>

<style lang="scss" scoped>

</style>