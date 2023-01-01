<template>
    <transition name="modal-fade">
    <div>
      <!-- <button class="bg-indigo-500 text-white active:bg-indigo-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" v-on:click="toggleModal()">
        <slot name="modal-title"></slot>
      </button> -->
      <div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
        <div class="relative w-screen my-6 mx-auto max-w-md">
          <!--content-->
          <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none max-w-md h-full md:h-auto">
            <!--header-->
            <div class="block items-start justify-between p-5 border-b rounded-t">
                
              <svg aria-hidden="true" class="mx-auto mb-0 w-14 h-14 text-red-400 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
              <div class="flex items-center justify-center">
                <h2 class="text-4xl font-bold text-gray-900 mt-4">
                    <slot name="modal-title"></slot>    
                    Failed
                </h2>
            </div>
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" v-on:click="toggleModal()">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            </div>
            <!--body-->
            <div class="relative p-6 flex-auto">
                <slot name="modal-content"></slot>
            </div>
            <!--footer-->
            <div class="flex items-center justify-center p-6 border-t rounded-b">
                <button data-modal-toggle="popup-modal" type="button" v-on:click="toggleModal()"
                class="w-full px-6 py-3 mb-0
                    bg-indigo-500 text-white font-medium text-base
                    leading-tight uppercase rounded shadow-md
                    hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
                    active:bg-indigo-100 active:shadow-lg
                    transition duration-300">
                    Retry
                </button>
            </div>
          </div>
        </div>
      </div>
      <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    </div>
</transition>
  </template>
  
  <script>
  export default {
    name: "error-modal",
    data() {
      return {
        showModal: false
      }
    },
    methods: {
      toggleModal: function(){
        this.showModal = !this.showModal;
      }
    }
  }
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