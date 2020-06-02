<?php
session_name("gimnasio");
session_start();

include("consumir_servicio.php");

if(!isset($_SESSION["tipo"]) || $_SESSION["tipo"]!="admin"){
    session_destroy();
    header("Location:index.php");
    exit;
}else{
?>

<!DOCTYPE html>
<html>

<head>
    <title>SPORT DESIGN</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/" />
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
        <h1>Admin</h1>
    
        <?php
        $obj=consumir_servicio_REST($enlace."/obtenerTablas","GET");

        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        }else{
            echo "<form method='post' action='admin.php' name='formulario'>";
                echo "<select name='nombreTabla' onchange='document.formulario.submit()'>";
                foreach($obj->tablas as $fila){
                    if(isset($_POST["nombreTabla"]) && $_POST["nombreTabla"]==$fila->Tables_in_bd_gimnasio){
                        echo "<option value='".$fila->Tables_in_bd_gimnasio."' selected>".$fila->Tables_in_bd_gimnasio."</option>";
                    }else{
                        echo "<option value='".$fila->Tables_in_bd_gimnasio."'>".$fila->Tables_in_bd_gimnasio."</option>";
                    }
                }
                echo "</select>";
            echo "</form>";
        }
        ?>


    </section>

    <?php
    include_once("footer.php");
    ?>
</body>
</html>
<?php
}
?>