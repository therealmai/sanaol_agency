import createPersistedState from "vuex-persistedstate"; 
import { createStore } from "vuex";
import axios from "../axios";

const store = createStore({
  state: {
    user:{      //data about the user and the token will be stored here after user login 
      data:{},      
      token: {}
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
        }
  },
  mutations: {
    setProfile(state, userData) {
      state.user.data = userData.data;
  },
    setUser(state, userData) {
      state.user.data = userData.user;
      state.user.token = userData.access_token;
      sessionStorage.setItem("TOKEN", userData.token);
  },
    logout : (state) => {
        state.user.data = {};          //remove user data in state
        state.user.token = null;             //set token to null
        // sessionStorage.removeItem("TOKEN");  //remove token from session
        // sessionStorage.clear();
    },
  },
  // modules: {},
  //   plugins: [createPersistedState()]
})

export default store;
