<template>
    <layout>
        <div class="h-screen flex flex-col justify-center">
            <main class="swiper-container game-slider">
                <div class="swiper-wrapper" id="selectedGame">
                    <div class="swiper-slide flex gap-4 items-center justify-center">
                        <article class=" w-300 h-300 bg-dark-secondary relative border-4 border-my-indigo"
                                 style="transform: skew(-8deg)">
                            <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                                <button class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                                    <i class="fa fa-play text-gray-100"></i>
                                </button>
                                <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">Crée une partie</h5>
                            </div>
                        </article>
                        <article class=" w-300 h-300 bg-dark-secondary relative" style="transform: skew(-8deg)">
                            <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                                <a class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center"
                                   href="">
                                <i class="fa fa-play text-gray-100"></i>
                                </a>
                                <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">Rejoindre une partie</h5>
                            </div>
                        </article>
                    </div>
                </div>
                <button class="swiper-button-next"></button>
                <button class="swiper-button-prev"></button>
                <div class="swiper-pagination"></div>
            </main>
        </div>
    </layout>
</template>

<script setup>
import Layout from "../../../layouts/layout.vue";
</script>
