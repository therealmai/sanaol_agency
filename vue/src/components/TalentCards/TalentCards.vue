<template>

   <div class="bg-white border rounded-2xl shadow-sm w-[277px]" v-bind:id="id">
    <router-link :to="'/Profile/'+ id">
        <a href="#">
            <img class="rounded-t-2xl " src="{{ this.image }}" alt="" />
        </a>

        <div class="flex items-center">
            <img class="w-11 h-11 rounded-full ml-4" src="{{ this.image }}" alt="Neil image">
            <div class="p-3">
            <a href="#">
                <p class="text-xl font-bold">{{ fname }} {{ lname }}</p>
            </a>
            <p class="font-semibold text-secondary">{{ insta_handle }}</p>
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
    },
    data(){
      return {
        image: ""
      }
    },
    mounted(){
      axios.get('http://127.0.0.1:8000/api/user/image/'+this.id).then(
      (response) => {
        this.image = response.data.image
      })
    }
}
</script>


