<template>
  <div class="flex flex-col justify-center items-center w-full mb-14">
    <h1 class="text-3xl font-bold text-gray-600 mt-8 mr-[1070px]">
      Our Talents
    </h1>
    <div class="grid grid-cols-4 gap-12 mt-10">
      <!-- Talent Card -->
      <ul :key="item.id" v-for="item in talents">
        <TalentCard
          :id="item.id"
          :fname="item.fname"
          :lname="item.lname"
          :insta_handle="item.insta_handle"
          :image="item.image"
        />
      </ul>
    </div>
    <!--Pagination
      <div class="flex justify-center pt-10 mb-10">
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
      </div>-->
  </div>
</template>

<script>
// import TalentCard from '../components/Cards/Talents/TalentCards.vue';
import TalentCard from "../components/TalentCards/TalentCards.vue";
import axios from "../axios";
export default {
  components: {
    TalentCard,
  },
  data() {
    return {
      talents: [],
    };
  },
  mounted() {
    axios.get("/users/").then((response) => {
      (this.talents = response.data),
        (this.talents = this.talents.filter((user) => {
          return user.user_type == "talent";
        }));
      console.log("users - filtered"), console.log(this.talents);
      console.log(this.talents.length)

      for (let x = 0; x < this.talents.length; x++) {
        axios
          .get("/user/image/" + this.talents[x].id)
          .then((response) => {
            console.log(response.data.data[0].image)
            this.talents[x].image = response.data.data[0].image;
          });
      }

      console.log("talents with images");
      console.log(this.talents);
    });
  },
};
</script>

<style>
a p {
  color: rgb(115 103 240);
  font-size: 11px;
}
</style>
