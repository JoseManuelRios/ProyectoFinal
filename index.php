<!DOCTYPE html>
<html>

<head>
    <title>SPORT DESIGN</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
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
        <div id="cabecera">
            <img src="Img/fondo.jpg" alt="imagen cabecera" title="imagen cabecera" />
            <div id="textoCabecera">
                <p>SPORT DESIGN</p>
                <p>Aqui va el eslogan del centro Aqui va el eslogan del centro Aqui va el eslogan del centro</p>
            </div>
        </div>
        <hr />
        <h2>Ven a conocernos</h2>

        <div id="opciones">
            <div id="opcion">
                <img src="Img/instalaciones.jpg" alt="instalaciones" title="instalaciones" />
                <div id="textoOpcion">
                    <h2>INSTALACIONES</h2>
                </div>
            </div>
            <div id="opcion">
                <img src="Img/actividades.jpg" alt="actividades" title="actividades" />
                <div id="textoOpcion">
                    <h2>ACTIVIDADES</h2>
                </div>
            </div>
            <div id="opcion">
                <a href="login.php">
                    <img src="Img/registrate.jpeg" alt="registrate" title="registrate" />
                    <div id="textoOpcion">
                        <h2>REGISTRATE</h2>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>