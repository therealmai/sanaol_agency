<template>
    <div>
        <div class="flex flex-col flex-wrap gap-4 items-center ml-20 mr-20 mt-3 mb-20">
            <div class="flex text-bold mt-10 mb-2" style="margin-right:53rem">
                Reminders
            </div>
            <div class="flex flex-row flex-wrap gap-12 justify-center">
                <Reminders image = "https://media.philstar.com/photos/2022/05/02/catriona-gray-miss-universe-winner2018-12-1910-04-54_2022-05-02_14-33-17.jpg"
                        width = "115"
                        label = "ENTERTAINMENT"
                        link = "Talent_list"
                        title = "Jastine Guzman emerges as Ms. International Queen 2022"
                        date = "November 01, 2022"
                        location = "IMPACT Arena, Nonthaburi Province, Thailand"
                        content = "Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo">
                </Reminders>
                <Reminders image = "https://www.asianacademycreativeawards.com/wp-content/uploads/2022/07/3D-BG-Blue-Gradient_2000px-scaled-728x485.jpg"
                        width = "80"
                        label = "AWARDS"
                        link = "Events"
                        title = "System bags multiple awards in Asian Content Creation Awards 2021"
                        date = "November 15, 2022"
                        location = "University of San Carlos - Talamban Campus"
                        content = "Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo">
                </Reminders>
                <Reminders image = "https://imgnew.outlookindia.com/uploadimage/library/16_9/16_9_5/Facial_Recognition_1640922171.jpg"
                        width = "80"
                        label = "BUSINESS"
                        title = "Introducing the New Face of System: Kathleen Iza Monzales"
                        link = "Hero"
                        date = "November 26, 2022"
                        location = "University of San Carlos - Talamban Campus"
                        content = "Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo">
                </Reminders>
            </div>
        </div>   
    </div>
</template>

<script>
import Reminders from '../components/Cards/Reminders/Reminderscard.vue';

export default{
    components: {
        Reminders
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

