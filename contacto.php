<!DOCTYPE html>
<html>
    <head>
        <title>SPORT DESIGN - Contacto</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/css" href="css/contacto.css"/>
        <!-- Iconos diseñados por <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon"> www.flaticon.es</a> -->
        <script type='text/javascript' src='jq/jquery-3.1.1.min.js'></script>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <header class="sticky">
            <nav>
                <a href="index.php"><img src="Img/icono.svg" id="icono" alt="icono" title="icono"/></a>
                <div>
                    <h2>SPORT DESIGN</h2>
                </div>
                <label id="hamburguesa" class="container">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </label>
                <div id="myNav" class="overlay">
                    <div class="overlay-content">
                        <a href="index.php">Inicio</a>
                        <a href="centro.php">Centro</a>
                        <a href="actividades.php">Actividades</a>
                        <a href="contacto.php">Contacto📞</a>
                        <a href="login.php">Log In / Registro👤</a>
                    </div>
                </div>
                <ul id="menu">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="centro.php">Centro</a></li>
                    <li><a href="actividades.php">Actividades</a></li>
                    <li><a href="contacto.php">Contacto📞</a></li>
                    <li><a href="login.php">Log In / Registro👤</a></li>
                </ul>
            </nav>
        </header>

        <section>
            <div id="ubicacion">
                <h2>Contacto</h2>
                <p>Ponte en contacto con nosotros si tienes cualquier duda</p>
                <img src="Img/mapa.png" alt="mapa" title="mapa"/>
            </div>
            <div id="contenedor">
                <form method="post" action="">
                    <label for="nombre">Nombre</label><input type="text" id="nombre" name="nombre" value=""/>  
                    <label for="apellidos">Apellidos</label><input type="text" id="apellidos" name="apellidos" value=""/> 
                    <label for="telefono">Telefono</label><input type="text" id="telefono" name="telefono"/>
                    <label for="correo">Correo</label><input type="text" id="correo" name="correo"/>
                    <label for="asunto">Asunto</label><input type="text" id="asunto" name="asunto"/>
                    <label for="mensaje">Mensaje</label><textarea id="mensaje" name="mensaje" rows="10" cols="40"></textarea>
                    <button type="submit" name="">Enviar</button>
                </form>
            </div>
        </section>

        <footer>
            <img src="Img/icono.svg" id="iconoFooter" alt="icono" title="icono"/>
            <h3>SPORT DESIGN</h3>
            <a href="contacto.php" id="linkContacto">Contacto</a>
            <a href="#" id="avisoLegal">Aviso legal</a>
            <ul id="contacto">
                <li><p>WhatsApp: 654987654</p></li>
                <li><p>Correo: NaturAir@gmail.com</p></li>
            </ul>
            <ul id="redesSociales">
                <li><a href="#"><img src="Img/twitter.png" alt="twitter" title="twitter"/></a></li>
                <li><a href="#"><img src="Img/facebook.png" alt="facebook" title="facebook"/></a></li>
            </ul>
        </footer>
    </body>
</html>