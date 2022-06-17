<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&family=Roboto+Mono&family=Rubik:wght@300&family=The+Nautigal:wght@700&display=swap" rel="stylesheet"> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&family=Roboto+Mono&family=Rubik:wght@300&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <title>Administración</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body class="body1">

    <?php
        require_once("../swal/swal.php");
        $_SESSION["usutra"]="bordefijo";
        require_once("../vista/header.php");
        unset($_SESSION["usutra"]);
    ?>

    <!-- Section que contiene un nav tab con la administración de empleados y reserva-->
    <section class="sectionAdministrador pt-4 pb-4">
        <div class="container containesAdministrador">
            <h1 class="text-center pt-2 letraAdministaracion">Administración</h1> 
            <div class="row">
                <div class="col-sm-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">                    
                        <?php
                        if(!isset($_SESSION["disponibilidad"]) && !isset($_SESSION["marcaReserva"])){
                        ?>  
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion active fw-bold" id="emple" data-bs-toggle="tab" href="#adEmpleados" role="tab" aria-controls="adEmpleados" aria-selected="true">Empleados</a>
                            </li>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion fw-bold" id="reser" data-bs-toggle="tab" href="#adReserva" role="tab" aria-controls="adReserva" aria-selected="true">Disponibilidad</a> 
                            </li>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion fw-bold" id="reservas" data-bs-toggle="tab" href="#adReservas" role="tab" aria-controls="adReservas" aria-selected="true">Reservas actuales</a> 
                            </li>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion fw-bold" id="historico" data-bs-toggle="tab" href="#adHistorico" role="tab" aria-controls="adHistorico" aria-selected="true">Histórico de reservas</a> 
                            </li>
                        <?php  
                        }else if(isset($_SESSION["disponibilidad"])){
                        ?>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion fw-bold" id="emple" data-bs-toggle="tab" href="#adEmpleados" role="tab" aria-controls="adEmpleados" aria-selected="true">Empleados</a> 
                            </li>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion active fw-bold" id="reser" data-bs-toggle="tab" href="#adReserva" role="tab" aria-controls="adReserva" aria-selected="true">Disponibilidad</a> 
                            </li>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion fw-bold" id="reservas" data-bs-toggle="tab" href="#adReservas" role="tab" aria-controls="adReservas" aria-selected="true">Reservas actuales</a> 
                            </li>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion fw-bold" id="historico" data-bs-toggle="tab" href="#adHistorico" role="tab" aria-controls="adHistorico" aria-selected="true">Histórico de reservas</a> 
                            </li>
                        <?php 
                        }else{
                        ?>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion fw-bold" id="emple" data-bs-toggle="tab" href="#adEmpleados" role="tab" aria-controls="adEmpleados" aria-selected="true">Empleados</a> 
                            </li>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion fw-bold" id="reser" data-bs-toggle="tab" href="#adReserva" role="tab" aria-controls="adReserva" aria-selected="true">Disponibilidad</a> 
                            </li>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion active fw-bold" id="reservas" data-bs-toggle="tab" href="#adReservas" role="tab" aria-controls="adReservas" aria-selected="true">Reservas actuales</a> 
                            </li>
                            <li class="nav-item pb-0">
                                <a class="nav-link p-2 letraAdministaracion fw-bold" id="historico" data-bs-toggle="tab" href="#adHistorico" role="tab" aria-controls="adHistorico" aria-selected="true">Histórico de reservas</a> 
                            </li>
                        <?php 
                        }
                        ?>
                    </ul>
                </div>


                <!-- tab content que contiene la gestión de empleados y la gestión de reserva-->
                <div class="tab-content col-sm-12">
                    <!-- Tab-pane que contiene la tabla con la gestión de empleado-->
                <?php
                if(!isset($_SESSION["disponibilidad"]) && !isset($_SESSION["marcaReserva"])){
                ?>  
                    <div class="tab-pane fade show active" id="adEmpleados" role="tabpanel" aria-labelledby="emple">
                <?php  
                }else{
                ?>
                    <div class="tab-pane fade" id="adEmpleados" role="tabpanel" aria-labelledby="emple">
                <?php 
                }
                ?>
                    
                        <div class="d-md-flex justify-content-md-end d-flex justify-content-center">
                            <div class="mt-2 mb-2 me-0 col-sm-4 col-12 d-flex justify-content-center d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-success m-0 letraAdministaracion" data-bs-toggle="modal" data-bs-target="#contratar"><i class="bi bi-pen-fill"></i> Contratar</button>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table table-success table-striped table-hover responsive gestion" style="width:100%">
                                <thead>
                                <tr>
                                    <th scope="col" class="text-center centrarTabla">Nombre</th>
                                    <th scope="col" class="text-center centrarTabla">Apellidos</th>
                                    <th scope="col" class="text-center centrarTabla">Categoría</th>
                                    <th scope="col" class="text-center centrarTabla">Administrador</th>
                                    <th scope="col" class="text-center centrarTabla">Gestión</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    //Recorremos los empleados y lo mostramos
                                    foreach ($trabajadores as $t) {
                                ?>                   
                                        <tr>
                                            <td class="centrarTabla text-center"><?=$t["nombre"]?></td>
                                            <td class="centrarTabla text-center"><?=$t["apellidos"]?></td>
                                            <td class="centrarTabla text-center"><?=$t["categoria"]?></td>
                                            <?php
                                            if($t["administrador"]==1){
                                            ?>
                                                <td class="centrarTabla text-center">Si</td>
                                            <?php
                                            }else{
                                            ?>
                                                <td class="centrarTabla text-center">No</td>
                                            <?php
                                            }
                                            ?>
                                            <td class="text-center centrarTabla">
                                                <div class="btn-group divBoton" role="group" aria-label="Basic mixed styles example">
                                                    <form method="post" action="empleadoAModificar.php">
                                                        <input type="hidden" name="empleadoAModificar" value="<?=$t["nomUsuario"]?>">
                                                        <button type="submit" class="btn btn-success letraAdministaracion"><i class="bi bi-pen-fill"></i> Editar</button>
                                                    </form>
                                                    <?php 
                                                        $nombreUsuarioLogueado = $_SESSION["usuarioEmpleado"]->getNomUsuario();              
                                                        if(strcmp($nombreUsuarioLogueado, $t["nomUsuario"]) != 0){
                                                    ?>
                                                        <form method="post" action="empleadoAEliminar.php">
                                                            <input type="hidden" name="eliminarEmpleado" value="<?=$t["nomUsuario"]?>">
                                                            <button type="submit" class="btn btn-danger ms-2 letraAdministaracion"> <i class="bi bi-trash-fill"></i> Eliminar</button>
                                                        </form>
                                                    <?php
                                                        }else{
                                                    ?>
                                                            <button type="submit" disabled class="btn btn-danger ms-2 letraAdministaracion"> <i class="bi bi-trash-fill"></i> Eliminar</button>
                                                    <?php  
                                                        }
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }                   
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php
                if(isset($_SESSION["disponibilidad"])){
                ?>  
                    <!-- Tab-pane que contiene la gestión de reserva-->                    
                    <div class="tab-pane fade show active" id="adReserva" role="tabpanel" aria-labelledby="reser">
                <?php  
                unset($_SESSION["disponibilidad"]);  
                }else{
                ?>
                    <div class="tab-pane fade" id="adReserva" role="tabpanel" aria-labelledby="reser">
                <?php 
                }
                ?>
                        <!-- Nav con desplegable dropdown-item y con scrollspy que al pulsar el enlace del nav nos dirije a la planta pulsada con las reservas -->                     
                        <nav id="navbar-example2" class="navbar navbar-light bg-dark px-3">
                            <ul class="nav nav-pills">
                              <li class="nav-item">
                                <a class="nav-link text-white" href="#planta1">Planta 1</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link text-white" href="#planta2">Planta 2</a>
                              </li>
                              <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white bg-dark pt-2" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Mas plantas</a>
                                <ul class="dropdown-menu bg-dark">
                                  <li><a class="dropdown-item text-white backgroundTabPane bg-dark" href="#planta3">Planta 3</a></li>
                                  <li><a class="dropdown-item text-white backgroundTabPane bg-dark" href="#planta4">Planta 4</a></li>
                                </ul>
                              </li>
                            </ul>
                        </nav>
                        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                            <!-- Id que se relaciona con el id del enlace del nav y permite dirigirse hacia la planta indicada. -->
                            <h4 id="planta1" class="text-center pt-3 textoPlanta">PLANTA 1</h4>
                            <div class="d-sm-flex justify-content-sm-center d-flex justify-content-center flex-wrap">
                            <?php
                                foreach($primeraPlanta as $hp){                  
                            ?> 
                                <div id="Tamaño" class="m-2">
                                    <div class="tamañoCajaImagen">
                                        <img class="imagenReserva" src="../img/habitaciones/<?=$hp["imagen"]?>">
                                        <h6 class="text-center puerta mb-0 fs-5">Habitación <?=$hp["numero"]?></h6>
                                    <?php
                                    if($hp["mantenimiento"]==0){                                     
                                    ?>
                                        <p class="Libre fs-4 fw-bold">DISPONIBLE</p>
                                    <?php
                                    }else{
                                    ?>
                                        <p class="Reservado fs-4 fw-bold">MANTENIMIENTO</p>
                                    <?php
                                    }
                                    ?> 
                                    </div>
                                    <div class="d-flex justify-content-center pt-3">
                                        <form method="post" action="disponibilidad.php">
                                            <input type="hidden" name="numeroHabi" value="<?=$hp["numero"]?>">
                                            <input type="hidden" name="mantenimientoHabi" value="<?=$hp["mantenimiento"]?>">
                                            <button type="submit" class="btn btn-success letraAdministaracion">Cambiar</button>
                                        </form>                                  
                                    </div>
                                </div>
                            <?php                     
                                }
                            ?>
                            </div>
                            <h4 id="planta2" class="text-center pt-3 textoPlanta">PLANTA 2</h4>
                            <div class="d-sm-flex justify-content-sm-center d-flex justify-content-center flex-wrap">
                            <?php
                                foreach($segundaPlanta as $hs){                  
                            ?> 
                                <div id="Tamaño" class="m-2">
                                    <div class="tamañoCajaImagen">
                                        <img class="imagenReserva" src="../img/habitaciones/<?=$hs["imagen"]?>">
                                        <h6 class="text-center puerta mb-0 fs-5">Habitación <?=$hs["numero"]?></h6>
                                    <?php
                                    if($hs["mantenimiento"]==0){                                     
                                    ?>
                                        <p class="Libre fs-4 fw-bold">DISPONIBLE</p>
                                    <?php
                                    }else{
                                    ?>
                                        <p class="Reservado fs-4 fw-bold">MANTENIMIENTO</p>
                                    <?php
                                    }
                                    ?> 
                                    </div>
                                    <div class="d-flex justify-content-center pt-3">
                                        <form method="post" action="disponibilidad.php">
                                            <input type="hidden" name="numeroHabi" value="<?=$hs["numero"]?>">
                                            <input type="hidden" name="mantenimientoHabi" value="<?=$hs["mantenimiento"]?>">
                                            <button type="submit" class="btn btn-success letraAdministaracion">Cambiar</button>
                                        </form>                                  
                                    </div>
                                </div>
                            <?php                     
                                }
                            ?>
                            </div>
                            <h4 id="planta3" class="text-center textoPlanta pt-3">PLANTA 3</h4>
                            <div class="d-sm-flex justify-content-sm-center d-flex justify-content-center flex-wrap">
                            <?php
                                foreach($terceraPlanta as $ht){                  
                            ?> 
                                <div id="Tamaño" class="m-2">
                                    <div class="tamañoCajaImagen">
                                        <img class="imagenReserva" src="../img/habitaciones/<?=$ht["imagen"]?>">
                                        <h6 class="text-center puerta mb-0 fs-5">Habitación <?=$ht["numero"]?></h6>
                                    <?php
                                    if($ht["mantenimiento"]==0){                                     
                                    ?>
                                        <p class="Libre fs-4 fw-bold">DISPONIBLE</p>
                                    <?php
                                    }else{
                                    ?>
                                        <p class="Reservado fs-4 fw-bold">MANTENIMIENTO</p>
                                    <?php
                                    }
                                    ?> 
                                    </div>
                                    <div class="d-flex justify-content-center pt-3">
                                        <form method="post" action="disponibilidad.php">
                                            <input type="hidden" name="numeroHabi" value="<?=$ht["numero"]?>">
                                            <input type="hidden" name="mantenimientoHabi" value="<?=$ht["mantenimiento"]?>">
                                            <button type="submit" class="btn btn-success letraAdministaracion">Cambiar</button>
                                        </form>                                  
                                    </div>
                                </div>
                            <?php                     
                                }
                            ?>
                            </div>
                            <h4 id="planta4" class="text-center textoPlanta pt-3">PLANTA 4</h4>
                            <div class="d-sm-flex justify-content-sm-center d-flex justify-content-center flex-wrap">
                            <?php
                                foreach($cuartaPlanta as $hc){                  
                            ?> 
                                <div id="Tamaño" class="m-2">
                                    <div class="tamañoCajaImagen">
                                        <img class="imagenReserva" src="../img/habitaciones/<?=$hc["imagen"]?>">
                                        <h6 class="text-center puerta mb-0 fs-5">Habitación <?=$hc["numero"]?></h6>
                                    <?php
                                    if($hc["mantenimiento"]==0){                                     
                                    ?>
                                        <p class="Libre fs-4 fw-bold">DISPONIBLE</p>
                                    <?php
                                    }else{
                                    ?>
                                        <p class="Reservado fs-4 fw-bold">MANTENIMIENTO</p>
                                    <?php
                                    }
                                    ?> 
                                    </div>
                                    <div class="d-flex justify-content-center pt-3">
                                        <form method="post" action="disponibilidad.php">
                                            <input type="hidden" name="numeroHabi" value="<?=$hc["numero"]?>">
                                            <input type="hidden" name="mantenimientoHabi" value="<?=$hc["mantenimiento"]?>">
                                            <button type="submit" class="btn btn-success letraAdministaracion">Cambiar</button>
                                        </form>                                  
                                    </div>
                                </div>
                            <?php                     
                                }
                            ?>
                            </div>
                        </div>
                    </div> 

                <?php
                if(isset($_SESSION["marcaReserva"])){
                ?>  
                    <!-- Tab-pane que contiene la gestión de reserva-->                    
                    <div class="tab-pane fade show active" id="adReservas" role="tabpanel" aria-labelledby="reser">
                <?php  
                unset($_SESSION["marcaReserva"]);  
                }else{
                ?>
                    <div class="tab-pane fade" id="adReservas" role="tabpanel" aria-labelledby="reser">
                <?php 
                }
                ?>
            
                        <div class="container containesAdministrador">
                            <h4 class="text-center pt-2 letraAdministaracion">RESERVAS ACTUALES DEL HOTEL</h4> 
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-success table-striped table-hover responsive reservasAct" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center centrarTabla">Nombre</th>
                                            <th scope="col" class="text-center centrarTabla">Precio</th>
                                            <th scope="col" class="text-center centrarTabla">Tipo alojamiento</th>
                                            <th scope="col" class="text-center centrarTabla">Entrada</th>
                                            <th scope="col" class="text-center centrarTabla">Salida</th>
                                            <th scope="col" class="text-center centrarTabla">Ocupación</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            //Recorremos los empleados y lo mostramos
                                            foreach ($reservasLista as $rl) {
                                                $nombreHabi = $baseDatos->nombreHabitación($rl["fk_numero"]);
                                                $tipoAloja = $baseDatos->nombreTipoAlojamiento($rl["fk_tipoAlojamiento"]);
                                                $fechaEntradaDiferencia = new DateTime($rl["fechaIngreso"]);
                                                $fechaSalidaDiferencia = new DateTime($rl["fechaSalida"]);
                                                $noches = $fechaSalidaDiferencia->diff($fechaEntradaDiferencia);
                                                $fechaEntrada = date("Y/m/d", strtotime($rl["fechaIngreso"]));
                                                $fechaSalida = date("Y/m/d", strtotime($rl["fechaSalida"]));
                                        ?>                   
                                                <tr>
                                                    <td class="text-center centrarTabla"><?=$nombreHabi[0]?></td>
                                                    <td class="text-center centrarTabla"><?=$rl["precio"]*$noches->days?>€</td>
                                                    <td class="text-center centrarTabla"><?=$tipoAloja[0]?></td>
                                                    <td class="text-center centrarTabla"><?=$fechaEntrada?></td>
                                                    <td class="text-center centrarTabla"><?=$fechaSalida?></td>
                                                    <td class="text-center centrarTabla"><?=$rl["ocupacionSel"]?></td>
                                                </tr>
                                        <?php
                                            }                   
                                        ?>
                                        </tbody>
                                    </table>
                                    <div class="btn-group divBoton d-flex justify-content-center pb-3" role="group" aria-label="Basic mixed styles example">
                                        <form method="post" action="eliminarReservasPasadas.php">
                                            <button type="submit" class="btn btn-danger ms-2 letraAdministaracion"> <i class="bi bi-trash-fill"></i> Eliminar reservas pasadas</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="tab-pane fade" id="adHistorico" role="tabpanel" aria-labelledby="adHistorico">                
                        <div class="container containesAdministrador pb-2">
                            <h4 class="text-center pt-2 letraAdministaracion">HISTÓRICO DE RESERVAS</h4> 
                            <div class="row">
                                <div class="table-responsive">
                                    <table class=" mb-2 table table-success table-striped table-hover responsive tablaHistorico" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center centrarTabla">Nombre</th>
                                                <th scope="col" class="text-center centrarTabla">Precio</th>
                                                <th scope="col" class="text-center centrarTabla">Tipo alojamiento</th>
                                                <th scope="col" class="text-center centrarTabla">Reserva realizada</th>
                                                <th scope="col" class="text-center centrarTabla">Entrada</th>
                                                <th scope="col" class="text-center centrarTabla">Salida</th>
                                                <th scope="col" class="text-center centrarTabla">Ocupación</th>
                                                <th scope="col" class="text-center centrarTabla">Cliente</th>
                                                <th scope="col" class="text-center centrarTabla">Cancelada</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            //Recorremos los empleados y lo mostramos
                                            foreach ($reservasListaHistorico as $rlh) {
                                                $nombreHabi = $baseDatos->nombreHabitación($rlh["fk_numerohis"]);
                                                $tipoAloja = $baseDatos->nombreTipoAlojamiento($rlh["fk_tipoAlojamientohis"]);
                                                $fechaEntradaDiferencia = new DateTime($rlh["fechaIngresohis"]);
                                                $fechaSalidaDiferencia = new DateTime($rlh["fechaSalidahis"]);
                                                $noches = $fechaSalidaDiferencia->diff($fechaEntradaDiferencia);
                                                $fechaEntrada = date("Y/m/d", strtotime($rlh["fechaIngresohis"]));
                                                $fechaSalida = date("Y/m/d", strtotime($rlh["fechaSalidahis"]));
                                                $DiaQueReservo = date("Y/m/d", strtotime($rlh["fechaHoyHis"]));
                                                if($rlh["canceladahis"]){
                                                    $cancelada="Si";
                                                }else{
                                                    $cancelada="No";
                                                }
                                        ?>                   
                                                <tr>
                                                    <td class="centrarTabla text-center"><?=$nombreHabi[0]?></td>
                                                    <td class="centrarTabla text-center"><?=$rlh["preciohis"]*$noches->days?>€</td>
                                                    <td class="centrarTabla text-center"><?=$tipoAloja[0]?></td>
                                                    <td class="centrarTabla text-center"><?=$DiaQueReservo?></td>
                                                    <td class="centrarTabla text-center"><?=$fechaEntrada?></td>
                                                    <td class="centrarTabla text-center"><?=$fechaSalida?></td>
                                                    <td class="centrarTabla text-center"><?=$rlh["ocupacionSelhis"]?></td>
                                                    <td class="centrarTabla text-center"><?=$rlh["fk_nomUsuariohis"]?></td>
                                                    <td class="centrarTabla text-center"><?=$cancelada?></td>
                                                </tr>
                                        <?php
                                            }                   
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once("../vista/footer.php");
    ?>

    
    <!-- Modal para contratar empleados -->
    <div class="modal fade colorFormulario" data-bs-backdrop="static" data-bs-keyboard="false" id="contratar" tabindex="-1" aria-labelledby="contratarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content colorModal">
                <div class="modal-header">
                    <h5 class="modal-title letraContratar" id="contratarLabel">CONTRATAR EMPLEADOS</h5>
                    <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="contratarEmpleado.php" class="row g-3 needs-validation d-flex justify-content-center" novalidate>
                    <?php                    
                        if(isset($_SESSION["datosTrabajador"])){
                            $datoNombreUsuario = $_SESSION["datosTrabajador"]->getNomUsuario();
                            $datoContrasena = $_SESSION["datosTrabajador"]->getContrasena();
                            $datoNombre = $_SESSION["datosTrabajador"]->getNombre();
                            $datoapellidos = $_SESSION["datosTrabajador"]->getNombre();
                            $datoCategoria = $_SESSION["datosTrabajador"]->getCategoria();
                            $datoAdministrador = $_SESSION["datosTrabajador"]->getAdministrador();
                    ?>
                            <div class="mb-2">                    
                                <label for="nomUsuarioTra" class="form-label negritaform">Nombre de usuario</label>
                                <input type="text" id="nomUsuarioTra" name="nomUsuarioTra" class="form-control" placeholder="Fer1998" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,25}" maxlength="25" required value="<?=$datoNombreUsuario?>">
                                <div class="invalid-feedback">
                                    Nombre de usuario no valido, no se permiten caracteres que no sean letras ni dejar el campo vacio.
                                </div> 
                            </div>
                            <div class="mb-2"> 
                                <label for="contrasenaTra" class="form-label negritaform">Cambiar contraseña</label>
                                <input type="password" class="form-control" id="contrasenaTra" name="contrasenaTra" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð*+_.]{1,20}" maxlength="20" required value="<?=$datoContrasena?>">
                                <div class="invalid-feedback">
                                    Debes rellenar el campo y no se pueden añadir espacios.
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="nombreTra" class="form-label negritaform">Nombre</label>
                                <input type="text" id="nombreTra" name="nombreTra" class="form-control" placeholder="Fernando" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,25}" maxlength="25" required value="<?=$datoNombre?>">
                                <div class="invalid-feedback">
                                    Nombre no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="apellidosTra" class="form-label negritaform">Apellidos</label>
                                <input type="text" name="apellidosTra" class="form-control" placeholder="Cornejo Hernández" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,50}" maxlength="50" id="apellidosTra" required value="<?=$datoapellidos?>">
                                <div class="invalid-feedback">
                                    Apellidos no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                                </div>
                            </div>
                            <div class="mb-2">        
                                <label for="categoriaTra" class="form-label negritaform">Categoría</label>
                                <input type="text" name="categoriaTra" class="form-control" placeholder="Limpiador" pattern="[^\s][a-zA-ZáéíóúüÁÉÍÓÚÜ ]{3,100}" maxlength="100" id="categoriaTra" required value="<?=$datoCategoria?>">
                                <div class="invalid-feedback">
                                    Categoria incorrecta. Debes poner mínimo 4 caracteres y un máximo de 100.
                                </div>
                            </div>        
                            <div class="form-check form-switch ms-3">
                            <?php                    
                                if($datoAdministrador){
                            ?>
                                    <input class="form-check-input" type="checkbox" id="administradorTra" name="administradorTra" checked>
                            <?php                    
                                }else{
                            ?>
                                    <input class="form-check-input" type="checkbox" id="administradorTra" name="administradorTra">
                            <?php                    
                                }
                            ?>
                                <label class="form-check-label" for="administradorTra">Administrador</label>
                            </div>      
                    <?php
                        }else{
                    ?>
                            <div class="mb-2">                    
                                <label for="nomUsuarioTra" class="form-label negritaform">Nombre de usuario</label>
                                <input type="text" id="nomUsuarioTra" name="nomUsuarioTra" class="form-control" placeholder="Fer1998" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,25}" maxlength="25" required>
                                <div class="invalid-feedback">
                                    Nombre de usuario no valido, no se permiten caracteres que no sean letras ni dejar el campo vacio.
                                </div> 
                            </div>
                            <div class="mb-2"> 
                                <label for="contrasenaTra" class="form-label negritaform">Cambiar contraseña</label>
                                <input type="password" class="form-control" id="contrasenaTra" name="contrasenaTra" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð*+_.]{1,20}" maxlength="20" required>
                                <div class="invalid-feedback">
                                    Debes rellenar el campo y no se pueden añadir espacios.
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="nombreTra" class="form-label negritaform">Nombre</label>
                                <input type="text" id="nombreTra" name="nombreTra" class="form-control" placeholder="Fernando" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,25}" maxlength="25" required>
                                <div class="invalid-feedback">
                                    Nombre no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="apellidosTra" class="form-label negritaform">Apellidos</label>
                                <input type="text" name="apellidosTra" class="form-control" placeholder="Cornejo Hernández" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,50}" maxlength="50" id="apellidosTra" required>
                                <div class="invalid-feedback">
                                    Apellidos no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                                </div>
                            </div>
                            <div class="mb-2">        
                                <label for="categoriaTra" class="form-label negritaform">Categoría</label>
                                <input type="text" name="categoriaTra" class="form-control" placeholder="Limpiador" pattern="[^\s][a-zA-ZáéíóúüÁÉÍÓÚÜ ]{3,100}" maxlength="100" id="categoriaTra" required>
                                <div class="invalid-feedback">
                                    Categoria incorrecta. Debes poner mínimo 4 caracteres y un máximo de 100.
                                </div>
                            </div>                 
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" type="checkbox" id="administradorTra" name="administradorTra">
                                <label class="form-check-label" for="administradorTra">Administrador</label>
                            </div>              
                    <?php
                        }
                    ?>  
                        <div class="modal-footer pb-0">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Contratar</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <?php
        if(isset($_SESSION["usuarioAModificar"])){
            $nombreUsuTraModificar = $_SESSION["usuarioAModificar"]->getNomUsuario();
            $nombreTraModificar = $_SESSION["usuarioAModificar"]->getNombre();
            $ApellidosTraModificar = $_SESSION["usuarioAModificar"]->getApellidos();
            $categoriaTraModificar = $_SESSION["usuarioAModificar"]->getCategoria();
            $administradorTraModificar = $_SESSION["usuarioAModificar"]->getAdministrador();
            echo "<script> $(document).ready(function()
            {
                $('#editarEmpleado').modal('show');
            }); </script>";
            unset($_SESSION['usuarioAModificar']);  
        }
    ?>
    <!-- Modal para editar empleados -->
    <div class="modal fade colorFormulario" data-bs-backdrop="static" data-bs-keyboard="false" id="editarEmpleado" tabindex="-1" aria-labelledby="contratarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content colorModal">
                <div class="modal-header">
                    <h5 class="modal-title letraContratar" id="contratarLabel">EDITAR EMPLEADOS</h5>
                    <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="modificarEmpleado.php" class="row g-3 needs-validation d-flex justify-content-center" novalidate>
                        <div class="mb-2">                    
                            <label for="nomUsuarioTraModificar" class="form-label negritaform">Nombre de usuario</label>
                            <input type="text" id="nomUsuarioTraModificar" name="nomUsuarioTraModificar" class="form-control" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{2,25}" required disabled value="<?=$nombreUsuTraModificar?>">
                            <input type="hidden" name="nomUsuarioTraModificar" value="<?=$nombreUsuTraModificar?>">
                        </div>
                        <div class="mb-2"> 
                            <label for="contrasenaTraModificar" class="form-label negritaform">Cambiar contraseña</label>
                            <input type="password" class="form-control" id="contrasenaTraModificar" name="contrasenaTraModificar" pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð*+_.]{1,20}" maxlength="20" required>
                            <div class="invalid-feedback">
                                Debes rellenar el campo y no se pueden añadir espacios.
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="nombreTraModificar" class="form-label negritaform">Nombre</label>
                            <input type="text" id="nombreTraModificar" name="nombreTraModificar" class="form-control" placeholder="Fernando" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,25}" maxlength="25" required value="<?=$nombreTraModificar?>">
                            <div class="invalid-feedback">
                                Nombre no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="apellidosTraModificar" class="form-label negritaform">Apellidos</label>
                            <input type="text" name="apellidosTraModificar" class="form-control" placeholder="Cornejo Hernández" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,50}" maxlength="50" id="apellidosTraModificar" required value="<?=$ApellidosTraModificar?>">
                            <div class="invalid-feedback">
                                Apellidos no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                            </div>
                        </div>
                        <div class="mb-2">        
                            <label for="categoriaTraModificar" class="form-label negritaform">Categoría</label>
                            <input type="text" name="categoriaTraModificar" class="form-control" placeholder="Limpiador" pattern="[^\s][a-zA-ZáéíóúüÁÉÍÓÚÜ ]{3,100}" maxlength="100" id="categoriaTraModificar" required value="<?=$categoriaTraModificar?>">
                            <div class="invalid-feedback">
                                Categoria incorrecta. Debes poner mínimo 4 caracteres y un máximo de 100.
                            </div>
                        </div>
                        <?php 
                            $nombreUsuarioLogueado = $_SESSION["usuarioEmpleado"]->getNomUsuario();              
                            if(strcmp($nombreUsuarioLogueado, $nombreUsuTraModificar) != 0){
                        ?>
                                <div class="form-check form-switch ms-3">
                                    <?php                    
                                        if($administradorTraModificar){
                                    ?>
                                            <input class="form-check-input" type="checkbox" id="administradorTraModificar" name="administradorTraModificar" checked>
                                    <?php                    
                                        }else{
                                    ?>
                                            <input class="form-check-input" type="checkbox" id="administradorTraModificar" name="administradorTraModificar">
                                    <?php                    
                                        }
                                    ?>
                                        <label class="form-check-label" for="administradorTraModificar">Administrador</label>
                                </div> 
                        <?php   
                            }else{
                        ?>
                                <input type="hidden" name="administradorTraModificar" value="<?=$administradorTraModificar?>">
                        <?php 
                            }
                        ?>            
                        <div class="modal-footer pb-0">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>

    <?php
        if(isset($_SESSION["empleadoAEliminar"])){
            $array = $_SESSION["empleadoAEliminar"];
            $nombreEmpleadoBorrar = $array[2];
            $apellidosEmpleadoBorrar = $array[3];
            $nombreUsuarioEmpleadoBorrar = $array[0];
            echo "<script> $(document).ready(function()
            {
                $('#eliminarEmpleado').modal('show');
            }); </script>";
            unset($_SESSION['empleadoAEliminar']); 
        }
    ?>

    <div class="modal fade" id="eliminarEmpleado" tabindex="-1" aria-labelledby="eliminarEmpleado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="text-white mb-0" id="exampleModalLabel">ELIMINAR EMPLEADO</h5>
                    <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseas eliminar a <?=$nombreEmpleadoBorrar?> <?=$apellidosEmpleadoBorrar?>
                </div>
                <div class="modal-footer">
                <form method="post" action="eliminarEmpleado.php">
                    <input type="hidden" name="eliminarEmpleado2" value="<?=$nombreUsuarioEmpleadoBorrar?>">
                    <input type="hidden" name="nombre" value="<?=$nombreEmpleadoBorrar?>">
                    <button type="submit" class="btn btn-success">Si</button>
                </form>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="../js/tabla.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
    <script type="text/javascript" src="../js/validacionFormulario.js"></script>
</body>
</html>