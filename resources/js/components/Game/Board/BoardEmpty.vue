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

<script>
export default
{
    mounted()
    {},
};
</script>
