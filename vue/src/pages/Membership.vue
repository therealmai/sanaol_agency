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
            <div class="mb-10">
              <h1 class="text-4xl font-bold">Become a Rising Star</h1>
            </div>

            <!-- Form Group -->
            <div class="grid md:grid-cols-2 md:gap-6">
              <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="fname" id="fname" v-model="text" placeholder=" " required
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
                <input type="text" name="lname" id="lname" v-model="text" placeholder=" " required
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
              <input type="text" name="handle" id="handle" v-model="text" placeholder=" " required
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
            
            <!-- Password -->
            <div class="relative z-0 mb-6 w-full group">
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

            <!-- Confirm Password -->
            <div class="relative z-0 mb-6 w-full group">
              <input type="password" name="confirm_password" id="confirm_password" v-model="password"  placeholder=" " required
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
              <textarea name="reason" id="reason" v-model="text"  placeholder=" " required rows="5"
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
            <button type="submit" class="
              w-full px-6 py-3
              bg-indigo-500 text-white font-medium text-base
              leading-tight uppercase rounded shadow-md
              hover:bg-indigo-50 hover:shadow-lg hover:text-indigo-500
              focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0
              active:bg-indigo-800 active:shadow-lg
              transition duration-300
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
