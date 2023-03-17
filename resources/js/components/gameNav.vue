<template>
    <nav
        class="flex items-center justify-between mx-auto container px-4 mt-4 dark:text-gray-100 fixed top-0 left-0 right-0">
        <div class="flex items-center">
            <img :src="`${paths.storagePath}/${players.profile}`" alt="" class="w-12 rounded-full object-cover">
            <div class="ml-2">
                <p class="text-sm font-bold">{{ players.username }}</p>
                <p class="text-sm">{{ players.bonus }}</p>
            </div>
        </div>
        <h3 class="text-xl font-bold uppercase" id="selectedGameName">{{ selectedGame }}</h3>
        <button class="bg-my-indigo px-4 py-2 rounded-lg uppercase">dashboard</button>
    </nav>
</template>

<script setup>
import {ref, onMounted, defineProps} from "vue";
import GameNav from "../components/gameNav.vue";
import {usePlayer} from "../services";

defineProps([
    "selectedGame"
])

const paths = ref({
    storagePath: 'storage/avatars',
    avatar: 'images/avatar.png',
})

const {getCurrentPlayer, players} = usePlayer()

onMounted(() => {
    getCurrentPlayer()
})
</script>

<style scoped>

</style>
