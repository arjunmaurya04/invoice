import { createApp } from "vue";
import "./style.css";
import App from "./App.vue";
import router from "./router";

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem("token");

    if (to.path !== "/login" && !token) {
        // If trying to access a protected route without a token, redirect to login
        next("/login");
    } else {
        // Otherwise, allow the route
        next();
    }
});

createApp(App).use(router).mount("#app");
