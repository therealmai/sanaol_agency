import createPersistedState from "vuex-persistedstate"; 
import { createStore } from "vuex";
import axios from "../axios";

const store = createStore({
  state: {
    isLoggedIn: sessionStorage.getItem("LOG"),
    user:{
      data: JSON.parse(sessionStorage.getItem("USER")),   
      token: sessionStorage.getItem("TOKEN"),
      // data: {},      
      // token: null
    },
  },
  getters:  {},
  actions:{
    update_profile({commit}, user){
      return  axios.patch('users/'+ user.id,user).then((data)=> {
          // console.log(data.data);
          commit("setProfile", data.data);
      }).catch(err => {
          console.log(err)
      });
    },
    register({commit}, user) {
      return axios.post("auth/register", user)
          .then((data) => {
              console.log(data);
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
        sessionStorage.removeItem("USER");   //remove token from session
        sessionStorage.removeItem("TOKEN");  //remove token from session
        sessionStorage.removeItem("LOG");    //remove token from session
    },
  },
  modules: {},
  plugins: [createPersistedState()]
})

export default store;
