<template>
<body style="margin-top: 20px;">

    
    <primary-button  text="cancel" height="25" width="100" color="White" fontSize="12" @click="$router.push('Events')"></primary-button>
    <form style="margin-left: 320px; margin-top: 20px;">
        <p1 style="font-weight: bold; font-size: 30px;">Create Event</p1><br><br><br><br>
       
        <div style="margin-left: 100px; margin-top: 30px;">
            <!-- <input type="file" @change="handleFileUpload" id="upload-file" style="z-index: ;" hidden/>
            <img  v-if="post.image" :src="post.image" style="height:184px;width:170px; position: absolute; z-index: 3" />
            <! <input type="file" id="upload-file" name="upload-file" >
            <! <label class="upload-box" for="upload-file" refs="upload-file">+</label> -->
            <div class="file-upload-section">
                
                <div class="file-upload">
                <label class="upload-box" for="file-upload" >+</label>
                <input type="file" id="file-upload" @change="onFileChange" hidden/>

                <label id="preview" for="file-upload">
                    <img style="height:184px;width:170px;position: absolute;margin-top: -101px; z-index: 3" :key="url" v-if="url" :src="url" />
                </label>
                </div>
                <div v-if="url">
                    <button style="position: absolute;z-index: 4;top: 10.8%;margin-left: 159px;" @click="removeImage()">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_326_3033)">
                            <path d="M9.43848 16.5938C13.5806 16.5938 16.9385 13.2359 16.9385 9.09375C16.9385 4.95161 13.5806 1.59375 9.43848 1.59375C5.29634 1.59375 1.93848 4.95161 1.93848 9.09375C1.93848 13.2359 5.29634 16.5938 9.43848 16.5938Z" fill="white" stroke="#525252" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.6885 6.84375L7.18848 11.3438" stroke="#525252" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.18848 6.84375L11.6885 11.3438" stroke="#525252" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_326_3033">
                            <rect width="18" height="18" fill="white" transform="translate(0.438477 0.09375)"/>
                            </clipPath>
                            </defs>
                        </svg>
                    </button>
                </div>
            </div>
            

            <br><br><br><br><br>
            <input type="text" placeholder="Event Title" class=" pl-4 pr-4 py-[14px] bg-inputField rounded-[2px] text-inputText outline outline-inputOutline box-outline text-color " style=" width: 528px; height: 49.6px;" /><br><br>
            <input type="text" placeholder="Event Date" class=" pl-4 pr-4 py-[14px] bg-inputField rounded-[2px] text-inputText outline outline-inputOutline box-outline text-color " style=" width: 528px; height: 49.6px;" /><br><br>
            <input type="text" placeholder="Event Location" class=" pl-4 pr-4 py-[14px] bg-inputField rounded-[2px] text-inputText outline outline-inputOutline box-outline text-color " style=" width: 528px; height: 49.6px;" /><br><br>
            <input type="text" placeholder="Event Type" class=" pl-4 pr-4 py-[14px] bg-inputField rounded-[2px] text-inputText outline outline-inputOutline box-outline text-color " style=" width: 528px; height: 49.6px;" /><br><br>
            <input-tags text="Talents Involved" :width="528" :height=" 49"/><br>
            <input type="text" placeholder="Event Description" class=" pl-4 pr-4 py-[14px] bg-inputField rounded-[2px] text-inputText outline outline-inputOutline box-outline text-color " style=" width: 528px; height: 49.6px;" /><br><br>
        <div class="flex">
            
            <FilledButton class="mr-9" fontSize="12" color="white" text="Save" width="99" height="36"/>
            <OutlineButton class="mr-9" fontSize="12" color="white" text="Delete" width="99" height="36"/>
            <OutlineButton fontSize="12" color="white" text="Cancel" width="99" height="36"/>
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
import TextInput from '../components/Input/TextInput.vue'

export default {
  components: { 
    FilledButton,
    TitledInput,
    InputTags,
    OutlineButton,
    TextInput
    },
    methods: {
        onFileChange (e) {
            let file = e.target.files[0]
            this.url = URL.createObjectURL(file)
        },
        removeImage: function () {
            this.url = null
        }
    },
    data() {
        return {
             title: "Lorem Ipsum",
             date: "November 18, 2022",
             location: "Hong Kong Disneyland",
             type: "Beerfest",
             description: "1",
             url: null,
             
        };
    }
 };
</script>
<style scoped>

.upload-box {
    padding-left: 80.4px;
    padding-right: 80.4px;
    padding-top:80.4px;
    padding-bottom: 80.4px;
    background-color: #D9D9D9;
    z-index: -1;
}


</style>