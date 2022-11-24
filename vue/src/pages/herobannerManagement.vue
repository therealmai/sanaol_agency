<template>

<body>
  <div class="flex flex-col">
    <h1 class="fond-bold">
        Edit Hero Banner
    </h1>

    <div class="flex items-center justify-between">
        <h2 class="">
            I. Wecome Banner
        </h2>
        <div class="">
            <h3 class="">
                Header Photos (1920 x 892, MAX 5)
            </h3>
        </div>
        <div class="">
            <input type="text" v-model="TAheader" placeholder="Welcome Banner Header - Talent/Admin"></input>
            <textarea v-model="TAsubheader" placeholder="Welcome Banner Subheader - Talent/Admin"></textarea>
            
            <input type="text" v-model="GEheader" placeholder="Welcome Banner Header - General"></input>
            <textarea v-model="GEsubheader" placeholder="Welcome Banner Subheader - General"></textarea>
        </div>
    </div>
 
    <div class="">
        <h2 class="flex flex-row flex-wrap justify-center ml-20 mr-20 mt-14">
            II. Featured Events
        </h2>
        <div>
            
        </div>
    </div>
  
    <div>
        <h2>
            III. Featured Services
        </h2>
        <div>
            <h3>
                Service Header 1
            </h3>
        </div>

        <div>
            <h3>
                Service Header 2
            </h3>
        </div>
    </div>
    
    <div>
        <h2>
            IV. Featured News
        </h2>
        <div>
            
        </div>
    </div>
  
</div>
</body>
</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
import PrimaryButton from '../components/Buttons/PrimaryButton.vue';
//import EventCard from '../components/Cards/Events/EventCard.vue';
//import ServiceCard from '../components/Cards/Service/ServiceCard.vue';
//import NewsCard from '../components/Cards/News/NewsCard.vue';
//import Divider from '../components/Divider/Divider.vue';
import Label from '../components/Label/Label.vue';
import ConfirmModal from '../components/Modal/Confirmation.vue';
import UpdateModal from '../components/Modal/UpdateModal.vue';


export default{
  components: {
    Navbar,
    PrimaryButton,
    EventCard,
    ServiceCard,
    NewsCard,
    Divider,
    Label
  },
}


</script>

<style>
</style>