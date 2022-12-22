<template>
  <div>
    <!-- MAIN SERVICE PAGE -->
    <div class="pt-[96px] px-[237.5px] mb-[25px] text-[#525252]">
      <!-- TITLE -->
      <h1 class="text-center text-2xl font-bold">Our Services</h1>
  
      <!-- INDIVIDUAL SERVICES -->
      <!-- USE LOOP WHEN FETCHING FROM DATABASE -->
      <div v-for="service in services" v-bind:key="service.id">
        <Service :id="service.id"
                 :title="service.title"
                 :content="service.content"
                 :image="service.image">
        </Service>
      </div>
    </div>
  </div>
  </template>
  
  
  <script>
  import Service from '../components/Cards/Service/Service.vue';
  import axios from '../axios';

  export default{
    components: {
      Service
    },
    mounted() {
      axios.get('http://127.0.0.1:8000/api/services/').then(
        (response) => {
          this.services = response.data,
          console.log("services"),
          console.log(this.services)
        }
      )
    },
    data() {
      return {
        services: [],
      }
    }
  }
</script>