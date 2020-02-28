import Vue from "vue";
import VueRouter from "vue-router";
import ServersIndex from "./views/ServersIndex";
import ServersEdit from "./views/ServersEdit";
import ServersCreate from "./views/ServersCreate";
import ServersShow from "./views/ServersShow";
import Welcome from "./views/Welcome";
import NotificationSettings from "./views/NotificationSettings";
import Logout from "./actions/Logout";


Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/' , component: ServersIndex,
        },
        {
            path: '/servers' , component: ServersIndex,
        },
        {
            path: '/home' , component: Welcome,
        },
        {
            path: '/servers/:id/edit' , component: ServersEdit,
        },
        {
            path: '/servers/create' , component: ServersCreate,
        },
        {
            path: '/servers/:id' , component: ServersShow,
        },
        {
            path: '/notification-settings' , component: NotificationSettings,
        },
        {
            path: '/logout' , component: Logout,
        }
    ]
});
