<template>
    <div
    id="carouselDarkVariant"
    class="carousel slide carousel-fade carousel-dark relative"
    data-bs-ride="carousel"
    >
  <!-- Indicators -->
  <div class="carousel-indicators absolute right-0 left-0 flex p-0 justify-center" style="bottom: -26px">
    <button
      data-bs-target="#carouselDarkVariant"
      data-bs-slide-to="0"
      class="active"
      aria-current="true"
      aria-label="Slide 1"
    ></button>
    <button
      data-bs-target="#carouselDarkVariant"
      data-bs-slide-to="1"
      aria-label="Slide 2"
    ></button>
    <button
      data-bs-target="#carouselDarkVariant"
      data-bs-slide-to="2"
      aria-label="Slide 3"
    ></button>
  </div>

  <!-- Inner -->
  <div class="carousel-inner relative w-full overflow-hidden">
    <!-- Single item -->
    <div class="carousel-item float-left w-full"
    v-for="event, index in events"
    :key="event.id"
    v-bind:class="{'active relative': index === 1}">
      <HeroEventCard :title="event.title" :date="event.date" :image="event.image" :location="event.location" :content="event.content"> </HeroEventCard>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button
    class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0" style="    left: -150px;"
    type="button"
    data-bs-target="#carouselDarkVariant"
    data-bs-slide="prev"
  >
    <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
    type="button"
    data-bs-target="#carouselDarkVariant"
    data-bs-slide="next"
  >
    <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</template>

<script>
import FilledButton from '../Buttons/FilledButton.vue';
import HeroEventCard from '../Cards/Events/HeroEventCard.vue';

export default {
  name: "Carousel",
  components: {
    FilledButton,
    HeroEventCard
  },
  props: {
    events: Array,
  },
 
};
</script>

<style scoped>

</style>