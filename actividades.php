<!DOCTYPE html>
<html>

<head>
    <title>SPORT DESIGN - Actividades</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/actividades.css" />
    <!-- Iconos diseñados por <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon"> www.flaticon.es</a> -->
    <script type='text/javascript' src='jq/jquery-3.1.1.min.js'></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <section>
        <h2>Actividades</h2>

        <div id="actividades">
            <div class="opcion">
                <img src="Img/instalaciones.jpg" alt="instalaciones" title="instalaciones" />
                <div id="textoOpcion">
                    <h3>Nombre de la actividad</h3>
                    <p>Dia: 00:00, 00:00<br />
                        Dia: 00:00, 00:00<br />
                        Dia: 00:00, 00:00</p>
                </div>
                <p>Descripcion de la actividad</p>
            </div>
            <div class="opcion">
                <img src="Img/actividades.jpg" alt="actividades" title="actividades" />
                <div id="textoOpcion">
                    <h3>Nombre de la actividad</h3>
                    <p>Dia: 00:00, 00:00<br />
                        Dia: 00:00, 00:00<br />
                        Dia: 00:00, 00:00</p>
                </div>
                <p>Descripcion de la actividad</p>
            </div>
        </div>

        <hr />

        <h2>Actividades de formación</h2>
        <div id="actividadesFormacion">
            <div class="opcion">
                <img src="Img/registrate.jpeg" alt="registrate" title="registrate" />
                <div id="textoOpcion">
                    <h3>Nombre de la actividad</h3>
                    <p>Dia: 00:00, 00:00<br />
                        Dia: 00:00, 00:00<br />
                        Dia: 00:00, 00:00</p>
                </div>
                <p>Descripcion de la actividad</p>
            </div>
        </div>
    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>