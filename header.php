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
                <a href="index.php">Inicio</a>
                <a href="centro.php">Centro</a>
                <a href="actividades.php">Actividades</a>
                <a href="contacto.php">Contacto</a>
                <?php
                    if(isset($_SESSION["nombre"])){
                        echo "<a href='login.php'>Bienvenido ".$_SESSION["nombre"]."</a>";
                    }else{
                        echo "<a href='login.php'>Log In / Registro</a>";
                    }
                ?>
            </div>
        </div>
        <ul id="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="centro.php">Centro</a></li>
            <li><a href="actividades.php">Actividades</a></li>
            <li><a href="contacto.php">Contacto</a></li>
            <li><?php
                    if(isset($_SESSION["nombre"])){
                        echo "<a href='login.php'>Bienvenido ".$_SESSION["nombre"]."</a>";
                    }else{
                        echo "<a href='login.php'>Log In / Registro</a>";
                    }
                ?></li>
        </ul>
    </nav>
</header>