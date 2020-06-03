<?php
session_name("gimnasio");
session_start();

include("consumir_servicio.php");
?>
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
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <section>
        <h2>Actividades</h2>

        <?php
        $obj = consumir_servicio_REST($enlace . "/obtenerTabla/actividades", "GET");

        if (isset($obj->mensaje_error)) {
            die($obj->mensaje_error);
        } else {
            $actividades=$obj;
        }
        ?>

        <div id="actividades">
            <?php
            $obj=consumir_servicio_REST($enlace."/obtenerTabla/clases","GET");

            if (isset($obj->mensaje_error)) {
                die($obj->mensaje_error);
            } else {
                $clases=$obj;
            }

            foreach($actividades->tabla as $fila){
                if($fila->formacion=="no"){
                    echo "<div class='opcion'>";
                        echo "<img src='Img/instalaciones.jpg' alt='instalaciones' title='instalaciones' />";
                        echo "<div class='textoOpcion'>";
                            echo "<h3>".$fila->nombre."</h3>";
                            echo "<p>";
                            $dias=array();
                            foreach($clases->tabla as $fila2){
                                if($fila->idActividad == $fila2->idActividad){
                                    $encontrado=false;
                                    if(!empty($dias)){
                                        foreach($dias as $dia){
                                            if($fila2->fecha == $dia){
                                                $encontrado=true;
                                            }
                                        }
                                    }
                                    if(!$encontrado){
                                        echo $fila2->fecha;
                                    }
                                }
                            }
                            echo "</p>";
                        echo "</div>";
                        echo "<p>".$fila->descripcion."</p>";
                    echo "</div>";
                }
            }
            ?>
            <!--<div class="opcion">
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
            </div>-->
        </div>

        <hr />

        <h2>Actividades de formación</h2>
        <div id="actividadesFormacion">
        <?php
            foreach($actividades->tabla as $fila){
                if($fila->formacion=="si"){
                    echo "<div class='opcion'>";
                        echo "<img src='Img/instalaciones.jpg' alt='instalaciones' title='instalaciones' />";
                        echo "<div class='textoOpcion'>";
                            echo "<h3>".$fila->nombre."</h3>";
                        echo "</div>";
                        echo "<p>".$fila->descripcion."</p>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>