// import { createRouter, createWebHistory } from "vue-router";
// import create_invoice from "../components/create_invoice.vue";
// import login from "../components/login.vue";
// import Dashboard from "../components/Dashboard.vue";
// import home from "../components/home.vue";
// const router = createRouter({
//     history: createWebHistory(),
//     routes: [
//         {
//             path: "/dashboard",
//             component: Dashboard,
//             beforeEnter: (to, from, next) => {
//                 const token = localStorage.getItem("token");
//                 if (!token) {
//                     next("/dashboard");
//                 } else {
//                     next();
//                 }
//             },

//             children: [
//                 {
//                     path: "",
//                     component: home,
//                 },
//                 {
//                     path: "invoice",
//                     component: create_invoice,
//                 },
//             ],
//         },
//         {
//             path: "/login",
//             component: login,
//         },
//     ],
// });

// export default router;

import { createRouter, createWebHistory } from "vue-router";
import create_invoice from "../components/create_invoice.vue";
import login from "../components/login.vue";
import Dashboard from "../components/Dashboard.vue";
import home from "../components/home.vue";
import showclient from "../components/Company.vue";
import AddClient from "../components/AddClient.vue";
import Addservice from "../components/Addservice.vue";
import Servicelist from "../components/Servicelist.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/dashboard",
            component: Dashboard,
            beforeEnter: (to, from, next) => {
                const token = localStorage.getItem("token");
                if (!token) {
                    next("/login");
                } else {
                    next();
                }
            },
            children: [
                {
                    path: "/dashboard",
                    component: home,
                },
                {
                    path: "/invoice",
                    component: create_invoice,
                },
                {
                    path: "/showclient",
                    component: showclient,
                },
                {
                    path: "/addclient",
                    component: AddClient,
                },
                {
                    path: "/addservice",
                    component: Addservice,
                },
                {
                    path: "/servicelist",
                    component: Servicelist,
                },
            ],
        },
        {
            path: "/login",
            component: login,
        },
    ],
});

export default router;
