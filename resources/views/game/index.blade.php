<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Games | @yield("title")</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset("css/all.min.css") }}">
    @vite('resources/js/app.js')
</head>
<body class="dark:bg-dark bg-gray-100 relative overflow-hidden">

<img src="{{ asset("images/game.svg") }}" alt="" class="absolute bottom-0" style="opacity: 10;width: 600px">

<nav
    class="flex items-center justify-between mx-auto container px-4 mt-4 dark:text-gray-100 fixed top-0 left-0 right-0">
    <div class="flex items-center">
        <img src="{{ asset("images/avatar.png") }}" alt="" class="w-12">
        <div class="ml-2">
            <p class="text-sm font-bold">zgenius gamer</p>
            <p class="text-sm">300</p>
        </div>
    </div>
    <h3 class="text-xl font-bold uppercase" id="selectedGameName">Selected game info</h3>
    <button class="bg-my-indigo px-4 py-2 rounded-lg uppercase">quitter</button>
</nav>

<main class="flex items-center justify-center flex-col h-screen overflow-hidden">
    <button type="button" class="absolute left-0 mx-4" id="btn__carousel__next"><i
            class="fa fa-arrow-left fa-2xl dark:text-gray-100"></i></button>
    <section class="flex gap-4" id="selectedGame">
        <article class="w-300 h-300 bg-dark-secondary relative border-4 border-my-indigo"
                 style="transform: skew(-8deg)">
            <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                <button class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                    <i class="fa fa-play text-gray-100"></i>
                </button>
                <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">Tournois</h5>
            </div>
        </article>
        <article class="w-300 h-300 bg-dark-secondary relative" style="transform: skew(-8deg)">
            <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                <button class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                    <i class="fa fa-play text-gray-100"></i>
                </button>
                <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">En solo</h5>
            </div>
        </article>
        <article class="w-300 h-300 bg-dark-secondary relative" style="transform: skew(-8deg)">
            <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                <button class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                    <i class="fa fa-play text-gray-100"></i>
                </button>
                <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">Multi joueurs</h5>
            </div>
        </article>
    </section>
    <button class="bg-my-indigo text-gray-100 px-4 py-2 uppercase mt-4 rounded-md z-20">
        commencer
    </button>
    <button type="button" class="absolute right-0 mx-4" id="btn__carousel__prev"><i
            class="fa fa-arrow-right fa-2xl dark:text-gray-100"></i></button>
</main>
<script>

    let selectedGameBox = document.querySelectorAll("#selectedGame article")
    let selectedGameName = document.querySelector("#selectedGameName")

    let index = 0
    window.addEventListener("keyup", (e) => {
        if (e.key === "ArrowRight") {
            index++
            if (index > 2) {
                index = 0
            }
        } else if (e.key === "ArrowLeft") {
            index--
            if (index < 0) {
                index = 2
            }
        }
        selectedGameBox.forEach(x => {
            if (selectedGameBox[index] !== x) {
                x.classList.remove("border-my-indigo")
                x.classList.remove("border-4")
            }
        })
        selectedGameBox[index].classList.add("border-my-indigo")
        selectedGameBox[index].classList.add("border-4")
        console.log(e, index)
    })

    selectedGameBox.forEach((e) => {
        e.addEventListener("click", (event) => {
            selectedGameName.textContent = e.querySelector("h5").textContent
            e.classList.add("border-my-indigo")
            e.classList.add("border-4")
            selectedGameBox.forEach(x => {
                if (e !== x) {
                    x.classList.remove("border-my-indigo")
                    x.classList.remove("border-4")
                }
            })
        })
    })
</script>
</body>
</html>
