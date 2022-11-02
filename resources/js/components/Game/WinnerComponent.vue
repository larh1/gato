<template>
<!-- board -->
<div class="container animate__animated animate__zoomIn animate__faster">
    <div class="text-center" style="margin-top:-1rem">
        <img class="mx-auto" src="img/winner.png" alt="Winner.png" width="180">
    </div>
    <p class="h5 text-center fw-bold text-white mb-2">{{winner_name}}</p>
    <div class="board-container border mx-auto text-center">
        <table class="board" width="100%" height="100%">
            <tr v-for="(f,i) in winner_board" :key="i">
                <td :id="'cl_'+c.id" v-for="(c,j) in f" :key="j" class="cell" :class="c.class_cell">
                    <span :class="c.class_tiro">{{c.tiro}}</span>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <!-- Actions -->
    <div class="text-center ms-3">
        <span @click="CallAction(a.action)" v-for="(a,i) in list_actions" :key="i" :class="'game-actions '+a.class" data-bs-toggle="tooltip" data-bs-placement="top" :title="a.tooltip">
            <i :class="'game-action fa-solid '+a.icon"></i>
        </span>
    </div>
</div>
</template>

<style>
.board-container {
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
    background-color: white;
    border-radius: 30px;
    padding: 10px;
    width: 16rem;
    height: 16rem
}

.b1,
.b2 {
    border-right: 1px solid var(--gray);
}

.top,
.middle {
    border-bottom: 1px solid var(--gray);
}

.cell {
    height: 33.33%;
    width: 33.33%;
    cursor: pointer;
}

.cell span {
    font-size: 2.5rem;
}

.cell-o {
    color: var(--primary);
}

.cell-x {
    color: var(--secondary);
}
</style>

<script>
export default
{
    data()
    {
        return {
            list_actions: [],
            winner_board: [],
            printed: false,
            winner_name: "",
        }
    },
    methods:
    {
        Init()
        {
            this.list_actions = [
            {
                class: "game-actions_print",
                tooltip: "Imprimir",
                icon: "fa-print",
                action: "print",
            },
            {
                class: "game-actions_restart",
                tooltip: "Reiniciar",
                icon: "fa-rotate-right",
                action: "restart",
            },
            {
                class: "game-actions_exit",
                tooltip: "Salir",
                icon: "fa-right-from-bracket",
                action: "exit",
            }, ];
            this.winner_name = this.$root.GerWinner();
        },

        /**
         * Call the action
         */
        CallAction(a)
        {
            if (a == "restart") this.Restart();
            else if (a == "print") this.Print();
            else if (a == "exit") this.Exit();
        },

        /**
         * Iniciar una nueva partida
         */
        Restart()
        {
            this.$emit("restart");
        },

        /**
         * Regresar a la pantala inicial
         */
        async Exit()
        {
            let title = "¿Quieres salir del juego?",
                doc = "";
            if (!this.printed) doc = "<b>No has descargado tu comprobante!</b>"
            let res = await Swal.fire(
            {
                title: title,
                html: doc,
                showCancelButton: true,
                confirmButtonColor: '#ee6055',
                cancelButtonColor: '#68b63e',
                cancelButtonText: 'Aún no',
                confirmButtonText: 'Sí, salir',
            });
            if (res.isConfirmed) // Volver al inicio
            {
                this.$emit("exit");
            }
        },

        /**
         * Mostrar el documento de juego ganado
         */
        Print()
        {
            /**
             * Obtener solo los datos para imprimir en el doc
             */
            let new_board = [];
            for (let f = 0; f < this.winner_board.length; f++)
            {
                let row = [];
                for (let c = 0; c < this.winner_board[0].length; c++)
                {
                    // Extraer clase de celda, de tiro y el simbolo
                    const aux_cell = this.winner_board[f][c];
                    const cell = {
                        "cc": aux_cell.class_cell,
                        "ct": aux_cell.class_tiro,
                        "t": aux_cell.tiro,
                    };
                    row.push(cell);
                }
                new_board.push(row);
            }
            const json = JSON.stringify(
            {
                "player": this.winner_name,
                "board": new_board
            }) // Convertir a json

            // Char Random para no modificar data A-Z a-z
            let data = String.fromCharCode(Math.floor(Math.random() * (65 - 90) + 97));
            data += String.fromCharCode(Math.floor(Math.random() * (122 - 97) + 97));
            data += Buffer.from(json, 'utf8').toString('base64') // A b64 para enviar
            window.open("game/winner/" + data);
            this.printed = true;
        },
    },
    mounted()
    {
        // Obtener tablero ganador
        this.winner_board = this.$root.GetWinnerBoard();
        this.Init();
    },
};
</script>
