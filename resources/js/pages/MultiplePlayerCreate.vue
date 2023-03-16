<template>
    <section class="fixed dark:bg-dark-secondary dark:text-gray-100 bg-gray-100 z-20 rounded-md overflow-hidden"
             style="top: 50%;left: 50%;transform: translate(-50%,-50%);width: 600px">
        <div class="bg-my-indigo p-4 text-gray-100 flex items-center justify-between">
            <h5>Crée une partie multijoueurs</h5>
            <button type="button"><i class="fa fa-times"></i></button>
        </div>
        <div class="p-4">
            <form action="">
                <div class="flex flex-col gap-2">
                    <label for="game_name">Nom</label>
                    <input name="game_name" id="game_name"
                           class="p-2 outline-none rounded-md dark:bg-dark dark:text-gray-100"
                           required/>
                </div>
                <div class="flex flex-col gap-2 mt-2">
                    <label for="categories">Rubrique</label>
                    <select name="categories" id="categories"
                            class="p-2 outline-none rounded-md dark:bg-dark dark:text-gray-100"
                            required>
                        <option value="all">Tout</option>
                        <option value="all">Informatique</option>
                        <option value="all">Science</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2 mt-2">
                    <label for="level">Niveaux</label>
                    <select name="level" id="level"
                            class="p-2 outline-none rounded-md dark:bg-dark dark:text-gray-100"
                            required>
                        <option value="easy">Facile</option>
                        <option value="normal">Normal</option>
                        <option value="hard">Difficile</option>
                    </select>
                </div>
                <div class="flex flex-col gap-2 mt-2">
                    <label for="player_max">Nombre de joueurs</label>
                    <input type="number" name="player_max" id="player_max"
                           class="p-2 outline-none rounded-md dark:bg-dark dark:text-gray-100"
                           value="5" required/>
                </div>
                <div class="flex items-center gap-2 mt-2">
                    <label for="is_private">Partie privée</label>
                    <input type="checkbox" name="is_private" id="is_private">
                </div>
                <button type="submit" class="bg-my-indigo px-4 py-2 uppercase rounded-md mt-4 text-gray-100">
                    enregistrer
                </button>
            </form>
        </div>
    </section>
</template>

<script setup>
    alert(1000)
</script>
