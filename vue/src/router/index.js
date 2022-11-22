import { createRouter, createWebHistory } from "vue-router";


import App from "../App.vue";
import Login from "../pages/Login.vue";
import Hero from "../pages/Hero.vue";
import Membership from "../pages/Membership.vue";
import Talent_List from "../pages/Talent_List.vue";
import Services from "../pages/Services.vue";   
import Events from "../pages/Events.vue";
import MainLayout from "../components/Layout/MainLayout.vue";


import store from "../store";


const routes = [
    // {
    //     path: "/",
    //     name: "home",
    //     component: App,
    // },
    {
        path: "/",
        redirect: "/hero",
        component: MainLayout,
        children:[
            {
                path: "/login",
                name: "login",
                component: Login,
                
            },
            {
                path: "/hero",
                name: "hero",
                component: Hero
            },
            {
                path: "/talent_list",
                name: "talent_list",
                component: Talent_List
            },
            {
                path: "/services",
                name: "services",
                component: Services
            },
            {
                path: "/events",
                name: "events",
                component: Events
            },
            
        ]
        
    },

    {
        path: "/membership",
        name: "membership",
        component: Membership
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    linkActiveClass: "py-2 bg-primary rounded-lg drop-shadow-lg text-white"
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