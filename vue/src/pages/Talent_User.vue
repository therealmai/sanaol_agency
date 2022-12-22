<template>

      <div class="w-full">
        <!-- background cover -->
        <div class="bg-background2 relative h-[321px]">
            <!-- profile title-->
            <div><h1 class="pl-[83px] pt-[53px] font-bold leading-[38.73px] text-[32px] text-[#525252] relative ">Profile</h1></div>
        
            <!-- profile content -->
            <div class="flex flex-row justify-center relative top-[150px] flex-wrap gap-6 mx-10">
              <!-- image -->
              <img class="w-[158px] h-[158px] object-cover rounded-[50%] flex justify-start" src="https://pixy.org/src2/573/thumbs350/5733959.jpg" alt="alternatetext">
              <div class="text-primary space-y-4 font-inter">
                      <div class="flex flex-row justify-between">
                        <div class="flex flex-col">
                          <p class="font-bold text-[32px] m-0 p-0 ">{{ user.fname }} {{ user.lname }}</p>
                          <p class="font-semibold text-[20px] p-0">@{{ user.insta_handle }}</p>
                        </div>
                        <div class="flex items-center ">
                        
                          <!-- edit button will show if the user talent-->
                          <div v-show="user.user_type == 'talent'">  
                            <EditBtn class="w-[150px]" text="Edit Profile" @click='showModal'></EditBtn>
                          </div>

                        </div>
                      </div>
                    <p class=" max-w-[968px] text-[20px] leading-[22px] font-normal text-[#A8A8A8] text-justify">{{ user.bio }}</p>
                    
                    <div class="mt-[99px] justify-center container grid grid-cols-3 gap-[21px] w-[970.74px] ">
                      <div v-for="image in images" v-bind:key="image.id">
                        <img class="mt-[15px] rounded-[8px] w-[308.65px] h-[235.43px]" :src="image.image"/>
                      </div>
                    </div>
              </div>
            </div>
        </div>
  
        
        
        <!-- profile modal display here -->
        <ProfileModal v-show="isProfileVisible" text="Profile Modal" @profile="closeModal" @update="showUpdate">
          <template v-slot:profile_body>
            <!-- content here -->
            <form id="edit" @submit="updateProfile" method="post">
              <div class="flex flex-col w-[800px] max-h-[756px] mt-[30px] space-y-4">  

                <span class="text-[32px] font-bold text-[#525252]">Edit Profile</span>
                <div class="flex flex-row gap-10">
                  
                  <input type="file" accept="image/*" name="file" id="file" @change="loadFile" style="display:none;"/>
                  <label for="file">
                    <div>
                      <!-- <div class="bg-black bg-opacity-0 p-4 hover:bg-opacity-50 transition-all duration-1000"> -->
                        <img id="talentImg" class=" hover:bg-black hover:bg-opacity-90 hover:cursor-pointer w-[160px] h-[130px] object-cover rounded-[50%]" :src="form.image" alt="alternatetext">
                      <!-- </div> -->
                    </div>
                  </label>
                
                      <div class="h-[450px] w-full flex flex-col">
                              <div>
                                <div class="flex flex-row gap-4 ">
                                  <!-- <InputField title="First Name" v-model="form.fname" ></InputField> -->
                                  <div class="relative z-0 mb-6 w-full group">
                                    <input    type="text" name="text" id="text" placeholder=" "
                                              class="block py-2 px-3 w-full text-base text-gray-700 bg-transparent border border-solid border-gray-300
                                              rounded dark:text-gray-700 dark:border-gray-300 dark:focus:border-indigo-500 focus:outline-none focus:ring-0
                                              focus:border--indigo-500 peer" 
                                              v-model="form.fname"/>
                                    <label for="text"
                                              class="peer-focus:font-medium absolute text-base text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8
                                              px-3 scale-75 top-2 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500
                                              peer-focus:dark:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0
                                              peer-focus:scale-75 peer-focus:-translate-y-8">Firstname</label>
                                    </div>
                                  <InputField title="Last Name" v-model="form.lname"></InputField>
                                </div>
                                <InputField title="Instagram Username" v-model="form.insta_handle"></InputField>
                                <TextArea title="Biography" v-model="form.bio"></TextArea>
                              </div>
                              
                              <!-- featured photos -->
                              <div>
                                <p>Featured Photos</p>
                                 <div class="flex flex-row text-[#A8A8A8] gap-6 w-full">
                                    <!-- v-for loop the images -->
                                    <div v-for="image in images" v-bind:key="image.id">
                                      <img id="imgService" :src="image.image" class="object-cover rounded-[8px] w-[166px] h-[166px] mt-4">
                                    </div>
                                 </div>
                              </div>
                      </div>
                    </div>

                  </div>
            </form>
          </template>
        </ProfileModal>
        
        <!-- only show when confirm is clicked and isUpdated is true -->
        <UpdateModal v-show="isUpdated" :text="text" @click="updateProfile">
        </UpdateModal>
      </div>

  </template>
  
  
  <script>
  import EditBtn from '../components/Buttons/FilledButton.vue';
  import ProfileModal from '../components/Modal/ProfileEditModal.vue';
  import InputField from '../components/Input/InputField.vue';
  import TextArea from '../components/Input/TextArea.vue';
  import UpdateModal from "../components/Modal/UpdateModal.vue";
  import axios from "../axios";

  export default{
    components: {
      EditBtn,
      InputField,
      TextArea,
      ProfileModal,
      UpdateModal
    },
    data() {
    return {
      text: 'Profile',
      isProfileVisible: false,
      isUpdated: false,
      user: {},
      images: {},
      form:{
        id:'',
        fname:'',
        lname:'',
        email:'',
        bio:'',
        insta_handle:''
      }
    }
  },
  mounted(){
        axios.get('users/'+this.$route.params.id).then(
          (response) => {
            const user = JSON.parse(JSON.stringify(response.data));
            this.user = user.data;
            this.form = user.data;

          }
      );
      axios.get('user/image/'+this.$route.params.id).then(
        (response) => {
          this.images = JSON.parse(JSON.stringify(response.data.data));
          console.log(this.images);
        }
      );
  },
  methods: {
      showModal() {
        this.isProfileVisible = true;
      },
      closeModal() {
        this.isProfileVisible = false;
      },
      showUpdate(){
        this.isProfileVisible = false;
        this.isUpdated = true;
      },
      updateProfile(ev){
        this.isUpdated = false;
        ev.preventDefault();
        this.$store.dispatch('update_profile',this.form).then((response)=> {
          this.user = this.$store.state.user.data;
        }).catch(err => {
            console.log(err)
        });



      },
      loadFile(e) {
              let imgHtml = document.querySelector('#talentImg');
              imgHtml.src = URL.createObjectURL(e.target.files[0]);
          },
    },
   
 };
  
  </script>
  
  <style>
  </style>
  