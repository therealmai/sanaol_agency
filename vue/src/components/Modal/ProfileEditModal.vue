<template>
  <div>
    <Modal>
      <template v-slot:modal_content>
            <!-- insert code here -->
            <slot name="profile_body"/>
            
        </template>

        <template v-slot:modal_button>
            <!-- insert buttons to toggle display of modal -->
            <div class="flex flex-row gap-6 ml-[655px]">
              <Btn @click="showModal" text="Save"></Btn>
              <CancelBtn @click="close" text="Close"></CancelBtn>
            </div>
            
        </template>
    </Modal>
    
    <ConfirmModal v-show="isVisible" @close="closeModal" @update="toggleUpdate">
        <template #confirm_body>
              <!-- Write code here -->
                <div class="flex flex-col justify-center items-center space-y-2">
                    <!-- icon write up -->
                    <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-[66.31px] h-[66.31px] text-[#7367F0]">
                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                          </svg>
                    </span>

                    <!-- title -->
                    <h2 class="font-[700] text-[32px] text-secondary ">Update Confirmation</h2>
                    <!-- update text -->
                    <p class="font-[400] text-[18px] text-secondary text-center leading-[21.78px] px-12">Are you sure you want to save the changes made on the hero banner? Please confirm.</p>
                    <!-- more info -->
                    <Info text="Saving the changes will completely change what the public sees on your profile."></Info>
                </div>
          </template>
      </ConfirmModal>

   

  </div>
</template>

<script>
import Modal from './Modal.vue';
import ConfirmModal from './Confirmation.vue';
import Btn from "../Buttons/ConfirmButton.vue";
import CancelBtn from "../Buttons/CancelButton.vue";
import Info from '../Others/Info.vue';

export default {
  components:{
    Modal,
    ConfirmModal,
    CancelBtn,
    Btn,
    Info
  },
  props: {
    text: String
  },
  data() {
    return {  
      isVisible: false,
    }
  },
  methods: {
      toggleUpdate(){
        this.isVisible = false;
        this.$emit('update');
      },
      showModal() {
        this.isVisible = true;
      },
      closeModal() {
        this.isVisible = false;
      },
      close(){
      this.$emit('profile');
      }
    }
};
</script>

<style>
</style>
