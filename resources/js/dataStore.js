import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        counter: 0,
    },
    getters:{
        getCounterValue(state){
            return state.counter;
        },
    },
    mutations:{
        increamentCounter(state,payload){
            state.counter += payload;
        }
    },
    actions:{
        increamentCounter({commit},payload){
            commit('increamentCounter',payload);
        },
    },
});
