<template>
  <button @click="callback"
    class="inline-block w-full h-[36px] text-primary bg-lightpurple text-base leading-tight
    uppercase rounded shadow-md focus:shadow-lg
    hover:bg-primary hover:shadow-lg hover:text-white
    focus:outline-none focus:ring-0 active:shadow-lg transition duration-300 ease-in-out font-semibold"
    type="submit"
    data-mdb-ripple="true"
    data-mdb-ripple-color="light"
    data-model-toggle="popup-modal"
  >
    {{ text }}
  </button>
</template>

<script>
export default {
  props:{
  text: String
  },
  methods:{
    callback(){
      this.$emit('onClick');
    }
  }
};
</script>

<style>
</style>
