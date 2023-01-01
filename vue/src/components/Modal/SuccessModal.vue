<template>
  <transition name="modal-fade">
  <div>
    <div v-if="showModal" class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
      <div class="relative w-screen my-6 mx-auto max-w-md">
        <!--content-->
        <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none max-w-md h-full md:h-auto">
          <!--header-->
          <div class="block items-start justify-between p-5 border-b rounded-t">

            <svg class="mx-auto mb-0 w-14 h-14 text-green-400 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">><path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg>

            <div class="flex items-center justify-center">
              <h2 class="text-4xl font-bold text-gray-900 mt-4">
                  <slot name="modal-title"></slot>    
                  Success
              </h2>
          </div>
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" v-on:click="closeModal()">
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              <span class="sr-only">Close Modal</span>
          </button>
          </div>
          <!--body-->
          <div class="relative p-6 flex-auto">
              <slot name="modal-content"></slot>
          </div>
          <!--footer-->
          <div class="flex items-center justify-center p-6 border-t rounded-b">
              <button data-modal-toggle="popup-modal" type="button" v-on:click="closeModal()"
              class="w-full px-6 py-3 mb-0
                  bg-indigo-500 text-white font-medium text-base
                  leading-tight uppercase rounded shadow-md
                  hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
                  active:bg-indigo-100 active:shadow-lg
                  transition duration-300">
                  Confirm
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
  name: "success-modal",
  data() {
    return {
      showModal: false
    }
  },
  methods: {
    closeModal: function(){
      this.$router.push('login');
    },
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