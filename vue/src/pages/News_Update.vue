<template>
    <div id="main-div" style="color: #525252">
      <div id="div-Back">
        <BackButton id="btn-Back" text="Back"></BackButton>
      </div>
      <h1 style="padding-left:178px; font-weight: 700; text-align: left; font-size: x-large">Edit News</h1>
  
      <!-- Edit Photo Label-->
      <div id="div-img" style="padding-left:233px">
        <input type="file" accept="image/*" name="file" id="file" v-on:change="loadFile" style="display:none;"/>
                <label for="file">
                    <img id="imgService" v-bind:src="data.image" class="object-cover rounded-[8px] w-[166px] h-[166px]">
                </label>
      </div>
  
      <!-- News Title Div -->
  
      <div style="padding-left: 233px">
        <textarea
            id="title-area"
            class="border-2 rounded-lg p-3 form__inputs"
            rows="1"
            placeholder="News Title" 
            ></textarea>
      </div>
  
      <!-- News Content Div -->
  
      <div
          style="
            padding-top: 20px;
            padding-left: 233px;
            padding-right: 50px;
            margin-bottom: 18px;
            color: #525252;
            align: center;
          "
        >
          <textarea
            id="content-area"
            class="border-2 rounded-lg p-3 pr-10 "
            rows="15"
            cols="70"
            placeholder="News Content"
          ></textarea>
        </div>
  
      <!-- Buttons Div -->
      
      <div style="display: flex; width: 40%">
        <ConfirmButton
          id="btn-Save"
          text="Save"
          @click="showModal"
        ></ConfirmButton>
        <Modal v-show="isModalVisible" @close="closeModal"></Modal>
        <CancelButton id="btn-Delete" text="Delete" @click="showDelModal"></CancelButton>
        <DeleteModal v-show="isDelVisible" @close="closeDelModal"></DeleteModal>
        <CancelButton id="btn-Cancel" text="Cancel"></CancelButton>
      </div>
    </div>
  </template>
  
  <script>
  import Navbar from "../components/Navigation/Navbar.vue";
  import ConfirmButton from "../components/Buttons/FilledButton.vue";
  import CancelButton from "../components/Buttons/OutlineButton.vue";
  import BackButton from "../components/Buttons/BackButton.vue";
  import TextInput from "../components/Input/TextInput.vue";
  import Modal from "../components/Modal/News Modals/UpdateNews.vue";
  import DeleteModal from "../components/Modal/News Modals/DeleteNews.vue";
  import TitledInput from "../components/Input/TitledInput.vue";
  import Label from "../components/Label/Label.vue";

  
  export default {
    components: {
    Navbar,
    TextInput,
    Modal,
    ConfirmButton,
    CancelButton,
    BackButton,
    DeleteModal,
    TitledInput,
    Label,
    BackButton
},
  
    data() {
      return {
        data: {
          image: "https://cdn.thewirecutter.com/wp-content/media/2022/10/chromebook-2048-7190.jpeg",
        },
        isModalVisible: false,
        isDelVisible: false,
       
      };
    },
    methods: {
      showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      },
      showDelModal() {
        this.isDelVisible = true;
      },
      closeDelModal() {
        this.isDelVisible = false;
      },
      loadFile(e) {
        let imgHtml = document.querySelector('#imgService');
        imgHtml.src = URL.createObjectURL(e.target.files[0]);
      },
    },
  };
  </script>
  
  <style>
  #main-div {
    max-width: 1200px;
    padding: 0 !important;
    width: 100%;
    margin: auto;
  }
  
  @media only screen and (max-width: 1000px) {
    #main-div {
      padding: 0 10px;
    }
  }
  
  #div-Back {
    margin-left: -302px;
    margin-right: 1349px;
    padding-top: 23px;
  }
  
  #div-img {
    padding-top: 30px;
    padding-left: 76px;
  }
  
  #imgService {
    cursor: pointer;
  }

  #btn-Back{
    margin-left: 52px;
    margin-bottom: 18px;
    margin-right: 159px;
  }

  #btn-Save {
    margin-left: 234px;
    width: 119px;
    height: 38px;
  }
  
  #btn-Delete {
    margin-left: 11px;
    margin-right: 26px;
    margin-bottom: 10px;
    width: 145px;
  
  }
  #btn-Cancel {
    margin-left: -12px;
    margin-right: -2px;
    width: 149px;
  }
  
  #photo-label {
    padding-bottom: 100px;
    padding-top: 50px;
    padding-right: 160px;
    background-color: rgb(217, 217, 217);
    cursor: pointer;
  }
  
  #txt-area {
    resize: none;
  }
  </style>
  