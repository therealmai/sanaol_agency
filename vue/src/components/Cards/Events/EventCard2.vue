<template>

    <div class="flex justify-center gap-10">
      <div class="bg-lightgray w-[387.77px] h-[221.47px] border rounded-[8px]"></div>

      <div class=" w-[700px] h-[221.47px] flex flex-col justify-center items-start p-4">
          <!-- label -->
          <!-- <Label class="" :fontSize="16" :height="33" :width="102" text="EVENTS"></Label> -->
          <!-- subtitle -->
          <span class="font-bold text-[30px] text-primary pt-4"  @click="this.$router.push('/news/'+2)">
            Lorem ipsum dolor sit amet
          </span>
          <!-- details -->
          <p class="font-medium text-[16px] text-detailText pt-0">
            <span>November 15, 2022</span> | <span>University of San Carlos - Talamban Campus</span>
          </p>
          <!-- description -->
          <p class="font-normal leading-normal text-[16px] text-secondary pt-0">
            Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          </p>
        <div class="flex items-center  ml-[60%] gap-[2%] mt-[25px] mb-[25px] w-full" v-show="userType == 'admin'">
            <OutlineButton text="Delete" class="w-[123px]" @click="showModal"></OutlineButton>
            <FilledButton text="Edit" class="w-[93px]" @click="this.$router.push('/news/edit/'+1)"></FilledButton>
        </div>
        <Modal v-show="isModalVisible" @close="closeModal"></Modal>

      </div>

    </div>

  </template>

  <script>
  import Label from '../../Label/Label.vue';
  import OutlineButton from '../../Buttons/OutlineButton.vue';
  import FilledButton from '../../Buttons/FilledButton.vue';

  import Modal from '../../Modal/News Modals/DeleteNews.vue'

  import { useStore } from 'vuex'
  import { computed } from 'vue'


  export default {
    name: 'EventCard2',
    components: {
      Label,
      OutlineButton,
      FilledButton,
      Modal

    },
    methods: {
      showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      },
    },
    setup() {
      const store = useStore();

      return {
        user: computed(() => store.state.user.data),
      }
    },
    mounted() {
      this.userType = this.user['user_type']
      console.log(this.userType);
    },
    data() {
      return {
        userType: '',
        isModalVisible: false,

      }
    }
  };
  </script>

  <style>
  </style>
