import axios from 'axios';
import Vuex from 'vuex';
import Vue from "vue";

Vue.use(Vuex);


const state = {
    users : [],
}

const getters = {
    usersList : []
}

let actions = {
    async fetchUsers({commit}){
        const response = await axios.get("http://localhost:8000/api/users").then(res=>{
            console.log(res);
        }).catch(error=>{
            console.log(error);
        });
        commit("SET_Users", response)
    },
    async addUsers({commit}, user){
        const response = await axios.post("http://localhost:8000/api/users", user).then(res=>{
            console.log(res.data);
        }).catch(error=>{
            console.log(error);
        });
        console.log(response);
        commit("addNewUser", response.user)
    },
    async deleteUser({commit}, id){
        await axios.delete(`http://localhost:8000/api/users/${id}`);
        commit("removeUser", id)
    }
};

const mutations = {
    setUsers: (state, users) => (
        state.users = users
    ),
    addNewUser: (state, user) => state.users.unshift(user),
    removeUser: (state, id) => (
        state.users.filter(user => user.id !== id),
            state.users.splice(user => user.id, 1)
    )
};

export default new Vuex.Store({
    state,
    getters,
    actions,
    mutations
});
