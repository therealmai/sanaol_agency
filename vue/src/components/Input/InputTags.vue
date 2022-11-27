<template>
 <div class="tag-input"
        :style ="{ width: width + 'px', height: height + 'px'}" >
    <div style= "position: absolute;margin-top:5px;margin-left:0px; font-size: 14px; color: #A8A8A8">{{text}}</div>
    <div v-for='(tag, index) in tags' :key="tag" class="tag-input__tag">
        {{tag}}
        <span @click='removeTag(index)'  style="display: inline-block">  
            <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.44901 1.29676C3.76935 1.29676 1.59706 3.46905 1.59706 6.14871C1.59706 8.82837 3.76935 11.0007 6.44901 11.0007C9.12866 11.0007 11.301 8.82837 11.301 6.14871C11.301 3.46905 9.12866 1.29676 6.44901 1.29676ZM0.845215 6.14871C0.845215 3.05382 3.35412 0.544922 6.44901 0.544922C9.54389 0.544922 12.0528 3.05382 12.0528 6.14871C12.0528 9.2436 9.54389 11.7525 6.44901 11.7525C3.35412 11.7525 0.845215 9.2436 0.845215 6.14871ZM4.61483 4.31454C4.76163 4.16773 4.99965 4.16773 5.14646 4.31454L6.449 5.61708L7.75155 4.31454C7.89836 4.16773 8.13637 4.16773 8.28318 4.31454C8.42999 4.46134 8.42999 4.69936 8.28318 4.84617L6.98064 6.14871L8.28318 7.45126C8.42999 7.59806 8.42999 7.83608 8.28318 7.98289C8.13637 8.12969 7.89836 8.12969 7.75155 7.98289L6.449 6.68034L5.14646 7.98289C4.99965 8.12969 4.76163 8.12969 4.61483 7.98289C4.46802 7.83608 4.46802 7.59806 4.61483 7.45126L5.91737 6.14871L4.61483 4.84617C4.46802 4.69936 4.46802 4.46134 4.61483 4.31454Z" fill="#525252"/>
            </svg>
        </span>
    </div>
    <input type='text' class="tag-input__text" @keydown="addTag" @keydown.delete="removeLastTag" />
 </div>

</template>

<script>

export default {
    name: 'InputTags',
  data () {
    return {
        tags: []
    }
  },
  props: {
    text: String,
    width: Number,
    heigh: Number,
  },
  methods: {
    addTag (event) {
        if (event.code == "Comma" || event.code == "Enter") {
            event.preventDefault()
            var val = event.target.value.trim()

            if (val.length > 0) {
                this.tags.push(val)
                event.target.value = ''
            }
        }
    },
    removeTag (index) {
        this.tags.splice(index, 1)
    },
    removeLastTag (event) {
        if (event.target.value.length === 0) {
            this.removeTag(this.tags.length - 1)
        }
    }
  }
}
</script>

<style>
.tag-input {
    border: 1px solid #A8A8A8;
    font-size: 0.9em;
    box-sizing: border-box;
    padding: 0 10px;
}
.tag-input__tag {
    height: 20px;
    float: left;
    margin-right: 10px;
    background-color: #eee;
    margin-top: 27px;
    line-height: 20px;
    padding: 0px 7px;
    border-radius: 9.38px;
}

.tag-input__tag > svg {
    cursor: pointer;
    opacity: 0.75;

}

.tag-input__text {
    border: none;
    outline: none;
    font-size: .9em;
    line-height: 50px;
    background: none;
    margin-top: 12px;
}


</style>