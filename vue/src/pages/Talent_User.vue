<template>

  <body>
      <div class="w-full">
        <!-- background cover -->
        <div class="bg-background2 relative h-[321px]">
            <!-- profile title-->
            <div><h1 class="pl-[83px] pt-[53px] font-bold leading-[38.73px] text-[32px] text-[#525252] relative ">Profile</h1></div>
        
            <!-- profile content -->
            <div class="flex flex-row justify-center items-center relative top-[150px] flex-wrap gap-6 mx-10 ">
              <!-- image -->
              <img class="w-[158px] h-[158px] object-cover rounded-[50%]" src="https://pixy.org/src2/573/thumbs350/5733959.jpg" alt="alternatetext">
              <div class="text-primary space-y-4 font-inter">
                      <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                          <p class="font-bold text-[32px] m-0 p-0">Juan De la Cruz</p>
                          <p class="font-semibold text-[20px] p-0">@juandelacruz</p>
                        </div>
                        <div class="flex items-center ">
                          <!-- button -->
                          <EditBtn style="padding-right:30px" text="Edit Profile" @click="showModal"></EditBtn>
                        </div>
                      </div>
                    <p class=" max-w-[968px] text-[20px] leading-[22px] font-normal text-[#A8A8A8]"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit aut suscipit eum minus, omnis adipisci dicta molestiae corrupti laudantium exercitationem mollitia ipsa illo cupiditate sunt accusamus maxime nostrum aliquid. Praesentium?</p>
              </div>
            </div>
        </div>
  
        <div>
            <div class="flex flex-row justify-center md:mt-[120px] sm:mt-[100px]  mb-[250px] ml-[160px] gap-4 h-[667.12px]">
              <!-- pictures inserted here -->

              <!-- <div :style="{ backgroundImage: `url(${post.image})` }"></div> -->
              <div class="card-zoom">
                <div class="card-zoom-image" style="background-image: url('https://pixy.org/src2/624/thumbs350/6241751.jpg')"></div>
              </div>
                
                
                <div class="flex flex-col gap-4">
                  <div class="card-zoom">
                    <div class="card-zoom-image h-full w-[468.06px] rounded-[8px]" style="background-image: url('https://pixy.org/src2/624/thumbs350/6241752.jpg')"></div>
                  </div>

                  <div class="card-zoom">
                    <div class="card-zoom-image h-full w-[468.06px] rounded-[8px]" style="background-image: url('https://pixy.org/src2/624/thumbs350/6241753.jpg')"></div>
                  </div>


                </div>
            </div>
        </div>
        
        <!-- profile modal display here -->
        <ProfileModal v-show="isProfileVisible" text="Profile Modal" @profile="closeModal">
          <template v-slot:profile_body>
            <!-- content here -->
              <div class="flex flex-col w-[800px] max-h-[756px] mt-[30px] space-y-4">  

                <span class="text-[32px] font-bold text-[#525252]">Edit Profile</span>
                <div class="flex flex-row gap-10">
                  <img class="w-[158px] h-[158px] object-cover rounded-[50%]" src="https://pixy.org/src2/573/thumbs350/5733959.jpg" alt="alternatetext">

                    <div class="h-[450px] w-full">
                        <form action="">
                            <div class="flex flex-row gap-4 ">
                              <InputField title="First Name"></InputField>
                              <InputField title="Last Name"></InputField>
                            </div>
                            <InputField title="Instagram Username"></InputField>
                            <TextArea title="Biography"></TextArea>
                        </form>
                    </div>

                    <!-- featured photos -->

                    
                </div>
              </div>
          </template>
        </ProfileModal>
  
      </div>
  </body>
  
    
  </template>
  
  
  <script>
  import EditBtn from '../components/Buttons/EditButton.vue';
  import ProfileModal from '../components/Modal/ProfileEditModal.vue';
  import InputField from '../components/Input/InputField.vue';
  import TextArea from '../components/Input/TextArea.vue';


  export default{
    components: {
      EditBtn,
      InputField,
      TextArea,
      ProfileModal
    },
    data() {
    return {
      isProfileVisible: false
    }
  },
  methods: {
      showModal() {
        this.isProfileVisible = true;
      },
      closeModal() {
        this.isProfileVisible = false;
      }
      }
 };
  
  </script>
  
  <style>
  </style>
  