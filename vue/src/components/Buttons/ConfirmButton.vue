<template>
    <button
      class="inline-block w-[141px] h-[36px] text-white bg-indigo-500 text-base leading-tight
      uppercase rounded shadow-md focus:shadow-lg
      hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
      focus:outline-none focus:ring-0 active:shadow-lg transition duration-300 ease-in-out mb-3 font-[20px]"
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
  methods() {
    this.$emit('onClick');
  }
};
</script>

<style>
</style>
