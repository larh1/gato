import Vue from "vue";
import VueRouter from "vue-router";

import { routes } from "./router/routes.js";

// Dependencias
// App y rutas
require("./bootstrap");

window.Vue = Vue;

// Router
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "hash",
    routes: routes,
});

// App
const app = new Vue({
    el: "#app",
    router: router,
    data: {
   
    },
    mounted()
    {
    },
});
