<?php
    session_name("gimnasio");
    session_start();

    include("consumir_servicio.php");

    if(isset($_POST["btnIrRegistro"])){
        header("Location:registro.php");
        exit;
    }

    $errorLogin=false;
    if(isset($_POST["btnLogin"])){

        $datosLogin=Array("correo"=>$_POST["correo"],"clave"=>md5($_POST["clave"]));
        $obj=consumir_servicio_REST($enlace."/login","POST",$datosLogin);

        if(isset($obj->mensaje_error)){
            die($obj->mensaje_error);
        }elseif(isset($obj->mensaje)){
            $errorLogin=true;
        }else{
            $_SESSION["idCliente"]=$obj->cliente->idCliente;
            $_SESSION["tipo"]=$obj->cliente->tipoUsuario;
            $errorLogin=false;
            header("Location:index.php");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>SPORT DESIGN - Log In</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Iconos diseñados por <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon"> www.flaticon.es</a> -->
    <script type='text/javascript' src='jq/jquery-3.1.1.min.js'></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css" />
    <link rel="stylesheet" type="text/css" href="css/footer.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&family=Rubik:wght@500&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    include_once("header.php");
    ?>
    <section>
        <div class="contenedor">
            <div class="contenedor2">
                <h2>Log In</h2>
                <form method="post" action="login.php">
                    <label for="idUsuario">Correo</label><input type="text" id="correo" name="correo" value="<?php if($errorLogin){echo $_POST["correo"];}?>"required/>
                    <label for="clave">Clave</label><input type="password" id="clave" name="clave" required/>
                    <button type="submit" name="btnLogin">Entrar</button>
                </form>
                <form method="post" action="login.php">
                    <button type="submit" name="btnIrRegistro">Registrarse</button>
                </form>
            </div>
        </div>
    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>