<?php
    session_name("gimnasio");
    session_start();

    include("consumir_servicio.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>SPORT DESIGN - Log In</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <!-- Iconos diseñados por <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon"> www.flaticon.es</a> -->
    <script type='text/javascript' src='jq/jquery-3.1.1.min.js'></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <section>
        <div class="contenedor">
            <div class="contenedor2">
                <h2>Log In</h2>
                <form method="post" action="login.php">
                    <label for="idUsuario">ID</label><input type="number" id="idUsuario" name="idUsuario" value="" />
                    <label for="clave">Clave</label><input type="password" id="clave" name="clave" />
                    <button type="submit" name="btnLogin">Entrar</button>
                </form>
            </div>
        </div>
    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>