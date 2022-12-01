<template>
    <!-- Back button idea -->
    <!-- <button class="mt-6 ml-6" @click="$router.go(-1)">Back</button> -->
    <!-- <button class="mt-6 ml-6 text-[#7367F0] w-16 text-center border rounded-lg" style="background: #F6F5FF;"><a href="../pages/Hero.vue">Back</a></button> -->

  <div class="mt-6 ml-32 mb-10 w-3/4 flex flex-col flex-row justify-center items-center">
    <h1 class="font-bold text-xl flex-row">Edit Hero Banner</h1><br>
    
    <div class="ml-6 flex-auto">
        <p class="text-gray-400">I. Wecome Banner</p>
        <div class="ml-6 p-1">
            <p class="text-gray-400">Header Photos (1920 x 892, MAX 5)</p>
            
            <!-- header photo from file. haven't set the size and choosing multiple times,, -->
            <div>
                <input type="file" ref="preview" @change="uploadFile">
            </div>
            <div v-if="url" style="position:relative">
                <div style="position:absolute" @click="deletePreview"><p class="text-2xl">×</p></div>
                <img src="url" class="rounded-lg"  alt="header picture">
            </div>
            <br><br>
            
            <!-- text-input. class didn't work,, -->
            <TextInput class="w-4/5 h-[30px]" title="Welcome Banner Header - Talent/Admin"/><br>
            <TextInput class="w-4/5 h-[100px]" title="Welcome Banner Header - General"/><br>
            <TextInput class="w-4/5 h-[30px]" title="Welcome Banner Subheader - Talent/Admin"/><br>
            <TextInput class="w-4/5 h-[30px]" title="Welcome Banner Subheader - General"/><br>
            
        </div><br>
    </div>

    <!-- select option (manual) -->
    <div class="ml-6 flex-auto">
        <p class="text-gray-400">II. Featured Events</p>
        <select v-model="newsSetting" class="w-[370px] h-[40px] 
            outline outline-gray-400 outline-2 rounded-md">
            <option value="">Events Preview Setting</option>
            <!-- selecting news -->
            <option>A</option>
            <option>B</option>
            <option>C</option>
        </select>
    </div><br>

    <!-- changing picture (manual) -->
    <div class="ml-6 flex-auto">
        <p class="text-gray-400">III. Featured Services</p>
        <div class="ml-6 grid gap-1">
            <p class="text-gray-400">Service Header 1</p>
            <img src="url(https://images.pexels.com/photos/1543793/pexels-photo-1543793.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2)" width="167px" height="167px" style="object-fit: none;" class="rounded-lg" alt="service header">
            <text-input title="Service Header"/>
            <text-input title="Service Short Description"/><br><br>

            <p class="text-gray-400">Service Header 2</p>
            <img src="url(https://images.pexels.com/photos/1543793/pexels-photo-1543793.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2)" width="167px" height="167px" style="object-fit: none;" class="rounded-lg" alt="service header">
            <text-input title="Service Header"/>
            <text-input title="Service Short Description"/><br><br>
        </div>
    </div>

    <!-- select option (manual) -->
    <div class="ml-6 flex-auto">
        <p class="text-gray-400 p-1">IV. Featured News</p>
        <select v-model="newsSetting" class="w-[370px] h-[40px] 
            outline outline-gray-400 outline-2 rounded-md">
            <option value="">News Preview Setting</option>
            <!-- selecting news -->
            <option>A</option>
            <option>B</option>
            <option>C</option>
        </select>
    </div><br><br>

    <!-- Save and Cancel buttons -->
    <div class="grid gap-2 sm:grid-cols-2 flex">
      <PrimaryButton 
        class="w-[95px] h-[36px] inline-block bg-indigo-500 text-white shadow-md focus:shadow-lg
            hover:shadow-lg hover:text-indigo-500 hover:bg-gray-50 outline-primary outline-1 outline
             focus:ring-0 active:shadow-lg transition duration-300 fontsize:20px" 
        text="Save" @click="showModal"/>  
      <CancelButton class="flex-auto" text="Cancel" @click="$router.go(-1)"/>

      <!-- Each modal must have a v-show property and close method to toggle its visibility  -->
      <Modal v-show="isModalVisible">
        <template #modal_content>
            <span class="pr-2"><br>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  fill="currentColor" class="w-14 h-14 text-[#7367F0]"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" clip-rule="evenodd"/></svg>
            </span><br>
            Are you sure you want to save the changes made on the hero banner? Please confirm.
        </template>
  
        <!-- buttons here -->
        <template #modal_button>
            <Info text="Saving the changes will change what the public sees on the hero banner."/>
          <div class="flex flex-row space-x-6 ">
            <ConfirmButton text="CONFIRM" @click="update"/>
            <CancelButton text="CANCEL" @click="closeModal"/>
          </div>
        </template>
      </Modal>

      <UpdateModal v-show="isUpdated" text="hero banner" @close="closeModal"/>
        
    </div>
  </div>
</template>

<script>
import Modal from "../components/Modal/Modal.vue";
import PrimaryButton from '../components/Buttons/PrimaryButton.vue';
import TextInput from '../components/Input/TextInput.vue';
import ConfirmButton from "../components/Buttons/ConfirmButton.vue";
import CancelButton from "../components/Buttons/CancelButton.vue";
import UpdateModal from "../components/Modal/UpdateModal.vue";
import Info from "../components/Others/Info.vue"

export default {
  components: {
    Modal,
    PrimaryButton,
    TextInput,
    ConfirmButton,
    CancelButton,
    UpdateModal,
    Info
  },
  data() {
      return {
        text: 'Cancel',
        isUpdated: false,
        isModalVisible: false,
        url:""
      };
    },
    props: {
      text: String
    },
    methods: {
      showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
        this.isUpdated = false;
        this.$emit('close');
      },
    //   closeModal() {
    //     this.isModalVisible = false;
    //   }, 
    //   closeModal(){
    //     this.isUpdated = false;
    //     this.$emit('close');
    //   },
       update(){
         this.isUpdated = true;
       },
      uploadFile(){
        const file = this.$refs.preview.files[0];
        this.url = URL.createObjectURL(file);
        this.$refs.preview.value = "";
      },
      deletePreview(){
        this.url = '';
        URL.revokeObjectURL(this.url);
      }
    }
}
</script>
