import { createRouter, createWebHistory } from "vue-router";


import App from "../App.vue";
import Login from "../pages/Login.vue";
import Hero from "../pages/Hero.vue";
import MainLayout from "../components/MainLayout.vue";

import store from "../store";


const routes = [
    {
        path: "/",
        name: "home",
        component: App,
        children:[
            {
                path: "/",
                name: "menu",
                component: ItemMenu,
            },
        ]

    },
    {
        path: "/login",
        name: "login",
        component: Login,
        
    },
    {
        path: "/hero",
        name: "hero",
        component: Hero,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    linkActiveClass: "bg-primary rounded-[9px]"
});

// router.beforeEach((to, from, next) => {
//     if(to.meta.requiresAuth && !store.state.user.token) {
//         next({ name: "login" });
//     }else if(store.state.user.token && to.name === "login") {
//         next({ name: "navigation" });
//     }else {
//         next();
//     }   
// });

export default router;
