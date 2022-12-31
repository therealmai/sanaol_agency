<template>
  <Confirmation v-show="open" confirmationType="approved" :id="id">
    <template #confirm_body>
      <svg
        width="84"
        height="66"
        viewBox="0 0 84 66"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          d="M47.1065 16.5572C47.1065 25.5997 39.5859 32.9284 30.3065 32.9284C21.0271 32.9284 13.5065 25.5997 13.5065 16.5572C13.5065 7.51469 21.0271 0.186035 30.3065 0.186035C39.5859 0.186035 47.1065 7.51469 47.1065 16.5572ZM0.906494 61.8721C0.906494 49.274 11.3802 39.0676 24.3084 39.0676H36.3046C49.2327 39.0676 59.7065 49.274 59.7065 61.8721C59.7065 63.9696 57.9609 65.6707 55.8084 65.6707H4.80462C2.65212 65.6707 0.906494 63.9696 0.906494 61.8721ZM82.9378 22.8243L66.1377 39.1955C64.904 40.3977 62.909 40.3977 61.6884 39.1955L53.2884 31.0099C52.0546 29.8076 52.0546 27.8635 53.2884 26.6741C54.5221 25.4846 56.5171 25.4718 57.7377 26.6741L63.9065 32.6854L78.4753 18.4757C79.709 17.2734 81.704 17.2734 82.9246 18.4757C84.1453 19.678 84.1584 21.622 82.9246 22.8115L82.9378 22.8243Z"
          fill="#8075F1"
        />
      </svg>

      <h1 class="text-3xl text-secondary font-bold">Approve Confirmation</h1>
      <div>
        <h2 class="text-secondary text-2xl text-center">
          Are you sure you want to approve this application? Please confirm.
        </h2>
      </div>
    </template>
  </Confirmation >
</template>

<script>
import Confirmation from "../Confirmation.vue";
export default {
  name: "ApprovedConfirmModal",
  components: {
    Confirmation,
  },
  props: {
    open: {
      type: Boolean,
      required: true
    },
    id: String,
  }
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
