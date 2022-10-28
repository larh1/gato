<template>
<div class="container animate__animated animate__fadeInDown animate__faster">
    <div class="row" style="align-items:center">
        <div class="col col-md-8 mb-5">
            <!-- Timer -->
            <div class="text-center mt-4">
                <span class="time_time">
                    {{cur_time}}
                </span>
                <br>
                <br>
                <template v-if="finished">
                    <span class="current_player">Ganador: {{player_winner}}</span>
                </template>
                <template v-else>
                    <span class="current_player">Turno de {{current_player_name}}</span>
                </template>
            </div>
            <br>
            <div class="board-container border mx-auto text-center">
                <table class="board" width="100%" height="100%">
                    <tr v-for="(f,i) in tablero" :key="i">
                        <td :id="'cl_'+c.id" v-for="(c,j) in f" :key="j" class="cell" :class="c.class_cell" @click="Tiro(i,j)">
                            <span :class="c.class_tiro">{{c.tiro}}</span>
                        </td>
                    </tr>
                </table>
            </div>
            <br>

            <!-- Actions -->
            <div class="text-center ms-3">
                <span @click="CallAction(a.action)" v-for="a in list_actions" :key="a.id" :class="'game-actions '+a.class" data-bs-toggle="tooltip" data-bs-placement="top" :title="a.tooltip">
                    <i :class="'game-action fa-solid '+a.icon"></i>
                </span>
            </div>
        </div>
        <div class="col">
            <score-game ref="score_game"></score-game>
        </div>
    </div>
</div>
</template>

