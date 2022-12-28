<template>
  <label class="text-textInput font-normal">
    <div style= "position: absolute;margin-top:35px;margin-left:15px; font-size: 14px;">{{ title }} </div>
    <br />
      <!-- TODO: When verification is set up, bind padding-right to state to accomodate Password eye icon. -->
      <input 
      :value="modelValue"
      @input="$emit('update:modelValue',$event.target.value)"
        type="text"
        :maxlength="limit"
        class="
          pl-4
          pr-4
          bg-inputField
          rounded-[2px]
          text-inputText
          outline
          outline-inputOutline
          box-outline
          text-color
          pb-5
          pt-10
        "
        style = "color: #525252; white-space: pre-wrap; "
        :style ="{ width: width + 'px', height: height + 'px', fontSize: fontSize + 'px' }"


        :class="errorFlag == true ? 'border-2 border-error' : 'border-none'"
        :autofocus="focus"
      />
      <div class="absolute right-5 top-2">
        <font-awesome-icon
          size="xs"
          class="hover:cursor-pointer stroke-2"
          :icon="errorFlag === true ? 'xmark' : 'check'"
          :class="errorFlag === true ? 'text-error' : 'text-primary'"
        />
      </div>
      <ErrorText :text="errorText" v-if="errorFlag" :align="errorAlign" />
  </label>

</template>

<script>
import ErrorText from "./ErrorText.vue";

export default {
  name: "TitledInput",
  components: {
    ErrorText,
  },
  watch: {
    input(update) {
      this.$emit("update", update);
    },
  },
  props: {
    default:String,
    title: String,
    limit: Number,
    focus: Boolean,
    errorAlign: String,
    errorText: String,
    width: Number,
    height: Number,
    fontSize: Number,
    modelValue: String,
  },
  data() {
    return {
      errorFlag: Boolean,
      emptyFlag: Boolean,
      input: "",
    };
  },
  mounted() {
    this.input = this.default;
    this.emptyFlag = true;
    this.errorFlag = false;
  },
  emits: ["update"],
};
</script>

<style scoped>
</style>