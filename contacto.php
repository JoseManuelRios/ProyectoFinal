<!DOCTYPE html>
<html>

<head>
    <title>SPORT DESIGN - Contacto</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/contacto.css" />
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
        <div id="ubicacion">
            <h2>Contacto</h2>
            <p>Ponte en contacto con nosotros si tienes cualquier duda</p>
            <img src="Img/mapa.png" alt="mapa" title="mapa" />
        </div>
        <div id="contenedor">
            <form method="post" action="">
                <label for="nombre">Nombre</label><input type="text" id="nombre" name="nombre" value="" />
                <label for="apellidos">Apellidos</label><input type="text" id="apellidos" name="apellidos" value="" />
                <label for="telefono">Telefono</label><input type="text" id="telefono" name="telefono" />
                <label for="correo">Correo</label><input type="text" id="correo" name="correo" />
                <label for="asunto">Asunto</label><input type="text" id="asunto" name="asunto" />
                <label for="mensaje">Mensaje</label><textarea id="mensaje" name="mensaje" rows="10" cols="40"></textarea>
                <button type="submit" name="">Enviar</button>
            </form>
        </div>
    </section>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>