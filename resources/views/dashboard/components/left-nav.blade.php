<div class="bg-dark text-gray-100 px-4 py-4 h-full fixed w-300 border-r border-dark-secondary">
    <h3 class="text-xl font-bold text-my-indigo">GENIUS CONNECTED</h3>

    {{--    <img src="{{ asset("images/dot.png") }}" class="absolute bottom-0 left-0">--}}

    <div class="pt-4 relative">
        <h4 class="after:absolute after:block after:content-[''] after:border-b after:w-full after:my-2 mb-4">Console</h4>
        <p class="w-full bg-dark-secondary/30 backdrop-blur-sm p-4 rounded mt-2 uppercase text-sm">
            <a href="{{ route("game.home") }}" class="flex items-center">
                <i class="fa fa-play"></i>
                <span class="pl-4">commencer</span>
            </a>
        </p>
    </div>

    <div class="pt-4 relative">
        <h4 class="after:absolute after:block after:content-[''] after:w-full after:border-b after:my-2 mb-4">
            Menu</h4>
        <ul>
            <li class="flex items-center md:hover:text-my-indigo mb-4">
                <i class="fa fa-crown"></i>
                <a href="" class="block w-full pl-4">Tournois</a>
            </li>
            <li class="flex items-center md:hover:text-my-indigo mb-4">
                <i class="fa fa-chart-bar"></i>
                <a href="" class="block w-full pl-4">Statistiques</a>
            </li>
            <li class="flex items-center md:hover:text-my-indigo mb-4">
                <i class="fa fa-commenting"></i>
                <a href="" class="block w-full pl-4">Messageries</a>
            </li>
            <li class="flex items-center md:hover:text-my-indigo mb-4">
                <i class="fa fa-bell"></i>
                <a href="" class="block w-full pl-4">Notifications</a>
                <span class="text-red-700 text-sm">90</span>
            </li>
            <li class="flex items-center md:hover:text-my-indigo mb-4">
                <i class="fa fa-book"></i>
                <a href="" class="block w-full pl-4">Recueils</a>
                <span class="text-red-700 text-sm">90</span>
            </li>
            <li class="flex items-center md:hover:text-my-indigo mb-4">
                <i class="fa fa-cog"></i>
                <a href="" class="block w-full pl-4">Parametres</a>
            </li>
        </ul>
    </div>

    <form action="{{ route("logout") }}" method="post" class="absolute mb-4 block" style="bottom: 0">
        <button type="submit" class="flex items-center">
            <i class="fa fa-sign-out"></i>
            <span class="block w-full pl-4">Se deconnecter</span>
        </button>
    </form>
</div>
