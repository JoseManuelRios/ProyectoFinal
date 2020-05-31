<?php
session_name("gimnasio");
session_start();

include("consumir_servicio.php");

$error_apellidos=true;
$error_clave=true;
$error_nombre=true;
$error_telefono=true;
$error_edad=true;
$error_correo=true;
$error_direccion=true;
$error_ciudad=true;
$error_tarjeta=true;

if(isset($_POST["btnRegistro"])){
    $error_nombre=$_POST["nombre"]=="";
    $error_apellidos=$_POST["apellidos"]=="";
    $error_clave=$_POST["clave"]=="";
    $error_telefono=$_POST["telefono"]=="" || !is_numeric($_POST["telefono"]);
    $error_edad=$_POST["edad"]=="" || !is_numeric($_POST["edad"]);
    $error_correo=$_POST["correo"]=="" || !filter_var($_POST["correo"],FILTER_VALIDATE_EMAIL);
    $error_direccion=$_POST["direccion"]=="";
    $error_ciudad=$_POST["ciudad"]=="";
    $error_tarjeta=$_POST["tarjeta"]==""  || !is_numeric($_POST["tarjeta"]);

    $correcto=!$error_nombre && !$error_apellidos && !$error_clave && !$error_telefono && !$error_edad && !$error_correo && !$error_direccion && !$error_ciudad && !$error_tarjeta;

    if($correcto){
        $planPago="";
        if($_POST["edad"]<18){
            $planPago=1;
        }elseif($_POST["edad"]>=18 && $_POST["edad"]>60){
            $planPago=2;
        }else{
            $planPago=3;
        }

        $datosInsertar=Array("planPago"=>$planPago,"nombre"=>$_POST["nombre"],"apellidos"=>$_POST["apellidos"],"clave"=>md5($_POST["clave"]),"telefono"=>$_POST["telefono"],"edad"=>$_POST["edad"],"correo"=>$_POST["correo"],"direccion"=>$_POST["direccion"],"ciudad"=>$_POST["ciudad"],"observaciones"=>$_POST["observaciones"],"tarjeta"=>md5($_POST["tarjeta"]));
        $obj=consumir_servicio_REST($enlace."/registroUsuario","POST",$datosInsertar);

        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        }else{
            $_SESSION["nombre"]=$_POST["nombre"];
            $_SESSION["tipo"]="normal";
        }
    }
}

if(isset($_POST["btnVolver"])){
    header("Location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SPORT DESIGN - Log In</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/registro.css" />
    <!-- Iconos diseñados por <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon"> www.flaticon.es</a> -->
    <script type='text/javascript' src='jq/jquery-3.1.1.min.js'></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include("header.php");
    ?>
    <section>
        <div class="contenedor">
            <div class="contenedor2">
                <h2>Registrarse</h2>
                <form method="post" action="registro.php">
                    <label for="nombre">Nombre</label><input type="text" id="nombre" name="nombre" value="" />
                    <label for="apellidos">Apellidos</label><input type="text" id="apellidos" name="apellidos" />
                    <label for="clave">Clave</label><input type="password" id="clave" name="clave" />
                    <label for="telefono">Telefono</label><input type="text" id="telefono" name="telefono" />
                    <label for="edad">Edad</label><input type="number" id="edad" name="edad" />
                    <label for="correo">Correo</label><input type="text" id="correo" name="correo" />
                    <label for="direccion">Direccion</label><input type="text" id="direccion" name="direccion" />
                    <label for="ciudad">Ciudad</label><input type="text" id="ciudad" name="ciudad" />
                    <label for="tarjeta">Nº Tarjeta: </label><input type="text" id="tarjeta" name="tarjeta" />
                    <label for="observaciones">Observaciones</label><textarea id="observaciones" name="observaciones" rows="7" cols="40"></textarea>
                    <button type="submit" name="btnRegistro">Registrarse</button>
                    <button type="submit" name="btnVolver">Volver</button>
                </form>
            </div>
        </div>
    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>