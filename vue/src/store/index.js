import { createStore } from "vuex";

const store = createStore({
  state: {
    user:{
      data: {
        name: 'WAYNE',
        role: 'ADMIN',  
        // role: 'GENERAL', 
        // role: 'TALENT', 
        token: null
      }      
    }
  },
  getters:  {},
  actions:{},
  mutations: {},
  modules: {}
})

export default store;
