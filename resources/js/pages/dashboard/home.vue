<template>
    <dashboard>
        <div class="grid grid-cols-custom relative">
            <section>
                <div
                    class="px-8 rounded relative bg-blue-700 backdrop-blur-lg bg-gradient-to-bl from-dark-secondary via-my-indigo to-dark h-300 m-4 rounded-lg flex items-center">
                    <div class="text-gray-100">
                        <h2 class="text-2xl font-bold uppercase">Get up to 80 brains</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, temporibus.</p>
                        <p class="mt-4">
                            <a href=""
                               class="bg-my-indigo/30 backdrop-blur-sm px-4 py-2 text-gray-100 rounded-lg mt-8 uppercase text-sm">Get
                                started</a>
                        </p>
                    </div>
                </div>
                <main class="mx-4 dark:text-gray-100">
                    <!--                    <div class="flex justify-between items-center mb-4">-->
                    <!--                        <h3 class="text-xl">Listes des tournois</h3>-->
                    <!--                        <a href="" class="text-my-indigo">voir tout</a>-->
                    <!--                    </div>-->
                    <!--                    <section class="grid grid-cols-4 gap-2">-->
                    <!--                        <article class="relative">-->
                    <!--                            &lt;!&ndash;                        <img src="{{ asset("images/food.jpg") }}" alt=""&ndash;&gt;-->
                    <!--                            &lt;!&ndash;                        class="overflow-hidden rounded-lg relative h-full w-full object-cover">&ndash;&gt;-->
                    <!--                            <h3 class="absolute bottom-0 mb-2 ml-4 text-md font-bold">Tournois libre</h3>-->
                    <!--                        </article>-->
                    <!--                        <article class="relative">-->
                    <!--                            &lt;!&ndash;                        <img src="{{ asset("images/business.jpg") }}" alt=""&ndash;&gt;-->
                    <!--                            &lt;!&ndash;                        class="overflow-hidden rounded-lg relative h-full w-full object-cover">&ndash;&gt;-->
                    <!--                            <h3 class="absolute bottom-0 mb-2 ml-4 text-md font-bold">Tournois libre</h3>-->
                    <!--                        </article>-->
                    <!--                        <article class="relative">-->
                    <!--                            &lt;!&ndash;                        <img src="{{ asset("images/education.jpg") }}" alt=""&ndash;&gt;-->
                    <!--                            &lt;!&ndash;                        class="overflow-hidden rounded-lg relative h-full w-full object-cover">&ndash;&gt;-->
                    <!--                            <h3 class="absolute bottom-0 mb-2 ml-4 text-md font-bold">Tournois libre</h3>-->
                    <!--                        </article>-->
                    <!--                        <article class="relative">-->
                    <!--                            &lt;!&ndash;                        <img src="{{ asset("images/electronics.jpg") }}" alt=""&ndash;&gt;-->
                    <!--                            &lt;!&ndash;                        class="overflow-hidden rounded-lg relative h-full w-full object-cover">&ndash;&gt;-->
                    <!--                            <h3 class="absolute bottom-0 mb-2 ml-4 text-md font-bold">Tournois libre</h3>-->
                    <!--                        </article>-->
                    <!--                    </section>-->
                    <section class="my-4">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg">Jeux multijoueurs</h2>
                            <router-link to="">voir tout</router-link>
                        </div>
                        <div class="grid md:grid-cols-3 gap-2 mt-2">
                            <template v-for="game in games" :key="game.id">
                                <article class="bg-blue-800/30 backdrop-blur-sm p-4 rounded-lg">
                                    <h3 class="text-md font-bold">{{ game.name }}</h3>
                                    <h3>Crée par :
                                        <router-link to="">{{ game.player.username }}</router-link>
                                    </h3>
                                    <h4>Niveau : {{ game.level.name }}</h4>
                                    <h4>Rubrique: {{ game.category.name }}</h4>
                                    <button type="button" @click="join_game(game.link,game.id)"
                                            v-if="players.id !== game.player_id"
                                            class="text-gray-100 block mt-2 bg-dark-secondary text-center p-2 rounded-lg uppercase text-sm hover:bg-blue-800 w-full">
                                        participer
                                    </button>
                                    <router-link
                                        :to="{name: 'game.multi-players.play',params:{gameName: game.link,id: game.id}}"
                                        v-else
                                        class="text-gray-100 block mt-2 bg-dark-secondary text-center p-2 rounded-lg uppercase text-sm hover:bg-blue-800 w-full">
                                        jouer
                                    </router-link>
                                </article>
                            </template>
                        </div>
                    </section>
                </main>
            </section>
            <div class="dark:bg-dark bg-gray-100 border-l h-screen w-300 dark:border-dark-secondary fixed right-0">

            </div>
        </div>
    </dashboard>
</template>

<script setup>

import Dashboard from "../../layouts/dashboard.vue";
import {useGame, usePlayer} from "../../services";
import {onMounted, ref} from "vue";
import {createToaster} from "@meforma/vue-toaster";

const toaster = createToaster({})
const {getGames, joinGame} = useGame()
const {getCurrentPlayer, players} = usePlayer()
const games = ref({})

onMounted(() => {
    getGames().then(res => {
        games.value = res.data.data
    })
    getCurrentPlayer()
})

function join_game(slug, id) {
    joinGame({slug, id}).then(res => {
        if (res.status === 200) {
            toaster.success(`oky.........`)
        }
    })
}

</script>
