<template>
<body style="margin-top: 20px;">
    <primary-button  text="cancel" height="25" width="100" color="White" fontSize="12" @click="$router.push('Events')"></primary-button>
    <div style="margin-left: 300px; margin-top: 20px;">
        <p1 style="font-weight: bold; font-size: 30px;">Edit Events</p1>
        <div style="margin-left: 30px;">
            <img src="https://i.ytimg.com/vi/zPCZWn_iWb0/maxresdefault.jpg" alt="cute cat" style="width: 388px; height: 222px">
            <p1>Input</p1><br>
            <p1>Input</p1><br>
            <p1>Input</p1>
        </div>
    </div>
</body>
</template>

<script>
import PrimaryButton from '../components/Buttons/PrimaryButton.vue'
export default {
  components: { 
    PrimaryButton
     },
}
</script>
