import { createRouter, createWebHistory } from "vue-router";
import App from "../App.vue";
import Login from "../pages/Login.vue";
import Hero from "../pages/Hero.vue";
import HeroEdit from "../pages/HeroEdit.vue"
import HeroEditPreview from "../pages/HeroEditPreview.vue"
import Membership from "../pages/Membership.vue";
import Talent_List from "../pages/Talent_List.vue";
import Talent_User from "../pages/Talent_User.vue";
import Services from "../pages/Services.vue";
import ServiceEdit from "../pages/ServiceEdit.vue";
import Events from "../pages/Events.vue";
import Edit_Events from "../pages/EditEvents.vue";
import News from "../pages/News.vue";
import Reminders from "../pages/Reminders.vue";
import MainLayout from "../components/Layout/MainLayout.vue";
import UserManagement from "../pages/UserManagement.vue";
import News_Create from "../pages/News_Create.vue";
import News_Update from "../pages/News_Update.vue";
import EventsManagement from "../pages/EventsManagement.vue";
import herobannerMG2 from "../pages/herobannerMG2.vue";
import EventsCreate from "../pages/CreateEvent.vue";

import UserMgmtModalTester from "../pages/UserManagementTester.vue";
import EditUserModal from "../components/Modal/UserManageModals/EditUserModal.vue"

const routes = [
    {
        path: "/",
        redirect: "/hero",
        component: MainLayout,
        meta: { title: "Home" },
        children: [
            {
                path: "/membership",
                name: "membership",
                component: Membership,
                meta: { title: "Register" },
            },
            {
                path: "/login",
                name: "login",
                component: Login,
                meta: { title: "Login" },
            },
            {
                path: "/hero",
                name: "hero",
                component: Hero,
                meta: { title: "Home" },
            },
            {
                path: "/hero/edit/:id",
                name: "heroEdit",
                component: HeroEdit,
                meta: {title: 'Edit Hero'}
            },
            {
                path: "/hero/edit/prev/:cat",
                name: "heroEditPreview",
                component: HeroEditPreview,
                meta: {title: 'Edit Hero Preview'}
            },
            {
                path: "/usermanagement",
                name: "usermanagement",
                component: UserManagement,
                meta: { title: "Manage Users" },
            },
            {
                path: "/talent_list",
                name: "talent_list",
                component: Talent_List,
                meta: { title: "Talents" },
            },
            {
                path: "/profile/:id",
                name: "profile",
                component: Talent_User,
                meta: { title: "Profile" },
            },
            {
                path: "/services",
                name: "services",
                component: Services,
                meta: { title: "Services" },
            },
            {
                path: "/services/edit/:id",
                name: "serviceEdit",
                component: ServiceEdit,
                meta: { title: "Edit Service" },
            },
            {
                path: "/news/:id",
                name: "news",
                component: News,
                meta: { title: "News" },
            },
            {
                path: "/news/create",
                name: "news_create",
                component: News_Create,
                meta: { title: "Create News" },
            },
            {
                path: "/news/edit/:id",
                name: "news_update",
                component: News_Update,
                meta: { title: "Edit News" },
            },
            {
                path: "/events",
                name: "events",
                component: Events,
                meta: { title: "Events" },
            },
            {
                path: "/events_management",
                name: "events_management",
                component: EventsManagement,
                meta: { title: "Manage Events" },
            },
            {
                path: "/events/create",
                name: "event_create",
                component: EventsCreate,
                meta: { title: "Create Event" },
            },
            {
                path: "/events/edit/:id",
                name: "edit_events",
                component: Edit_Events,
                meta: { title: "Edit Event" },
            },
            {
                path: "/reminders",
                name: "reminders",
                component: Reminders,
                meta: { title: "Reminders" },
            },
            {
                path: "/user_test",
                name: "user_test",
                component: UserMgmtModalTester,
            },
            {
                path: "/modal_test",
                name: "modal_test",
                component: EditUserModal,
            },
        ],

    },

    {
        path: "/membership",
        name: "membership",
        component: Membership,
        meta: { title: "Register" },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
    linkActiveClass: "py-2 bg-primary rounded-lg drop-shadow-lg text-white",
    scrollBehavior(to, from, savedPosition) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                resolve({ left: 0, top: 0 });
            }, 500);
        });
    },
});

//https://router.vuejs.org/guide/advanced/scroll-behavior.html
export default router;
