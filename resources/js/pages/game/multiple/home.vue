<template>
    <create-multi-game v-on:close="gamePopup" v-if="popup.create"/>
    <join-game v-if="popup.join" v-on:close="joinPopup"/>
    <layout>
        <div class="h-screen flex flex-col justify-center">
            <main id="selectedGame">
                <swiper
                    :slides-per-view="3"
                    :space-between="0"
                    class="default-slider">
                    <swiper-slide>
                        <article class="w-300 h-300 bg-dark-secondary relative border-4 border-my-indigo"
                                 style="transform: skew(-8deg)">
                            <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                                <button
                                    @click="gamePopup"
                                    class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center z-10">
                                    <i class="fa fa-play text-gray-100"></i>
                                </button>
                                <h5 class="text-gray-100 font-bold text-md ml-4 uppercase">Crée une partie</h5>
                            </div>
                        </article>
                    </swiper-slide>
                    <swiper-slide>
                        <article class="w-300 h-300 bg-dark-secondary relative" style="transform: skew(-8deg)">
                            <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                                <button
                                    @click="joinPopup"
                                    class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                                    <i class="fa fa-play text-gray-100"></i>
                                </button>
                                <h5 class="text-gray-100 font-bold text-md ml-4 uppercase">Rejoindre une partie</h5>
                            </div>
                        </article>
                    </swiper-slide>
                    <swiper-slide>
                        <article class="w-300 h-300 bg-dark-secondary relative" style="transform: skew(-8deg)">
                            <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                                <router-link
                                    :to="{name: 'game.mutli-players.settings'}"
                                    class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                                    <i class="fa fa-play text-gray-100"></i>
                                </router-link>
                                <h5 class="text-gray-100 font-bold text-md ml-4 uppercase">Mes jeux</h5>
                            </div>
                        </article>
                    </swiper-slide>
                </swiper>
            </main>
        </div>
    </layout>
</template>

<script setup>
import Layout from "../../../layouts/layout.vue";
import {usePlayer} from "../../../services";

import {onMounted, ref} from "vue"

import {Swiper, SwiperSlide} from "swiper/vue";
import "swiper/swiper.min.css";
import CreateMultiGame from "../../../components/createMultiGame.vue";
import JoinGame from "../../../components/joinGame.vue";
import PlayerGamesSettings from "../../../components/playerGamesSettings.vue";

let popup = ref({
    "create": false,
    "join": false
})
const {getCurrentPlayer, players} = usePlayer()
onMounted(() => {
    getCurrentPlayer()
})

function gamePopup() {
    popup.value.create = !popup.value.create
}

function joinPopup() {
    popup.value.join = !popup.value.join
}
</script>
<style scoped>
.default-slider .swiper-slide {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
