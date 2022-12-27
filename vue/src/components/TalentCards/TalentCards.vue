<template>

   <div class="bg-white border rounded-2xl shadow-sm w-[277px]" v-bind:id="id">
    <router-link :to="'/profile/'+ id">
        <a href="#">
            <img class="rounded-t-2xl " :src="image" alt="" />
        </a>

        <div class="flex items-center">
            <img class="w-11 h-11 rounded-full ml-4" :src="image" alt="">
            <div class="p-3">
            <a href="#">
                <p class="text-xl font-bold">{{ fname }} {{ lname }}</p>
            </a>
            <p class="font-semibold text-secondary">@{{ insta_handle }}</p>
            </div>
        </div>
      </router-link>
    </div>

</template>

<script>
import axios from 'axios';
export default{
    name: "TalentCard",
    props:{
      id:Number,
      fname:String,
      lname:String,
      insta_handle:String,
      image:String
    },
}
</script>


