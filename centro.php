<?php
session_name("gimnasio");
session_start();

include("consumir_servicio.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>SPORT DESIGN - Actividades</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.min.css"/>
    <!-- Iconos diseñados por <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon"> www.flaticon.es</a> -->
    <script type='text/javascript' src='jq/jquery-3.1.1.min.js'></script>
    <script type='text/javascript' src='js/jquery.bxslider.js'></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/centro.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Rubik:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <section>
        <div id="info">
            <div id="infoGeneral">
                <h1>SPORT DESIGN</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque quos, temporibus vel velit dolore cupiditate incidunt voluptatibus ratione distinctio suscipit odio provident quia aspernatur. Magni nulla aliquid laboriosam ratione exercitationem?</p>
                <img src="Img/instalaciones.jpg" alt="imagen cabecera" title="imagen cabecera" />
            </div>
            <div id="mapa">
                <img src="Img/mapa.png" alt="mapa" title="mapa" />
            </div>
        </div>

        <hr />

        <div id="tarifas">
            <h2>Tarifas</h2>
            <?php
                $obj=consumir_servicio_REST($enlace."/obtenerTabla/jmra_planpago","GET");

                if(isset($obj->mensaje_error)){
                    die($obj->mensaje_error);
                }else{
                    foreach($obj->tabla as $fila){
                        echo "<div class='opcion'>";
                            echo "<img src='Img/".$fila->foto."' alt='instalaciones' title='instalaciones' />";
                            echo "<div class='textoOpcion'>";
                                echo "<h2>Plan de pago - ".$fila->nombre."</h2>";
                                echo "<br/>";
                                echo "<h2>".$fila->precio."€</h2>";
                            echo "</div>";
                        echo "</div>";
                    }
                }
            ?>

        <hr />

        <div id="instalaciones">
            <h2>Instalaciones</h2>
            <div class="slider">
                <div>
                    <img src="Img/instalaciones.jpg" alt="instalaciones" title="instalaciones" />
                </div>
                <div>
                    <img src="Img/actividades.jpg" alt="actividades" title="actividades" />
                </div>
                <div>
                    <img src="Img/registrate.jpeg" alt="actividades" title="actividades" />
                </div>
                <div>
                    <img src="Img/actividades2.jpg" alt="actividades" title="actividades" />
                </div>
            </div>
        </div>

    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>