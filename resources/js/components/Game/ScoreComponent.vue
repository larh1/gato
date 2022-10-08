<template>
<div>
    <p class="h3 text-center fw-bold text-white">Victorias</p>
    <div class="board-container_score border mx-auto">
        <table class="board" width="100%">
            <tr>
                <td width="20%" class="cell_number_indicator"><span class="">#</span></td>
                <td width="80%" class="cell_winner"><span class="">Ganador</span></td>
            </tr>
            <tr>
                <td class="cell_number"><span class="">1</span></td>
                <td class="cell-x"><span class="">X</span></td>
            </tr>
            <tr>
                <td class="cell_number"><span class="">2</span></td>
                <td class="cell-o"><span class="">O</span></td>
            </tr>
            <tr>
                <td class="cell_number"><span class="">3</span></td>
                <td class="cell-o"><span class="">O</span></td>
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
    mounted()
    {},
};
</script>
