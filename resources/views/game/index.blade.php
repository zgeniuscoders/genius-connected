@extends("game.gameLayoutChooser")
@section("main")
    <div class="h-screen flex flex-col justify-center">
        {{--    select game level--}}
        <section class="flex items-center justify-center w-full">
            <div class="flex items-center justify-center border border-dark-secondary w-400 mb-6">
                <article class="p-2  text-gray-100 w-full text-center hover:cursor-pointer hover:bg-my-indigo">
                    <h3 class="text-md uppercase" data-value="easy">Facile</h3>
                </article>
                <article
                    class="p-2 bg-my-indigo text-gray-100 w-full text-center hover:cursor-pointer hover:bg-my-indigo">
                    <h3 class="text-md uppercase font-bold" data-value="normal">Normal</h3>
                </article>
                <article class="p-2 text-gray-100 w-full text-center hover:cursor-pointer hover:bg-my-indigo">
                    <h3 class="text-md uppercase" data-value="difficult">Difficile</h3>
                </article>
            </div>
        </section>
        <main class="swiper-container game-slider">
            <div class="swiper-wrapper" id="selectedGame">
                <div class="swiper-slide flex gap-4 items-center justify-center">
                    <article class=" w-300 h-300 bg-dark-secondary relative border-4 border-my-indigo bg-cover"
                             style="transform: skew(-8deg);background-image: url('{{ asset("images/tout.jpg") }}')">
                        <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                            <button class="w-12 h-12 rounded-full flex items-center justify-center">
                                <i class="fa fa-play text-gray-100"></i>
                            </button>
                            <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">Tournois</h5>
                        </div>
                    </article>
                    <article class=" w-300 h-300 bg-dark-secondary relative bg-center"
                             style="transform: skew(-8deg);background-image: url('{{ asset("images/training.jpg") }}')">
                        <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                            <button class="w-12 h-12 rounded-full flex items-center justify-center">
                                <i class="fa fa-play text-gray-100"></i>
                            </button>
                            <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">Entrainement</h5>
                        </div>
                    </article>
                    <article class=" w-300 h-300 bg-dark-secondary relative" style="transform: skew(-8deg)">
                        <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                            <button class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                                <i class="fa fa-play text-gray-100"></i>
                            </button>
                            <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">En solo</h5>
                        </div>
                    </article>
                </div>
                <div class="swiper-slide flex gap-4 items-center justify-center">
                    <article class=" w-300 h-300 bg-dark-secondary relative bg-cover"
                             style="transform: skew(-8deg);background-image: url('{{ asset("images/vs.jpg") }}')">
                        <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                            <button class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                                <i class="fa fa-play text-gray-100"></i>
                            </button>
                            <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">Duel</h5>
                        </div>
                    </article>
                    <article class=" w-300 h-300 bg-dark-secondary relative" style="transform: skew(-8deg)">
                        <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                            <a href="{{ route("game.multiples_players") }}"
                               class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                                <i class="fa fa-play text-gray-100"></i>
                            </a>
                            <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">Multi joueurs</h5>
                        </div>
                    </article>
                    <article class=" w-300 h-300 bg-dark-secondary relative" style="transform: skew(-8deg)">
                        <div class="absolute bottom-0 mb-4 mx-4 flex items-center">
                            <button class="w-12 h-12 bg-dark-secondary rounded-full flex items-center justify-center">
                                <i class="fa fa-play text-gray-100"></i>
                            </button>
                            <h5 class="text-gray-100 font-bold text-lg ml-4 uppercase">Paris</h5>
                        </div>
                    </article>
                </div>
            </div>
            <button class="swiper-button-next"></button>
            <button class="swiper-button-prev"></button>
            <div class="swiper-pagination"></div>
        </main>
    </div>
@endsection

