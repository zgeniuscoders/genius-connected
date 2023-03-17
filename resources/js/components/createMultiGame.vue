<template>
    <section class="fixed dark:bg-dark-secondary dark:text-gray-100 bg-gray-100 z-20 rounded-md overflow-hidden"
             style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 600px">
        <div class="bg-my-indigo p-4 text-gray-100 flex items-center justify-between">
            <h5>Crée une partie multijoueurs</h5>
            <button type="button" @click="$emit('close')"><i class="fa fa-times"></i></button>
        </div>
        <div class="p-4">
            <form action="">
                <div class="flex flex-col gap-2">
                    <label for="game_name">Nom</label>
                    <input name="game_name" id="game_name"
                           v-model="game.gameName"
                           class="p-2 outline-none rounded-md dark:bg-dark dark:text-gray-100"
                           required/>
                </div>
                <div class="flex flex-col gap-2 mt-2">
                    <label for="categories">Rubrique</label>
                    <select name="categories" id="categories" v-model="game.categories"
                            class="p-2 outline-none rounded-md dark:bg-dark dark:text-gray-100">
                        <option v-for="category in categories" :key="category.id" :value="category.id">
                            {{ category.name }}
                        </option>
                    </select>
                </div>
                <div class="flex flex-col gap-2 mt-2">
                    <label for="level">Niveaux</label>
                    <select name="level" id="level" v-model="game.level"
                            class="p-2 outline-none rounded-md dark:bg-dark dark:text-gray-100">
                        <option v-for="level in levels" :key="level.id" :value="level.id">
                            {{ level.name }}
                        </option>
                    </select>
                </div>
                <div class="flex flex-col gap-2 mt-2">
                    <label for="player_max">Nombre de joueurs</label>
                    <input type="number" name="player_max" id="player_max" v-model="game.playerMax"
                           class="p-2 outline-none rounded-md dark:bg-dark dark:text-gray-100"
                           required/>
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <label for="is_private">Partie privée</label>
                    <input type="checkbox" name="is_private" id="is_private" v-model="game.isPrivate">
                </div>
                <button v-on:click="createG" type="submit"
                        class="bg-my-indigo px-4 py-2 uppercase rounded-md mt-4 text-gray-100"
                        @click.prevent="create">
                    enregistrer
                </button>
            </form>
        </div>
    </section>
</template>

<script setup>
import {ref, onMounted} from "vue";
import {useCategory, useLevel, useGame} from "../services";
import {createToaster} from "@meforma/vue-toaster"


const {getCategories, categories} = useCategory()
const {getLevels, levels} = useLevel()
const {createGame, games} = useGame()

const toaster = createToaster({})

let game = ref({
    gameName: "",
    categories: 0,
    level: "easy",
    playerMax: 5,
    isPrivate: false
})

onMounted(() => {
    getCategories()
    getLevels()
})

async function createG() {
    await createGame(game.value)
    toaster.success(`La partie ${game.value.gameName} a été créer avec success`)
}

</script>

<style scoped>

</style>
