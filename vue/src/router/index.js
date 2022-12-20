import { createRouter, createWebHistory } from "vue-router";


import App from "../App.vue";
import Login from "../pages/Login.vue";
import Hero from "../pages/Hero.vue";
import Membership from "../pages/Membership.vue";
import Talent_List from "../pages/Talent_List.vue";
import Talent_User from "../pages/Talent_User.vue";
import Services from "../pages/Services.vue";   
import ServiceEdit from "../pages/ServiceEdit.vue";
import Events from "../pages/Events.vue";
import Edit_Events from "../pages/EditEvents.vue";
import MainLayout from "../components/Layout/MainLayout.vue";
import UserManagement from "../pages/UserManagement.vue";  
import News_Create from "../pages/News_Create.vue";
import News_Update from "../pages/News_Update.vue";
import EventsManagement from "../pages/EventsManagement.vue";
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
                path: "/membership",
                name: "membership",
                component: Membership,
            },
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
                path: "/services/edit/:id",
                name: "serviceEdit",
                component: ServiceEdit
            },
            {
                path: "/events",
                name: "events",
                component: Events
            },
            {
                path: "/edit_events",
                name: "edit_events",
                component: Edit_Events
            },
            {
                path: "/create_event",
                name: "createEvent",
                component: CreateEvent
            },
            {
              path: "/news/:id",
              name: "news",
              component: News
            },
            {
                path: "/usermanagement",
                name: "usermanagement",
                component: UserManagement
            },
            {
                path: "/Profile",
                name: "Profile",
                component: Talent_User
            }, 
            {
                path: "/news_create",
                name: "news_create",
                component: News_Create
            },
            {
                path: "/news_update",
                name: "news_update",
                component: News_Update
            },
            {
                path: "/events_management",
                name: "events_management",
                component: EventsManagement
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
