<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Games | @yield("title")</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset("css/all.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/swiper.css") }}">
    @vite('resources/js/app.js')
</head>
<body class="dark:bg-dark bg-gray-100 relative overflow-hidden bg-center bg-no-repeat"
      style="background-image: url('{{ asset("images/cover.jpg") }}')">
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

{{--<img src="{{ asset("images/cover.jpg") }}" alt="" class="absolute bottom-0" style="opacity: 10;">--}}
@yield("main")
<script src="{{ asset("js/swiper.js") }}"></script>
<script>

    let selectedGameBox = document.querySelectorAll("#selectedGame article")
    let selectedGameName = document.querySelector("#selectedGameName")

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
        selectedGameName.textContent = element
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

    new Swiper(".game-slider", {
        spaceBetween: 300,
        centeredSlides: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    })

</script>
</body>
</html>

