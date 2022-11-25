<template>
    <CancelButton class="mt-10 ml-10" v-on:click="goBack" text="BACK" height="50" width="100"/>

    <h1 class="mb-10" style="font-weight: 700; text-align: center; font-size: xx-large; ">Edit Service</h1>

    <div class="flex flex-col items-start form-cont gap-8">
        <form class="flex flex-col items-start gap-5" action="">
            <input type="file" accept="image/*" v-on:change="loadFile"/>
            <img id="imgService" v-bind:src="data.image" style="height: 300px; width: 400px;">
            <div>
                <label for="title">Title</label>
                <input v-bind:class="[cssFormInputs]" v-model.trim="data.title" type="text">
            </div>
            <div>
                <label for="content">Content</label>
                <textarea v-bind:class="[cssFormInputs]" class="h-[221px]" v-model.trim="data.content" type="text"></textarea>
            </div>
        </form>

        <Modal v-show="isModalVisible" width="380">
            <template v-slot:modal_content>
                <svg width="68" height="68" viewBox="0 0 68 68" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_315_2940)">
                        <path d="M62.6828 3.79097C59.8169 0.925146 55.1845 0.925146 52.3187 3.79097L48.3798 7.71675L61.191 20.5279L65.1298 16.589C67.9957 13.7232 67.9957 9.09077 65.1298 6.22495L62.6828 3.79097ZM23.5296 32.58C22.7314 33.3783 22.1164 34.3597 21.763 35.4459L17.8896 47.0662C17.5101 48.1916 17.8111 49.4347 18.6486 50.2853C19.4861 51.1359 20.7292 51.4238 21.8677 51.0443L33.488 47.1709C34.5611 46.8044 35.5425 46.2025 36.3539 45.4043L58.2466 23.4984L45.4224 10.6742L23.5296 32.58V32.58ZM13.532 9.32632C6.59644 9.32632 0.969482 14.9533 0.969482 21.8888V55.3888C0.969482 62.3244 6.59644 67.9513 13.532 67.9513H47.032C53.9675 67.9513 59.5945 62.3244 59.5945 55.3888V42.8263C59.5945 40.5101 57.7232 38.6388 55.407 38.6388C53.0908 38.6388 51.2195 40.5101 51.2195 42.8263V55.3888C51.2195 57.705 49.3482 59.5763 47.032 59.5763H13.532C11.2158 59.5763 9.34448 57.705 9.34448 55.3888V21.8888C9.34448 19.5726 11.2158 17.7013 13.532 17.7013H26.0945C28.4107 17.7013 30.282 15.83 30.282 13.5138C30.282 11.1976 28.4107 9.32632 26.0945 9.32632H13.532Z" fill="#8075F1"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_315_2940">
                            <rect width="67" height="67" fill="white" transform="translate(0.969482 0.951172)"/>
                        </clipPath>
                    </defs>
                </svg>
                <h1 class="modal__title">Update Confirmation</h1>
                <span class="modal__content">Are you sure you want to save the changes made on this service? Please confirm.</span>
                <div class="modal__info">
                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.646 27.1533C21.1026 27.1533 27.146 21.11 27.146 13.6533C27.146 6.19668 21.1026 0.15332 13.646 0.15332C6.18936 0.15332 0.145996 6.19668 0.145996 13.6533C0.145996 21.11 6.18936 27.1533 13.646 27.1533ZM11.5366 17.8721H12.8022V14.4971H11.5366C10.8353 14.4971 10.271 13.9328 10.271 13.2314C10.271 12.5301 10.8353 11.9658 11.5366 11.9658H14.0679C14.7692 11.9658 15.3335 12.5301 15.3335 13.2314V17.8721H15.7554C16.4567 17.8721 17.021 18.4363 17.021 19.1377C17.021 19.8391 16.4567 20.4033 15.7554 20.4033H11.5366C10.8353 20.4033 10.271 19.8391 10.271 19.1377C10.271 18.4363 10.8353 17.8721 11.5366 17.8721ZM13.646 10.2783C12.7126 10.2783 11.9585 9.52422 11.9585 8.59082C11.9585 7.65742 12.7126 6.90332 13.646 6.90332C14.5794 6.90332 15.3335 7.65742 15.3335 8.59082C15.3335 9.52422 14.5794 10.2783 13.646 10.2783Z" fill="#7367F0"/>
                    </svg>
                    <span><span class="modal__info--info">Info:</span> Saving the changes will change what the public sees on the services page.</span>
                </div>
                
                <div class="flex gap-10 mt-4">
                    <ConfirmButton v-on:click="updateService" text="CONFIRM" />
                    <CancelButton v-on:click="closeModal" text="CANCEL" />
                </div>
            </template>
        </Modal> 

        <UpdateModal v-show="isSucModalVisible" @close="closeSucModal" />

        <div class="flex gap-4">
            <ConfirmButton v-on:click="openModal" text="SAVE" color="white" height="50" width="100"/>
            <CancelButton v-on:click="goBack" text="CANCEL" height="50" width="130"/>
        </div>
    </div>
</template>

<script>
    import PrimaryButton from '../components/Buttons/PrimaryButton.vue';
    import CancelButton from '../components/Buttons/CancelButton.vue';
    import ConfirmButton from '../components/Buttons/ConfirmButton.vue';
    import Confirmation from '../components/Modal/Confirmation.vue';
    import Modal from '../components/Modal/Modal.vue';
    import UpdateModal from '../components/Modal/UpdateModal.vue';

    const cssFormInputsStr = "border-2 rounded-lg p-3 form__inputs  ";    

    export default {
        data() {
            return {
                data: {
                    title: "title",
                    content: "content",
                    image: "https://i0.wp.com/www.vortexmag.net/wp-content/uploads/2017/12/JMbN5hW.jpg?fit=1800%2C1200&ssl=1",
                    ref: "",
                    updated_at: "", 
                },
                cssFormInputs: cssFormInputsStr,
                isModalVisible: false,
                isSucModalVisible: false
            }
        }, 
        methods: {
            goBack() {
                this.$router.push('/services');
            },
            loadFile(e) {
                let imgHtml = document.querySelector('#imgService');
                imgHtml.src = URL.createObjectURL(e.target.files[0]);
            },
            openModal() {
                this.isModalVisible = true;
            },
            closeModal() {
                this.isModalVisible = false;
            },
            updateService() {
                this.isModalVisible = false;
                this.isSucModalVisible = true;
            },  
            closeSucModal() {
                this.isSucModalVisible = false;
            }
        },  
        components: {
            PrimaryButton,
            Confirmation,
            Modal,
            CancelButton,
            ConfirmButton,
            UpdateModal
        }
    }
</script>

<style>
    .form-cont {
        margin: 0 auto 5.5rem;
        width: 500px;
    }

    .form__inputs {
        width: 500px;
    }

    .modal__title {
        color: #525252;
        font-weight: bold;
        font-size: 32px;
    }

    .modal__content {
        color: #525252;
        font-size: 18px;
        text-align: center;
    }

    .modal__info {
        display: flex;
        background-color: #F0EFFF;
        border: 1.25px solid #7367F0;
        border-radius: 5px;
        color: #7367F0;
        font-size: 16px;
        gap: 10px;
        padding: 10px 20px;
    }

    .modal__info--info {
        font-weight: bold;
    }
</style>