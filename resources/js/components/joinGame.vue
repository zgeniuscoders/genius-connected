<template>
    <section
        class="fixed dark:bg-dark-secondary dark:text-gray-100 bg-gray-100 z-20 rounded-md overflow-hidden center-box border border-my-indigo p-4">
        <p class="text-lg">Pour rejoindre une partie veuillez inserer le lien de la partie ici</p>
        <form action="" class="mt-2">
            <input type="text" class="p-2 outline-none rounded-md dark:bg-dark dark:text-gray-100 w-full"
                   required placeholder="lien de la partie" v-model="state.link">
        </form>
        <div class="flex justify-end gap-2 mt-2">
            <button class="bg-dark p-2 uppercase rounded-md" @click="$emit('close')">annuler</button>
            <button class="bg-dark p-2 uppercase rounded-md" @click="join">rejoindre</button>
        </div>
    </section>
</template>

<script setup>
import {createToaster} from "@meforma/vue-toaster"
import {useGame} from "../services";
import {ref} from "vue";

const state = ref({
    link: ""
})

const {joinGame} = useGame()
const toaster = createToaster({})

function join() {

    let parts = state.value.link.split("-")

    let slug = parts.slice(0, -1).join("-")
    let id = parts[parts.length - 1]

    if (state.value.link === "") {
        toaster.error(`Veuillez inserer le lien du jeux`)
    } else {
        joinGame({slug, id}).then(res => {
            if (res.status === 200) {
                toaster.success(`bla bla bla `)
                console.log(res.data.data)
            }
        }).catch(err => {
            toaster.error(`Vous ne pouvez pas rejoindre cette partie car elle existe pas!`)
        })
    }
}
</script>

<style scoped>
.center-box {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 400px;
}
</style>
