<header class="sticky">
    <nav>
        <a href="index.php"><img src="Img/icono.svg" id="icono" alt="icono" title="icono" /></a>
        <div>
            <h2>SPORT DESIGN</h2>
        </div>
        <span id="hamburguesa" class="container">
            <span class="bar1"></span>
            <span class="bar2"></span>
            <span class="bar3"></span>
        </span>
        <div id="myNav" class="overlay">
            <div class="overlay-content">
            <?php
                if (isset($_SESSION["idCliente"])) {
                    echo "<a href='login.php' id='login'>ID " . $_SESSION["idCliente"] . " - <form method='post' action='index.php'><button type='submit' name='btnCerrarSesion'>Cerrar sesión</button></form></a>";
                } else {
                    echo "<a href='login.php' id='login'>LOG IN / REGISTRO</a>";
                }

                if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]=="admin"){
                    echo "<a href='admin.php'>ADMINISTRAR</a>";
                }
                ?>
                <a href="index.php">INICIO</a>
                <a href="centro.php">CENTRO</a>
                <a href="actividades.php">ACTIVIDADES</a>
                <a href="contacto.php">CONTACTO</a>
            </div>
        </div>
        <ul id="menu">
            <li><a href="index.php">INICIO</a></li>
            <li><a href="centro.php">CENTRO</a></li>
            <li><a href="actividades.php">ACTIVIDADES</a></li>
            <li><a href="contacto.php">CONTACTO</a></li>
            <?php
                if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]=="admin"){
                    echo "<li><a href='admin.php'>ADMINISTRAR</a></li>";
                }
            ?>
            <?php
                if (isset($_SESSION["idCliente"])) {
                    echo "<li><a href=''>ID " . $_SESSION["idCliente"] . " - <form method='post' action='index.php'><button type='submit' name='btnCerrarSesion' >Cerrar sesión</button></form></a></li>";
                } else {
                    echo "<li><a href='login.php'>LOG IN / REGISTRO</a></li>";
                }
            ?>
        </ul>
    </nav>
</header>