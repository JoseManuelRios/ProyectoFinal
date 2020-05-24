<!DOCTYPE html>
<html>
    <head>
        <title>SPORT DESIGN - Actividades</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" type="text/css" href="css/actividades.css"/>
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
            <h2>Actividades</h2>

            <div id="actividades">
                <div class="opcion">
                    <img src="Img/instalaciones.jpg" alt="instalaciones" title="instalaciones"/>
                    <div id="textoOpcion">
                        <h3>Nombre de la actividad</h3>
                        <p>Dia: 00:00, 00:00<br/>
                        Dia: 00:00, 00:00<br/>
                        Dia: 00:00, 00:00</p>
                    </div>
                    <p>Descripcion de la actividad</p>
                </div>
                <div class="opcion">
                    <img src="Img/actividades.jpg" alt="actividades" title="actividades"/>
                    <div id="textoOpcion">
                        <h3>Nombre de la actividad</h3>
                        <p>Dia: 00:00, 00:00<br/>
                        Dia: 00:00, 00:00<br/>
                        Dia: 00:00, 00:00</p>
                    </div>
                    <p>Descripcion de la actividad</p>
                </div>
            </div>

            <hr/>

            <h2>Actividades de formación</h2>
            <div id="actividadesFormacion">
                <div class="opcion">
                    <img src="Img/registrate.jpeg" alt="registrate" title="registrate"/>
                    <div id="textoOpcion">
                        <h3>Nombre de la actividad</h3>
                        <p>Dia: 00:00, 00:00<br/>
                        Dia: 00:00, 00:00<br/>
                        Dia: 00:00, 00:00</p>
                    </div>
                    <p>Descripcion de la actividad</p>
                </div>
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