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
                if (isset($_SESSION["idCliente"])) {
                    echo "<a href='login.php' id='login'>ID " . $_SESSION["idCliente"] . " - </a><form method='post' action='index.php'><button type='submit' name='btnCerrarSesion'>Cerrar sesión</button></form>";
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
            <a href="index.php"><li>INICIO</li></a>
            <a href="centro.php"><li>CENTRO</li></a>
            <a href="actividades.php"><li>ACTIVIDADES</li></a>
            <a href="contacto.php"><li>CONTACTO</li></a>
            <?php
                if (isset($_SESSION["idCliente"])) {
                    echo "<a href=''><li>ID " . $_SESSION["idCliente"] . " - <form method='post' action='index.php'><button type='submit' name='btnCerrarSesion' >Cerrar sesión</button></form></li></a>";
                } else {
                    echo "<a href='login.php'><li>LOG IN / REGISTRO</li></a>";
                }
                ?>
            <?php
                if(isset($_SESSION["tipo"]) && $_SESSION["tipo"]=="admin"){
                    echo "<a href='admin.php'><li>ADMINISTRAR</li></a>";
                }
            ?>
        </ul>
    </nav>
</header>