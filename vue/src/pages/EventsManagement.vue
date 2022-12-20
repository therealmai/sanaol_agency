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
      <div>
        <LearnButton
          style="right: 5%; position: absolute"
          :text="'ADD EVENT'"
          :height="35"
          :width="120"
          :fontSize="15"
        />
      </div>
    </div>
    <div id="table" style="margin-top: 20px; width: 100%">
      <table class="styled-table">
        <thead>
          <tr>
            <th>EVENT</th>
            <th>TYPE</th>
            <th>DATE</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="(input, ndx) in list" 
            :key="ndx"
          >
            <td>
              {{input.title}}
            </td>
            <td>
              {{input.event_type}}
            </td>
            <td>
              {{input.date}}
            </td>
            <td style="display: flex">
              <LearnButton
                text="Edit"
                :height="20"
                :width="70"
                :fontSize="14"
                class="mr-3"
              />
              <LearnButton
                style="background: white; color: #7367f0; border: 1px solid"
                text="Delete"
                :height="20"
                :width="70"
                :fontSize="14"
              />
            </td>
          </tr>
        </tbody>
      </table>

      <div
        class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6"
      >
        <div class="flex flex-1 justify-between sm:hidden">
          <a
            href="#"
            class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >Previous</a
          >
          <a
            href="#"
            class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            >Next</a
          >
        </div>
        <div
          class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between"
        >
          <div>
            <p class="text-sm text-gray-700">
              Showing
              <span class="font-medium">1</span>
              to
              <span class="font-medium">10</span>
              of
              <span class="font-medium">97</span>
              results
            </p>
          </div>
          <div class="left: 10px">
            <nav
              class="isolate inline-flex -space-x-px rounded-md shadow-sm"
              aria-label="Pagination"
            >
              <a
                href="#"
                class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"
              >
                <span class="sr-only">Previous</span>
                <!-- Heroicon name: mini/chevron-left -->
                <svg
                  class="h-5 w-5"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path
                    fill-rule="evenodd"
                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
              <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
              <a
                href="#"
                aria-current="page"
                class="relative z-10 inline-flex items-center border border-indigo-500 bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-600 focus:z-20"
                >1</a
              >
              <a
                href="#"
                class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"
                >2</a
              >
              <a
                href="#"
                class="relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex"
                >3</a
              >
              <span
                class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700"
                >...</span
              >
              <a
                href="#"
                class="relative hidden items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20 md:inline-flex"
                >8</a
              >
              <a
                href="#"
                class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"
                >9</a
              >
              <a
                href="#"
                class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"
                >10</a
              >
              <a
                href="#"
                class="relative inline-flex items-center rounded-r-md border border-gray-300 bg-white px-2 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"
              >
                <span class="sr-only">Next</span>
                <!-- Heroicon name: mini/chevron-right -->
                <svg
                  class="h-5 w-5"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                  fill="currentColor"
                  aria-hidden="true"
                >
                  <path
                    fill-rule="evenodd"
                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                    clip-rule="evenodd"
                  />
                </svg>
              </a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Navbar from "../components/Navigation/Navbar.vue";
import Modal from "../components/Modal/Modal.vue";
import TextInput from "../components/Input/TextInput.vue";
import PrimaryButton from "../components/Buttons/PrimaryButton.vue";
import LearnButton from "../components/Buttons/LearnButton.vue";
import Label from "../components/Label/Label.vue";

export default {
  components: {
    Navbar,
    Modal,
    TextInput,
    PrimaryButton,
    LearnButton,
    Label,
  },
  data() {
    return {
      list: [
        {
          title: 'Lorem ipsum dolor sit amet consectetur',
          event_type: 'Fashion Show',
          date: 'November 24, 2022'
        },
        {
          title: 'Quod sunt esse officiis, eaque libero labore impedit alias perspiciatis itaque',
          event_type: 'Fashion Show',
          date: 'November 25, 2022'
        },
        {
          title: 'Blanditiis quod repellendus praesentium omnis autem officia iusto nemo fugit',
          event_type: 'Some Event',
          date: 'November 26, 2022'
        },
        {
          title: 'Auges kileb und scheise ugit',
          event_type: 'Some Other Event',
          date: 'December 25, 2022'
        },
        {
          title: 'Lorem timto aselle jufel arkansas',
          event_type: 'Another Event',
          date: 'January 1, 2023'
        }
      ]
    }
  }
};
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