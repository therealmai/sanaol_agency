<template>
  <Confirmation confirmationType="approved">
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
      <div
        class="w-full bg-[#f0efff] text-primary p-6 rounded-md border border-primary"
      >
        <div class="flex flex-row space-x-2">
          <svg
            width="28"
            height="28"
            viewBox="0 0 28 28"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M14.083 27.0685C21.5396 27.0685 27.583 21.1619 27.583 13.8739C27.583 6.58588 21.5396 0.679199 14.083 0.679199C6.62637 0.679199 0.583008 6.58588 0.583008 13.8739C0.583008 21.1619 6.62637 27.0685 14.083 27.0685ZM11.9736 17.9972H13.2393V14.6985H11.9736C11.2723 14.6985 10.708 14.147 10.708 13.4615C10.708 12.776 11.2723 12.2245 11.9736 12.2245H14.5049C15.2063 12.2245 15.7705 12.776 15.7705 13.4615V17.9972H16.1924C16.8937 17.9972 17.458 18.5487 17.458 19.2342C17.458 19.9197 16.8937 20.4712 16.1924 20.4712H11.9736C11.2723 20.4712 10.708 19.9197 10.708 19.2342C10.708 18.5487 11.2723 17.9972 11.9736 17.9972ZM14.083 10.5752C13.1496 10.5752 12.3955 9.83816 12.3955 8.92587C12.3955 8.01358 13.1496 7.27654 14.083 7.27654C15.0164 7.27654 15.7705 8.01358 15.7705 8.92587C15.7705 9.83816 15.0164 10.5752 14.083 10.5752Z"
              fill="#7367F0"
            />
          </svg>
          <h3>
            <strong>Warning: </strong>Denying this user will also delete
            information pertaining to the account.
          </h3>
        </div>
      </div>
    </template>
  </Confirmation>
</template>

<script>
import Confirmation from "../Confirmation.vue";
export default {
  name: "DeniedConfirmationModal",
  components: {
    Confirmation,
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
