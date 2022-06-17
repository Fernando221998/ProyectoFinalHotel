<!-- Cabecera y un nav con un menu desplegable dropdown-menu el nav al tener una resolución mas pequeña aparece un botón hamburguesa para desplegarlo -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light colorRojo lineaSepara">
        <div class="container">
            <a class="navbar-brand col-2" href="#"><img class="logo" src="../img/logo.JPG" alt="LogoHotel"></a> 
            <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0 col-12">
                    <li class="nav-item col-lg-2 col-12"><i class="bi bi-house-door-fill icono display1"></i>
                        <a class="nav-link active p-0 text-white bordehover" aria-current="page" href="../index.php"><i class="bi bi-house-door-fill icono display2 ms-0"></i> Inicio</a>
                    </li>
                    <li class="nav-item col-lg-2 col-12"><img class="icono display1" src="../img/cama.png">
                        <a class="nav-link d-flex d-inline align-items-center active p-0 text-white justify-content-center <?php if(isset($_SESSION["bordefijo"])){echo $_SESSION["bordefijo"];}else{echo "bordehover";}?>" href="mostrarHabitaciones.php"><img class="icono display2 me-1" src="../img/cama.png"> Habitaciones</a>
                    </li>
                    <li class="nav-item col-lg-2 col-12"><i class="bi bi-bell-fill icono display1"></i>
                        <a class="nav-link active p-0 text-white <?php if(isset($_SESSION["bordefijo3"])){echo $_SESSION["bordefijo3"];}else{echo "bordehover";}?>" href="mostrarServicio.php"><i class="bi bi-bell-fill icono display2"></i> Servicios</a>
                    </li>
                    <li class="nav-item col-lg-2 col-12"><img class="icono display1" src="../img/euro.png">
                        <a class="nav-link active p-0 d-flex d-inline align-items-center text-white <?php if(isset($_SESSION["bordefijo4"])){echo $_SESSION["bordefijo4"];}else{echo "bordehover";}?>" href="mostrarOfertas.php"><img class="icono display2 me-1" src="../img/euro.png">Ofertas</a>
                    </li>
                    <li class="nav-item col-lg-2 col-12"><i class="bi bi-telephone-fill icono display1"></i>
                        <a class="nav-link active p-0 text-white <?php if(isset($_SESSION["bordefijo2"])){echo $_SESSION["bordefijo2"];}else{echo "bordehover";}?>" href="mostrarContacto.php"><i class="bi bi-telephone-fill icono display2"></i> Contacto</a>
                    </li>
                    <?php                
                    if(isset($_SESSION["usuarioCliente"])){ 
                    ?>
                    <li class="nav-item dropdown col-lg-2 col-12"><i class="bi bi-people-fill icono display1"></i>
                        <a class="nav-link dropdown-toggle text-white p-0 <?php if(isset($_SESSION["usutra"])){echo $_SESSION["usutra"];}else{echo "bordehover";}?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-people-fill icono display2"></i> <?=$nombreCli?>
                        </a>
                        <ul class="dropdown-menu col-2" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="editarClienteDatos_Controlador.php">Editar Perfil</a></li>
                            <li><a class="dropdown-item" href="misReservas.php">Mis reservas</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="cerrarSesion.php">CerrarSesion</a></li>
                        </ul>
                    </li>
                    <?php
                    }else if(isset($_SESSION["usuarioEmpleado"])){
                        $nombreTra = $_SESSION["usuarioEmpleado"]->getNombre();
                    ?>
                    <li class="nav-item dropdown col-lg-2 col-12"><i class="bi bi-people-fill icono display1"></i>
                        <a class="nav-link dropdown-toggle text-white p-0 <?php if(isset($_SESSION["usutra"])){echo $_SESSION["usutra"];}else{echo "bordehover";}?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-people-fill icono display2"></i> <?=$nombreTra?>
                        </a>
                        <ul class="dropdown-menu col-2" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="administracion_controlador.php">Administración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="cerrarSesion.php">CerrarSesion</a></li>
                        </ul>
                    </li>
                    <?php
                    }
                    ?>   
                </ul>
            </div>
        </div>
    </nav>
</header>