<template>
  <div class="relative z-0 mb-6 w-full group">

  <input v-model="num" type="number" name="num" id="num" placeholder=" " min="0" max="100" 
            class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
            rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
            focus:border--indigo-500 peer" 
            :disabled="disable"
            @change="$emit('changeNumber', $event.target.value)"/>

  <label for="num"
            class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
            px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
            peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
            peer-focus:scale-75 peer-focus:-translate-y-8">{{ title }}</label>
  </div>
</template>

<script>
export default {
  name: "NumberInput",
  data() {
    return {
      num: Number,
    };
  },
  computed: {
    disable() {
      if (this.disabled == true) {
        this.num = "";
      }

      return this.disabled;
    },
  },
  props: {
    default:Number,
    title: String,
    width: Number,
    height: Number,
    align: String,
    textAlign: String,
    disabled: Boolean,
  },
  mounted() {
    this.num = this.default;
  },
};
</script>

<style scoped>
</style>