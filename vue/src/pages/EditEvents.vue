<template>
<body style="margin-top: 20px;">
    
    <primary-button  text="cancel" height="25" width="100" color="White" fontSize="12" @click="$router.push('Events')"></primary-button>
    <div style="margin-left: 320px; margin-top: 20px;">
        <p1 style="font-weight: bold; font-size: 30px;">Edit Events</p1><br><br><br><br>
       
        <div style="margin-left: 100px; margin-top: 30px;">
            

            <form enctype="multipart/form-data" method="patch" class="flex flex-col items-start gap-5" action="">
                <input type="file" accept="image/*" name="file" id="file" v-on:change="loadFile" style="display:none;"/>
                <label for="file">
                    <img id="imgEvents" :src="rootImgPath+previewImg" class="object-cover rounded-[8px] w-[166px] h-[166px]">
                </label>
                <br><br><br>
                <div >
                <titled-input width="528" height="49.6" fontSize="16" title="Event Title" v-model.trim="events.title"></titled-input><br>
                <titled-input width="528" height="49.6" fontSize="16" title="Event Date" v-model.trim="events.date"></titled-input><br>
                <titled-input width="528" height="49.6" fontSize="16" title="Event Location" v-model.trim="events.location"></titled-input><br>
                <titled-input width="528" height="49.6" fontSize="16" title="Event Type" v-model.trim="events.event_type" ></titled-input><br><br>
                <titled-input width="528" height="49.6" fontSize="16" title="Event Description" v-model.trim="events.content"></titled-input><br><br>
                </div>
     
            </form>
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
                <p class="modal-paragraph">Are you sure you want to save the changes<br>made on this event? Please confirm.</p>
                <Info text="Saving the changes will change what the public sees on the events page."></Info>
                <div class="flex gap-10 mt-5 mb-5">
                    <FilledButton id="updateButton" class="w-[100px]" text="CONFIRM" @click="updateEvent(), confirmUpdateModal()"></FilledButton>
                    <OutlineButton class="w-[100px]" text="CANCEL" @click="closeUpdateModal()"></OutlineButton>
                </div>
            </template>
        </Modal>
        
         <!-- Modal appears after you click the CONFIRM button -->
         <UpdateModal id="myupdatemodal" text="events" v-show="isConfirmUpdateModal" @click="closeModal">
         </UpdateModal>

        
        <!-- Modal appears after you click the CONFIRM button -->
        <DeletedModal id="mydeletemodal" text="events" v-show="isConfirmDeleteModal" @click="closeDeleteModal">
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
import {mapState} from 'vuex'

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
            events: {
                user_id: this.$store.state.user.data.id,
                title : '',
                content : '',
                image : '',
                author : this.$store.state.user.data.insta_handle,
                event_type : '',
                location : '',
                date : '',
                ref : ''
            },
            previewImg: '',
            rootImgPath: '',
            isUpdateModalVisible: false,
            isDeleteModalVisible: false,
        }
    },
    computed: {
        author() {
            return this.$store.state.user.data.insta_handle
        },
        userID() {
            return this.$store.state.user.data.id
        }
    },
    mounted() {
        let id = this.$route.params.id;
        axios.get('events/' + id).then(
            (response) => {
                if(response.status == 200) {
                    this.events = response.data.data,
                    this.previewImg = this.events.image;
                    let prot = this.events.image.slice(0, 4);
                    this.rootImgPath = prot === "http" ? '' : '/src/images/'; 
                }
            }
        )
    },
    methods: {
        
        updateEvent() {
                if(this.events.title == '' 
                    || this.events.date == '' 
                    || this.events.location == ''
                    || this.events.event_type == ''
                    || this.events.content == '') {
                    alert('All fields must be filled.');
                    this.isModalVisible = false;
                    return;
                }

                let data = new FormData;
                data.set('image', this.events.image);
                data.set('title', this.events.title);
                data.set('date', this.events.date);
                data.set('location', this.events.location);
                data.set('event_type', this.events.event_type);
                data.set('content', this.events.content);
                data.set('user_id', this.events.user_id);
                data.set('author', this.events.author);

                console.log(...data)

                let id = this.$route.params.id;
                axios.post('/events/' + id, data, {
                    headers: {
                        'Content-type': 'multipart/form-data'
                    }
                }).then(
                    (response) => {
                        console.log(response.data)
                    }
                )
        },
        loadFile(e) {
                let imgHtml = document.querySelector('#imgEvents');
                this.events.image = e.target.files[0];
                imgHtml.src = URL.createObjectURL(this.events.image);
            },
        // onFileChange (e) {
        //     let file = e.target.files[0]
        //     this.url = URL.createObjectURL(file)
        //     this.prev = this.events.image
        //     this.events.image = this.url
        // },
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
        closeModal(){
            var modal = document.getElementById("myupdatemodal");
            modal.style.display = "none";
        },
        closeDeleteModal(){
            var modal = document.getElementById("mydeletemodal");
            modal.style.display = "none";
        },
        

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