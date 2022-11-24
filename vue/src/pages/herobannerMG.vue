<template> 
<body>
    <div class="flex flex-col heroManage">
    <div class="w-full object-cover h-screen lg:w-full md:h-screen bg-cover bg-center" style="background-image:url(https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2850&q=80);"></div>
 
    <div class="flex flex-row flex-wrap gap-4 justify-center ml-20 mr-20 mt-16">

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
            <div class="flex items-center justify-between">

            </div>
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
        <div class="">

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
            <div class=""> 
            
            </div>
            <div class="">
                <input type="text" v-model="discription" placeholder="Service Short Descriptioin"></input>
            </div>
        </div>

        <div class="">
            <h3 class="">
                Service Header 2
            </h3>
            <div class=""> 
                <img style="width: 160px; height: 160px; border-radius: 8px" src="" alt="">
            </div>
            <div class="">
                <input type="text" v-model="discription" placeholder="Service Short Descriptioin"></input>
            </div>

            <h3>
                Service Header 1
            </h3>
            <div class=""> 
                <img style="width: 160px; height: 160px; border-radius: 8px" src="" alt="">
            </div>
            <div class="">
                <input type="text" v-model="discription" placeholder="Service Short Descriptioin"></input>
            </div>
        </div>
    </div>
    
    <div>
        <h2 class="">
            IV. Featured News
        </h2>
        <div class="">
            <select v-model="newsSetting">
            <option disabled value="">News Preview Setting</option>
            <option>A</option>
            <option>B</option>
            <option>C</option>
            </select>
        </div>
    </div>
  
    <primary-button text="Save" @click=""></primary-button>
    <primary-button text="Cancel" @click=""></primary-button>
</div>
</div>
</div>
</body>
</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
import Footer from '../components/Footer/Footer.vue';
import Modal from "../Modal/Modal.vue";
import PrimaryButton from '../components/Buttons/PrimaryButton.vue';
import ConfirmButton from "../Buttons/ConfirmButton.vue";
import Confirmation from '../components/Modal/Confirmation.vue';
import UpdateModal from '../components/Modal/UpdateModal.vue';
import CancelButton from '../components/Buttons/CancelButton.vue';
import PrimaryButton from '../components/Buttons/PrimaryButton.vue';
import PrimaryButton from '../components/Buttons/PrimaryButton.vue';

/*
export default{
  components: {
    Navbar,
    Footer,
    Modal,
    PrimaryButton,
    ConfirmButton,
    Confirmation,
    UpdateModal,
    CancelButton
  },
}
*/

export default{
    Navbar,
    Footer,
    Modal,
    PrimaryButton,
    ConfirmButton,
    UpdateModal,
    CancelButton,

    name: 'heroManage',
    components: {
    Confirmation,
    Modal,
    UpdateModal,
    PrimaryButton,
    PrimaryButton
},
    // data(): {
    //     return {
    //         confirm_body: "Are you sure you want to save the changes made on the hero banner? Please confirm.";
    //     },
    // },
    props: {
            text: String,
    },
    methods: any,
}


</script>

<style>
</style>