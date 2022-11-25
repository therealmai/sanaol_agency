<template>
   <div class="max-w-sm bg-white border  rounded-2xl shadow-md" v-bind:id="id">
        <a href="#">
            <img class="rounded-t-2xl " src="https://images.unsplash.com/photo-1470509037663-253afd7f0f51?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NjA5MzgxMzk&ixlib=rb-1.2.1&q=80" alt="" />
        </a>
        <div class="flex items-center">
            <img class="w-11 h-11 rounded-full ml-4" src="https://images.unsplash.com/photo-1470509037663-253afd7f0f51?crop=entropy&cs=tinysrgb&fm=jpg&ixid=MnwzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE2NjA5MzgxMzk&ixlib=rb-1.2.1&q=80" alt="Neil image">
            <div class="p-3">
            <a href="#">
                <p class="text-xl font-bold">Juan Dela Cruz</p>
            </a>
            <p class="font-semibold text-black">@juandelacruz</p>
            </div>
        </div>
    </div> 
</template>

<script>
export default{
    name: "TalentCard",
    props:{id:Number}
}
</script>


