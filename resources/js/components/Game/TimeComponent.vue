<template>
<div class="">
    <div class="text-center mt-4">
        <span class="time_time">
            {{cur_time}}
        </span>
        <br>
        <br>
        <span class="current_player">Turno de {{current_player}}</span>
    </div>
</div>
</template>

<style>
.time_time {
    background-color: white;
    box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.25);
    background-color: white;
    border-radius: 30px;
    padding: .4rem 1.2rem;
    font-size: 1.2rem;
}
.current_player
{
    font-size: 1.2rem;
    font-weight: bold;
    color: white;
}
</style>

<script>
export default
{
    data()
    {
        return {
            cur_time: "00:00",
            current_player:"Jugador 1"
        }
    },
    mounted()
    {}
}
</script>
