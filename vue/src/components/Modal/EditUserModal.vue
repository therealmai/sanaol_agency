<template>
  <transition name="modal-fade">
    <div
      class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-black bg-opacity-50 z-[1000]"
    >
      <div
        class="flex-col space-y-4 bg-white px-8 py-16 rounded-[4px] w-[546px] h-auto relative z-[2] md:m-w-[80%] md:px-8 md:py-4"
      >
        <!-- to insert custom content use slot="modal_content" in the main page -->

        <h1 class="font-bold text-2xl text-secondary">Edit User</h1>
        <button
          class="absolute top-2 right-8 rounded-full border border-black flex justify-center items-center w-5 h-5"
          @click="closeModal"
        >
          X
        </button>
        <div class="flex flex-col space-y-4">
          <div class="form-group">
            <label class="w-full" for="my-file" v-if="!preview">
              <div
                class="rounded-md flex flex-col items-center justify-center pt-5 pb-6 bg-neutral-300 hover:bg-neutral-200 w-[150px] h-[150px] cursor-pointer"
              >
                <svg
                  aria-hidden="true"
                  class="w-10 h-10 text-gray-400"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                  ></path>
                </svg>
              </div>
              <input
                :disabled="disabled"
                type="file"
                accept="image/*"
                @change="previewImage"
                class="form-control-file"
                id="my-file"
                hidden
              />
            </label>

            <div class="relative" v-if="preview">
              <button
                class="absolute top-[5px] left-[125px] rounded-full border border-black bg-white flex justify-center items-center w-5 h-5 hover:bg-black hover:text-white"
                @click="reset"
              >
                X
              </button>
              <img :src="preview" class="img-fluid h-[150px] w-[150px]" />
            </div>
          </div>

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
                :disabled="disabled"
                class="peer focus:outline-none border-none"
                id="first_name"
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
                :disabled="disabled"
                class="focus:outline-none border-none"
                id="last_name"
                type="text"
              />
            </div>
          </div>
          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <label class="text-sm text-neutral-500" for="role">Role</label>
            <input
              :disabled="disabled"
              class="focus:outline-none border-none"
              id="role"
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
              :disabled="disabled"
              class="focus:outline-none border-none"
              id="instagram_username"
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
              :disabled="disabled"
              id="email"
              type="email"
              class="invalid:text-red-500 focus:outline-none border-none"
            />
          </div>
          <div
            class="flex flex-row justify-between focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <div class="flex flex-col w-full">
              <label class="text-sm text-neutral-500" for="password">
                Password
              </label>
              <input
                :disabled="disabled"
                class="focus:outline-none border-none"
                id="password"
                :type="passwordFieldType"
                v-model="password"
              />
            </div>
            <button
              v-if="!disabled"
              @click="togglePasswordPreview"
              class="bg-black p-2 text-white"
            >
              Eyes
            </button>
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
            UPDATE
          </button>
          <button
            class="py-1 rounded-sm bg-white text-violet-500 border border-violet-500 w-1/5"
            @click="closeModal"
          >
            CANCEL
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
