<template>
    <div class="bg-my-indigo">
        <div class="mx-auto container p-2">
            <h3 class="text-gray-100 font-bold text-lg uppercase">Ge-connected</h3>
        </div>
    </div>

    <div>
        <div class="dark:bg-dark bg-gray-100 dark:text-gray-100 px-4 py-4 h-full fixed w-300 border-r border-gray-300 dark:border-dark-secondary">
            <nav class="pt-4 relative">
                <h4 class="after:absolute after:block after:content-[''] after:w-full after:border-b after:my-2 mb-4">
                    Menu</h4>
                <ul>
                    <li>
                        <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4 mt-4">
                            <i class="fa fa-store"></i>
                            <span class="block w-full pl-4">Boutique</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4 mt-4">
                            <i class="fa fa-crown"></i>
                            <span class="block w-full pl-4">Tournois</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4">
                            <i class="fa fa-gamepad"></i>
                            <span class="block w-full pl-4">Mes jeux</span>
                        </router-link>
                    </li>
                    <li>
                        <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4">
                            <i class="fa fa-chart-bar"></i>
                            <span class="block w-full pl-4">Statistiques</span>
                        </router-link>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="relative left-300" style="width: calc(100% - 300px);">

            <div class="grid grid-cols-2 gap-2">
                <section class="mx-2 mt-2">
                    <div class="grid grid-cols-2 gap-2">
                        <article class="dark:bg-dark-secondary rounded px-4 py-8 dark:text-gray-100 bg-gray-100 border-gray-300 border">
                            <div class="flex items-center justify-between">
                                <i class="fa fa-gamepad text-xl"></i>
                                <h3 class="text-2xl font-bold">100</h3>
                            </div>
                            <h4>Vos jeux</h4>
                        </article>
                        <article class="dark:bg-dark-secondary rounded px-4 py-8 dark:text-gray-100 bg-gray-100 border-gray-300 border">
                            <div class="flex items-center justify-between">
                                <i class="fa fa-gamepad text-xl"></i>
                                <h3 class="text-2xl font-bold">7850</h3>
                            </div>
                            <h4>Votre scores</h4>
                        </article>
                    </div>
                    <div class="dark:bg-dark-secondary w-full mt-2 rounded dark:text-gray-100 p-4 bg-gray-100 border-gray-300 border">
                        <h3>Do you know ?</h3>
                        <p class="text-center mt-2 font-bold">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus beatae cumque doloremque enim
                            est facilis, fugiat iusto maiores natus neque obcaecati odit quasi quibusdam sit velit veniam
                            vero. Autem deserunt dolore in inventore nemo nihil perferendis sequi tempora! Ex, modi?</p>
                    </div>
                </section>
                <section class="dark:bg-dark-secondary bg-gray-100 border-gray-300 rounded mt-2 mr-2 flex items-center justify-center border">
                    <i class="fa fa-brain text-10xl dark:text-gray-100"></i>
                </section>
            </div>

            <main class="relative">
                <button type="button" class="px-4 py-2 bg-my-indigo m-2 rounded-md text-gray-100 uppercase">crée une
                    partie
                </button>
                <div class="dark:bg-dark-secondary mx-2 rounded bg-gray-100">
                    <table class="dark:text-gray-100">
                        <thead>
                        <tr class="font-bold text-lg">
                            <th>#</th>
                            <th>Jeux</th>
                            <th>Niveau</th>
                            <th>Rubriques</th>
                            <th>Participants</th>
                            <th>Lien</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        <tr v-for="game in state.games.games" :key="game.id">
                            <td data-label="#">{{ game.id }}</td>
                            <td data-label="Jeux">
                                <router-link to="">{{ game.name }}</router-link>
                            </td>
                            <td data-label="Niveau">{{ game.level.name }}</td>
                            <td data-label="Rubrique">{{ game.category.name }}</td>
                            <td data-label="Participants">5</td>
                            <td data-label="Lien">
                                <router-link
                                    :to="{name: 'game.multi-players.play',params:{gameName: game.link,id: game.id}}">
                                    {{ game.link }}-{{ game.id }}
                                </router-link>
                            </td>
                            <td data-label="Action">
                                <button type="button"><i class="fa fa-trash text-red-500"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>

import {useGame, usePlayer} from "../../../services";
import {onMounted, ref} from "vue";

const state = ref({
    games: {}
})

const {getPlayerGames} = usePlayer()
onMounted(() => {
    getPlayerGames().then(res => {
        state.value.games = res.data.data
        console.log(res.data.data)
    })
})

</script>

<style scoped>
table {
    width: 100%;
}

thead th {
    font-weight: 600;
    padding: 10px;
    vertical-align: top;
}

tbody tr td {
    padding: 8px;
}

tbody tr td button {
    cursor: pointer;
}

@media (max-width: 768px) {
    .wrapper {
        width: 450px;
    }

    thead {
        display: none;
    }

    tbody, tr, td {
        display: block;
        width: 100%;
    }

    tr {
        margin-bottom: 15px;
    }

    tbody tr td {
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    td:before {
        content: attr(data-label);
        position: absolute;
        left: 0;
        width: 50%;
        padding-left: 15px;
        font-weight: 600;
        text-align: left;
    }
}
</style>
