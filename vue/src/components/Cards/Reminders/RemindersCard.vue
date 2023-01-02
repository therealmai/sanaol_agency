<template>
    <div class="flex flex-col justify-center content-center reminders-box">
        <div class="flex justify-center gap-10">
            <div>
                <!-- image -->
                <img id="img-position" style="height: 200px; width: 330px;" :src="image" alt="alternatetext">
            </div>

            <div class=" w-[700px] h-[200px] flex flex-col justify-center items-start p-1">
                <!-- label -->
                <Label class="" :fontSize="12" :height="25" :width="width" :text="label"></Label>
                <!-- title with link-->
                <a :href="link" class="font-bold text-[22px] text-primary pt-4">
                    {{title}}
                </a>
                <!-- details -->
                <p class="font-medium text-[14px] text-detailText pt-2">
                    <span>{{date}}</span> | <span>{{location}}</span>
                </p>
                <!-- description -->
                <p class="font-normal leading-normal text-[14px] text-secondary pt-1 overflow-hidden">
                    {{content}}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import Label from '../../Label/Label.vue';

export default {
  name: 'RemindersCard',
  components: {
    Label
  },
  props: {
    image: String,
    width: Number,
    label: String,
    link: String,
    title: String,
    date: String,
    location: String,
    content: String,
  },
  computed: {
  },
};
</script>

<style>
.reminders-box {
    box-shadow: 0px 7px 7px 2px #e1e0e0;
    border-radius: 15px;
    width: 1000px;
    padding: 20px 30px 20px 20px;
}
.text-bold {
    font-weight: bold;
    font-size: 29px;
    color: #525252;
}
</style>
