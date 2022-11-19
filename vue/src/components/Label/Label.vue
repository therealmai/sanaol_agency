<template>
  <div
    class="
      flex
      justify-center
      items-center
      outline
      outline-2
      outline-outline_border
      rounded-[4px]
      text-primary
      font-semibold
      hover:cursor-pointer
      text-center
    "
    
    :style="{
      padding: padding + 'px',
      margin: margin + 'px',
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
  name: "Label",
  props: {
    text: String,
    margin: Number,
    padding: Number,
    height: Number,
    width: Number,
    fontSize: Number,
    color: String,
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