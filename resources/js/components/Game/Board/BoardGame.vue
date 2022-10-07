<template>
<!-- board -->
<div>
    <div class="board-container border mx-auto text-center">
        <table class="board" width="100%" height="100%">
            <tr>
                <td class="cell top b1"><span class="cell-o">O</span></td>
                <td class="cell top b2"><span class="cell-x">X</span></td>
                <td class="cell top b3"><span class="cell-x">X</span></td>
            </tr>
            <tr>
                <td class="cell middle b1"><span class="cell-x">X</span></td>
                <td class="cell middle b2"><span class="cell-o">O</span></td>
                <td class="cell middle b3"><span class="cell-x">X</span></td>
            </tr>
            <tr>
                <td class="cell bottom b1"><span class="cell-o">O</span></td>
                <td class="cell bottom b2"><span class="cell-x">X</span></td>
                <td class="cell bottom b3"><span class="cell-o">O</span></td>
            </tr>
        </table>
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

.cell:hover {
    background-color: rgba(0, 0, 0, 0.05);
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
    mounted()
    {},
};
</script>
