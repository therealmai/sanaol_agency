<template>
<body>

    <div class="flex items-center justify-center container">
    <!-- insert log in template here. -->
      <div class="md:p-12 md:mx-6">
        <div class="text-center">
          <img
            class="mx-auto w-48"
            src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
            alt="logo"
          />
          <h4 class="text-4xl font-semibold mt-1 mb-12 pb-1">Sanaol Agency</h4>
        </div>

        <form>
          <!-- email -->
          <div class="relative z-0 mb-6 w-full group">
            <input type="email" name="email" id="email" v-model="email" placeholder=" " required
              class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
              rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
              focus:border--indigo-500 peer"/>
            <label for="email"
              class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
              px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
              peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
              peer-focus:scale-75 peer-focus:-translate-y-8">Email address</label>
          </div>
          
          <!-- password -->
          <div class="relative z-0 mb-0 w-full group">
            <input type="password" name="password" id="password" v-model="password"  placeholder=" " required
              class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
              rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
              focus:border--indigo-500 peer"/>
            <label for="password"
              class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
              px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
              peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
              peer-focus:scale-75 peer-focus:-translate-y-8">Password</label>
          </div>

          <!-- forgot password -->
          <div class="flex justify-between items-center mb-6">
            <div>
            </div>
            <a class="text-gray-500" href="#!">Forgot password?</a>
          </div>

          <!-- Login Button -->
          <div class="text-center pt-1 mb-12 pb-1">
            <button
              class="inline-block px-6 py-4 text-white bg-indigo-500 font-medium text-base leading-tight
              uppercase rounded shadow-md focus:shadow-lg
              hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
              focus:outline-none focus:ring-0 active:shadow-lg transition duration-300 ease-in-out w-full mb-3"
              type="button"
              data-mdb-ripple="true"
              data-mdb-ripple-color="light"
              @click="isUser = true"
              data-model-toggle="popup-modal"
            >
              Log in
            </button>

            <!-- <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
                <div class="relative w-full max-w-md h-full md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this product?</h3>
                            <button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div> -->
          </div>

          <!-- Membership Button -->
          <div class="flex items-center justify-between pb-6">
            <p class="mb-0 mr-2">Don't have an account?</p>
            <a href="#!"
            class="underline"
            style="color:#7367f0">Apply as a Talent here.</a> 
          </div>

        </form>
      </div>
    </div>
    


    <!-- image -->
    <div class="w-full object-cover h-72 lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div>
</body>
</template>

<script>
import Navbar from '../components/Navigation/Navbar.vue';
import Modal from '../components/Modal/Modal.vue';

export default{
  components: {
    Navbar,
    Modal,

  },
}
</script>

<style>
</style>
