<template>
    <aside class="px-2 h-90vh overflow-auto bg-gray-100 bg-dark">
        <form action="" class="w-full mb-2 pt-2">
            <label>
                <input type="search" name="q" placeholder="Recherche..."
                       v-model="queryUser" @input="searchPlayer"
                       class="w-full dark:bg-dark-secondary dark:text-gray-100 rounded-md p-2 outline-none">
            </label>
        </form>

        <!--                show all user-->
        <router-link :to="{name: 'chat.show',params: {id: player.id}}" @click="$emit('routerLoad',player.id)"
                     class="flex items-center dark:text-gray-100 dark:bg-dark-secondary bg-gray-100 rounded-md p-2 mb-2"
                     v-for="player in players" :key="player.id">
            <div class="flex items-center w-full">
                <img :src="`${storagePath}/${player.profile}`" alt="username"
                     class="w-40 h-40 rounded-full object-cover">
                <div class="ml-4">
                    <h3 class="text-sm">{{ player.username }}</h3>
                    <p class="font-bold text-sm">Lorem ipsum dolor sit...</p>
                </div>
            </div>
            <p class="flex-end text-red-500 mr-2">20</p>
        </router-link>
    </aside>
</template>

<script setup>
import {usePlayer} from "../services";
import {onMounted, ref} from "vue";
import {useRoute} from "vue-router";

const players = ref([])
const storagePath = ref("/storage/avatars")
const queryUser = ref("")

const {getPlayers} = usePlayer()

function searchPlayer() {
    players.value = players.value.filter(player =>
            console.log(queryUser.value)
        // player.username.includes(queryUser.value)
    )
}

onMounted(() => {
    getPlayers().then(res => {
        if (res.status === 200) {
            players.value = res.data.data
        }
    })
})
</script>

<style scoped>

</style>
