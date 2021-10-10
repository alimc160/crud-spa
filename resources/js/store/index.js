import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        count: 0
    },
    mutations: {
        INCREMENT_COUNT (state) {
            state.count++
        }
    },
    getters:{
      GET_INCREMENT_COUNT:(state)=>{
          return state.count;
      }
    },
    actions: {
        DO_INCREMENT({ commit }){
            commit('INCREMENT_COUNT');
        }
    },
});
