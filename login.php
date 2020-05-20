<!DOCTYPE html>
<html>
    <head>
        <title>SPORT DESIGN</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/css" href="css/index.css"/>
        <!-- Iconos diseñados por <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.es/" title="Flaticon"> www.flaticon.es</a> -->
        <script type='text/javascript' src='jq/jquery-3.1.1.min.js'></script>
        <script type="text/javascript" src="js/script.js"></script>
    </head>
    <body>
        <header class="sticky">
            <nav>
                <a href="index.html"><img src="Img/icono.svg" id="icono" alt="icono" title="icono"/></a>
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
                        <a href="#">Inicio</a>
                        <a href="#">Centro</a>
                        <a href="#">Actividades</a>
                        <a href="#">Contacto📞</a>
                        <a href="#">Log In / Registro👤</a>
                    </div>
                </div>
                <ul id="menu">
                    <li><a href="aires_acondicionados.html">Inicio</a></li>
                    <li><a href="calefaccion.html">Centro</a></li>
                    <li><a href="#">Actividades</a></li>
                    <li><a href="#">Contacto📞</a></li>
                    <li><a href="formulario.html">Log In / Registro👤</a></li>
                </ul>
            </nav>
        </header>

        <section>
            <div class="contenedor">
                <h2>Log In</h2>
                <form method="post" action="">
                    <label for="idUsuario">ID</label><input type="number" id="idUsuario" name="idUsuario" value=""/>
                    <label for="clave">Clave</label><input type="password" id="clave" name="clave"/>
                </form>
            </div>

            <div class="registro">
                <h2>Registrarse</h2>
                <form method="post" action="">
                    <label for="nombre">Nombre</label><input type="text" id="nombre" name="nombre" value=""/>
                    <label for="apellidos">Apellidos</label><input type="text" id="apellidos" name="apellidos"/>
                    <label for="clave">Clave</label><input type="password" id="clave" name="clave"/>
                    <label for="telefono">Telefono</label><input type="text" id="telefono" name="telefono"/>
                    <label for="edad">Edad</label><input type="number" id="edad" name="edad"/>
                    <label for="correo">Correo</label><input type="text" id="correo" name="correo"/>
                    <label for="direccion">Direccion</label><input type="text" id="direccion" name="direccion"/>
                    <label for="ciudad">Ciudad</label><input type="text" id="ciudad" name="ciudad"/>
                    <label for="observaciones">Observaciones</label><textarea id="observaciones" name="observaciones" rows="7" cols="40"></textarea>
                </form>
            </div>
        </section>

        <footer>
            <img src="Img/icono.svg" id="iconoFooter" alt="icono" title="icono"/>
            <a href="#" id="linkContacto">Contacto</a>
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