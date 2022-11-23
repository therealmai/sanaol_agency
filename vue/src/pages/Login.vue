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
          <h4 class="text-xl font-semibold mt-1 mb-12 pb-1">Sanaol Agency</h4>
        </div>

        <form>
          <!-- email -->
          <div class=" mb-4">
            <input
              v-model="text"
              type="email"
              class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-500 focus:outline-none"
              id="user_email"
              placeholder="Email Address"
            />
          </div>
          
          <!-- password -->
          <div class="container">
            <div class="mb-4 relative">
              <input v-if="showPassword"
                type="password"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-500 focus:outline-none"
                id="user_password"
                placeholder="Password"
                v-model="password"
              >
              <input v-else
                type="password"
                class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-indigo-500 focus:outline-none"
                id="user_password"
                placeholder="Password"
                v-model="password"
              >
            </div>
            <div class="control">
              <button class="button" @click="toggleShow"><span class="icon is-small is-right">
                <i class="fas" :class="{ 'fa-eye-slash': showPassword, 'fa-eye': !showPassword }"></i>
                <font-awesome-icon
          size="xs"
          class="hover:cursor-pointer stroke-2"
          :icon="errorFlag === true ? 'xmark' : 'check'"
          :class="errorFlag === true ? 'text-error' : 'text-primary'"
        />
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                </svg>
                </span>
              </button>
            </div>
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
              class="inline-block px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-slate-50 hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg transition duration-150 ease-in-out w-full mb-3"
              type="button"
              data-mdb-ripple="true"
              data-mdb-ripple-color="light"
              style="color: #FFFFFF;
                    background-color: #7367f0;"
            >
              Log in
            </button>
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

  data() {
    return {
      showPassword: false,
      password: null
    };
  },
  computed: {
    buttonLabel() {
      return (this.showPassword) ? "Hide" : "Show";
    }
  },
  methods: {
    toggleShow() {
      this.showPassword = !this.showPassword;
    }
  }

}
</script>

<style>
</style>
