<template>
  <div class="flex flex-row flex-nowrap text-secondary sm:scale-75 md:scale-100 lg:scale-100 items-center justify-center">
    <!-- Image -->
    <div class="hidden w-full object-cover sm:hidden md:flex lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80); display: hidden;"></div>
    
      <!-- Form Container -->
      <div class="flex scale-75 items-center justify-center container max-h-screen lg:p-8 sm:scale-75 md:scale-75 lg:scale-100 xl:scale-100 xl:w-full 2xl:scale-100">
          <div class=" md:mx-2 align-middle flex items-center justify-center lg:mx-6 md:w-full">
    
            <!-- Form -->
            <form id="register" @submit="register" method="post">
              <!-- Title -->
              <div class="mb-10">
                <h1 class="text-4xl font-bold">Become a Rising Star</h1>
              </div>
              <!-- Form Group -->
              <div class="grid md:grid-cols-1 lg:grid-cols-2 lg:gap-6">
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
                <input type="text" name="insta_handle" id="insta_handle" v-model="user.insta_handle" placeholder=" " required
                  class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                  rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                  focus:border--indigo-500 peer"/>
                <label for="insta_handle"
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
                <input type="password" name="confirm_password" id="confirm_password" v-model="user.confirm_password"  placeholder=" " required
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
              <!-- Error Modal -->
              <errorModal hidden>
                <template v-slot:modal-title> Registration </template>
                <template v-slot:modal-content>
                  <h3 class="mb-0 text-lg font-normal text-gray-500 dark:text-gray-400">User already exists. Enter different credentials.</h3>
                </template>
              </errorModal>
              <!-- Submit Button -->
              <button type="submit" @click="staticRegister"
                class="w-full px-6 py-3 mb-6
                bg-indigo-500 text-white font-medium text-base
                leading-tight uppercase rounded shadow-md
                hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
                focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-indigo-800 active:shadow-lg
                transition duration-300
                ease-in-out">APPLY AS A MEMBER
              </button>
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
  </div>
</template>


<script setup>
import { useRouter } from 'vue-router';
import store from "../store";
import errorModal from '../components/Modal/ErrorModal.vue';

const toggleModal = errorModal.methods.toggleModal();
const router = useRouter();
const user = {
  first_name: '',
  last_name: '',
  insta_handle: '',
  email: '',
  password: '',
  confirm_password: '',
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
          err.value = toggleModal;
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
