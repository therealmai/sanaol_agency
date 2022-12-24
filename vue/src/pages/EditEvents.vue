<template>
<body style="margin-top: 20px;">
    
    <primary-button  text="cancel" height="25" width="100" color="White" fontSize="12" @click="$router.push('Events')"></primary-button>
    <div style="margin-left: 320px; margin-top: 20px;">
        <p1 style="font-weight: bold; font-size: 30px;">Edit Events</p1><br><br><br><br>
       
        <div style="margin-left: 100px; margin-top: 30px;">
            
            <form>
                    <div class="file-upload-section">
                    
                    <div class="file-upload">
                    <label class="upload-box" for="file-upload" >+</label>
                    <label id="preview" for="file-upload">
                        <img style="height:184px;width:170px;position: absolute;margin-top: -101px; z-index: 3" :key="events.image" v-if="events.image" :src="events.image" />
                        </label>
                    <input type="file" id="file-upload" @change="onFileChange" hidden/>
                        
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
            </form>
            

<br><br><br>
            <div >
            <titled-input width="528" height="49.6" fontSize="16" title="Event Title" v-model="events.title"></titled-input><br>
        
            <titled-input width="528" height="49.6" fontSize="16" title="Event Date" v-model="events.date"></titled-input><br>
            <titled-input width="528" height="49.6" fontSize="16" title="Event Location" v-model="events.location"></titled-input><br>
            <titled-input width="528" height="49.6" fontSize="16" title="Event Type" v-model="events.event_type" ></titled-input><br><br>
            <titled-input width="528" height="49.6" fontSize="16" title="Event Description" v-model="events.content"></titled-input><br><br>
            </div>
        <div class="flex gap-4">
            <FilledButton class="mr-9" fontSize="12" color="white" text="Save" width="99" height="36" @click="showUpdateModal"/>
            <!-- <OutlineButton class="mr-9" fontSize="12" color="white" text="Delete" width="99" height="36" @click="showDeleteModal"/> -->
            <OutlineButton fontSize="12" color="white" text="Cancel" width="99" height="36" @click="goBackToEvents"/>
        </div><br><br><br>
        </div>

        <!-- Modal appears after you click the SAVE button -->
        
        <Modal v-show="isUpdateModalVisible">
            <template v-slot:modal_content>
                <svg xmlns="http://www.w3.org/2000/svg" width="67" height="67" viewBox="0 0 67 67" fill="none">
                <path d="M62.2746 2.58296C59.4087 -0.282861 54.7763 -0.282861 51.9105 2.58296L47.9716 6.50874L60.7828 19.3199L64.7216 15.381C67.5874 12.5152 67.5874 7.88276 64.7216 5.01694L62.2746 2.58296ZM23.1214 31.372C22.3232 32.1703 21.7082 33.1517 21.3548 34.2378L17.4814 45.8582C17.1019 46.9835 17.4029 48.2267 18.2404 49.0773C19.0779 49.9279 20.321 50.2158 21.4595 49.8363L33.0798 45.9628C34.1529 45.5964 35.1343 44.9945 35.9457 44.1962L57.8384 22.2904L45.0142 9.46616L23.1214 31.372V31.372ZM13.1238 8.11831C6.18823 8.11831 0.561279 13.7453 0.561279 20.6808V54.1808C0.561279 61.1164 6.18823 66.7433 13.1238 66.7433H46.6238C53.5593 66.7433 59.1863 61.1164 59.1863 54.1808V41.6183C59.1863 39.3021 57.315 37.4308 54.9988 37.4308C52.6826 37.4308 50.8113 39.3021 50.8113 41.6183V54.1808C50.8113 56.497 48.94 58.3683 46.6238 58.3683H13.1238C10.8076 58.3683 8.93628 56.497 8.93628 54.1808V20.6808C8.93628 18.3646 10.8076 16.4933 13.1238 16.4933H25.6863C28.0025 16.4933 29.8738 14.622 29.8738 12.3058C29.8738 9.9896 28.0025 8.11831 25.6863 8.11831H13.1238Z" fill="#8075F1"/>
                </svg>
                <h1 class="modal-heading">Update Confirmation</h1>
                <p class="modal-paragraph">Are you sure you want to save the changes<br>made on this service? Please confirm.</p>
                <Info text="Saving the changes will change what the public sees on the services page."></Info>
                <div class="flex gap-10 mt-5 mb-5">
                    <FilledButton id="updateButton" class="w-[100px]" text="CONFIRM" @click="sendPatchRequest(), confirmUpdateModal()"></FilledButton>
                    <OutlineButton class="w-[100px]" text="CANCEL" @click="closeUpdateModal()"></OutlineButton>
                </div>
            </template>
        </Modal>
        
         <!-- Modal appears after you click the CONFIRM button -->
         <UpdateModal text="events" v-show="isConfirmUpdateModal">
         </UpdateModal>

         <!-- Modal appears after you click the DELETE button -->   
        <!-- <Modal v-show="isDeleteModalVisible">
            <template v-slot:modal_content>
            <svg xmlns="http://www.w3.org/2000/svg" width="84" height="84" viewBox="0 0 84 84" fill="none">
            <path d="M28.7109 28.7109C30.2531 27.1852 32.7469 27.1852 34.1414 28.7109L41.8523 36.4383L49.7109 28.7109C51.2531 27.1852 53.7469 27.1852 55.1414 28.7109C56.8148 30.2531 56.8148 32.7469 55.1414 34.1414L47.5617 41.8523L55.1414 49.7109C56.8148 51.2531 56.8148 53.7469 55.1414 55.1414C53.7469 56.8148 51.2531 56.8148 49.7109 55.1414L41.8523 47.5617L34.1414 55.1414C32.7469 56.8148 30.2531 56.8148 28.7109 55.1414C27.1852 53.7469 27.1852 51.2531 28.7109 49.7109L36.4383 41.8523L28.7109 34.1414C27.1852 32.7469 27.1852 30.2531 28.7109 28.7109ZM84 42C84 65.1984 65.1984 84 42 84C18.8016 84 0 65.1984 0 42C0 18.8016 18.8016 0 42 0C65.1984 0 84 18.8016 84 42ZM42 7.875C23.1492 7.875 7.875 23.1492 7.875 42C7.875 60.8508 23.1492 76.125 42 76.125C60.8508 76.125 76.125 60.8508 76.125 42C76.125 23.1492 60.8508 7.875 42 7.875Z" fill="#FF7878"/>
            </svg>
                <h1 class="modal-heading">Delete Confirmation</h1>
                <p class="modal-paragraph">Are you sure you want to delete this<br>event? Please confirm.</p>
                <Warning text="Deleting this will also delete information pertaining to the event."></Warning>
                <div class="flex gap-10 mt-5 mb-5">
                    <FilledButton class="w-[100px]" text="CONFIRM" @click="deleteRequest(),confirmDeleteModal()"></FilledButton>
                    <OutlineButton class="w-[100px]" text="CANCEL" @click="closeDeleteModal"></OutlineButton>
                </div>
            </template>
        </Modal> -->
        
        <!-- Modal appears after you click the CONFIRM button -->
        <DeletedModal text="events" v-show="isConfirmDeleteModal">
        </DeletedModal>
    </div>
