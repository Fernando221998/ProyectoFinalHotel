<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&family=Roboto+Mono&family=Rubik:wght@300&family=The+Nautigal:wght@700&display=swap" rel="stylesheet"> 
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Hotel</title>
</head>
<body>
    <?php
    require_once("swal/swal.php");
    ?>
    <!-- Cabecera con iniciar sesion y registro y cambio de idioma en las imagenes y nav para resolución mas pequeña con boton hamburguesa-->
    <header>
        <div class="colorRojo lineaSepara">
            <div class="container p-1 d-md-flex justify-content-md-between">
                <div class="d-flex align-items-center justify-content-center ps-md-5">
                    <?php                                
                        if(isset($_SESSION["usuarioCliente"])){  
                            $nombreCli = $_SESSION["usuarioCliente"]->getNombre();
                    ?>
                            <p class="m-0 cabeceraLetra">Bienvenido <?=$nombreCli?> a la web del Hotel Viriato</p>
                    <?php
                        }else if(isset($_SESSION["usuarioEmpleado"])){
                            $nombreTra = $_SESSION["usuarioEmpleado"]->getNombre();
                    ?>
                            <p class="m-0 cabeceraLetra">Bienvenido administrador <?=$nombreTra?></p>
                    <?php
                        }else{
                    ?>
                            <p class="m-0 cabeceraLetra">Hotel Viriato web oficial</p>
                    <?php
                        }
                    ?>
                </div>
                <?php                    
                    if(!isset($_SESSION["usuarioCliente"]) && !isset($_SESSION["usuarioEmpleado"])){
                ?>
                        <div class="d-flex align-items-center justify-content-center pe-md-5">
                            <select id="Contenido" class="form-select colorRojo text-white cabeceraLetra" onchange="changeFunc(this.value);">
                                <option value="volverSesion" disabled selected class="text-white cabeceraLetra m-0 p-0 pe-2 colorRojo">Iniciar sesión</option>
                                <option value="sesionCliente" class="text-white m-0 p-0 pe-2 cabeceraLetra colorRojo">Particular</option>
                                <option value="sesionEmpleado" class="text-white m-0 p-0 pe-2 cabeceraLetra colorRojo">Empleado</option>
                            </select>
                            <a class="btn text-white m-0 p-0 px-2 cabeceraLetra" data-bs-toggle="modal" data-bs-target="#registrarModal"> Registrarse</a>        
                        </div>
                <?php
                    }
                ?>             
            </div>
        </div>
        <div class="display2">
            <nav class="navbar navbar-expand-lg navbar-light colorRojo lineaSepara">
                <div class="container">
                    <a class="navbar-brand col-2" href="Home.html"><img class="logo" src="img/logo.JPG" alt="LogoHotel"></a> 
                    <button class="navbar-toggler bg-success" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0 col-12">
                            <li class="nav-item col-lg-2 col-12"><i class="bi bi-house-door-fill icono display1"></i>
                                <a class="nav-link active p-0 text-white bordefijo" aria-current="page" href="index.php"><i class="bi bi-house-door-fill icono display2 ms-0"></i> Inicio</a>
                            </li>
                            <li class="nav-item col-lg-2 col-12"><img class="icono display1" src="img/cama.png">
                                <a class="nav-link d-flex d-inline align-items-center active p-0 text-white bordehover" href="controlador/mostrarHabitaciones.php"><img class="icono display2 me-1" src="img/cama.png"> Habitaciones</a>
                            </li>
                            <li class="nav-item col-lg-2 col-12"><i class="bi bi-bell-fill icono display1"></i>
                                <a class="nav-link active p-0 text-white bordehover" href="controlador/mostrarServicio.php"><i class="bi bi-bell-fill icono display2"></i> Servicios</a>
                            </li>
                            <li class="nav-item col-lg-2 col-12"><img class="icono display1" src="img/euro.png">
                                <a class="nav-link active p-0 d-flex d-inline align-items-center text-white bordehover" href="controlador/mostrarOfertas.php"><img class="icono display2 me-1" src="img/euro.png">Ofertas</a>
                            </li>
                            <li class="nav-item col-lg-2 col-12"><i class="bi bi-telephone-fill icono display1"></i>
                                <a class="nav-link active p-0 text-white bordehover" href="controlador/mostrarContacto.php"><i class="bi bi-telephone-fill icono display2"></i> Contacto</a>
                            </li>                  
                            <?php        
                                if(isset($_SESSION["usuarioCliente"])){
                            ?>
                                <li class="nav-item dropdown col-lg-2 col-12"><i class="bi bi-people-fill icono display1"></i>
                                    <a class="nav-link dropdown-toggle text-white p-0 bordehover" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-people-fill icono display2"></i> <?=$nombreCli?>
                                    </a>
                                    <ul class="dropdown-menu col-2" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="controlador/editarClienteDatos_Controlador.php">Editar Perfil</a></li>
                                        <li><a class="dropdown-item" href="controlador/misReservas.php">Mis reservas</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="controlador/cerrarSesion.php">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            <?php
                                }else if(isset($_SESSION["usuarioEmpleado"])){ 
                            ?>
                                <li class="nav-item dropdown col-lg-2 col-12"><i class="bi bi-people-fill icono display1"></i>
                                    <a class="nav-link dropdown-toggle text-white p-0 bordehover" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-people-fill icono display2"></i> <?=$nombreTra?>
                                    </a>
                                    <ul class="dropdown-menu col-2" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="controlador/administracion_controlador.php">Administración</a></li>                                     
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="controlador/cerrarSesion.php">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    
    <!-- Section que contiene nav, un carousel con imagenes y un div para buscar habitaciones incluyendo la fecha de entrada y salida -->
    <section class="sectionImagen">
        <!--NAV-->
        <div class="display1">
            <nav class="navbar navbar-expand-lg navbar-light nav1">
                <div class="container">
                    <a class="navbar-brand col-2" href="Home.html"><img class="logo" src="img/logo.JPG" alt="LogoHotel"></a> 
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto mb-2 mb-lg-0 col-12 d-flex justify-content-around">
                            <li class="nav-item col-2"><i class="bi bi-house-door-fill icono"></i>
                                <a class="nav-link active p-0 text-white mx-auto bordefijo" aria-current="page" href="index.php">Inicio</a>
                            </li>
                            <li class="nav-item col-2"><img class="icono" src="img/cama.png">
                                <a class="nav-link active p-0 text-white mx-auto bordehover" href="controlador/mostrarHabitaciones.php">Habitaciones</a>
                            </li>
                            <li class="nav-item col-2"><i class="bi bi-bell-fill icono"></i>
                                <a class="nav-link active p-0 text-white mx-auto bordehover" href="controlador/mostrarServicio.php">Servicios</a>
                            </li>
                            <li class="nav-item col-2"><img class="icono" src="img/euro.png">
                                <a class="nav-link active p-0 text-white mx-auto bordehover" href="controlador/mostrarOfertas.php">Ofertas</a>
                            </li>
                            <li class="nav-item col-2"><i class="bi bi-telephone-fill icono"></i>
                                <a class="nav-link active p-0 text-white mx-auto bordehover" href="controlador/mostrarContacto.php">Contacto</a>
                            </li>
                            <?php        
                                if(isset($_SESSION["usuarioCliente"])){
                            ?>
                                <li class="nav-item dropdown col-lg-2 col-12"><i class="bi bi-people-fill icono display1"></i>
                                    <a class="nav-link dropdown-toggle text-white p-0 bordehover" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-people-fill icono display2"></i> <?=$nombreCli?>
                                    </a>
                                    <ul class="dropdown-menu col-2" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="controlador/editarClienteDatos_Controlador.php">Editar Perfil</a></li>
                                        <li><a class="dropdown-item" href="controlador/misReservas.php">Mis reservas</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="controlador/cerrarSesion.php">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            <?php
                                }else if(isset($_SESSION["usuarioEmpleado"])){ 
                            ?>
                                <li class="nav-item dropdown col-lg-2 col-12"><i class="bi bi-people-fill icono display1"></i>
                                    <a class="nav-link dropdown-toggle text-white p-0 bordehover" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-people-fill icono display2"></i> <?=$nombreTra?>
                                    </a>
                                    <ul class="dropdown-menu col-2" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="controlador/administracion_controlador.php">Administración</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="controlador/cerrarSesion.php">Cerrar sesión</a></li>
                                    </ul>
                                </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <!--Carousel-->
        <div id="boton" class="carousel slide carousel1" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <div class="fondoOscuro"></div>
                    <img src="img/Sevilla.jpg" class="d-block w-100 heightCarousel" alt="foto2">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="fondoOscuro"></div>
                    <img src="img/habitacion.jpg" class="d-block w-100 heightCarousel" alt="foto2">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <div class="fondoOscuro"></div>
                    <img src="img/recepcion.jpg" class="d-block w-100 heightCarousel" alt="foto3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#boton" data-bs-slide="prev">
                <span class="carousel-control-prev-icon botonesCarousel" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#boton" data-bs-slide="next">
                <span class="carousel-control-next-icon botonesCarousel" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!--Div para buscar habiataciones-->
        <?php        
            if(!isset($_SESSION["usuarioEmpleado"])){
        ?>
                <div class="container col-lg-8 disponibilidadAbsolute">
                    <?php        
                        if(isset($_SESSION["usuarioCliente"])){
                    ?>
                            <form class="d-flex align-items-center justify-content-center formularioDisponibilidad needs-validation" novalidate method="POST" action="controlador/habitaciones_Controlador.php">
                                <div class="row form-group col-lg-12 col-12 d-flex justify-content-center">
                                    <div class="col-lg-4 col-6">
                                        <label for="date" class="col-form-label text-white">Entrada</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control pt-2 pb-2" min="<?=$fecha?>" name="entradaReserva" required placeholder="dd/mm/aaaa">
                                        </div>
                                    </div>           
                                    <div class="col-lg-4 col-6">
                                        <label for="date" class="col-form-label text-white">Salida</label>
                                        <div class="input-group date mb-3">
                                            <input type="date" class="form-control pt-2 pb-2" min="<?=$fechaManana?>" name="salidaReserva" required placeholder="dd/mm/aaaa">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex align-items-end mb-3">
                                        <button type="submit" class=" col-12 pt-2 pb-2 buscar1">Reservar</button>
                                    </div>
                                </div>
                            </form>
                    <?php
                        }else{
                    ?>
                            <form class="d-flex align-items-center justify-content-center formularioDisponibilidad needs-validation" novalidate method="POST" action="controlador/habitacionesBuscar_Controlador.php">
                                <div class="row form-group col-lg-12 col-12 d-flex justify-content-center">
                                    <div class="col-lg-4 col-6">
                                        <label for="date" class="col-form-label text-white">Entrada</label>
                                        <div class="input-group date">
                                            <input type="date" class="form-control pt-2 pb-2" min="<?=$fecha?>" name="entradaReserva2" required placeholder="dd/mm/aaaa">
                                        </div>
                                    </div>           
                                    <div class="col-lg-4 col-6">
                                        <label for="date" class="col-form-label text-white">Salida</label>
                                        <div class="input-group date mb-3">
                                            <input type="date" class="form-control pt-2 pb-2" min="<?=$fechaManana?>" name="salidaReserva2" required placeholder="dd/mm/aaaa">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 d-flex align-items-end mb-3">
                                        <button type="submit" class=" col-12 pt-2 pb-2 buscar1">Buscar</button>
                                    </div>
                                </div>
                            </form>
                    <?php
                        }
                    ?>   
                </div>
        <?php
            } 
        ?>
    </section>
    
    <!-- Section que contiene información del hotel-->
    <section class="color">
        <div class="container">
            <h1 class="text-center pt-4 letratitulo">Bienvenido al Hotel Viriato Sevilla</h1>
            <p class="text-center letratexto">El Hotel Viriato está situado en pleno centro de Sevilla, estamos en calle Viriato su situación privilegiada es idoneo para visitar 
                los principales monumentos de Sevilla como La Giralda, Catedral, Torre del Oro, Archivo de Indias, Reales Alcázares de Sevilla y  
                sitios de ocio de la ciudad, los tendrás a pocos metros de distancia, pudiendo descansar cada vez que le apetezca en su cómoda habitación
                por la cercanía que tenemos a todos los sitios de interés. Desde el Hotel Viriato tardarás 10 minutos en llegar a la giralda andando tranquilamente.
            </p>
            <p class="text-center mb-0 pb-3 letratexto">Si buscas un hotel para alojarse en la capital andaluza con encanto, el máximo confort y buenos servicios es el lugar perfecto para ello. 
                Y recuerde que reservando aquí en nuestra Web Oficial, encontrará el mejor precio garantizado.
            </p>
        </div>
    </section>

    <!-- Section que contiene un carousel con fotos de los tipos de habiataciones-->
    <section class="sectionColor pt-2">
        <h2 class="text-center letratitulo">Nuestra galería</h2>
        <div id="boton1" class="carousel slide sectionCarouselHabitaciones" data-bs-ride="carousel">
            <div class="carousel-inner centrarCarousel">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="img/habitaciones/1.jpg" class="habitacionesCarousel" alt="habitacion1">
                    <img src="img/habitaciones/2.jpg" class="habitacionesCarousel" alt="habitacion2">
                    <img src="img/habitaciones/3.jpg" class="habitacionesCarousel" alt="habitacion3">
                    <img src="img/habitaciones/4.jpg" class="habitacionesCarousel" alt="habitacion4">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="img/habitaciones/5.jpg" class="habitacionesCarousel" alt="habitacion5">
                    <img src="img/habitaciones/6.jpg" class="habitacionesCarousel" alt="habitacion6">
                    <img src="img/habitaciones/7.jpg" class="habitacionesCarousel" alt="habitacion7">
                    <img src="img/habitaciones/8.jpg" class="habitacionesCarousel" alt="habitacion8">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="img/habitaciones/9.jpg" class="habitacionesCarousel" alt="habitacion9">
                    <img src="img/habitaciones/10.jpg" class="habitacionesCarousel block" alt="habitacion10">
                    <img src="img/habitaciones/11.jpg" class="habitacionesCarousel" alt="habitacion11">
                    <img src="img/habitaciones/12.jpg" class="habitacionesCarousel" alt="habitacion12">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#boton1" data-bs-slide="prev">
                <span class="carousel-control-prev-icon botonesCarousel" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#boton1" data-bs-slide="next">
                <span class="carousel-control-next-icon botonesCarousel" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <?php
    require_once("vista/footer.php");
    ?>
    
    <!-- Ventana modal que salta cuando haces clic en iniciar sesión cliente-->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="sesionCliente"> 
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
            <div class="modal-header pb-2 bg-dark text-white">
                    <h5>Particular</h5>
                    <button type="button" class="btn-close mb-0 bg-primary" data-bs-dismiss="modal" aria-label="Close" onclick="volver()"></button> 
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group mb-2 pb-2">
                            <label for="nomUsuCliente"><strong>Nombre usuario</strong></label>
                            <input type="text" class="form-control" name="nomUsuCliente" id="nomUsuCliente" placeholder="Escribe el nombre de usuario..." required> 
                        </div> 
                        <div class="form-group pb-3">
                            <label for="contraCliente"><strong>Contraseña</strong></label>
                            <input type="password" class="form-control" name="contraCliente" id="contraCliente" placeholder="Escribe tu contraseña..." required> 
                        </div> 
                        <button type="submit" href="" class="btn btn-success btn-block col-12">Iniciar sesión</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p><a href="">¿Has olvidado la contraseña?</a></p> 
                </div>
            </div>
        </div>
    </div>

    <!-- Ventana modal que salta cuando haces clic en registrarse-->
    <div class="modal fade" id="registrarModal"> 
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pb-2 bg-dark text-white">
                    <h5>REGISTRARSE</h5>
                    <button type="button" class="btn-close mb-0 bg-primary" data-bs-dismiss="modal" aria-label="Close" onclick="volver()"></button> 
                </div>
                <div class="modal-body">
                    <form method="post" class="needs-validation" novalidate action="controlador/registro_controlador.php">
                        <div class="form-group pb-3">
                            <label for="nomUsuClienteRe">Nombre de usuario</label>
                            <input type="text" class="form-control mt-2" name="nomUsuClienteRe" id="nomUsuClienteRe" placeholder="Escriba un nombre de usuario..." maxlength="25" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,25}" required>
                            <div class="invalid-feedback">
                                Nombre de usuario no valido, no se permiten caracteres que no sean letras, ni dejar el campo vacio.
                            </div> 
                        </div>
                        <div class="form-group pb-3">
                            <label for="nombreUsuRe">Nombre</label>
                            <input type="text" id="nombreUsuRe" name="nombreUsuRe" class="form-control mt-2" placeholder="Escriba tu nombre..." maxlength="25" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,25}" required>
                            <div class="invalid-feedback">
                                Nombre no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                            </div>
                        </div>
                        <div class="form-group pb-3">
                            <label for="emailClienteRe">Email</label>
                            <input type="email" class="form-control mt-2" name="emailClienteRe" id="emailClienteRe" placeholder="Escribe tu email, ejemplo:fernando@gmail.com" maxlength="100" pattern="[a-zA-Z0-9._]+@[a-z0-9.]+\.[a-z]{2,4}$" required>
                            <div class="invalid-feedback">
                                No es un email valido. Ejemplo de email valido: fernando@gmail.com
                            </div>
                        </div> 
                        <div class="form-group pb-3">
                            <label for="contraClienteRe">Contraseña</label>
                            <input type="password" class="form-control mt-2" name="contraClienteRe" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð*+_.]{1,20}" id="contraClienteRe" placeholder="Elige una contraseña..."  maxlength="20" required> 
                            <div class="invalid-feedback">
                                Debes rellenar el campo y no se pueden añadir espacios.
                            </div>
                        </div>
                        <div class="form-group pb-3">
                            <label for="ConfirmaContraClienteRe">Confirma tu contraseña</label>
                            <input type="password" class="form-control mt-2" name="ConfirmaContraClienteRe" id="ConfirmaContraClienteRe" placeholder="Escribe de nuevo tu contraseña..." maxlength="20" required> 
                        </div> 
                        <button type="submit" href="" class="btn btn-success btn-block col-12">Regístrate</button>
                    </form>
                </div>
                <div class="modal-footer mb-2">
                    <p>Al registrarme, <a href="" class="enlace2">Acepto los Términos de Uso</a> y <a href="" class="enlace2">La Política de Privacidad</a></p> 
                </div>
            </div>
        </div>
    </div>


    <!-- Ventana modal que salta cuando haces clic en iniciar sesión empleado-->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="sesionEmpleado"> 
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header pb-2 bg-dark text-white">
                    <h5>Empleado</h5>
                    <button type="button" class="btn-close mb-0 bg-primary" data-bs-dismiss="modal" aria-label="Close" onclick="volver()"></button> 
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group pb-2 mb-2">
                            <label for="nomUsuTrabajador"><strong>Nombre usuario</strong></label>
                            <input type="text" class="form-control" id="nomUsuTrabajador" name="nomUsuTrabajador" placeholder="Escribe el nombre de usuario..." required> 
                        </div> 
                        <div class="form-group pb-3">
                            <label for="contraTrabajador"><strong>Contraseña</strong></label>
                            <input type="password" class="form-control" id="contraTrabajador" name="contraTrabajador" placeholder="Escribe tu contraseña..." required> 
                        </div> 
                        <button type="submit" class="btn btn-success btn-block col-12">Iniciar sesión</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <p><a href="">¿Has olvidado la contraseña?</a></p> 
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/modalSelect.js"></script>
    <script type="text/javascript" src="js/validacionFormulario.js"></script>
    
</body>
</html>