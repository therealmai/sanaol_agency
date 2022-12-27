<template> 
  <div class="flex m-0">
  
      <div class="flex justify-center container h-fit">
      <!-- insert log in template here. -->
        <div class="md:p-4 md:mx-6 m-8 justify-center block">
          <div class="text-center">
            <h4 class="text-2xl font-semibold mt-6 pb-1 text-primary">Sanaol Agency</h4>
            <img
              class="mx-auto w-48 mb-6"
              src="../assets/sanaol-logo.png"
              alt="logo"
            />
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
            <div class="flex justify-between items-center mb-6 mt-2">
              <div>
              </div>
              <a class="text-gray-500 text-sm" href="#!">Forgot password?</a>
            </div>

            <!-- Error Modal -->
            <errorModal ref="modal">
              <template v-slot:modal-title> Login </template>
              <template v-slot:modal-content class="justify-center">
                <h3 class="mb-0 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">{{ errorMessage }}</h3>
                <p class="mb-0 text-lg font-normal text-gray-500 dark:text-gray-400 text-center">Please try again.</p>
              </template>
            </errorModal>
  
            <!-- Login Button -->
            <div class="text-center pt-1 mb-4 pb-1">
              <button
                class="w-64 px-6 py-3 mb-6
                bg-indigo-500 text-white font-medium text-base
                leading-tight uppercase rounded shadow-md
                hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
                focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0
                active:bg-indigo-800 active:shadow-lg
                transition duration-300
                ease-in-out"
                type="submit"
                data-mdb-ripple="true"
                data-mdb-ripple-color="light"
                data-model-toggle="popup-modal"
                @click="login"
              >
                Log in
              </button>
  
              
            </div>
  
            <!-- Membership Button -->
            <div class="flex items-center justify-between pb-2">
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
      <div class="object-cover h-fill sm:h-auto lg:w-screen lg:h-auto md:h-auto bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div>
  </div>
  </template>
  
  <script>
  import Navbar from '../components/Navigation/Navbar.vue';
  import errorModal from '../components/Modal/ErrorModal.vue';
  import store from "../store";
  import Footer from '../components/Footer/Footer.vue';

  export default {
    data() {
      return {
        user: {
          email: '',
          password: '',
        }
      }
    },
    methods: {
      clearFields() {
        this.user.email = '';
        this.user.password = '';
      },
      isEmpty(){
        return this.user.email == '' || this.user.password == '';
      },
      login(ev) {
        ev.preventDefault();
        if(!this.isEmpty()) {
          store.dispatch('login', this.user)
            .then(() => {
              this.$router.push('hero');
            })
            .catch(err => {
              this.errorMessage = 'Wrong Email or Password. Please try again.'
              this.$refs.modal.toggleModal();
              this.clearFields();
              console.log(err);
            })
          } else {
            this.errorMessage = 'Empty Fields. Please Enter your credentials.'
            this.$refs.modal.toggleModal();
          }
        }
      },
      components: {
        Navbar,
        errorModal,
        Footer
      }
    }
  
  
  
  </script>
  
  <style>
  </style>