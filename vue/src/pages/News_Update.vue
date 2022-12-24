<template>
    <div id="main-div" style="color: #525252">
      <div id="div-Back">
        <BackButton id="btn-Back" text="Back"></BackButton>
      </div>
      <h1 style="font-weight: 700; text-align: left; font-size: x-large">Edit News</h1>
  
      <!-- Edit Photo Label-->
      <div id="div-img">
        <label for="myfile">
          <svg
            style="cursor: pointer"
            width="166.83"
            height="166.83"
            viewBox="0 0 168 168"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <rect
              x="0.279297"
              y="0.736328"
              width="166.826"
              height="166.826"
              rx="8"
              fill="#D9D9D9"
            />
            <path
              d="M85.5497 72.7266C85.5497 71.6895 84.7198 70.8516 83.6925 70.8516C82.6653 70.8516 81.8354 71.6895 81.8354 72.7266V81.1641H73.4782C72.451 81.1641 71.6211 82.002 71.6211 83.0391C71.6211 84.0762 72.451 84.9141 73.4782 84.9141H81.8354V93.3516C81.8354 94.3887 82.6653 95.2266 83.6925 95.2266C84.7198 95.2266 85.5497 94.3887 85.5497 93.3516V84.9141H93.9068C94.934 84.9141 95.764 84.0762 95.764 83.0391C95.764 82.002 94.934 81.1641 93.9068 81.1641H85.5497V72.7266Z"
              fill="#525252"
            /></svg
          ><input type="file" id="myfile" name="myfile" hidden />
        </label>
      </div>
  
      <!-- News Title Div -->
  
      <div style="padding-left: 82px">
        <TitledInput title="News Title" width="525" height="53"></TitledInput>
      </div>
  
      <!-- News Content Div -->
  
      <label class="text-textInput font-normal" aria-placeholder="News Content">
        <div
          style="position: absolute; margin-top: 35px; margin-left: 96px; font-size: 14px"
        >
          News Content
        </div>
        <div
          style="
            padding-top: 30px;
            padding-left: 82px;
            padding-right: 50px;
            margin-bottom: 18px;
            color: #525252;
            align: center;
          "
        >
          <textarea
            id="txt-area"
            class="pl-4 pr-4 py-[14px] bg-inputField rounded-[2px] text-inputText outline outline-inputOutline box-outline text-color pb-5 pt-10"
            rows="15"
            cols="100"
          ></textarea>
        </div>
      </label>
  
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
  
  #btn-Save {
    margin-left: 80px;
    width: 103px;
    height: 37px;
  }

  #btn-Back{
    margin-left: 52px;
    margin-bottom: 18px;
    margin-right: 159px;
  }

  
  #btn-Delete {
    margin-left: 12px;
    margin-right: 93px;
    margin-bottom: 10px;
    width: 117px;
  
  }
  #btn-Cancel {
    margin-left: -83px;
    margin-right: 122px;
    width: 129px;
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
  