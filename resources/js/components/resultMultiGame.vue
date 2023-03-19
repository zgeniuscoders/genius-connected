<template>
    <section class="wrapper dark:bg-dark bg-gray-100 z-20 rounded-md border border-my-indigo">
        <div class="flex items-center justify-between mx-6 my-2">
            <h3 class="text-2xl dark:text-gray-100 uppercase text-center mt-2 font-bold">Resultat</h3>
            <button type="submit" class="dark:text-gray-100" @click="$emit('close')"><i class="fa fa-times"></i>
            </button>
        </div>

        <div class="h-400 overflow-auto">
            <table class="mt-4 dark:text-gray-100">
                <thead>
                <tr class="font-bold text-lg">
                    <th>#</th>
                    <th>Joueur</th>
                    <th>Points</th>
                    <th>Moyenne</th>
                </tr>
                </thead>
                <tbody class="text-center ">
                <tr>
                    <td data-label="#">1</td>
                    <td data-label="Joueur">
                        <router-link to="">zgenius codeurs</router-link>
                    </td>
                    <td data-label="Points">15</td>
                    <td data-label="Moyenne">15</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>
</template>

<script setup>
import {defineProps} from "vue";

defineProps(["game"])
</script>

<style scoped>
.wrapper {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 700px;
}

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
