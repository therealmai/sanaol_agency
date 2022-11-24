<template>
  <body>
  
      <div class="flex items-center justify-center container h-fit">
      <!-- insert log in template here. -->
        <div class="md:p-4 md:mx-6 m-8">
          <div class="text-center">
            <img
              class="mx-auto w-48"
              src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
              alt="logo"
            />
            <h4 class="text-2xl font-semibold mt-1 mb-6 pb-1">Sanaol Agency</h4>
          </div>
  
          <form id="login" method="post" @submit="login">
  
            <!-- email -->
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
            
            <!-- password -->
            <div class="relative z-0 mb-0 w-full group">
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
  
            <!-- forgot password -->
            <div class="flex justify-between items-center mb-6">
              <div>
              </div>
              <a class="text-gray-500" href="#!">Forgot password?</a>
            </div>

            <!-- Error Modal -->
            <errorModal>
              <template v-slot:modal-title> Login </template>
              <template v-slot:modal-content class="justify-center">
                <h3 class="mb-0 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Incorrect username or password.</h3>
                <p class="mb-0 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Please try again.</p>
              </template>
            </errorModal>
  
            <!-- Login Button -->
            <div class="text-center pt-1 mb-4 pb-1">
              <button
                class="inline-block px-6 py-4 text-white bg-indigo-500 font-medium text-base leading-tight
                uppercase rounded shadow-md focus:shadow-lg
                hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
                focus:outline-none focus:ring-0 active:shadow-lg transition duration-300 ease-in-out w-full mb-3"
                type="submit"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                data-model-toggle="popup-modal"
                @click="staticLogin"
              >
                Log in
              </button>
  
              
            </div>
  
            <!-- Membership Button -->
            <div class="flex items-center justify-between pb-3">
              <p class="mb-0 mr-2">Don't have an account?
              {{ '' }}
              <!-- <router-link :to="{name: 'Membership'}" class="underline text-indigo-500 hover:text-indigo-400">Apply as a Talent here.</router-link> -->
              </p>
              <a href="./Membership"
              class="underline"
              style="color:#7367f0">Apply as a Talent here.</a> 
            </div>
  
          </form>
        </div>
      </div>
  
      <!-- image -->
      <div class="object-cover h-auto lg:w-screen md:h-auto bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div>
  </body>
  </template>
  
  <script setup>
  import Navbar from '../components/Navigation/Navbar.vue';
  import errorModal from '../components/Modal/ErrorModal.vue';
  import store from "../store";
  import {useRouter} from "vue-router";
  import Footer from '../components/Footer/Footer.vue';
  
  const toggleModal = errorModal.methods.toggleModal();
  const router = useRouter();
  const user = {
    email: '',
    password: '',
  }
  
  function login(ev) {
    ev.preventDefault();
  
    store.dispatch('login', user)
      .then(() => {
        router.push({
          name:'Hero'
        })
      })
      .catch(err => {
        err.value = toggleModal;
      })
  }
  
  function staticLogin() {
    router.push({
      name: 'Hero'
    })
  }
  
  </script>
  
  <style>
  </style>