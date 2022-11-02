<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganador - Tic Tac Toe</title>
</head>
<style>
    @font-face {
        font-family: 'nunito';
        src: url('fonts/Nunito-Bold.ttf') format('truetype');
        font-weight: 700;
    }

    @page {
        margin: 0;
    }

    body {
        font-family: 'Nunito', sans-serif;
    }

    /* Board */
    .board-container {
        background-color: white;
        box-shadow: 24px 24px 4px rgba(0, 0, 0, 0.25);
        border-radius: 30px;
        padding: 10px;
        width: 16rem;
        height: 16rem;
        z-index: 1;
    }

    .b1,
    .b2 {
        border-right: 1px solid #d1d1d1;
    }

    .top,
    .middle {
        border-bottom: 1px solid #d1d1d1;
    }

    .cell {
        height: 33.33%;
        width: 33.33%;
    }

    .cell span {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .cell-o {
        color: #1388f6;
    }

    .cell-x {
        color: #ffbc1f;
    }

    /* fondo */
    .background-icon {
        position: absolute;
        top: 20%;
        left: -40;
        z-index: -1;
    }

    .background {
        position: absolute;
        width: 100%;
        z-index: -2;
    }

    .text-center {
        text-align: center;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    /* Texto */
    .h5{
        font-size: 1.5rem;
        font-weight: bold;
    }
    .fw-bold {
        font-weight: bold;
    }

    .fw-light {
        font-weight: lighter;
    }

    .text-white {
        color: white;
    }

    .navbar-title {
        text-align: center;
        color: white;
        font-weight: bold;
        font-size: 2rem;
        text-shadow: 4px 0px 4px rgba(0, 0, 0, 0.25);
    }

    footer {
        position: fixed;
        bottom: 30px;
        left: 0px;
        right: 0px;
        height: 30px;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
    }

    /* footer */
    .footer {
        color: white;
        font-weight: bold;
        font-size: 1rem;
    }

    footer .footer p span {
        font-size: 0.8rem;
        font-weight: normal;
    }

    .footer-line {
        margin-left: 1rem;
        margin-right: 1rem;
        color: white;
        opacity: .75;
    }
</style>

<bod>
    <main>
        <img src="img/Fondo2.png" alt="asd" class="background">
        <img src="img/3.svg" alt="asd" class="background-icon">
        <p class="navbar-title">Tic Tac Toe</p>
        <div class="text-center" style="margin-top:-1rem">
            <img class="mx-auto" src="img/winner.png" alt="Winner.png" width="180">
        </div>
        <p class="h5 text-center text-white">
            {{$data->player}}
        </p>
        <div class="board-container border mx-auto text-center">
            <table class="board" width="100%" height="100%" style="margin-top: -5px">
                @foreach($data->board as $f)
                <tr>
                    @foreach($f as $c)
                    <td @class(["cell",$c->cc,"text-center"])>
                        <span @class([$c->ct])>{{$c->t}}</span>
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </table>
        </div>
        <br>
    </main>
    <footer>
        <hr class="footer-line">
        <div class="footer text-center">
            <p class="fw-bold">Tic Tac Toe - <span class="fw-light">By: -LARH</span></p>
        </div>
    </footer>
    </body>

</html>