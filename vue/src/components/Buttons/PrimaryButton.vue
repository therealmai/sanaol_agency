<template>
  <button
    v-on:click="callBack"
    class="
      flex
      justify-center
      items-center
      bg-primary
      rounded-[4px]
      text-textButtons text-buttonText
      font-bold
      hover:cursor-pointer
      text-center
      p-2
    "
    :class="
      hover != undefined ? `hover:bg-${hover}` : 'hover:bg-primaryHovered'
    "
    :style="{
      height: height + 'px',
      width: width + 'px',
      color: color,
      fontSize: fontSize + 'px',
    }"
  >
    {{ finalText }}
  </button>
</template>

<script>
export default {
  name: "PrimaryButton",
  props: {
    text: String,
    height: String,
    width: String,
    fontSize: String,
    color: String,
    hover: String,
  },
  methods: {
    callBack() {
      this.$emit('onClick');
    }
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