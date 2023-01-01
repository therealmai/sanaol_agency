<template>
  <Modal>
    <template #modal_content>
      <svg
        class="h-[84px] fill-error-light"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 512 512"
      >
        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
        <path
          d="M175 175C184.4 165.7 199.6 165.7 208.1 175L255.1 222.1L303 175C312.4 165.7 327.6 165.7 336.1 175C346.3 184.4 346.3 199.6 336.1 208.1L289.9 255.1L336.1 303C346.3 312.4 346.3 327.6 336.1 336.1C327.6 346.3 312.4 346.3 303 336.1L255.1 289.9L208.1 336.1C199.6 346.3 184.4 346.3 175 336.1C165.7 327.6 165.7 312.4 175 303L222.1 255.1L175 208.1C165.7 199.6 165.7 184.4 175 175V175zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"
        />
      </svg>

      <h1 class="text-3xl text-secondary font-bold">Delete Confirmation</h1>
      <div>
        <h2 class="text-secondary text-2xl text-center">
          Are you sure you want to delete <em class="font-bold">{{ name }}</em>?
        </h2>
        <h2 class="text-secondary text-2xl text-center">Please confirm</h2>
      </div>
      <div
        class="w-full bg-error-bg text-error-strong p-6 rounded-md border border-error-strong"
      >
        <div class="flex flex-row space-x-2">
          <svg
            class="fill-error-strong h-[23px]"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"
          >
            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
            <path
              d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32z"
            />
          </svg>
          <h3>
            <strong>Warning: </strong>Deleting this user will also delete
            information pertaining to the account.
          </h3>
        </div>
      </div>
    </template>
    <template #modal_button>
      <div class="flex flex-row space-x-3">
        <ConfirmButton text="Confirm" @click="confirm"/>
        <CancelButton text="Cancel" @click="close" />
      </div>
    </template>
  </Modal>
</template>
<script>
import Modal from "../Modal.vue";
import ConfirmButton from "../../Buttons/ConfirmButton.vue";
import CancelButton from "../../Buttons/CancelButton.vue";

export default {
  name: "DeleteUserConfirmationModal",
  components: {
    Modal,
    ConfirmButton,
    CancelButton,
  },
  props: {
    text: String,
    name: String,
  },
  methods: {
    close() {
      this.$emit("close");
    },
    confirm() {
      this.$emit("confirm");
    },
    
  },
};
</script>
