<template>
    <section class="dark:bg-dark-secondary/30 bg-gray-100 dark:backdrop-blur-sm flex items-center p-4 rounded-t-md border border-b-gray-200">
        <img :src="`${storagePath}/${currentPlayerMessage.profile}`" alt="" class="w-60 h-60 rounded-full object-cover">
        <div class="ml-4">
            <h5 class="dark:text-gray-100 font-bold uppercase">{{ currentPlayerMessage.username }}</h5>
            <span class="text-green-600">online</span>
        </div>
    </section>
    <div class="dark:bg-dark bg-gray-100 overflow-auto h-400 bg-center">
        <section v-for="message in messages" :key="message.id">
            <article class="flex items-end" v-if="message.sender_id === currentPlayer.id">
                <div
                    class="ml-auto mr-4 dark:bg-dark-secondary/30 bg-gray-200 dark:backdrop-blur-lg dark:text-gray-100 p-4 my-2 rounded-md"
                    style="width: calc(100% - 130px)">
                    <p>{{ message.message }}</p>
                </div>
            </article>
            <article class="flex items-center" v-else>
                <div
                    class="ml-4 mr-auto dark:bg-dark-secondary/30 bg-gray-200 dark:backdrop-blur-lg dark:text-gray-100 p-4 my-2 rounded-md"
                    style="width: calc(100% - 130px)">
                    <p>{{ message.message }}</p>
                </div>
            </article>
        </section>
    </div>
    <section class="p-4 dark:bg-dark-secondary/30 dark:backdrop-blur-sm bg-gray-100 rounded-b-md border border-t-gray-200">
        <form action="" method="post" @submit.prevent="send">
            <input type="text" name="messages" placeholder="Mesages..."
                   v-model="state.message"
                   class="w-full p-4 dark:text-gray-100 dark:bg-dark-secondary bg-gray-200 outline-none rounded-md">
        </form>
    </section>
</template>

<script setup>
import {onMounted, ref} from "vue";
import {useRoute} from "vue-router";
import {useChat, usePlayer} from "../services";

const {getMessage, sendMessage} = useChat()
const {getCurrentPlayer, getPlayer} = usePlayer()

const messages = ref({})
const currentPlayer = ref({})
const currentPlayerMessage = ref({})
const storagePath = ref("/storage/avatars")

const props = defineProps({id: String})

const state = ref({
    "message": ""
})

function getPlayerMessage() {
    getMessage(props.id).then(res => {
        if (res.status === 200) {
            messages.value = res.data.data
        }
    })
}

function send() {
    if (props.id) {
        sendMessage({
            "message": state.value.message,
            "receiverId": props.id
        }).then(res => {
            if (res.status === 200) {
                getPlayerMessage()
            }
            state.value.message = ""
        }).catch(err => {
            console.log(err)
        })
    }
}

onMounted(() => {

    getCurrentPlayer().then(res => {
        if (res.status === 200) {
            currentPlayer.value = res.data.data
        }
    })

    if (props.id) {
        getPlayerMessage()
        getPlayer(props.id).then(res => {
            if (res.status === 200) currentPlayerMessage.value = res.data.data
        })
    }
})
</script>

<style scoped>

</style>
