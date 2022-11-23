<template>
  <body>
    <!-- Image -->
    <div class="w-full object-cover h-72 lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div>
    
    <!-- Form Container -->
    <div class="flex items-center justify-center container">        
        <div class="md:p-12 md:mx-6 align-middle flex items-center justify-center">
          
          <!-- Form -->
          <form>
            <!-- Title -->
            <div class="mb-8">
              <h1 class="text-4xl font-bold">Become a Rising Star</h1>
            </div>

            <!-- Form Group -->
            <div class="flex gap-6">
              <!-- First Name -->
              <div class="form-group mb-6">
                <input type="text" v-model="text" class="form-control
                  block
                  w-fill
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:focus:border-indigo-500 focus:outline-none" id=""
                  aria-describedby="" placeholder="First name">
              </div>
              <!-- Last Name -->
              <div class="form-group mb-6">
                <input type="text" v-model="text" class="form-control
                  block
                  w-fill
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:focus:border-indigo-500 focus:outline-none" id=""
                  aria-describedby="emailHelp124" placeholder="Last name">
              </div>
            </div>

            <!-- Instagram Handle -->
            <div class="form-group mb-6">
              <input type="text" v-model="text" class="form-control block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-indigo-500 focus:outline-none" id=""
                placeholder="Instagram Handle">
            </div>

            <!-- Email -->
            <div class="form-group mb-6">
              <input type="email" v-model="email" class="form-control block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-indigo-500 focus:outline-none" id=""
                placeholder="Email address">
            </div>
            
            <!-- Password -->
            <div class="form-group mb-6">
              <input type="password" v-model="password" class="form-control block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-indigo-500 focus:outline-none" id=""
                placeholder="Password">
            </div>

            <!-- Confirm Password -->
            <div class="form-group mb-6">
              <input type="password" v-model="password" class="form-control block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-indigo-500 focus:outline-none" id=""
                placeholder="Confirm Password">
            </div>
            
            <!-- Why Join Sanaol Agency -->
            <div class="form-group mb-6">
              <textarea v-model="text"
                class="
                  form-control
                  block
                  w-full
                  px-3
                  py-1.5
                  text-base
                  font-normal
                  text-gray-700
                  bg-white bg-clip-padding
                  border border-solid border-gray-300
                  rounded
                  transition
                  ease-in-out
                  m-0
                  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                "
                id=""
                rows="5"
                placeholder="Why do you want to join Sanaol Agency?"
              ></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="
              w-full
              px-6
              py-2.5
              bg-indigo-500
              text-white
              font-medium
              text-xs
              leading-tight
              uppercase
              rounded
              shadow-md
              hover:bg-indigo-600 hover:shadow-lg
              focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0
              active:bg-indigo-800 active:shadow-lg
              transition
              duration-150
              ease-in-out">APPLY AS A MEMBER</button>
          </form>
      </div>
    </div>
</body>
</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
export default{
  components: {
    Navbar,
  },
}
</script>

<style>
</style>
