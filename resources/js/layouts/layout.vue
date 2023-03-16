<template>
    <div class="dark:bg-dark bg-gray-100 relative overflow-hidden bg-center bg-no-repeat" id="cover_bg">
        <nav
            class="flex items-center justify-between mx-auto container px-4 mt-4 dark:text-gray-100 fixed top-0 left-0 right-0">
            <div class="flex items-center">
                <img :src="paths.avatar" alt="" class="w-12 rounded-full object-cover">
                <div class="ml-2">
                    <p class="text-sm font-bold">zgenius</p>
                    <p class="text-sm">fff</p>
                </div>
            </div>
            <h3 class="text-xl font-bold uppercase" id="selectedGameName">{{ selectedGame }}</h3>
            <button class="bg-my-indigo px-4 py-2 rounded-lg uppercase">dashboard</button>
        </nav>
        <slot/>
    </div>
</template>

<script setup>
import {ref, onMounted} from "vue";

let selectedGame = ref("no game selected")
const paths = ref({
    publicPath: 'images/',
    storagePath: 'storage/',
    avatar: 'images/avatar.png',
})

onMounted(() => {
    let selectedGameBox = document.querySelectorAll("#selectedGame article")

    const nextBtn = document.querySelector(".swiper-button-next")
    const prevBtn = document.querySelector(".swiper-button-prev")

    let index = 0

    function activeSelectedGame(element) {
        selectedGameBox.forEach(x => {
            if (element !== x) {
                x.classList.remove("border-my-indigo")
                x.classList.remove("border-4")
            }
        })
    }

    function addActiveToSelectedGame(element, positon) {
        index = positon
        element.classList.add("border-my-indigo")
        element.classList.add("border-4")
    }

    function selectedGameNameNav(element) {
        selectedGame.value = element
    }

    selectedGameNameNav(selectedGameBox[0].querySelector("h5").textContent)

    window.addEventListener("keyup", (e) => {
        if (e.key === "ArrowRight") {
            index++
            if (index > selectedGameBox.length - 1) {
                index = 0
                prevBtn.click()
            } else if (index === 3) {
                nextBtn.click()
            }
        } else if (e.key === "ArrowLeft") {
            index--
            if (index < 0) {
                index = selectedGameBox.length - 1
                nextBtn.click()
            } else if (index === 2) {
                prevBtn.click()
            }
        }

        activeSelectedGame(selectedGameBox[index])
        addActiveToSelectedGame(selectedGameBox[index], index)
        selectedGameNameNav(selectedGameBox[index].querySelector("h5").textContent)
    })
    selectedGameBox.forEach((e, pos) => {
        e.addEventListener("click", (event) => {
            selectedGameNameNav(e.querySelector("h5").textContent)
            addActiveToSelectedGame(e, pos)
            activeSelectedGame(e)
        })
    })

})

</script>

<style scoped>
#cover_bg {
    background-image: url('images/cover.jpg');
}
</style>

