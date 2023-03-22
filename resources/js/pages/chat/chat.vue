<template>
    <dashboard>
        <div class="grid grid-cols-custom relative">
            <main class="m-2 h-90vh">
                <section class="bg-dark-secondary/30 backdrop-blur-sm flex items-center p-4">
                    <!--                    <img src="{{ asset("images/avatar.png") }}" alt="username" class="w-60 h-60">-->
                    <div class="ml-4">
                        <h5 class="text-gray-100 font-bold uppercase">zgenius gamer</h5>
                        <span class="text-green-600">online</span>
                    </div>
                </section>
                <section class="bg-dark overflow-auto h-400 bg-center">
                    <article class="flex items-end">
                        <div
                            class="ml-auto mr-4 bg-dark-secondary/30 backdrop-blur-lg dark:text-gray-100 p-4 my-2 rounded-md"
                            style="width: calc(100% - 130px)">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, corporis.</p>
                        </div>
                    </article>
                    <article class="flex items-center">
                        <div
                            class="ml-4 mr-auto bg-dark-secondary/30 backdrop-blur-lg dark:text-gray-100 p-4 my-2 rounded-md"
                            style="width: calc(100% - 130px)">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto at beatae blanditiis
                                culpa delectus dolor earum enim fuga libero molestiae omnis optio quae quia, recusandae
                                similique vel voluptatem. Corporis culpa dignissimos doloremque error maxime molestias
                                quisquam, sit soluta vitae voluptates.</p>
                        </div>
                    </article>
                </section>
                <section class="p-4 bg-dark-secondary/30 backdrop-blur-sm">
                    <form action="" method="post">
                        <input type="hidden" name="userId">
                        <input type="text" name="messages" placeholder="Mesages..."
                               class="w-full p-4 dark:text-gray-100 dark:bg-dark-secondary outline-none rounded-md">
                    </form>
                </section>
            </main>
            <aside class="border-l border-dark-secondary px-2 h-90vh overflow-auto">
                <form action="" class="w-full mb-2 pt-2">
                    <label>
                        <input type="search" name="q" placeholder="Recherche..."
                               v-model="queryUser" @input="searchPlayer"
                               class="w-full dark:bg-dark-secondary dark:text-gray-100 rounded-md p-2 outline-none">
                    </label>
                </form>

                <!--                show all user-->
                <router-link to="" class="flex items-center text-gray-100 bg-dark-secondary rounded-md p-2 mb-2"
                             v-for="player in players" :key="player.id">
                    <div class="flex items-center w-full">
                        <img :src="`${storagePath}/${player.profile}`" alt="username"
                             class="w-40 h-40 rounded-full object-cover">
                        <div class="ml-4">
                            <h3 class="text-sm">{{ player.username }}</h3>
                            <p class="font-bold text-sm">Lorem ipsum dolor sit...</p>
                        </div>
                    </div>
                    <p class="flex-end text-red-500">20</p>
                </router-link>
            </aside>
        </div>
    </dashboard>
</template>

<script setup>
import Dashboard from "../../layouts/dashboard.vue";
import {usePlayer} from "../../services";
import {computed, onMounted, ref} from "vue";

const {getPlayers} = usePlayer()
const players = ref([])
const storagePath = ref("storage/avatars")

const queryUser = ref("")

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

