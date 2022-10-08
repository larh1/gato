<template>
<!-- board -->
<div>
    <div class="board-container border mx-auto" style="width: 14rem; height: 14rem">
        <table class="board" width="100%" height="100%">
            <tr>
                <td class="cell-empty top b1"><span class="cell-o">O</span></td>
                <td class="cell-empty top b2"><span class="cell-x">X</span></td>
                <td class="cell-empty top b3"><span class="cell-x">X</span></td>
            </tr>
            <tr>
                <td class="cell-empty middle b1"><span class="cell-x">X</span></td>
                <td class="cell-empty middle b2"><span class="cell-o">O</span></td>
                <td class="cell-empty middle b3"><span class="cell-x">X</span></td>
            </tr>
            <tr>
                <td class="cell-empty bottom b1"><span class="cell-o">O</span></td>
                <td class="cell-empty bottom b2"><span class="cell-x">X</span></td>
                <td class="cell-empty bottom b3"><span class="cell-o">O</span></td>
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
}

.b1,
.b2 {
    border-right: 1px solid var(--gray);
}

.top,
.middle {
    border-bottom: 1px solid var(--gray);
}

.cell-empty {
    height: 33.33%;
    width: 33.33%;
    cursor: pointer;
}

.cell-empty:hover {
    background-color: rgba(0, 0, 0, 0.05);
}

.cell-empty span {
    font-size: 2rem;
    opacity: 0;
}

.cell-empty:hover span {
    opacity: .5;
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
