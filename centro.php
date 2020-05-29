<!DOCTYPE html>
<html>

<head>
    <title>SPORT DESIGN - Actividades</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/centro.css" />
    <link rel="stylesheet" type="text/css" href="bxslider-4-4.2.12/dist/jquery.bxslider.min.css" />
    <!-- Iconos diseñados por <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon"> www.flaticon.es</a> -->
    <script type='text/javascript' src='jq/jquery-3.1.1.min.js'></script>
    <script type="text/javascript" src="bxslider-4-4.2.12/src/js/jquery.bxslider.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <section>
        <div id="info">
            <h2>SPORT DESIGN</h2>
            <div id="infoGeneral">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque quos, temporibus vel velit dolore cupiditate incidunt voluptatibus ratione distinctio suscipit odio provident quia aspernatur. Magni nulla aliquid laboriosam ratione exercitationem?</p>
                <img src="Img/instalaciones.jpg" alt="imagen cabecera" title="imagen cabecera" />
            </div>
            <img src="Img/mapa.png" alt="mapa" title="mapa" />
        </div>

        <hr />

        <div id="tarifas">
            <h2>Tarifas</h2>
            <div class="opcion">
                <img src="Img/instalaciones.jpg" alt="instalaciones" title="instalaciones" />
                <div class="textoOpcion">
                    <h2>Plan de pago *</h2>
                    <br />
                    <h2>* €</h2>
                </div>
            </div>
            <div class="opcion">
                <img src="Img/actividades.jpg" alt="actividades" title="actividades" />
                <div class="textoOpcion">
                    <h2>Plan de pago *</h2>
                    <br />
                    <h2>* €</h2>
                </div>
            </div>
        </div>

        <hr />

        <div id="instalaciones">
            <h2>Instalaciones</h2>
            <div class="fotoInstalaciones">
                <img src="Img/instalaciones.jpg" alt="instalaciones" title="instalaciones" />
            </div>
            <div class="fotoInstalaciones">
                <img src="Img/actividades.jpg" alt="actividades" title="actividades" />
            </div>
            <div class="fotoInstalaciones">
                <img src="Img/registrate.jpeg" alt="actividades" title="actividades" />
            </div>
            <div class="fotoInstalaciones">
                <img src="Img/fondo.jpg" alt="actividades" title="actividades" />
            </div>
        </div>

    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>