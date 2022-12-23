<template>
  <div class="relative z-0 mb-6 w-full group">
                  <textarea name="txtarea" id="txtarea" placeholder=" " required  
                   :value="modelValue" 
                   @input="$emit('update:modelValue', $event.target.value)"
                  class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                  rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                  focus:border--indigo-500 peer max-h-[80px]"/>
              
                  <label for="txtarea"
                  class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                  px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
                  peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                  peer-focus:scale-75 peer-focus:-translate-y-8">{{ title }}</label>
  </div>
</template>
<script >
export default {
  name: "TextArea",
  computed: {
    disable() {
      if (this.disabled == true) {
        this.text = "";
      }
      return this.disabled;
    },
  },
  props: {
    default:String,
    modelValue: String,
    title: String,
    type:String
  },
  emits: ['update:modelValue'],
};
</script>


<style>
</style>
