<nav class="bg-dark-secondary/30 backdrop-blur-sm flex items-center justify-between container mx-auto px-4 py-2">
    <form action="">
        <input type="search" name="q" id="q" class="p-2 w-400 rounded-md outline-none" placeholder="Recherche...">
    </form>
    <div class="text-gray-200 bg-dark/30 backdrop-blur-sm py-2 px-4 rounded-md ">
        <h3 class="flex items-center uppercase font-bold">
            {{ auth()->user()->name }}
        </h3>
    </div>
</nav>
