<template>
<div class="container">
    <!-- Ventana Inicial -->
    <template v-if="current_stage==1">
        <gato-start @ChangeStageParent="ChangeStage" />
    </template>
    <template v-if="current_stage==2">
        <gato-game />
    </template>
</div>
</template>

<script>
const Game = r => require.ensure([], () => r(require("./Game/GameComponent.vue")), "game");
const Start = r => require.ensure([], () => r(require("./Game/StartComponent.vue")), "game");
export default
{
    components:
    {
        "gato-game": Game,
        "gato-start": Start,
    },
    data()
    {
        return {
            current_stage: 0,
        }
    },
    methods:
    {

        /**
         * Cambiar el progreso actual del juego al siguiente
         */
        ChangeStage()
        {
            this.current_stage = this.$root.ChangeStage(this.current_stage);
        },

        /**
         * Obtener el progreso actual
         */
        GetCurrentStage()
        {
            this.current_stage = this.$root.current_progress;
        },
    },
    mounted()
    {
        this.GetCurrentStage();
    }
}
</script>
