<template>
<div class="container text-center animate__animated animate__fadeInUp animate__faster">
    <!-- Players -->
    <div class="row players mt-4">
        <input :class="player1.renamed?'':'animated'" type="text" @click="ChangeName(player1)" readonly class="player player1 col-12 " v-model="player1.name" data-bs-toggle="tooltip" data-bs-placement="top" title="Jugador 1">
        <input :class="player2.renamed?'':'animated'" type="text" @click="ChangeName(player2)" readonly class="player player2 col-12 " v-model="player2.name" data-bs-toggle="tooltip" data-bs-placement="top" title="Jugador 2">
    </div>
    <!-- Board -->
    <div class="my-4">
        <board-empty></board-empty>
    </div>

    <!-- Action -->
    <div class="actions">
        <button @click="StartPlay" class="btn btn-secondary text-white btn-action" data-bs-toggle="tooltip" data-bs-placement="top" title="Comenzar Juego">
            <i class="btn-action_icon fa-solid fa-play"></i>
        </button>
        <button @click="ShowHelp" class="btn btn-primary1 text-white btn-action" data-bs-toggle="tooltip" data-bs-placement="top" title="Ayuda">
            <i class="btn-action_icon fa-solid fa-question"></i>
        </button>
    </div>
</div>
</template>

<script>
const BoardEmpty = r => require.ensure([], () => r(require("./Board/BoardEmpty.vue")), "game");
export default
{
    data()
    {
        return {
            //Player 2
            player1:
            {
                no: 1, //No.
                name: "Jugador 1", // Nombre
                renamed: false, // Si ha cambiado el nombre
            },
            //Player 2
            player2:
            {
                no: 2, //No.
                name: "Jugador 2", // Nombre
                renamed: false, // Si ha cambiado el nombre
            },
        }
    },
    components:
    {
        "board-empty": BoardEmpty
    },

    methods:
    {
        /**
         * Cambiar el nombre del usuario seleccionado
         */
        ChangeName(player)
        {
            Swal.fire(
            {
                title: "Ingresa el nombre del jugador " + player.no,
                input: "text",
                confirmButtonText: "Aceptar",
                confirmButtonColor: "#5bb85d",
                inputPlaceholder: player.name,
                confirmButtonText: "<i class='fa-solid fa-floppy-disk'></i> Guardar"
            }).then(result =>
            {
                // Validar vacio
                if (result == null) return;
                if (result.value == null) return;
                let new_name = result.value.trim().toUpperCase();

                if (new_name.length > 3 && new_name.length <= 30)
                {
                    // Cambiar Nombre
                    player.renamed = true;
                    player.name = new_name;
                    this.$root.RenamePlayer(player.no, new_name)
                }
            })
        },

        /**
         * Iniciar el juego
         */
        StartPlay()
        {
            this.$emit("ChangeStageParent", "asd");
        },

        /**
         * Mostrar ventana de ayuda
         */
        ShowHelp()
        {
            Swal.fire(
            {
                title: '<strong>Tic Tac Toe</strong>',
                html: "<ol> <li> El jugador 1 selecciona una casilla dentro del tablero. Después, el movimiento pasa al jugador 2 </li>" +
                    "<li>El jugador 2 selecciona una celda libre y el movimiento vuelve al jugador 1</li>" +
                    "<li>El juego continúa hasta que se llenan todas las celdas o uno de los jugadores hace una cadena de tres símbolos idénticos </li>" +
                    "<br>La fila puede ser horizontal, vertical o diagonal. <br>" +
                    "<br>!Evita que el otro jugador logre tener los 3 en raya!" +
                    "</ol>",
                showCloseButton: true,
                confirmButtonColor: "#5bb85d",
                confirmButtonText: "<i class='fa-solid fa-thumbs-up'></i> Entendido!",
            })
        },
    },

    mounted()
    {
        // Poner scroll al inicio
        document.documentElement.scrollTop = 0;
    }
}
</script>
