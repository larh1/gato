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
        current_progress: 1, // Inicio
        players:
        {
            player1:
            {
                name: "Jugador 1",
            },
            player2:
            {
                name: "Jugador 2",
            }
        },
    },
    methods:
    {
        /**
         * Cambiar el nombre del jugador
         * @param {int} player_no No de jugador
         * @param {string} new_name Nuevo nombre del jugador
         */
        RenamePlayer(player_no,new_name)
        {
            if (player_no == 1)
                this.players.player1.name = new_name;
            else
                this.players.player2.name = new_name;
        },

        /**
         * Cambiar el progreso del juego
         * @param {int} current_stage Progreso actual
         * @return Nuevo Progreso
         */
        ChangeStage(current_stage)
        {
            if (current_stage == 1)
                this.current_progress = 2; // Juego iniciado
            else if (current_stage == 2)
                this.current_progress = 3; // Victoria
            else
                this.current_progress = 1; // Ventana inicial
            return this.current_progress;
            // return {...this.current_progress};
        },

        /**
         * Obtener los nombres de los judagores
         * @returns array Nombres de los jugadores
         */
        GetPlayersNames()
        {
            return [
                this.players.player1.name,
                this.players.player2.name,
            ]
        }
    },
    mounted()
    {
    },
});
