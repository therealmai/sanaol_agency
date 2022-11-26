<template>
  <button @click="callback"
    class=" inline-block w-full h-[36px] text-white bg-indigo-500 text-base leading-tight
    uppercase rounded shadow-md focus:shadow-lg
    hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
    focus:outline-none focus:ring-0 active:shadow-lg transition duration-300 ease-in-out font-[20px]"
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
