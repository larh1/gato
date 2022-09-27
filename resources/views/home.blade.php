<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Custom style -->
    <link rel="stylesheet" href="css/app.css">
    <title>Home1</title>
</head>
<style>
    main {
        min-height: 100vh;
        height: 100vh;
        font-family: "Nunito", sans-serif;
        background: url("/img/3.svg");
        background-repeat: no-repeat;
        background-size: 50%;
        background-position: center;
    }

    @media (max-width: 600px) {
        main {
            background: url("/img/3.svg");
            background-repeat: no-repeat;
            background-size: 120%;
            background-position: center;
        }
    }


    body {
        background: linear-gradient(90deg,
                rgba(18, 213, 255, 1) 0%,
                rgba(81, 142, 227, 1) 100%);
    }
</style>

<body>
    <main>
        <div class="header">
            header
        </div>
        <div id="app" class="card">
            <router-view></router-view>
        </div>
        <div class="footer">
            Tic Tac Toe - By: -LARH
        </div>
    </main>
    <!-- app -->
    <script src="js/app.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>