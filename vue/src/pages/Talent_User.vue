<template>

      <div class="w-full h-[900px]">
        <!-- background cover -->
        <div class="bg-background2 relative h-[321px]">
            <!-- profile title-->
            <div><h1 class="pl-[83px] pt-[53px] font-bold leading-[38.73px] text-[32px] text-[#525252] relative ">Profile</h1></div>
        
            <!-- profile content -->
            <div class="flex flex-row justify-center relative top-[150px] flex-wrap gap-6 mx-10 ">
              <!-- image -->
              <img class="w-[158px] h-[158px] object-cover rounded-[50%] flex justify-start" src="../assets/dp.jpg" alt="alternatetext">
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
                        <!-- :src="form.image" -->
                        <img id="talentImg" class=" hover:bg-black hover:bg-opacity-90 hover:cursor-pointer w-[160px] h-[120px] object-cover rounded-[50%]"  src="../assets/dp.jpg" alt="alternatetext">
                    </div>
                  </label>
                
                      <div class="h-[450px] w-full flex flex-col">
                              <div>
                                <div class="flex flex-row gap-4 ">
                                  <InputField title="First Name" v-model="form.fname" ></InputField>
                                  <InputField title="Last Name" v-model="form.lname"></InputField>
                                </div>
                                <div class="flex flex-row gap-4 ">
                                  <InputField title="Email" v-model="form.email"></InputField>
                                  <InputField title="Instagram Username" v-model="form.insta_handle"></InputField>
                                </div>
                                <TextArea title="Biography" v-model="form.bio"></TextArea>
                              </div>
                              
                              <div>
                                <p>Featured Photos</p>

                                 <div class="flex flex-row text-[#A8A8A8] gap-6 w-full relative">
                                    <div v-for="image in images" v-bind:key="image.id">
                                      <img id="imgService" :src="image.image" class="object-cover rounded-[8px] w-[166px] h-[166px] mt-4">
                                    <div v-if="image.id">
                                        <span class=" absolute cursor-pointer z-[4px] top-[10px] ml-[159px]" @click="confirmDelete">
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_326_3033)">
                                                <path d="M9.43848 16.5938C13.5806 16.5938 16.9385 13.2359 16.9385 9.09375C16.9385 4.95161 13.5806 1.59375 9.43848 1.59375C5.29634 1.59375 1.93848 4.95161 1.93848 9.09375C1.93848 13.2359 5.29634 16.5938 9.43848 16.5938Z" fill="white" stroke="#525252" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M11.6885 6.84375L7.18848 11.3438" stroke="#525252" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M7.18848 6.84375L11.6885 11.3438" stroke="#525252" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                <clipPath id="clip0_326_3033">
                                                <rect width="18" height="18" fill="white" transform="translate(0.438477 0.09375)"/>
                                                </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </div>
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


        <!-- delete confirmation modal here -->
        <ConfirmModal v-show="isDeleteVisible" @close="closeDeleteModal" @update="deleteImage">
        <template #confirm_body>
              <!-- Write code here -->
                <div class="flex flex-col justify-center items-center space-y-2">
                    <!-- icon write up -->
                    <span>
                          <svg style="color:brown;" class="w-[66.31px] h-[66.31px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" > <path d="M175 175C184.4 165.7 199.6 165.7 208.1 175L255.1 222.1L303 175C312.4 165.7 327.6 165.7 336.1 175C346.3 184.4 346.3 199.6 336.1 208.1L289.9 255.1L336.1 303C346.3 312.4 346.3 327.6 336.1 336.1C327.6 346.3 312.4 346.3 303 336.1L255.1 289.9L208.1 336.1C199.6 346.3 184.4 346.3 175 336.1C165.7 327.6 165.7 312.4 175 303L222.1 255.1L175 208.1C165.7 199.6 165.7 184.4 175 175V175zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/></svg>
                    </span>

                    <!-- title -->
                    <h2 class="font-[700] text-[32px] text-secondary ">Delete Confirmation</h2>
                    <!-- update text -->
                    <p class="font-[400] text-[18px] text-secondary text-center leading-[21.78px] px-12">Are you sure you want to delete this feature image? Please confirm.</p>
                    <!-- more info -->
                    <Warning text="Deleting this image may be a bad idea..."></Warning>
                </div>
          </template>
      </ConfirmModal>

        <DeletedModal v-show="isDeleted" @click="updateImage"></DeletedModal>
        
      </div>

  </template>
  
  
  <script>
  import EditBtn from '../components/Buttons/FilledButton.vue';
  import ProfileModal from '../components/Modal/ProfileEditModal.vue';
  import InputField from '../components/Input/InputField.vue';
  import TextArea from '../components/Input/TextArea.vue';
  import DeletedModal from "../components/Modal/DeletedModal.vue";
  import DeleteModal from "../components/Modal/DeleteModal.vue";
  import UpdateModal from "../components/Modal/UpdateModal.vue";
  import ConfirmModal from "../components/Modal/Confirmation.vue";
  import Warning from "../components/Others/Warning.vue";
  import axios from "../axios";

  export default{
    components: {
      EditBtn,
      InputField,
      TextArea,
      Warning,
      ProfileModal,
      DeletedModal,
      DeleteModal,
      UpdateModal,
      ConfirmModal
    },
    data() {
    return {
      text: 'Profile',
      isDeleted: false,
      isDeleteVisible: false,
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
      deleteImage(){
        this.isDeleteVisible = false;
        this.isDeleted = true;
      },
      closeDeleteModal(){
        this.isDeleteVisible = false;
      },
      confirmDelete(){
        this.isDeleteVisible = true;
      },
      updateImage(){
        this.isDeleted= false;
        //axios call to update image
      },

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
  