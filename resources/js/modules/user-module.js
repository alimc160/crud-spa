import axios from 'axios';
import {error} from "vue-resource/src/util";

const state = {
    users : [],
}

const getters = {
    usersList : state=> state.users
}

const actions = {
    async fetchUsers({commit}){
        const response = await axios.get("http://127.0.0.1:8000/users").then(res=>{
            console.log(res);
        }).catch(error=>{
            console.log(error);
        });
        commit("setUsers", response.data.data)
    },
    async addUsers({commit}, user){
        const response = await axios.post("http://127.0.0.1:8000/users", user);
        commit("addNewUser", response.data.data.user)
    },
    async deleteUser({commit}, id){
        await axios.delete(`http://127.0.0.1:2021/users/${id}`);
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

export default {
    state,
    getters,
    actions,
    mutations
}
