<template>
    <div>
        <div class="flex flex-col flex-wrap gap-4 items-center ml-20 mr-20 mt-3 mb-20">
            <div class="flex text-bold mt-10 mb-2" style="margin-right:53rem">
                Reminders
            </div>
            <div v-for="event in events.sort((a,b)=>(a.date>b.date)?1:-1).slice(0,5)" 
                 v-bind:key="event.id"
                 class="flex flex-row flex-wrap gap-12 justify-center">
                <Reminders :image = "event.image"
                        width = "70"
                        :label = "event.event_type"
                        link = "Talent_list"
                        :title = "event.title"
                        :date = "months[new Date(event.date).getMonth()]+' '+new Date(event.date).getDate()+', '+new Date(event.date).getFullYear()"
                        :location = "event.location"
                        :content = "event.content">
                </Reminders>
            </div>
        </div>   
    </div>
</template>

<script>
import Reminders from '../components/Cards/Reminders/Reminderscard.vue';
import axios from "../axios";

export default{
    components: {
        Reminders
    },

    mounted() {
        axios.get('events').then(
            (response) => {
                this.events = response.data,
                console.log("events"),
                console.log(this.events)
            }
        )
    },

    data() {
        return {
            events: [],
            months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        }
    },
}    
</script>

<!-- <template>
    <body>
        <div class="reminders-position" >
            <div class="text-bold">
                Reminders
            </div>
            <div class="reminders-box">
                <div>
                    <img id="img-position" style="height: 170px;" src="https://th.bing.com/th/id/OIP.T9i6tcGcv6mLuJVQJT2nXwHaGe?pid=ImgDet&rs=1" alt="alternatetext">
                </div>
                <div class="box-title">
                    FASHION SHOW
                </div>
                <div class="box-title-2">
                    Lorem ipsum dolor sit amet
                </div>
                    <p class="font-medium text-[16px] text-detailText pt-0">
                        <span>November 15, 2022</span> | <span>University of San Carlos - Talamban Campus</span>
                    </p>
                    <p class="font-normal leading-normal text-[16px] text-secondary pt-0">
                        Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    </p>
                
            </div>
        </div>
    </body>
</template> -->

<!-- <script>


export default({
    setup() {
        
    },
})
</script> -->

