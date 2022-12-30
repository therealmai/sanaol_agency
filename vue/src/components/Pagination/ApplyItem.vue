<template>
  <div
    class="flex min-w-max justify-between gap-x-2 py-1 px-8 bg-white border-t border-divider"
  >
    <div class="w-3/12 min-w-max grid grid-cols-4 grid-rows-4">
      <div class="text-[#696969] col-span-2 row-span-4">Image</div>
      <div class="text-[#696969] col-span-2 row-span-2">
        {{ fname }} {{ lname }}
      </div>
      <div class="text-[#696969] col-span-2 row-span-2">{{ handle }}</div>
    </div>
    <span class="w-4/12 min-w-max text-[#696969]">{{ email }}</span>
    <span class="w-2/12 min-w-max text-[#696969]">{{ user_type }}</span>
    <span
      class="flex flex-row justify-center flex-nowrap text-[#696969] gap-x-2"
    >
      <FilledButton class="w-[100px]" text="APPROVE" />
      <OutlineButton class="w-[100px]" text="DENY" />
    </span>
  </div>
</template>

<script>
import FilledButton from "../Buttons/FilledButton.vue";
import OutlineButton from "../Buttons/OutlineButton.vue";
export default {
  name: "ApplyItem",
  components: {
    FilledButton,
    OutlineButton,
  },
  props: {
    id: Number,
    fname: String,
    lname: String,
    handle: String,
    email: String,
    user_type: String,
  },
  mounted() {
    console.log("props");
  },
};
</script>

<style lang="postcss" scoped></style>
