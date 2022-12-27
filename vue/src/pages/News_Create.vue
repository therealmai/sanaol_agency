<template>
    <div id="main-div" style="color: #525252">
      <!-- Back Button  -->
      <div id="div-Back">
        <BackButton id="btn-Back" text="Back"></BackButton>
      </div>
  
      <h1 style="padding-left:150px;  font-weight: 700; text-align: left; font-size: x-large">Create News</h1>
  
      <!-- Edit Photo Label-->
      <form enctype="multipart/form-data" method="patch" class="flex flex-col items-start gap-5" action="">


      <div id="div-img" style="padding-left:233px">
        <label for="title"></label>
          
        <input type="file" accept="image/*" name="file" id="file" v-on:change="loadFile" style="display:none;"/>
        <label for="file">
            <img id="imgService" v-bind:src="data.image" class="object-cover rounded-[8px] w-[166px] h-[166px]">        
          </label>
      </div>
  
      <!-- News Title Div -->
      
      <div style="padding-left: 233px">
       >
        <label for="content"></label>
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
          id="btn-Publish"
          text="Publish" @click="showModal"
        ></ConfirmButton>
        <modal v-show="isModalVisible" @close="closeModal"></modal>
  
        <CancelButton id="btn-cancel"
          text="Cancel"></CancelButton>
      </div>
      </form>
    </div>
  </template>
  
  <script>
  import Navbar from "../components/Navigation/Navbar.vue";
  import ConfirmButton from "../components/Buttons/FilledButton.vue";
  import CancelButton from "../components/Buttons/OutlineButton.vue";
  import BackButton from "../components/Buttons/BackButton.vue";
  import TextInput from "../components/Input/TextInput.vue";
  import Modal from "../components/Modal/News Modals/AddNews.vue";
  import TitledInput from "../components/Input/TitledInput.vue";
  
  export default {
    components: {
      Navbar,
      TextInput,
      Modal,
      ConfirmButton,
      CancelButton,
      BackButton,
      TitledInput,
    },
  
    data() {
      return {
        data: {
          image: "https://static-00.iconduck.com/assets.00/add-square-icon-256x256-mnnm3upg.png",
        },
        isModalVisible: false,
      };
    },
    methods: {
      showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      },
      loadFile(e) {
        let imgHtml = document.querySelector('#imgService');
        imgHtml.src = URL.createObjectURL(e.target.files[0]);
      },
      updateNews() {
                if(this.news.title == '' || this.news.content == '') {
                    alert('All fields must be filled.');
                    this.isModalVisible = false;
                    return;
                }

                let data = new FormData;
                data.set('image', this.news.image);
                data.set('title', this.news.title);
                data.set('content', this.news.content);

                console.log(...data)

               
                axios.post('/news/' + data, {
                    headers: {
                        'Content-type': 'multipart/form-data'
                    }
                }).then(
                    (response) => {
                        console.log(response.data)
                    }
                )
                this.isModalVisible = false;
                this.isSucModalVisible = true;
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
  
  #div-img {
    padding-top: 15px;
    
  }
  
  #div-Back {
    margin-left: -302px;
    margin-right: 1349px;
    padding-top: 23px;
  }
  
  #imgService {
    cursor: pointer;
  }
  
  #title-area {
    margin-top: 25px;
    resize: none;

  }
  
  #content-area {
    resize: none;
  }
  
  #btn-Publish {
    margin-left: 234px;
    margin-bottom: 16px;
    margin-right: 133px;
    
  }

  #btn-Back{
    margin-left: 52px;
    margin-bottom: 18px;
    margin-right: 159px;
  }

  #btn-cancel{
    margin-left: -113px;
    margin-bottom: 18px;
    margin-right: -2px;
  }

  </style>
  