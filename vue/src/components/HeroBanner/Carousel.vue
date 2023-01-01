<template>
    <div
    id="carouselDarkVariant"
    class="carousel slide carousel-fade carousel-dark relative"
    data-bs-ride="carousel"
    >
  <!-- Indicators -->
  <div class="carousel-indicators absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
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
    <div class="carousel-item float-left w-full h-220"
    v-for="herobanner, index in herobanners"
    :key="herobanner.id"
    v-bind:class="{'active relative': index === 1}">
      <img
        :src="herobanner.image"
        class="block w-full"
        alt="image"
      />
      <div class="carousel-caption hidden md:block absolute text-right top-64">
        <h5 class="text-xl">{{ userExist ? herobanner.header_gen :herobanner.header_tal }}</h5>
        <p>{{ userExist ?herobanner.subheader_gen : herobanner.subheader_tal }}</p>
        <div class="btn-edit" v-if="role == 'admin'">
            <router-link :to="'/hero/edit/'+ herobanner.id"><FilledButton text="Edit Hero Banner" class="w-[176px] " color="white"  ></FilledButton></router-link>
        </div>
      </div>
    </div>
  </div>
  <!-- Inner -->

  <!-- Controls -->
  <button
    class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
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
import store from '../../store';
import FilledButton from '../Buttons/FilledButton.vue';

export default {
  name: "Carousel",
  components: {
    FilledButton
  },
  props: {
    herobanners: Array,
    role: String
  },
  computed: {
    userExist() {
      return store.state.user !== null;
    }
  }
};
</script>

<style scoped>

</style>