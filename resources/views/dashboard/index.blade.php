@extends("dashboard.default")

@section("title")
    Bienvenue sur notre page
@endsection

@section("main")
    <div class="grid grid-cols-custom relative">
        <section>
            <div class="px-8 rounded relative bg-blue-700 backdrop-blur-lg bg-gradient-to-bl from-dark-secondary via-my-indigo to-dark h-300 m-4 rounded-lg flex items-center">
                <div class="text-gray-100">
                    <h2 class="text-2xl font-bold uppercase">Get up to 80 brains</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi, temporibus.</p>
                    <p class="mt-4">
                        <a href="" class="bg-my-indigo/30 backdrop-blur-sm px-4 py-2 text-gray-100 rounded-lg mt-8 uppercase text-sm">Get started</a>
                    </p>
                </div>
            </div>
            <main class="mx-4 dark:text-gray-100">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl">Listes des tournois</h3>
                    <a href="" class="text-my-indigo">voir tout</a>
                </div>
                <section class="grid grid-cols-4 gap-2">
                    <article class="relative">
                        <img src="{{ asset("images/food.jpg") }}" alt=""
                             class="overflow-hidden rounded-lg relative h-full w-full object-cover">
                        <h3 class="absolute bottom-0 mb-2 ml-4 text-md font-bold">Tournois libre</h3>
                    </article>
                    <article class="relative">
                        <img src="{{ asset("images/business.jpg") }}" alt=""
                             class="overflow-hidden rounded-lg relative h-full w-full object-cover">
                        <h3 class="absolute bottom-0 mb-2 ml-4 text-md font-bold">Tournois libre</h3>
                    </article>
                    <article class="relative">
                        <img src="{{ asset("images/education.jpg") }}" alt=""
                             class="overflow-hidden rounded-lg relative h-full w-full object-cover">
                        <h3 class="absolute bottom-0 mb-2 ml-4 text-md font-bold">Tournois libre</h3>
                    </article>
                    <article class="relative">
                        <img src="{{ asset("images/electronics.jpg") }}" alt=""
                             class="overflow-hidden rounded-lg relative h-full w-full object-cover">
                        <h3 class="absolute bottom-0 mb-2 ml-4 text-md font-bold">Tournois libre</h3>
                    </article>
                </section>
            </main>
        </section>
        <div class="bg-dark border-l h-screen w-300 border-dark-secondary fixed right-0">

        </div>
    </div>
@endsection
