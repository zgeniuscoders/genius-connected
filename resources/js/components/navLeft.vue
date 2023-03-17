<template>
    <div class="bg-dark text-gray-100 px-4 py-4 h-full fixed w-300 border-r border-dark-secondary">
        <h3 class="text-xl font-bold text-my-indigo">GENIUS CONNECTED</h3>

        <div class="pt-4 relative">
            <h4 class="after:absolute after:block after:content-[''] after:border-b after:w-full after:my-2 mb-4">
                Console</h4>
            <p class="w-full bg-dark-secondary/30 backdrop-blur-sm p-4 rounded mt-2 uppercase text-sm">
                <router-link :to="{name: 'game'}" class="flex items-center">
                    <i class="fa fa-play"></i>
                    <span class="pl-4">commencer</span>
                </router-link>
            </p>
        </div>

        <div class="pt-4 relative">
            <h4 class="after:absolute after:block after:content-[''] after:w-full after:border-b after:my-2 mb-4">
                Menu</h4>
            <ul>
                <li>
                    <router-link :to="{name: 'dashboard'}" class="flex items-center md:hover:text-my-indigo mb-4 mt-4">
                        <i class="fa fa-home"></i>
                        <span class="block w-full pl-4">Accueil</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4 mt-4">
                        <i class="fa fa-store"></i>
                        <span class="block w-full pl-4">Boutique</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4 mt-4">
                        <i class="fa fa-crown"></i>
                        <span class="block w-full pl-4">Tournois</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4">
                        <i class="fa fa-gamepad"></i>
                        <span class="block w-full pl-4">Mes jeux</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4">
                        <i class="fa fa-chart-bar"></i>
                        <span class="block w-full pl-4">Statistiques</span>
                    </router-link>
                </li>
                <li>
                    <router-link :to="{name: 'chat'}" class="flex items-center md:hover:text-my-indigo mb-4">
                        <i class="fa fa-commenting"></i>
                        <span class="block w-full pl-4">Chats</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4">
                        <i class="fa fa-bell"></i>
                        <span class="block w-full pl-4">Notifications</span>
                        <span class="text-red-700 text-sm">90</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4">
                        <i class="fa fa-book"></i>
                        <span class="block w-full pl-4">Recueils</span>
                        <span class="text-red-700 text-sm">90</span>
                    </router-link>
                </li>
                <li>
                    <router-link to="" class="flex items-center md:hover:text-my-indigo mb-4">
                        <i class="fa fa-cog"></i>
                        <span class="block w-full pl-4">Parametres</span>
                        <span class="text-red-700 text-sm">90</span>
                    </router-link>
                </li>
            </ul>
        </div>

        <form action="" method="post" class="absolute mb-4 block" style="bottom: 0">
            <button type="submit" class="flex items-center">
                <i class="fa fa-sign-out"></i>
                <span class="block w-full pl-4">Se deconnecter</span>
            </button>
        </form>
    </div>

</template>

<script setup>

</script>
<style scoped>
.router-link-exact-active {
    color: #6C63FF !important;
}

</style>
