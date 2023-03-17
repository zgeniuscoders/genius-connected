<template>
    <div class="dark:bg-dark bg-gray-100 relative overflow-hidden bg-center bg-no-repeat" id="cover_bg">
<!--        <game-nav :selectedGame="selectedGame"/>-->
        <slot/>
    </div>
</template>

<script setup>
import {ref, onMounted} from "vue";
import GameNav from "../components/gameNav.vue";

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

