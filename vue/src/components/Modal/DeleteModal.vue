<template >

    <Modal>
        <template #modal_content  >
            <div @click="close" class="flex flex-col justify-center items-center" >
              <span class=""><svg width="80" height="85" viewBox="0 0 80 85" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24.0303 3.51523L22.7623 5.86133H5.85685C2.73989 5.86133 0.22168 8.20742 0.22168 11.1113C0.22168 14.0152 2.73989 16.3613 5.85685 16.3613H73.4788C76.5958 16.3613 79.114 14.0152 79.114 11.1113C79.114 8.20742 76.5958 5.86133 73.4788 5.86133H56.5733L55.3054 3.51523C54.3545 1.72695 52.3998 0.611328 50.269 0.611328H29.0667C26.9359 0.611328 24.9812 1.72695 24.0303 3.51523ZM73.4788 21.6113H5.85685L9.59014 77.2285C9.8719 81.3793 13.57 84.6113 18.0253 84.6113H61.3104C65.7657 84.6113 69.4638 81.3793 69.7455 77.2285L73.4788 21.6113Z" fill="#9086F2"/>
                </svg>
              </span>
              <h2 class="font-[700] text-[32px] text-secondary ">Deleted</h2>
              <p class="font-[400] text-[18px] text-secondary text-center leading-[21.78px] max-w-[70%] py-2 pb-6">Successfully {{ text }}</p>

              <!-- <ConfirmButton text="OK" @click="close"></ConfirmButton> -->
            </div>

        </template>
    </Modal>

</template>

<script>
import Modal from "../Modal/Modal.vue";
import ConfirmButton from "../Buttons/FilledButton.vue";

export default {
  name: 'DeleteModal',
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
