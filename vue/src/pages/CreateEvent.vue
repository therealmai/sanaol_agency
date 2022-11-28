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
            
            <FilledButton class="mr-9" fontSize="12" color="white" text="Publish" width="99" height="36"/>
            <OutlineButton class="mr-9" fontSize="12" color="white" text="Cancel" width="99" height="36"/>
        </div><br><br><br>
        </div>
    </form>
</body>
</template>

<script>
import FilledButton from '../components/Buttons/FilledButton.vue'
import TitledInput from '../components/Input/TitledInput.vue'
import InputTags from '../components/Input/InputTags.vue'
import OutlineButton from '../components/Buttons/OutlineButton.vue'
export default {
  components: { 
    FilledButton,
    TitledInput,
    InputTags,
    OutlineButton

     },
    data() {
        return {
             title: "",
             date: "",
             location: "",
             type: "",
             description: "",
        };
    }
 };
</script>
<style scoped>

</style>