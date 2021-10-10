<template>
    <div class="col-12">
        <button class="btn btn-success" @click="incrementCount">Increment</button>
        <p>{{ count }}</p>
        <ul class="list-group mt-5">
            <li class="list-group-item list-group-item-action" v-for="user in usersList" :key="user.id">

                <div class="d-flex w-100 justify-content-between">
                    <h3>{{ user.name }}</h3>

<!--                    <small class="text-danger delete" @click="deleteUser(user.id)" >&#10005;</small>-->
                </div>
                <p>{{ user.email }}</p>

            </li>
        </ul>
    </div>

</template>

<script>
import UserService from "../services/UserService";
import { mapState,mapGetters } from 'vuex';

export default {
    data() {
        return {
            usersList: [],
        }
    },
    methods: {
        incrementCount(){
            this.$store.dispatch('DO_INCREMENT');
        }
    },
    computed:{
        ...mapGetters({
            count:'GET_INCREMENT_COUNT'
        }),
    },
    created() {
        UserService.getUsers().then(response => {
            this.usersList = response.data.data;
        }).then(error => {
            console.log(error);
        });
    },
    mounted() {
    }
}
</script>

<style scoped>

</style>
