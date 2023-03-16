import {createRouter, createWebHistory} from "vue-router";
import home from "../components/dashboard/home.vue";
import chat from "../components/dashboard/chat.vue";

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
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// router.beforeResolve(to => {
//     if(to.name){
//         NProgress.start();
//     }
// })

router.afterEach((to) => {
    document.title = to.meta.title;
    // NProgress.done();
});

export default router;
