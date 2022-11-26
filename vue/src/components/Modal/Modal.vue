<template>
  <transition name="modal-fade">
    <div class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-black  bg-opacity-50 z-[1000]">
      <div class="flex items-center justify-center flex-col space-y-4 bg-white px-8 py-16 rounded-[12px] w-auto max-h-[50%] sm:max-h-[50%] md:max-h-[100%] sm:max-w-[100%] md:max-w-[50%]relative z-[2] md:m-w-[80%] md:px-8 md:py-4">
        
        <!-- to insert custom content use slot="modal_content" in the main page -->
        
        <div class="flex flex-col items-center gap-2"
          :style="{
            width: width ? width + 'px' : 'auto'
          }">
          <slot name="modal_content"/>
        </div>
        <!-- all contents will be rendered here --> 
        
        <!-- close button area-->
        <slot name="modal_button"/>

      </div>
      <div class="absolute w-full h-full shadow-sm"></div>
    </div>
  </transition>
</template>
<script>
export default {
  name: 'Modal',
  props:{
    text: String,
    fontSize: Number,
    height: String,
    width: String,
  },
  methods: {
    // closeModal(){ this.$emit('close'); }
  },
};
</script>


<style>
.modal-fade-enter,
  .modal-fade-leave-to {
    opacity: 0;
  }

  .modal-fade-enter-active,
  .modal-fade-leave-active {
    transition: opacity .5s ease;
  }

</style>