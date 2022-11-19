<template>
  <div
    class="
      flex
      justify-center
      items-center
      bg-primary
      rounded-[4px]
      text-textButtons text-buttonText
      font-normal
      hover:cursor-pointer
      text-center
      p-4
      text-white
    "
    :class="
      hover != undefined ? `hover:bg-${hover}` : 'hover:bg-primaryHovered'
    "
    :style="{
      height: height + 'px',
      width: width + 'px',
      fontSize: fontSize + 'px',
    }"
  >
    {{ finalText }}
  </div>
</template>

<script>
export default {
  name: "LearnButton",
  props: {
    text: String,
    height: Number,
    width: Number,
    fontSize: Number,
    color: String,
    hover: String,
  },
  computed: {
    finalText() {
      return this.text;
    },
  },
};
</script>

<style scoped>
</style>