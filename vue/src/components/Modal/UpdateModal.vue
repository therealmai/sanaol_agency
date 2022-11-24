<template >

    <Modal>
        <template #modal_content  >
            <div @click="close" class="flex flex-col justify-center items-center" >
              <span class=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" text-[#7367F0] w-[84px] h-[84px]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              </span>
              <h2 class="font-[700] text-[32px] text-secondary ">Updated</h2>
              <p class="font-[400] text-[18px] text-secondary text-center leading-[21.78px] max-w-[70%] py-2 pb-6">Successfully updated {{ text }}</p>

              <!-- <ConfirmButton text="OK" @click="close"></ConfirmButton> -->
            </div>

        </template>
    </Modal>

</template>

<script>
import Modal from "../Modal/Modal.vue";
import ConfirmButton from "../Buttons/ConfirmButton.vue";

export default {
  name: 'UpdateModal',
  components: {
    Modal,
    ConfirmButton
  },
  props: {
    text: String
  },
  methods:{
    close(){
      this.$emit('close');
    }
  }
};
</script>

<style>
</style>
