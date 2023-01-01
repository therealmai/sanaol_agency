import createPersistedState from "vuex-persistedstate"; 
import { createStore } from "vuex";
import axios from "../axios";

const store = createStore({
  state: {
    isLoggedIn: sessionStorage.getItem("LOG"),
    user:{
      data: JSON.parse(sessionStorage.getItem("USER")),   
      token: sessionStorage.getItem("TOKEN"),
    },
  },
  getters:  {},
  actions:{
    update_profile({commit}, user){
      return  axios.patch('users_update/'+ user.id,user).then((data)=> {
          commit("setProfile", data.data);
      }).catch(err => {
          console.log(err)
      });
    },
    register({commit}, user) {
      return axios.post("auth/register", user)
          .then(({data}) => {
              return data;
          })
      },
    login({commit}, user) {
      return axios.post("auth/login", user)
          .then(({data}) => {
              console.log(data);
              commit("setUser", data)
              return data;
          })
      },
    logout({commit}) {
        return axios.post("auth/logout")
            .then(response => {
                commit("logout")
                  return response;
                })
        },
    updateAuthor(context, author) {
      context.commit('updateAuthor', author)
    }
  },
  mutations: {
    setProfile(state, userData) {
      state.user.data = userData.data;
      sessionStorage.setItem("USER", JSON.stringify(userData.data));
  },
    setUser(state, userData) {
      sessionStorage.setItem("LOG", true);
      sessionStorage.setItem("USER", JSON.stringify(userData.user));
      sessionStorage.setItem("TOKEN", userData.access_token);
      state.isLoggedIn = true;
      state.user.data = userData.user;
      state.user.token = userData.access_token;
  },
    logout : (state) => {
        state.isLoggedIn = false;
        state.user.data = {};
        state.user.token = {};
        sessionStorage.clear();
        // sessionStorage.removeItem("USER");   //remove user data from the session storage
        // sessionStorage.removeItem("TOKEN");  //remove token from session
        // sessionStorage.removeItem("LOG");    //reset isloggedin to false
    },
  },
  modules: {},
  plugins: [createPersistedState()]
})

export default store;

// https://forum.vuejs.org/t/persist-state-when-refreshing-the-browser/21505/2
// https://stackoverflow.com/questions/43027499/vuex-state-on-page-refresh
