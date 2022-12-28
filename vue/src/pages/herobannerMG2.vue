<template>
    <div>        
        
  <!-- select option (manual) -->
  <div class="ml-6 flex-auto">
      <p style="color:#A8A8A8; font-family:Inter; font-size:24px; font-weight: 500;">II. Featured Events</p>
                    <div>
                      
                            <svg width="10" height="14" viewBox="0 0 10 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1880_110)">
                            <path d="M4.67112 9.99632C5.02268 10.3137 5.59362 10.3137 5.94518 9.99632L9.54518 6.74632C9.80393 6.51273 9.87987 6.16487 9.73924 5.86019C9.59862 5.5555 9.27237 5.35745 8.90674 5.35745L1.70674 5.35999C1.34393 5.35999 1.01487 5.55804 0.874241 5.86273C0.733616 6.16741 0.812366 6.51527 1.0683 6.74886L4.6683 9.99886L4.67112 9.99632Z" fill="#979797"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_1880_110">
                            <rect width="9" height="13" fill="white" transform="translate(0.806641 0.484985)"/>
                            </clipPath>
                            </defs>
                            </svg>
                    </div>
      <select v-model="newsSetting" class="w-[529px] h-[53px] 
          outline outline-gray-400 outline-2 rounded-md ml-5">
          <option value="" selected disabled>Show 3 of most recent news</option>
          
          <!-- selecting news -->
          <option value="">A</option>
          <option value="">B</option>
          <option value="">C</option>
      </select>
  </div><br>

  <!-- changing picture (manual) -->
  <div class="ml-7 flex-auto">
      <p style="color:#A8A8A8; font-family:Inter; font-size:24px; font-weight: 500;">III. Featured Services</p>
      <div class="ml-6 p-1 ml-5">
          <p style="color:#A8A8A8; font-family:Inter; font-size:20px; font-weight: 400;">Service Header 1</p>
          <img src="url{{services.image}}" width="167px" height="167px" style="object-fit: none;" class="rounded-lg" alt="service header">
          <TitledInput :fontSize="18" :width="525" :height="53" class="w-4/5 h-[30px]"  title= "Service Header" v-model="services.title"/><br>
          <TitledInput :fontSize="18" :width="525" :height="120" class="w-4/5 h-[100px]" title="Short Service Description" v-model="services.content"/><br>

          <p style="color:#A8A8A8; font-family:Inter; font-size:20px; font-weight: 400;">Service Header 2</p>
          <img src="url{{services.image}}" width="167px" height="167px" style="object-fit: none;" class="rounded-lg" alt="service header">
          <TitledInput :fontSize="18" :width="525" :height="53" class="w-4/5 h-[30px]"  title= "Service Header" v-model="services.title"/><br>
          <TitledInput :fontSize="18" :width="525" :height="120" class="w-4/5 h-[100px]" title="Short Service Description" v-model="services.content"/><br>
      </div>
  </div>

  <!-- select option (manual) -->
  <div class="ml-6 flex-auto">
      <p style="color:#A8A8A8; font-family:Inter; font-size:24px; font-weight: 500;">IV. Featured News</p>
      <select v-model="herobanner.preview_news" class="w-[527px] h-[30px] 
          outline outline-gray-400 outline-2 rounded-md ml-5">
             <option value="" selected disabled>Show 3 of most recent news</option>
          <!-- selecting news -->
          <option>A</option>
          <option>B</option>
          <option>C</option>
      </select>
  </div><br><br>

  <!-- Save and Cancel buttons -->
  <div class="grid gap-2 sm:grid-cols-2 flex">
    <FilledButton 
      class="w-[95px] h-[36px] inline-block bg-indigo-500 text-white shadow-md focus:shadow-lg
          hover:shadow-lg hover:text-indigo-500 hover:bg-gray-50 outline-primary outline-1 outline
           focus:ring-0 active:shadow-lg transition duration-300 fontsize:20px" 
      text="Save" @click="showModal"/>  
    <OutlineButton class="flex-auto" text="Cancel" @click="$router.go(-1)"/>

    <Modal v-show="isModalVisible">
      <template #modal_content>
          <span class="pr-2"><br>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  fill="currentColor" class="w-14 h-14 text-[#7367F0]"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.8 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" clip-rule="evenodd"/></svg>
          </span><br>
          Are you sure you want to save the changes made on the hero banner? Please confirm.
      </template>

      <template #modal_button>
          <Info text="Saving the changes will change what the public sees on the hero banner."/>
        <div class="flex flex-row space-x-6 ">
          <FilledButton text="CONFIRM" @click="update"/>
          <OutlineButton text="CANCEL" @click="closeModal"/>
        </div>
      </template>
    </Modal>

    <UpdateModal v-show="isUpdated" text="hero banner" @close="closeModal"/>
      
  </div>
</div>


</template>

<script>
import Modal from "../components/Modal/Modal.vue";
import TitledInput from '../components/Input/TitledInput.vue';
import UpdateModal from "../components/Modal/UpdateModal.vue";
import Info from "../components/Others/Info.vue"
import FilledButton from "../components/Buttons/FilledButton.vue"
import OutlineButton from "../components/Buttons/OutlineButton.vue"
import axios from "../axios"

export default {
components: {
  Modal,
  FilledButton,
  TitledInput,
  UpdateModal,
  Info,
  OutlineButton
},

}
</script>

<style>

</style>