<template>
  <transition name="modal-fade">
    <div
      class="flex items-center justify-center w-full h-full fixed top-0 left-0 bg-black bg-opacity-50 z-[1000]"
    >
      <div
        class="flex items-center justify-center flex-col space-y-4 bg-white px-8 py-16 rounded-[4px] w-[250px] h-[250px] relative z-[2] md:m-w-[80%] md:px-8 md:py-4"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 512 512"
          class="w-[84px]"
        >
          <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
          <path
            d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"
          />
        </svg>
        <h1 class="text-3xl">Updated</h1>
        <h2>Successfully updated user</h2>
      </div>
      <div class="absolute w-full h-full shadow-sm"></div>
    </div>
  </transition>
</template>

<script>
export default {
  name: "UpdatedModal",
  methods: {
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
