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
    <link rel="stylesheet" type="text/css" href="css/admin.css" />
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

        <?php
        if(isset($_POST["nombreTabla"])){
            $_SESSION["nombreTabla"]=$_POST["nombreTabla"];
        }else{
            $_SESSION["nombreTabla"]="jmra_actividades";
        }

        $obj=consumir_servicio_REST($enlace."/obtenerTabla/".$_SESSION["nombreTabla"],"GET");

        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        }else{
            echo "<div id='tabla'>";
                foreach($obj->tabla as $fila){
                    echo "<div id='id'>";
                        if($_SESSION["nombreTabla"]=="jmra_actividades"){
                            echo $fila->idActividad;
                        }
                    echo "</div>";

                    echo "<div id='nombre'>";
                        if($_SESSION["nombreTabla"]=="jmra_actividades"){
                            echo $fila->nombre;
                        }
                    echo "</div>";

                    echo "<div id='opciones'>";
                        if($_SESSION["nombreTabla"]=="jmra_actividades"){
                            echo "<form method='post' action='admin.php'><button type='submit' name='btnBorrarActividad' value='".$fila->idActividad."'>Borrar</button><button type='submit' name='btnEditarActividad' value='".$fila->idActividad."'>Editar</button></form>";
                        }
                    echo "</div>";
                }
            echo "</div>";
        }
        ?>

        <?php
            if($_SESSION["nombreTabla"]=="jmra_actividades"){
                if(isset($_POST["btnEditarActividad"])){
                    $obj2=consumir_servicio_REST($enlace."/obtenerActividad/".$_POST["btnEditarActividad"],"GET");
                    if(isset($obj->mensaje_error)){
                        die($obj->mensaje_error);
                    }else{
                        $actividad=$obj2->actividad;
                    }
        ?>
            <div class='formulario'>
                <form method='post' action='admin.php'>
                    <label for='nombre'>Nombre</label><input type='input' id='nombre' name='nombre' value='<?php echo $actividad->nombre;?>'/>
                    <label for='descripcion'>Descripción</label><textarea id="descripcion" name="descripcion" rows="7" cols="40"><?php echo $actividad->descripcion;?></textarea>
                    <div>
                        Aforo máximo: <label for="si">Sí</label><input type="radio" id="si" name="maximo" value="si" <?php if($actividad->maximo=="si"){echo "checked";}?>/> <label for="no">No</label><input type="radio" id="no" name="maximo" value="no" <?php if($actividad->maximo=="no"){echo "checked";}?>/>
                    </div>
                    <label for="aforo">Aforo máximo (en caso de tenerlo):</label><input type="number" id="aforo" name="aforo" value='<?php echo $actividad->aforo;?>'/>
                    <div>
                        Formación: <label for="si">Sí</label><input type="radio" id="si" name="formacion" value="si" <?php if($actividad->formacion=="si"){echo "checked";}?>/> <label for="no">No</label><input type="radio" id="no" name="formacion" value="no" <?php if($actividad->formacion=="no"){echo "checked";}?>/>
                    </div>
                </form>
            </div>
        <?php
                }else{
        ?>
            <div class='formulario'>
                <form method='post' action='admin.php'>
                    <label for='nombre'>Nombre</label><input type='input' id='nombre' name='nombre' value=''/>
                    <label for='descripcion'>Descripción</label><textarea id="descripcion" name="descripcion" rows="7" cols="40"></textarea>
                    <div>
                        Aforo máximo: <label for="si">Sí</label><input type="radio" id="si" name="maximo" value="si"/> <label for="no">No</label><input type="radio" id="no" name="maximo" value="no"/>
                    </div>
                    <label for="aforo">Aforo máximo (en caso de tenerlo):</label><input type="number" id="aforo" name="aforo" value=''/>
                    <div>
                        Formación: <label for="si">Sí</label><input type="radio" id="si" name="formacion" value="si"/> <label for="no">No</label><input type="radio" id="no" name="formacion" value="no"/>
                    </div>
                </form>
            </div>
        <?php
                }
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