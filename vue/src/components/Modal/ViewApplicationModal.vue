<template>
  <transition name="modal-fade">
    <div
      class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-black bg-opacity-50 z-[1000]"
    >
      <div
        class="flex-col space-y-4 bg-white px-8 py-16 rounded-[4px] w-[546px] h-auto relative z-[2] md:m-w-[80%] md:px-8 md:py-4"
      >
        <!-- to insert custom content use slot="modal_content" in the main page -->

        <h1 class="font-bold text-2xl text-secondary">Application ID</h1>
        <button
          class="absolute top-2 right-8 rounded-full border border-black flex justify-center items-center w-5 h-5"
          @click="closeModal"
        >
          X
        </button>
        <div class="flex flex-col space-y-4">
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
                id="first_name_app"
                type="text"
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
                id="last_name_app"
                type="text"
              />
            </div>
          </div>
          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <label class="text-sm text-neutral-500" for="role">Role</label>
            <input
              class="focus:outline-none border-none"
              id="role_app"
              type="text"
            />
          </div>
          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <label class="text-sm text-neutral-500" for="instagram_username">
              Instagram Username
            </label>
            <input
              class="focus:outline-none border-none"
              id="instagram_username_app"
              type="text"
            />
          </div>
          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <label class="text-sm text-neutral-500" for="email">
              Email Address
            </label>
            <input
              id="email_app"
              type="email"
              class="invalid:text-red-500 focus:outline-none border-none"
            />
          </div>
          <div
            class="flex flex-row justify-between focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <div class="flex flex-col w-full">
              <label class="text-sm text-neutral-500" for="why_app">
                Why do you want to join System?
              </label>
              <textarea class="focus:outline-none"></textarea>
            </div>
          </div>
          <div class="flex flex-row justify-center space-x-3"></div>
        </div>
        <div class="flex flex-row justify-center space-x-3">
          <button
            v-if="disabled"
            @click="toggleDisabledForm"
            class="py-1 rounded-sm bg-violet-500 text-white w-1/5"
          >
            EDIT
          </button>
          <button v-else class="py-1 rounded-sm bg-violet-500 text-white w-1/5">
            APPROVE
          </button>
          <button
            class="py-1 rounded-sm bg-white text-violet-500 border border-violet-500 w-1/5"
            @click="closeModal"
          >
            DENY
          </button>
        </div>

        <!-- modal close button -->
      </div>
      <div class="absolute w-full h-full"></div>
    </div>
  </transition>
</template>

<script>
export default {
  name: "Modal",
  props: {
    firstName: String,
    LastName: String,
    Role: String,
    InstagramUsername: String,
    Password: "**********",

    text: String,
    fontSize: Number,
    height: Number,
    width: Number,
  },
  data: function () {
    return {
      disabled: true,
      password: "",
      passwordFieldType: "password",
      preview: null,
      image: null,
    };
  },
  methods: {
    toggleDisabledForm() {
      this.disabled = !this.disabled;
    },
    togglePasswordPreview() {
      this.passwordFieldType =
        this.passwordFieldType === "password" ? "test" : "password";
    },
    previewImage: function (event) {
      var input = event.target;
      if (input.files) {
        var reader = new FileReader();
        reader.onload = (e) => {
          this.preview = e.target.result;
        };
        this.image = input.files[0];
        reader.readAsDataURL(input.files[0]);
      }
    },
    reset: function () {
      this.image = null;
      this.preview = null;
    },
    closeModal() {
      this.$emit("close");
    },
  },
};
</script>

<style>
.modal-fade-enter,
.modal-fade-leave-to {
  opacity: 0;
}

.modal-fade-enter-active,
.modal-fade-leave-active {
  transition: opacity 0.5s ease;
}
</style>
