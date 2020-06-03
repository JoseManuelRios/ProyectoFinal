<header class="sticky">
    <nav>
        <a href="index.php"><img src="Img/icono.svg" id="icono" alt="icono" title="icono" /></a>
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
            <?php
                if (isset($_SESSION["nombre"])) {
                    echo "<a href='login.php' id='login'>" . $_SESSION["nombre"] . " - </a><form method='post' action='index.php'><button type='submit' name='btnCerrarSesion'>Cerrar sesión</button></form>";
                } else {
                    echo "<a href='login.php' id='login'>Log In / Registro</a>";
                }

                if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]=="admin"){
                    echo "<a href='admin.php'>Administrar</a>";
                }
                ?>
                <a href="index.php">Inicio</a>
                <a href="centro.php">Centro</a>
                <a href="actividades.php">Actividades</a>
                <a href="contacto.php">Contacto</a>
            </div>
        </div>
        <ul id="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="centro.php">Centro</a></li>
            <li><a href="actividades.php">Actividades</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><?php
                if (isset($_SESSION["nombre"])) {
                    echo "<a href='login.php'>" . $_SESSION["nombre"] . " - </a><form method='post' action='index.php'><button type='submit' name='btnCerrarSesion' >Cerrar sesión</button></form>";
                } else {
                    echo "<a href='login.php'>Log In / Registro</a>";
                }
                ?></li>
            <?php
                if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]=="admin"){
                    echo "<li><a href='admin.php'>Administrar</a></li>";
                }
            ?>
        </ul>
    </nav>
</header>