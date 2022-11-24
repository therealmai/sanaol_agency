<template>
  <transition name="modal-fade">
    <div
      class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-black bg-opacity-50 z-[1000]"
    >
      <div
        class="flex-col space-y-4 bg-white px-8 py-16 rounded-[4px] w-[652px] h-auto z-[2] md:m-w-[80%] md:px-8 md:py-4"
      >
        <!-- to insert custom content use slot="modal_content" in the main page -->

        <div class="flex flex-row justify-between items-center py-4">
          <h1 v-if="!editMode" class="font-bold text-2xl text-secondary">
            User ID
          </h1>
          <h1 v-else class="font-bold text-2xl text-secondary">Edit User</h1>
          <button
            class="rounded-full flex justify-center items-center w-5 h-5"
            @click="closeModal"
          >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
              <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
              <path
                d="M175 175C184.4 165.7 199.6 165.7 208.1 175L255.1 222.1L303 175C312.4 165.7 327.6 165.7 336.1 175C346.3 184.4 346.3 199.6 336.1 208.1L289.9 255.1L336.1 303C346.3 312.4 346.3 327.6 336.1 336.1C327.6 346.3 312.4 346.3 303 336.1L255.1 289.9L208.1 336.1C199.6 346.3 184.4 346.3 175 336.1C165.7 327.6 165.7 312.4 175 303L222.1 255.1L175 208.1C165.7 199.6 165.7 184.4 175 175V175zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"
              />
            </svg>
          </button>
        </div>
        <div class="flex flex-col space-y-4">
          <div class="form-group">
            <label class="w-[150px]" for="my-file" v-if="!preview">
              <div
                class="rounded-md flex flex-col items-center justify-center pt-5 pb-6 bg-neutral-300 w-[150px] h-[150px]"
                :class="{ 'hover:bg-neutral-200 cursor-pointer': editMode }"
              >
                <img v-if="imageUrl" v-bind:src="imageUrl" />
                <svg
                  v-else
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
                :disabled="!editMode"
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
                class="absolute top-[5px] left-[125px] rounded-full flex justify-center items-center w-5 h-5 hover:bg-white hover:text-white"
                @click="reset"
              >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                  <path
                    d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"
                  />
                </svg>
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
                :disabled="!editMode"
                class="peer focus:outline-none border-none"
                type="text"
                id="first_name"
                :placeholder="firstName ? firstName : 'Thomas'"
              />
            </div>
            <div
              class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
            >
              <label class="text-sm text-neutral-500" for="last_name"
                >Last Name</label
              >
              <input
                :disabled="!editMode"
                class="focus:outline-none border-none"
                id="last_name"
                type="text"
                :placeholder="lastName ? last_name : 'Shelby'"
              />
            </div>
          </div>
          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <label class="text-sm text-neutral-500" for="role">Role</label>
            <input
              :disabled="!editMode"
              class="focus:outline-none border-none"
              type="text"
              id="role"
              :placeholder="role ? role : 'User'"
            />
          </div>
          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <label class="text-sm text-neutral-500" for="instagram_username">
              Instagram Username
            </label>
            <input
              :disabled="!editMode"
              class="focus:outline-none border-none"
              type="text"
              id="instagram_username"
              :placeHolder="
                instagramUsername ? instagramUsername : '@NoelGwapo'
              "
            />
          </div>
          <div
            class="flex flex-col focus-within:border-violet-500 border rounded-md border-neutral-400 w-full pl-3 py-1"
          >
            <label class="text-sm text-neutral-500" for="email">
              Email Address
            </label>
            <input
              :disabled="!editMode"
              id="email"
              class="invalid:text-red-500 focus:outline-none border-none"
              type="email"
              :placeholder="emailAddress ? emailAddress : 'sample@email.com'"
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
                :disabled="!editMode"
                class="focus:outline-none border-none"
                id="password"
                :type="passwordFieldType"
                v-model="password"
                :placeholder="Test"
              />
            </div>
            <button v-if="editMode" @click="togglePasswordPreview" class="pr-3">
              <svg
                v-if="passwordFieldType === 'password'"
                class="w-5"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 576 512"
              >
                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                  d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z"
                />
              </svg>
              <svg
                v-else
                class="w-5"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 640 512"
              >
                <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                <path
                  d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c5.2-11.8 8-24.8 8-38.5c0-53-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zm223.1 298L373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5z"
                />
              </svg>
            </button>
          </div>
          <div class="flex flex-row justify-center space-x-3"></div>
        </div>
        <div class="flex flex-row justify-center space-x-3">
          <button
            v-if="!editMode"
            @click="toggleEditMode"
            class="py-1 rounded-sm bg-violet-500 text-white w-1/5"
          >
            EDIT
          </button>
          <button v-else class="py-1 rounded-sm bg-violet-500 text-white w-1/5">
            UPDATE
          </button>
          <button
            v-if="!editMode"
            class="py-1 rounded-sm bg-white text-violet-500 border border-violet-500 w-1/5"
            @click="closeModal"
          >
            CANCEL
          </button>
          <button
            v-else
            class="py-1 rounded-sm bg-white text-red-500 border border-red-500 w-1/5"
            @click="closeModal"
          >
            DELETE
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
    lastName: String,
    role: String,
    instagramUsername: String,
    imageUrl: URL,
    Password: "**********",

    text: String,
    fontSize: Number,
    height: Number,
    width: Number,
  },
  data() {
    return {
      editMode: false,
      password: "",
      passwordFieldType: "password",
      preview: null,
      image: null,
    };
  },
  methods: {
    toggleEditMode() {
      this.editMode = !this.editMode;
    },
    togglePasswordPreview() {
      this.passwordFieldType =
        this.passwordFieldType === "password" ? "test" : "password";
    },
    previewImage(event) {
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
    reset() {
      this.image = null;
      this.preview = null;
    },
    closeModal() {
      this.editMode = false;
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
