<template>
  <div>
    <PrimaryButton text="BACK" color="blueviolet" width="100" fontSize="12" style="background-color: lavender; border: 1px solid black; margin-top: 20px; margin-left: 20px;"></PrimaryButton>
      <div class="flex items-center justify-between ml-[15%] mr-[20%] mb-[25px]">
          <div style="font-size: xx-large; margin-bottom: 8px; font-weight: 500;"> News </div>
           <!-- SHOW ONLY IF THE ACCOUNT IS ADMIN -->
          <div class="flex w-fit" v-if="true">
              <PrimaryButton text="DELETE" color="blueviolet" width="100" fontSize="12" class="float-right" style="background-color: white; border: 1px solid black;"></PrimaryButton>
              &nbsp;
              <PrimaryButton text="EDIT" color="white" width="100" fontSize="12" class="float-right" style="margin 15px;"></PrimaryButton>
          </div>
      </div>

      <div class="text-center mx-[20%]">
          <center><img width="880" height="495" :src="news.image" /></center>
          <div style="font-size: xx-large; margin-bottom: 8px; font-weight: 500;"> {{news.title}} </div>
          <div style="font-size: large; margin-bottom: 8px; font-weight: 200;"> {{news.created_at}} </div>
      </div>

      <p class="text-justify my-[10px] mx-[20%] mb-[10%]">
          {{news.content}}
      </p>
  </div>
</template>

<script>
import PrimaryButton from '../components/Buttons/PrimaryButton.vue';

import axios from 'axios'

export default {
  name: 'News',
  data () {
    return {
      //dummy data
      news: {
        title: 'Pikachu. Thats the title.',
        content: 'I scowl with frustration at myself in the mirror. Damn my hair—it just won’t behave, and damn Katherine Kavanagh for being ill and subjecting me to this ordeal. I should be studying for my final exams, which are next week, yet here I am trying to brush my hair into submission. I must not sleep with it wet. I must not sleep with it wet. Reciting this mantra several times, I attempt, once more, to bring it under control with the brush. I roll my eyes in exasperation and gaze at the pale, brown-haired girl with blue eyes too big for her face staring back at me, and give up. My only option is to restrain my wayward hair in a ponytail and hope that I look semi-presentable.Kate is my roommate, and she has chosen today of all days to succumb to the flu. Therefore, she cannot attend the interview she’d arranged to do, with some mega-industrialist tycoon I’ve never heard of, for the student newspaper. So I have been volunteered. I have final exams to cram for and one essay to finish, and I’m supposed to be working this afternoon, but no—today I have to drive 165 miles to downtown Seattle in order to meet the enigmatic CEO of Grey Enterprises Holdings, Inc. As an exceptional entrepreneur and major benefactor of our university, his time is extraordinarily precious—much more precious than mine—but he has granted Kate an interview. A real coup, she tells me. Damn her extracurricular activities.',
        image: 'https://animecorner.me/wp-content/uploads/2022/05/Spy-x-family-06-31.png',
        created_at: 'July 14, 2022'
      },
      real_news: []
    }
  },
  mounted() {
    axios.get('http://127.0.0.1:8000/api/news/'+this.$route.params.id).then(function (response) {
      var received_data = response.data.data
      //I cannot pass the response to news so I put dummy data on news for now.
      //On console log, pls confirm that the right data was fetched
      console.log(received_data)
    })
  },
  components: {
      PrimaryButton
  },
  computed: {

  },
};
</script>

<style>
</style>
