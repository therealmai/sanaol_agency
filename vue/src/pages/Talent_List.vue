<template>
<body>
  <div class="pt-[96px] pl-[217.5px] pr-[2175px] mb-[18px]">
    <h1 class="text-3xl font-bold text-gray-600">Our Talents</h1>
    <div class="grid grid-cols-4 gap-16 justify-center pt-9">

      <!-- Talent Card -->
      <li :key="item" v-for="item in 10">
        <TalentCard :id='item'/>
      </li>

    </div>
    <!-- Pagination -->
    <div class="flex justify-center pt-10">
      <nav aria-label="Page navigation">
        <ul class="flex list-style-none">
          <li class="page-item"><a
              class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
              href="#" aria-label="Previous">
              <span aria-hidden="true">&lsaquo;</span>
            </a></li>
          <li class="page-item"><a
              class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
              href="#">1</a></li>
          <li class="page-item"><a
              class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
              href="#">2</a></li>
          <li class="page-item"><a
              class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
              href="#">3</a></li>
          <span class="rounded-md px-4 py-2 text-gray-500">...</span>
          <li class="page-item"><a
              class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
              href="#">11</a></li>
          <li class="page-item"><a
              class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
              href="#">12</a></li>
          <li class="page-item"><a
              class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
              href="#">13</a></li>
          <li class="page-item"><a
              class="page-link relative block py-1.5 px-3 rounded-full bg-transparent outline-none transition-all duration-300 text-gray-500 hover:text-gray-800 hover:bg-violet-100 focus:shadow-none"
              href="#" aria-label="Next">
              <span aria-hidden="true">&rsaquo;</span>
            </a></li>
        </ul>
      </nav>
    </div>
  </div>
</body>
</template>

<script>

// import TalentCard from '../components/Cards/Talents/TalentCards.vue';
import TalentCard from '../components/Cards/Talents/TalentCards.vue'
export default{
  components: {
    TalentCard,
  },
}
</script>

<style>
  a p {
    color: rgb(115 103 240);
    font-size: 11px;
  }
</style>
