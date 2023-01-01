<template>
  <div id="carouselControls" class="carousel slide relative" data-bs-ride="carousel">
    <div class="carousel-inner justify-center relative overflow-hidden mt-10">
      
      <div class="carousel-item justify-center active relative float-left w-full">
        <HeroEventCard></HeroEventCard>
      </div>
      <div class="carousel-item relative float-left w-full">
        <HeroEventCard ></HeroEventCard>
      </div>
      <div class="carousel-item relative float-left w-full">
        <HeroEventCard></HeroEventCard>
      </div>

    </div>
  </div>
</template>

<script>
import HeroEventCard from '../Cards/Events/HeroEventCard.vue';
export default {
  name: "CardCarousel",
  components: {
    HeroEventCard
  }
};
</script>