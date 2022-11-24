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
                        <EditBtn style="padding-right:30px" text="Edit Profile"></EditBtn>
                      </div>
                    </div>
                  <p class=" max-w-[968px] text-[20px] leading-[22px] font-normal text-[#A8A8A8]"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit aut suscipit eum minus, omnis adipisci dicta molestiae corrupti laudantium exercitationem mollitia ipsa illo cupiditate sunt accusamus maxime nostrum aliquid. Praesentium?</p>
            </div>
          </div>
      </div>

      <div>
          <div class="flex flex-row justify-center md:mt-[120px] sm:mt-[100px]  mb-[250px] ml-[160px] gap-4 h-[667.12px]">
            <!-- pictures inserted here -->
              <div class="bg-[#ECECFF] h-full w-[468.06px]  rounded-[8px]"></div>
              <div class="flex flex-col gap-4">
                <div class="bg-[#ECECFF] h-full w-[468.06px] rounded-[8px]"></div>
                <div class="bg-[#ECECFF] h-full w-[468.06px] rounded-[8px]"></div>
              </div>
          </div>
      </div>


    </div>
</body>

  
</template>


<script>
import Navbar from '../components/Navigation/Navbar.vue';
import Footer from '../components/Footer/Footer.vue';
import EditBtn from '../components/Buttons/EditButton.vue';
export default{
  components: {
    Navbar,
    Footer,
    EditBtn
  },
}
</script>

<style>
</style>
