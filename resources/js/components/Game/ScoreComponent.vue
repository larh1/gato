<template>
<div>
    <p class="h3 text-center fw-bold text-white">Victorias</p>
    <div class="board-container_score border mx-auto">
        <table class="board" width="100%">
            <tr>
                <td width="20%" class="cell_number_indicator"><span class="">#</span></td>
                <td width="80%" class="cell_winner"><span class="">Ganador</span></td>
            </tr>
            <tr :key="i" v-for="(p,i) in winners">
                <td class="cell_number"><span class="">{{p.no}}</span></td>
                <td :class="p.class"><span class="">{{p.winner}}</span></td>
            </tr>
        </table>
    </div>
</div>
</template>

<style>
.board-container_score {
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
    background-color: white;
    border-radius: 25px;
    padding: 1rem;
    width: 12rem;
    text-align: center;
    font-weight: bold;
}

.cell_number_indicator {
    border-bottom: 2px solid var(--gray);
    border-right: 2px solid var(--gray);
}

.cell_winner {
    border-bottom: 2px solid var(--gray);
}

.cell_number {
    border-right: 2px solid var(--gray);
}
</style>

<script>
export default
{
    data()
    {
        return {
            current_game: 0,
            winners: [
            {
                no: "11",
                winner: "",
                class: ""
            }]
        }
    },
    methods:
    {
        Init()
        {
            this.winners=[];
            for (let i = 0; i < 5; i++)
            {
                let n = i < 3 ? i + 1 : "";
                this.winners.push(
                {
                    no: n,
                    winner: "",
                    class: ""
                });
            }
        },

        /**
         * Guarda el ganador de la partida
         * @param player No del jugador
         */
        SetWinner(player)
        {
            // Colocar la marca del ganador
            this.winners[this.current_game].winner = player == 1 ? "X" : "O";
            this.winners[this.current_game].class = player == 1 ? "cell-x" : "cell-o";
            this.winners[this.current_game].no = this.current_game+1;
            this.current_game++;
        },
    },
    mounted()
    {
        this.Init();
    },
};
</script>
