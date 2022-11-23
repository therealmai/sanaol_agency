<template>
  <body>
    <!-- Image -->
    <div class="w-full object-cover h-72 lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div>
    
    <!-- Form Container -->
    <div class="flex items-center justify-center container">        
        <div class="md:p-12 md:mx-6 align-middle flex items-center justify-center">
          
          <!-- Form -->
          <form id="register" @submit="register" method="post">
            <!-- Error Modal -->
            <div v-if="errorModal" id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
              <div class="relative w-full max-w-md h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                  <div class="p-6 text-center">
                      <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">User already exists. Enter different credentials.</h3>
                      <button data-modal-toggle="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                          Retry
                      </button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Title -->
            <div class="mb-10">
              <h1 class="text-4xl font-bold">Become a Rising Star</h1>
            </div>

            <!-- Form Group -->
            <div class="grid md:grid-cols-2 md:gap-6">
              <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="fname" id="fname" v-model="user.first_name" placeholder=" " required autocomplete="name"
                  class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                  rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                  focus:border--indigo-500 peer"/>
                <label for="fname"
                  class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                  px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
                  peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                  peer-focus:scale-75 peer-focus:-translate-y-8">First Name</label>
              </div>
              <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="lname" id="lname" v-model="user.last_name" placeholder=" " required autocomplete="name"
                  class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                  rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                  focus:border--indigo-500 peer"/>
                <label for="lname"
                  class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                  px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
                  peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                  peer-focus:scale-75 peer-focus:-translate-y-8">Last Name</label>
              </div>
            </div>

            <!-- Instagram Handle -->
            <div class="relative z-0 mb-6 w-full group">
              <input type="text" name="handle" id="handle" v-model="user.instagram_handle" placeholder=" " required
                class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                focus:border--indigo-500 peer"/>
              <label for="handle"
                class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
                peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-8">Instagram Handle</label>
            </div>

            <!-- Email -->
            <div class="relative z-0 mb-6 w-full group">
              <input type="email" name="email" id="email" v-model="user.email" placeholder=" " required autocomplete="email"
                class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                focus:border--indigo-500 peer"/>
              <label for="email"
                class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
                peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-8">Email address</label>
            </div>
            
            <!-- Password -->
            <div class="relative z-0 mb-6 w-full group">
              <input type="password" name="password" id="password" v-model="user.password"  placeholder=" " required
                class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                focus:border--indigo-500 peer"/>
              <label for="password"
                class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
                peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-8">Password</label>
            </div>

            <!-- Confirm Password -->
            <div class="relative z-0 mb-6 w-full group">
              <input type="password" name="confirm_password" id="confirm_password" v-model="user.password_confirmation"  placeholder=" " required
                class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                focus:border--indigo-500 peer"/>
              <label for="confirm_password"
                class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
                peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-8">Confirm Password</label>
            </div>
            
            <!-- Why Join Sanaol Agency -->
            <div class="relative z-0 mb-6 w-full group">
              <textarea name="reason" id="reason" placeholder=" " required rows="5"
                class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                focus:border--indigo-500 peer"/>
              <label for="confirm_password"
                class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
                peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-8">Why do you want to join Sanaol Agency</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" data-modal-toggle="popup-modal" @click="staticLogin" class="
              w-full px-6 py-3 mb-6
              bg-indigo-500 text-white font-medium text-base
              leading-tight uppercase rounded shadow-md
              hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
              focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0
              active:bg-indigo-800 active:shadow-lg
              transition duration-300
              ease-in-out">APPLY AS A MEMBER</button>

              <div class="items-center flex pb-11">
                <p class="mb-0 mr-2">Already have an account?
                {{ '' }}
                <!-- <router-link :to="{name: 'Login'}" class="underline text-indigo-500 hover:text-indigo-400">Login here.</router-link> -->
                </p>
                <a href="./Login"
                class="underline"
                style="color:#7367f0">Login here.</a> 
              </div>
          </form>

          
      </div>
    </div>
</body>
</template>


<script setup>
import { useRouter } from 'vue-router';
import Navbar from '../components/Navigation/Navbar.vue';
import store from "../store";

const router = useRouter();

const user = {
  first_name: '',
  last_name: '',
  instagram_handle: '',
  email: '',
  password: '',
  password_confirmation: '',
  reason: '',
}

function register(ev) {
  ev.prevenDefault();
  store.dispatch('register', user)
       .then(() => {
          router.push({
            name: 'Hero'
          })
       })
       .catch(err => {
          errorModal = Modal
       })
}

function staticRegister() {
  router.push({
    name: 'Hero'
  })
}
</script>

<style>
</style>
