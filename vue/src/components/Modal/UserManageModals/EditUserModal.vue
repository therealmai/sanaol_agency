<template>
  <div>
    <Modal>
      <template #modal_content>
          <div class="flex flex-row space-x-3 font-bold text-2xl mb-3">
          Edit User
          </div>
        <div class="flex flex-col space-y-3">
          <div class="flex flex-row space-x-3">
            <div
              class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
            >
              <label
                class="text-sm text-neutral-500 peer-focus:text-black"
                for="first_name"
                >First Name</label
              >
              <input
                class="peer focus:outline-none border-none"
                type="text"
                id="first_name"
                :placeholder="fname ? fname : 'Thomas'"
                @input="(event) => (fname = event.target.value)"
              />
            </div>
            <div
              class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
            >
              <label class="text-sm text-neutral-500" for="last_name"
                >Last Name</label
              >
              <input
                class="focus:outline-none border-none"
                id="last_name"
                type="text"
                :placeholder="lname ? lname : 'Shelby'"
                @input="(event) => (lname = event.target.value)"
              />
            </div>
          </div>

          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <label
              class="text-sm text-neutral-500 peer-focus:text-black"
              for="first_name"
              >Email Address</label
            >
            <input
              class="peer focus:outline-none border-none"
              type="text"
              id="first_name"
              :placeholder="email ? email : 'leeroy@jenkins.com'"
              @input="(event) => (email = event.target.value)"
            />
          </div>
          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <label
              class="text-sm text-neutral-500 peer-focus:text-black"
              for="first_name"
              >Instagram Handle</label
            >
            <input
              class="peer focus:outline-none border-none"
              type="text"
              id="first_name"
              :placeholder="handle ? handle : 'ljenkins'"
              @input="(event) => (handle = event.target.value)"
            />
          </div>
          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full px-3 py-1"
          >
            <label class="text-sm text-neutral-500" for="role"> Role </label>
            <select
              @change="(e) => (user_type = e.target.value)"
              id="role"
              class="indent-0 bg-gray-50 border border-transparent rounded-lg outline-transparent focus:ring-transparent focus:border-transparent block w-full p-2.5"
            >
              <option :value="user_type">{{ user_type }}</option>
              <option value="admin">ADMIN</option>
              <option value="talent">TALENT</option>
              <option value="general">GENERAL</option>
            </select>
          </div>
        </div>
      </template>
      <template #modal_button>
        <div class="flex flex-row space-x-3">
          <ConfirmButton text="Edit" @click="edit" />
          <ConfirmButton text="LOG" @click="clog" />
          <CancelButton text="Cancel" @click="close" />
        </div>
      </template>
    </Modal>
    <SuccessModal
      :id="id"
      @hide="closeSuccessfulModal"
      :text="fname"
      v-show="isSuccessfulModalVisible"
    />
  </div>
</template>

<script>
import axiosClient from "../../../axios";
import Modal from "../Modal.vue";
import ConfirmButton from "../../Buttons/ConfirmButton.vue";
import CancelButton from "../../Buttons/CancelButton.vue";
import SuccessModal from "./SuccessModal.vue";

export default {
  name: "EditUserModal",
  data() {
    return {
      isSuccessfulModalVisible: false,
    };
  },
  components: {
    Modal,
    ConfirmButton,
    CancelButton,
    SuccessModal,
  },
  props: {
    text: String,
    name: String,

    id: Number,
    fname: String,
    lname: String,
    handle: String,
    email: String,
    user_type: String,
  },
  methods: {
    close() {
      this.$emit("close");
    },
    clog() {
      console.clear();
      console.log("ID", this.id);
      console.log("FNAME", this.fname);
      console.log("LNAME", this.lname);
      console.log("HANDLE", this.handle);
      console.log("EMAIL", this.email);
      console.log("USER_TYPE", this.user_type);
    },

    showSuccessfulModal() {
      this.isSuccessfulModalVisible = true;
    },
    closeSuccessfulModal() {
      this.isSuccessfulModalVisible = false;
    },
    edit() {
      axiosClient
        .patch(`/users/${this.id}`, {
          fname: this.fname,
          lname: this.lname,
          insta_handle: this.handle,
          email: this.email,
          user_type: this.user_type,
        })
        .then((res) => {
          if (res.status == 200) {
            console.log("B4");
            this.isSuccessfulModalVisible = true;
            setTimeout(() => {
              console.log("A4");
              this.isSuccessfulModalVisible = false;
              this.$emit("close");
              this.$router.go();
            }, 1500);
          }
        });
    },
  },
};
</script>
