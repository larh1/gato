<template>
<div class="container animate__animated animate__fadeInDown animate__faster">
    <div class="row" style="align-items:center">
        <div class="col col-md-8">
            <time-game />
            <br>
            <board-game />
            <br>
            <!-- Actions -->
            <div class="text-center ms-3">
                <span v-for="(a,i) in list_actions" :key="i" :class="'game-actions '+a.class" data-bs-toggle="tooltip" data-bs-placement="top" :title="a.tooltip">
                    <i :class="'game-action fa-solid '+a.icon"></i>
                </span>
            </div>
            <br>
            <br>
        </div>
        <div class="col">
            <score-game></score-game>
        </div>
    </div>
</div>
</template>

<style>
.game-actions {
    cursor: pointer;
    border: none;
    border-radius: 10px;
    padding: .5rem;
    font-size: 1.5rem;
    margin-right: 1rem;
    display: inline-flex;
}

.game-action {
    height: 1.5rem;
    width: 1.5rem;
    display: block;
    color: white;
}

.game-actions_print {
    background-color: var(--primary);
}

.game-actions_hint {
    background-color: var(--yellow);
}

.game-actions_exit {
    background-color: var(--red);
}

.game-actions_restart {
    background-color: var(--green);
}
</style>

<script>
const BoardGame = r => require.ensure([], () => r(require("./Board/BoardGame.vue")), "game");
const ScoreComponent = r => require.ensure([], () => r(require("./ScoreComponent.vue")), "game");
const TimeComponent = r => require.ensure([], () => r(require("./TimeComponent.vue")), "game");
export default
{
    data()
    {
        return {
            list_actions: [],
        }
    },
    components:
    {
        "board-game": BoardGame,
        "time-game": TimeComponent,
        "score-game": ScoreComponent,
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
                class: "game-actions_hint",
                tooltip: "Ayuda",
                icon: "fa-lightbulb",
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
        this.Init();
    }
}
</script>
