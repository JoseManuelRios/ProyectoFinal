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

    if(!$error_correo){
        $obj=consumir_servicio_REST($enlace."/obtenerCorreo/".$_POST["correo"],"GET");
        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        }elseif(isset($obj->correo)){
            $error_correo=true;
        }
    }

    $correcto=!$error_nombre && !$error_apellidos && !$error_clave && !$error_telefono && !$error_edad && !$error_correo && !$error_direccion && !$error_ciudad && !$error_tarjeta;

    if($correcto){
        $planPago="";
        if($_POST["edad"]<18){
            $planPago=1;
        }elseif($_POST["edad"]>=18 && $_POST["edad"]<60){
            $planPago=2;
        }else{
            $planPago=3;
        }

        $datosInsertar=Array("planPago"=>$planPago,"nombre"=>$_POST["nombre"],"apellidos"=>$_POST["apellidos"],"clave"=>md5($_POST["clave"]),"telefono"=>$_POST["telefono"],"edad"=>$_POST["edad"],"correo"=>$_POST["correo"],"direccion"=>$_POST["direccion"],"ciudad"=>$_POST["ciudad"],"observaciones"=>$_POST["observaciones"],"tarjeta"=>md5($_POST["tarjeta"]));
        $obj=consumir_servicio_REST($enlace."/registroUsuario","POST",$datosInsertar);

        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        }else{
            $_SESSION["idCliente"]=$obj->mensaje;
            $_SESSION["tipo"]="normal";
            header("Location:index.php");
            exit;
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
            
                <h2>Registrarse</h2>
                <form method="post" action="registro.php">
                    <label for="nombre">Nombre</label><input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php if(isset($_POST["btnRegistro"]) && $error_correo){echo $_POST["nombre"];}?>" required/>
                    <label for="apellidos">Apellidos</label><input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php if(isset($_POST["btnRegistro"]) && $error_correo){echo $_POST["apellidos"];}?>" required/>
                    <label for="clave">Clave</label><input type="password" id="clave" name="clave" placeholder="Contraseña" required/>
                    <label for="telefono">Telefono</label><input type="text" id="telefono" name="telefono" placeholder="Teléfono" value="<?php if(isset($_POST["btnRegistro"]) && $error_correo){echo $_POST["telefono"];}?>" required/>
                    <label for="edad">Edad</label><input type="number" id="edad" name="edad" placeholder="Edad" value="<?php if(isset($_POST["btnRegistro"]) && $error_correo){echo $_POST["edad"];}?>" required/>
                    <label for="correo">Correo</label><input type="text" id="correo" name="correo" placeholder="Correo" value="<?php if(isset($_POST["btnRegistro"]) && $error_correo){echo $_POST["correo"];}?>" required/><?php
                        if(isset($_POST["btnRegistro"]) && $error_correo){echo "<label id='errorCorreo'>Correo en uso. Utilice otro correo</label>";}
                    ?>
                    <label for="direccion">Direccion</label><input type="text" id="direccion" name="direccion" placeholder="Dirección" value="<?php if(isset($_POST["btnRegistro"]) && $error_correo){echo $_POST["direccion"];}?>" required/>
                    <label for="ciudad">Ciudad</label><input type="text" id="ciudad" name="ciudad" placeholder="Ciudad" value="<?php if(isset($_POST["btnRegistro"]) && $error_correo){echo $_POST["ciudad"];}?>" required/>
                    <label for="tarjeta">Nº Tarjeta: </label><input type="text" id="tarjeta" name="tarjeta" placeholder="Tarjeta" value="<?php if(isset($_POST["btnRegistro"]) && $error_correo){echo $_POST["tarjeta"];}?>" />
                    <label for="observaciones">Observaciones</label><textarea id="observaciones" name="observaciones" placeholder="Escribe aqui tus observaciones" rows="7" cols="40"><?php if(isset($_POST["btnRegistro"]) && $error_correo){echo $_POST["observaciones"];}?></textarea>
                    <div><input type="checkbox" id="terminos" name="terminos" value="terminos" value="<?php if(isset($_POST["btnRegistro"]) && $error_correo){echo 'checked';}?>"required/><label for="terminos">Acepto los terminos y condiciones</label></div>
                    <button type="submit" name="btnRegistro">Registrarse</button>
                    <button type="submit" name="btnVolver">Volver</button>
                </form>
            
        </div>
    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>