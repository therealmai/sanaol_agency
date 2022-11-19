import { createRouter, createWebHistory } from "vue-router";


import App from "../App.vue";
import Login from "../pages/Login.vue";
import store from "../store";



const routes = [
    {
        path: "/",
        name: "home",
        component: App,
    },
    {
        path: "/",
        name: "login",
        component: Login,
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
