<template>
<div class="container animate__animated animate__fadeInDown animate__faster">
    <div class="row" style="align-items:center">
        <div class="col col-md-8">
            <!-- Timer -->
            <div class="text-center mt-4">
                <span class="time_time">
                    {{cur_time}}
                </span>
                <br>
                <br>
                <span class="current_player">Turno de {{current_player_name}}</span>
            </div>
            <br>
            <div class="board-container border mx-auto text-center">
                <table class="board" width="100%" height="100%">
                    <tr v-for="(f,i) in tablero" :key="i">
                        <td v-for="(c,j) in f" :key="j" class="cell" :class="c.class_cell" @click="Tiro(i,j)">
                            <span :class="c.class_tiro">{{c.tiro}}</span>
                        </td>
                    </tr>
                </table>
            </div>
            <br>

            <!-- Actions -->
            <div class="text-center ms-3">
                <span v-for="(a,i) in list_actions" :key="i" :class="'game-actions '+a.class" data-bs-toggle="tooltip" data-bs-placement="top" :title="a.tooltip">
                    <i :class="'game-action fa-solid '+a.icon"></i>
                </span>
            </div>
        </div>
        <div class="col">
            <score-game></score-game>
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

            // Cronometro
            current_player_name: "Jugador 1",
            current_player: 1,
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

            // Acciones del juego
            this.list_actions = [
            {
                class: "game-actions_hint",
                tooltip: "Ayuda",
                icon: "fa-lightbulb",
            },
            {
                class: "game-actions_restart",
                tooltip: "Reiniciar",
                icon: "fa-rotate-right",
            }, ];

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
            this.current_player_name = this.players_names[this.current_player-1];
        },

        /**
         * Marcar un tiro del jugador actual
         * @param fila int Index de fila tirada
         * @param columna int Index de columna tirada
         */
        Tiro(fila, columna)
        {
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
                        console.error("Regla ganadora", rw);
                        alert("ganador", rw)
                    }
                }
            }
        },
    },
    mounted()
    {
        this.Init();
    }
}
</script>
