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
        $obj = consumir_servicio_REST($enlace . "/obtenerTabla/jmra_actividades", "GET");

        if (isset($obj->mensaje_error)) {
            die($obj->mensaje_error);
        } else {
            $actividades = $obj;
        }
        ?>

        <div id="actividades">
            <?php
            $obj = consumir_servicio_REST($enlace . "/obtenerTabla/jmra_clases", "GET");

            if (isset($obj->mensaje_error)) {
                die($obj->mensaje_error);
            } else {
                $clases = $obj;
            }

            foreach ($actividades->tabla as $fila) {
                if ($fila->formacion == "no") {
                    echo "<div class='opcion'>";
                    echo "<img src='Img/instalaciones.jpg' alt='instalaciones' title='instalaciones' />";
                    echo "<div class='textoOpcion'>";
                    echo "<h3>" . $fila->nombre . "</h3>";
                    echo "<form method='post' action='actividades.php'>";
                    echo "<p>";
                    $dias = array();
                    foreach ($clases->tabla as $fila2) {
                        if ($fila->idActividad == $fila2->idActividad && $fila2->info == "si") {
                            $encontrado = false;
                            if (!empty($dias)) {
                                foreach ($dias as $dia) {
                                    if (array_key_exists($fila2->fecha, $dias)) {
                                        $encontrado = true;
                                        array_push($dias[$fila2->fecha], $fila2->hora);
                                        break;
                                    }
                                }
                            }
                            if (!$encontrado) {
                                $horas = array($fila2->hora);
                                $dias2 = array($fila2->fecha => $horas);
                                $dias = array_merge($dias, $dias2);
                            }
                        }
                    }
                    
                    $dias2 = array_keys($dias);
                    foreach ($dias2 as $dia) {
                        $fecha = explode("-", $dia);
                        echo $fecha[2] . "-" . $fecha[1] . ": ";
                        foreach ($dias[$dia] as $hora) {
                            $tiempo = explode(":", $hora);
                            echo $tiempo[0] . ":" . $tiempo[1] . " - ";
                        }
                        echo "<br/>";
                    }
                    
                    echo "</p>";
                    echo "</form>";
                    echo "</div>";
                    echo "<p>" . $fila->descripcion . "</p>";
                    echo "</div>";
                }
            }
            ?>
        </div>

        <hr />

        <h2>Actividades de formación</h2>
        <div id="actividadesFormacion">
            <?php
            foreach ($actividades->tabla as $fila) {
                if ($fila->formacion == "si") {
                    echo "<div class='opcion'>";
                    echo "<img src='Img/instalaciones.jpg' alt='instalaciones' title='instalaciones' />";
                    echo "<div class='textoOpcion'>";
                    echo "<h3>" . $fila->nombre . "</h3>";
                    echo "<p>";
                    $dias = array();
                    foreach ($clases->tabla as $fila2) {
                        if ($fila->idActividad == $fila2->idActividad && $fila2->info == "si") {
                            $encontrado = false;
                            if (!empty($dias)) {
                                foreach ($dias as $dia) {
                                    if (array_key_exists($fila2->fecha, $dias)) {
                                        $encontrado = true;
                                        array_push($dias[$fila2->fecha], $fila2->hora);
                                        break;
                                    }
                                }
                            }
                            if (!$encontrado) {
                                $horas = array($fila2->hora);
                                $dias2 = array($fila2->fecha => $horas);
                                $dias = array_merge($dias, $dias2);
                            }
                        }
                    }
                    //var_dump($dias);
                    $dias2 = array_keys($dias);
                    foreach ($dias2 as $dia) {
                        $fecha = explode("-", $dia);
                        echo $fecha[2] . "-" . $fecha[1] . ": ";
                        foreach ($dias[$dia] as $hora) {
                            $tiempo = explode(":", $hora);
                            echo $tiempo[0] . ":" . $tiempo[1] . " - ";
                        }
                        echo "<br/>";
                    }
                    echo "</p>";
                    echo "</div>";
                    echo "<p>" . $fila->descripcion . "</p>";
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