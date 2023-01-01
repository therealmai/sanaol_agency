<template>
  <div style="margin: 60px">
    <div style="margin-bottom: 18px; color: #525252">
      <LearnButton
        style="background: #f6f5ff; color: #7367f0"
        text="Back"
        :height="30"
        :width="100"
        :fontSize="15"
        @click="$router.push('Hero')"
      />
    </div>
    <div style="display: flex; justify-content: center">
      <div>
        <h1 style="font-weight: 700; text-align: center; font-size: x-large">
          Events Management
        </h1>
      </div>
      <router-link :to="'/events/create'">
          <div>
            <FilledButton
              class="pl-5 pr-5" style="margin-left: 850px;"
              :text="'ADD EVENT'"
              :height="35"
              :width="120"
              :fontSize="15"
            />
          </div>
      </router-link>
    </div>
    <div id="table">
      <table class="styled-table"  >
        <thead >
          <tr style="text-align: center;">
            <th>EVENT</th>
            <th>TYPE</th>
            <th>DATE</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="event in events" 
            :key="event.id"
            
          >
            <td style="text-align: center;">
              {{event.title}}
            </td>
            <td style="text-align: center;">
              {{event.event_type}}
            </td>
            <td style="text-align: center;">
              {{event.date}}
            </td>
            <td style="display: flex; justify-content: center ">
              <router-link :to="'/events/edit/' + event.id">
                <FilledButton text="Edit" class="pl-5 pr-5 " />
              </router-link>
              <div class="ml-3"></div>
                <OutlineButton text="Delete" class="pl-4 pr-4 " @click="deleteEvent(event.id), refreshPage()"/>
            </td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
</template>

<script>
import Navbar from "../components/Navigation/Navbar.vue";
import Modal from "../components/Modal/Modal.vue";
import TextInput from "../components/Input/TextInput.vue";
import Label from "../components/Label/Label.vue";

import FilledButton from "../components/Buttons/FilledButton.vue"
import OutlineButton from "../components/Buttons/OutlineButton.vue"

import EditEvents from "../pages/EditEvents.vue"
import axios from "../axios"

export default {
  components: {
    Navbar,
    Modal,
    TextInput,
    Label,
    FilledButton,
    OutlineButton,
    EditEvents
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
    }
  },
  methods: {
    deleteEvent(id) {
      axios.patch(`events/delete/${id}`)
        .then(response => {
          console.log('Nothing to see here');
        })
        .catch(error => {
          console.log(error);
        });
    },
    refreshPage() {
            location.reload();
        }
  }
}
</script>

<style>
.styled-table {
  border-collapse: collapse;
  width: 100%;
  /* margin: 25px 0; */
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
  background-color: #f6f5ff;
  color: #474747;
  text-align: left;
}
.styled-table th,
.styled-table td {
  padding: 12px 15px;
  font-size: 0.9em;
}
.styled-table tbody tr {
  border-bottom: 1px solid #dddddd;
}
</style>