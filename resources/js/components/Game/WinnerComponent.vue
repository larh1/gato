<template>
<!-- board -->
<div class="container animate__animated animate__zoomIn animate__faster">
    <div class="text-center" style="margin-top:-1rem">
        <img class="mx-auto" src="img/winner.png" alt="Winner.png" width="180">
    </div>
    <p class="h5 text-center fw-bold text-white mb-2">JOSE PEREZ LEON</p>
    <div class="board-container border mx-auto text-center">
        <table class="board" width="100%" height="100%">
            <tr v-for="(f,i) in winner_board" :key="i">
                <td :id="'cl_'+c.id" v-for="(c,j) in f" :key="j" class="cell" :class="c.class_cell" @click="Tiro(i,j)">
                    <span :class="c.class_tiro">{{c.tiro}}</span>
                </td>
            </tr>
        </table>
    </div>
    <p class="h6 text-white text-center mt-3">Tiempo total: 00:30 seg</p>
    <!-- Actions -->
    <div class="text-center ms-3">
        <span v-for="(a,i) in list_actions" :key="i" :class="'game-actions '+a.class" data-bs-toggle="tooltip" data-bs-placement="top" :title="a.tooltip">
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
            },
            {
                class: "game-actions_restart",
                tooltip: "Reiniciar",
                icon: "fa-rotate-right",
            },
            {
                class: "game-actions_exit",
                tooltip: "Salir",
                icon: "fa-right-from-bracket",
            }, ];
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