<script>
const ScoreComponent = r => require.ensure([], () => r(require("./ScoreComponent.vue")), "game");
export default
{
    data()
    {
        return {
            msj: "",
            // Tablero
            tablero: [],
            list_actions: [],
            cur_time: "00:00",
            rules_winners: [],
            players_names: [],
            finished: false,
            player_winner: "",
            total_winners: 3, // Partidas Totales
            total_winners_j1: 0,
            total_winners_j2: 0,

            // Cronometro
            current_player_name: "Jugador 1",
            current_player: 1,

            printed: false,
        }
    },
    components:
    {
        "score-game": ScoreComponent,
    },
    methods:
    {
        /**
         * Inicializar tablero
         */
        Init()
        {
            // Crear tablero
            let tablero_aux = [
                [, , ],
                [, , ],
                [, , ]
            ];
            let n = 0;
            for (let i = 0; i < 3; i++) // Filas
            {
                for (let j = 0; j < 3; j++) // Cols
                {
                    let aux_class = " b" + (j + 1) + " ";
                    aux_class += (i == 0 ? "top" : i == 1 ? "middle" : "bottom");
                    tablero_aux[i][j] = {
                        id: n + 1, // Id
                        tiro: "", // Tirada X|O
                        class_cell: aux_class, // Borde de la celda
                        class_tiro: "", // Color del tiro
                        checked: false, // Tirado o libre
                    };
                    n++;
                }
            }
            this.tablero = tablero_aux;
            this.current_player = 1; // Jugador inicial

            this.InitialActions();

            // Crear reglas
            let rules_w_aux = [ // i sum
                [1, 2, 3], // 0 6
                [4, 5, 6], // 1 15
                [7, 8, 9], // 2 24
                [1, 4, 7], // 3 12
                [2, 5, 8], // 4 15
                [3, 6, 9], // 5 18
                [1, 5, 9], // 6 15
                [3, 5, 7], // 7 15
            ]

            this.rules_winners = [];
            rules_w_aux.forEach((r, i) =>
            {
                let aux = [];
                r.forEach(x =>
                {
                    aux.push(
                    {
                        "r": x, // n
                        player: 0, // Jugador que la selecciona
                        checked: false // Seleccionado
                    });
                });
                this.rules_winners.push(
                {
                    rules: aux,
                    checked: false,
                    no: i
                });
            });

            // Configuración inicial de los jugadores
            this.players_names = this.$root.GetPlayersNames();
            this.current_player_name = this.players_names[this.current_player - 1];
        },

        /**
         * Marcar un tiro del jugador actual
         * @param fila int Index de fila tirada
         * @param columna int Index de columna tirada
         */
        Tiro(fila, columna)
        {
            if (this.finished) return; // Partida terminada
            // No se puede tirar 2 veces la misma
            if (this.tablero[fila][columna].checked) return;

            let tiro = this.current_player == 1 ? "x" : "o";
            let cell = this.tablero[fila][columna];

            cell.tiro = tiro.toUpperCase();
            cell.class_tiro = "cell-" + tiro;
            cell.checked = true;
            cell.player = this.current_player;
            // Comprobar ganador
            this.CheckWinner(cell.id);
            // Cambiar de jugador
            this.current_player = this.current_player == 1 ? 2 : 1;
            this.current_player_name = this.players_names[this.current_player - 1];
        },

        /**
         * Comprobar el ganador del tiro actual
         * @param t int Id del tiro realizado
         */
        CheckWinner(t)
        {
            // De cada regla ganadora
            for (let i = 0; i < this.rules_winners.length; i++)
            {
                let rw = this.rules_winners[i];
                let n = 0;
                // Buscar en cada regla
                for (let j = 0; j < rw.rules.length; j++)
                {
                    let rs = rw.rules[j];
                    if (rs.r == t) // Si la celda seleccionada = celda de la regla
                    {
                        // Marcar celda como checada ocupada
                        this.rules_winners[i].rules[j].checked = true;
                        //  Por el jugador actual
                        this.rules_winners[i].rules[j].player = this.current_player;
                    }
                    // Contar las celdas del jugador actual, de la regla actual
                    if (rs.player == this.current_player) n += 1;
                    // Si son las 3 (toda la fila|columna|diagonal)
                    if (n == 3)
                    {
                        // Ganó
                        break; // TODO: Buscar mejor manera de salir de la partida
                    }
                }
                if (n == 3)
                {
                    // Marcar la regla ganadora
                    /**
                     * Coloca un borde a todas las celdas de la linea ganadora
                     */
                    rw.rules.forEach(r =>
                    {
                        // let cl = document.getElementById("cl_" + r.r);
                        // cl.style.outline = "1px solid red";
                        // cl.style.outlineOffset = "-1px";
                    })
                    this.finished = true;
                    this.player_winner = this.current_player_name;
                    // Jugador actual +1 punto
                    if (this.current_player == 1) this.total_winners_j1++;
                    else this.total_winners_j2++;
                    // Actualizar marcador
                    this.SetScore(this.current_player); // Actualizar marcador
                    if (this.total_winners_j1 >= this.total_winners ||
                        this.total_winners_j2 >= this.total_winners)
                    {
                        // Mostrar el ganador
                        setTimeout(() =>
                        {
                            this.ShowWinner(); // Juego finalizado
                        }, 1500);
                    }
                    else
                        this.RestartOptions(); // Mostrar opciones para reiniciar
                    break;
                }
            }
        },

        /**
         * Acciones iniciales
         */
        InitialActions()
        {
            // Acciones del juego
            this.list_actions = [
            {
                id: "act_hint",
                class: "game-actions_hint",
                tooltip: "Dame una pista",
                icon: "fa-lightbulb",
                action: "hint"
            },
            {
                id: "act_help",
                class: "game-actions_print",
                tooltip: "Ayuda",
                icon: "fa-question",
                action: "help"
            }, ];
        },

        /**
         * Acciones para reiniciar partida
         */
        RestartOptions()
        {
            this.list_actions = [
            {
                id: "act_help",
                class: "game-actions_print",
                tooltip: "Ayuda",
                icon: "fa-question",
                action: "help"
            },
            {
                id: "act_exit",
                class: "game-actions_restart",
                tooltip: "Reiniciar",
                icon: "fa-rotate-left",
                action: "restart"
            }, ]
        },

        /**
         * Acciones cuando la partida (No el juego) finalizó
         */
        ShowWinner()
        {
            // Guardar datos del ganador
            this.$root.SaveWinnerBoard(
            {
                ...this.tablero
            })
            this.$emit("showWinner");
        },

        /**
         * Call the action
         */
        CallAction(a)
        {
            if (a == "hint") this.Hint();
            else if (a == "help") this.Help();
            else if (a == "restart") this.Restart();
        },

        /**
         * Mostrar una ayuda libre para tirar
         */
        Hint()
        {
            console.error("hint");
        },

        /**
         * Mostrar las reglas del juego
         */
        Help()
        {
            Swal.fire(
            {
                title: '<strong>Tic Tac Toe</strong>',
                html: "<ol> <li> El jugador 1 selecciona una casilla dentro del tablero. Después, el movimiento pasa al jugador 2 </li>" +
                    "<li>El jugador 2 selecciona una celda libre y el movimiento vuelve al jugador 1</li>" +
                    "<li>El juego continúa hasta que se llenan todas las celdas o uno de los jugadores hace una cadena de tres símbolos idénticos </li>" +
                    "<br>La fila puede ser horizontal, vertical o diagonal. <br>" +
                    "<br>!Evita que el otro jugador logre tener los 3 en raya!" +
                    "</ol>",
                showCloseButton: true,
                confirmButtonColor: "#5bb85d",
                confirmButtonText: "<i class='fa-solid fa-thumbs-up'></i> Entendido!",
            })
        },

        /**
         * Iniciar una nueva partida
         */
        Restart()
        {
            this.Init();
            this.finished = false;
        },

        /**
         * Mostrar el documento de juego ganado
         */
        Print()
        {
            console.error("print");
            this.printed = true;
        },

        /**
         * Guarda el ganador de la partida
         */
        SetScore(player_no)
        {
            this.$refs.score_game.SetWinner(player_no);
        },
    },
    mounted()
    {
        this.Init();
    }
}
</script>
