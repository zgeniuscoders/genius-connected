import {createRouter, createWebHistory} from "vue-router";
import home from "../pages/dashboard/home.vue";
import chat from "../pages/chat/chat.vue";
import gameHome from "../pages/game/home.vue";
import gameMulti from "../pages/game/multiple/home.vue";
import gameConsole from "../pages/game/multiple/console.vue";


const routes = [
    {
        path: "/dashboard",
        name: "dashboard",
        meta: {
            title: "Mon Dashboard",
        },
        component: home,
    },
    {
        path: "/chat",
        name: "chat",
        meta: {
            title: "Messageries",
        },
        component: chat,
    },
    {
        path: "/chat/:id",
        name: "chat.show",
        meta: {
            title: "Messageries",
        },
        component: chat,
    },
    {
        path: "/game",
        name: "game",
        meta: {
            title: "Jeux menu",
        },
        component: gameHome,
    },
    {
        path: "/multi-players",
        name: "game.mutli-players",
        meta: {
            title: "Jeux menu",
        },
        component: gameMulti,
    },
    {
        path: "/multi-players/:gameName-:id",
        name: "game.multi-players.play",
        meta: {
            title: "gameName",
        },
        component: gameConsole,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeResolve(to => {
    if (to.name) {
        NProgress.start();
    }
})

router.afterEach((to) => {
    document.title = to.meta.title;
    NProgress.done();
});

export default router;