</body>
</template>

<script>
import FilledButton from '../components/Buttons/FilledButton.vue'
import TitledInput from '../components/Input/TitledInput.vue'
import InputTags from '../components/Input/InputTags.vue'
import OutlineButton from '../components/Buttons/OutlineButton.vue'
import Modal from '../components/Modal/Modal.vue'
import Info from '../components/Others/Info.vue'
import UpdateModal from '../components/Modal/UpdateModal.vue'
import Warning from '../components/Others/Warning.vue'
import DeletedModal from '../components/Modal/DeletedModal.vue'

import axios from '../axios'

export default {
  components: { 
    FilledButton,
    TitledInput,
    InputTags,
    OutlineButton,
    Modal,
    Info,
    UpdateModal,
    Warning,
    DeletedModal 
    },
    data() {
        return {
            events: {},
            url: '',
            prev:'',
            isUpdateModalVisible: false,
            isDeleteModalVisible: false,
        }
    },
    mounted() {
        axios.get('events/' + this.$route.params.id).then(
            (response) => {
            this.events = response.data.data,
            console.log("event"),
            console.log(this.events)
            }
        )
    },
    methods: {
        async deleteRequest() {
            axios.delete('events/' + this.$route.params.id, {
                params: {
                    id: this.$route.params.id
                }
            })
            .then(function(response){
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        async sendPatchRequest() {
            axios.patch('events/' + this.$route.params.id, {
                user_id: this.events.user_id,
                title : this.events.title,
                content : this.events.content,
                image : this.events.image,
                author : this.events.author,
                event_type : this.events.event_type,
                location : this.events.location,
                date : this.events.date,
                ref : this.events.ref
            })
            .then(response => {
                console.log("event"),
                console.log(this.events.title)
                console.log(response)
                
            })
            .catch(error => {
                console.log(error)
            });
        },
        onFileChange (e) {
            let file = e.target.files[0]
            this.url = URL.createObjectURL(file)
            this.prev = this.events.image
            this.events.image = this.url
        },
        removeImage: function () {
            this.url = null
            this.events.image = this.prev
        },
        goBackToEvents() {
            this.$router.push('/events_management');
        },
        showUpdateModal() {
            this.isUpdateModalVisible = true;
        },
        closeUpdateModal() {
            this.isUpdateModalVisible = false;
        },
        confirmUpdateModal() {
            this.isUpdateModalVisible = false;
            this.isConfirmUpdateModal = true;
        },
        showDeleteModal(){
            this.isDeleteModalVisible = true;
        }, 
        // closeDeleteModal() {
        //     this.isDeleteModalVisible = false;
        // },
        // confirmDeleteModal() {
        //     this.isDeleteModalVisible = false;
        //     this.isConfirmDeleteModal = true;
        // }
    },
    
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

.modal-heading {
    color: #525252;
    font-size: 32px;
    font-weight: bold;
}

.modal-paragraph {
    color: #525252;
    font-size: 18px;
    text-align: center;
}
</style>