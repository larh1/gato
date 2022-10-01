<template>
    <!-- board -->
    <div>
        <div
            class="board-container border mx-auto"
            style="width: 14rem; height: 14rem">
            <table class="board" width="100%" height="100%">
                <tr>
                    <td class="cell top b1"><span>X</span></td>
                    <td class="cell top b2"><span>X</span></td>
                    <td class="cell top b3"><span>X</span></td>
                </tr>
                <tr>
                    <td class="cell middle b1"><span>X</span></td>
                    <td class="cell middle b2"><span>X</span></td>
                    <td class="cell middle b3"><span>X</span></td>
                </tr>
                <tr>
                    <td class="cell bottom b1"><span>X</span></td>
                    <td class="cell bottom b2"><span>X</span></td>
                    <td class="cell bottom b3"><span>X</span></td>
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

.cell {
    height: 33.33%;
    width: 33.33%;
    cursor: pointer;
}
.cell:hover {
    background-color: rgba(0, 0, 0, 0.05);
}
</style>

<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>
