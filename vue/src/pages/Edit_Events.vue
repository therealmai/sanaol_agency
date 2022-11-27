<template>
<body style="margin-top: 20px;">

    
    <primary-button  text="cancel" height="25" width="100" color="White" fontSize="12" @click="$router.push('Events')"></primary-button>
    <form style="margin-left: 320px; margin-top: 20px;">
        <p1 style="font-weight: bold; font-size: 30px;">Edit Events</p1>
       
        <div style="margin-left: 100px; margin-top: 30px;">
            <img src="https://i.ytimg.com/vi/zPCZWn_iWb0/maxresdefault.jpg" alt="cute cat" style="width: 170px; height:168px; border-radius: 12px; ">
            <titled-input width="528" height="49.6" fontSize="16" title="Event Title" v-model="title"></titled-input><br>
            <titled-input width="528" height="49.6" fontSize="16" title="Event Date" v-model="date"></titled-input><br>
            <titled-input width="528" height="49.6" fontSize="16" title="Event Location" v-model="location"></titled-input><br>
            <titled-input width="528" height="49.6" fontSize="16" title="Event Type" v-model="type" ></titled-input><br><br>
            <input-tags text="Talents Involved" :width="528" :height=" 49"/>
            <titled-input width="528" height="49.6" fontSize="16" title="Event Description" v-model="description"></titled-input><br><br>
            
        <div class="flex">
            
            <primary-button class="mr-9" fontSize="12" color="white" text="Save" width="99" height="36"/>
            <primary-button class="mr-9" fontSize="12" color="white" text="Delete" width="99" height="36"/>
            <primary-button fontSize="12" color="white" text="Cancel" width="99" height="36"/>
        </div><br><br><br>
        </div>
    </form>
</body>
</template>

<script>
import PrimaryButton from '../components/Buttons/PrimaryButton.vue'
import TitledInput from '../components/Input/TitledInput.vue'
import InputTags from '../components/Input/InputTags.vue'
export default {
  components: { 
    PrimaryButton,
    TitledInput,
    InputTags,

     },
    data() {
        return {
             title: "Lorem Ipsum",
             date: "November 18, 2022",
             location: "Hong Kong Disneyland",
             type: "Beerfest",
             description: "1",
        };
    }
 };
</script>
<style scoped>

</style>