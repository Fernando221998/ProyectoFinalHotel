<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Unna&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&family=Roboto+Mono&family=Rubik:wght@300&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Faustina:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="../js/LeermasMenos.js"></script>
    <title>Habitaciones reserva</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body>

    <?php
      require_once("../swal/swal.php");
      $nombreCli = $_SESSION["usuarioCliente"]->getNombre();
      $cesta = $_SESSION["usuarioCliente"]->getCesta(); 
      if ($cesta!=null){
        $numeroDeHabitacionesCesta=count($cesta);
      }else{
        $numeroDeHabitacionesCesta=0;
      }
      $_SESSION["usutra"]="bordefijo";
      require_once("../vista/header.php");
      unset($_SESSION["usutra"]);
    ?>

    <!--Section que contiene los tipos de habitaciones incluidas en un acordion-->
    <section class="colorEligeHabitacion pt-5 pb-5">
      <div class="container bg-white p-3">
        <div class="d-flex align-items-center">
            <div class="right active d-flex align-items-center justify-content-center"><img class="icono me-1" src="../img/cama.png">Habitaciones</div>
            <div class="left d-flex align-items-center justify-content-center"><i class="bi bi-check-circle pe-1"></i>Confirmación</div>
        </div>
        <div class="d-flex justify-content-center flex-column align-items-center">
            <p class="fw-bold pt-2 mb-0 text-center letraReserva"><?=$_SESSION["numeroDeHabitaciones"]?> habitaciones disponibles en el Hotel Viriato</p>
            <p class="fw-bold pt-1 letraReserva">Del <?=$_SESSION["fechaEntrada"]?> al <?=$_SESSION["fechaSalida"]?> (<?=$_SESSION["noches"]->days?> noche)</p>
        </div>
        <div class="d-flex justify-content-between mb-2">
          <div class="d-flex align-items-center ps-1">
            <!-- Al pulsar el boton Reservar salta un offcanvas con las habitaciones añadidas-->
            <button type="button" class="btn botonAñadir letraReserva" data-bs-toggle="offcanvas" data-bs-target="#cesta" aria-controls="offcanvasRight"><i class="bi bi-cart-fill"></i> RESERVAR</button>
          </div>       
        </div>
        <!--Acordion con las habitaciones. Al pulsar el boton modificar salta un modal-->
        <div class="accordion" id="acordeon">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#todas" aria-expanded="true" aria-controls="todas">
                  Todas las habitaciones
              </button>
            </h2>
            <div id="todas" class="accordion-collapse collapse mt-3 show" aria-labelledby="headingOne" data-bs-parent="#acordeon">
              <?php
                $habitacionesLibres=$_SESSION["habitacionesLibres"];
                foreach($habitacionesLibres as $h){
              ?> 
                  <div class="accordion-body d-lg-flex colorAcordion bordeHabitacion">
                    <div class="col-lg-3 text-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                    <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="text-center reservaTitulo"><?=$h["nombre"]?></h3>
                      <p class="letraReserva"><?=$h["descripcion"]?></p>
                    </div>
                    <div class="col-lg-3 col-12 text-lg-center colorOcupacion d-flex d-flex flex-column justify-content-center align-items-center p-1">
                      <p class="m-0 letraReserva">Ocupación seleccionada:</p>
                      <p class="mb-1 letraReserva"><?=$_SESSION["ocupacionAdulto".$h["numero"]]?> Adultos <?=$_SESSION["ocupacionNino".$h["numero"]]?> niños</p>              
                      <form method="post" action="abreModalOcupacionMax.php">
                        <input type="hidden" name="ocupacionMax" value="<?=$h["ocupacionMax"]?>">
                        <input type="hidden" name="numero" value="<?=$h["numero"]?>">
                        <button type="submit" class="btn botonModificar letraReserva">Modificar</button>
                      </form>
                      <p class="letraReserva">(Max <?=$h["ocupacionMax"]?> ocupantes)</p>
                    </div>
                  </div>
                  <div>
                    <table class="table table-success mb-0">
                      <tbody>
                        <tr>
                          <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                          <td class="text-end centrarTabla"><?=$h["precio_Alo"]?>€</td>
                          <form method="post" action="añadirCesta.php">
                            <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                            <input type="hidden" name="precioCesta" value="<?=$h["precio_Alo"]?>">
                            <input type="hidden" name="alojamientoCesta" value="1">
                            <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                          </form>
                        </tr>
                        <tr class="col-2">
                          <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                          <td class="text-end centrarTabla"><?=$h["precio_AloDes"]?>€</td>
                          <form method="post" action="añadirCesta.php">
                            <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                            <input type="hidden" name="precioCesta" value="<?=$h["precio_AloDes"]?>">
                            <input type="hidden" name="alojamientoCesta" value="2">
                            <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                          </form>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              <?php
                }
              ?>
            </div>
          </div>
          <?php
            $contadorIndividual=0;
            foreach($habitacionesLibres as $h){
              if($h["ocupacionMax"]==1){
                if($contadorIndividual!=1){
                  $contadorIndividual=1;
          ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#individuales" aria-expanded="false" aria-controls="individuales">
                        Habitaciones individuales
                      </button>
                    </h2>
                    <div id="individuales" class="accordion-collapse collapse mt-3" aria-labelledby="headingTwo" data-bs-parent="#acordeon">
              <?php
                }
              ?> 
                      <div class="accordion-body d-lg-flex colorAcordion bordeHabitacion">
                        <div class="col-lg-3 text-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                        <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="reservaTitulo text-center"><?=$h["nombre"]?></h3>
                          <p class="letraReserva"><?=$h["descripcion"]?></p>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-center colorOcupacion d-flex d-flex flex-column justify-content-center align-items-center p-1">
                          <p class="m-0 letraReserva">Ocupación seleccionada:</p>
                          <p class="mb-1 letraReserva"><?=$_SESSION["ocupacionAdulto".$h["numero"]]?> Adultos <?=$_SESSION["ocupacionNino".$h["numero"]]?> niños</p>
                          <form method="post" action="abreModalOcupacionMax.php">
                            <input type="hidden" name="ocupacionMax" value="<?=$h["ocupacionMax"]?>">
                            <input type="hidden" name="numero" value="<?=$h["numero"]?>">
                            <button type="submit" class="btn botonModificar letraReserva">Modificar</button>
                          </form>
                          <p class="letraReserva">(Max <?=$h["ocupacionMax"]?> ocupantes)</p>
                        </div>
                      </div>
                      <div>
                        <table class="table table-success mb-0">
                          <tbody>
                            <tr>
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                              <td class="text-end centrarTabla"><?=$h["precio_Alo"]?>€</td>
                              <form method="post" action="añadirCesta.php">
                                <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                                <input type="hidden" name="precioCesta" value="<?=$h["precio_Alo"]?>">
                                <input type="hidden" name="alojamientoCesta" value="1">
                                <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                              </form>
                            </tr>
                            <tr class="col-2">
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                              <td class="text-end centrarTabla"><?=$h["precio_AloDes"]?>€</td>
                              <form method="post" action="añadirCesta.php">
                                <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                                <input type="hidden" name="precioCesta" value="<?=$h["precio_AloDes"]?>">
                                <input type="hidden" name="alojamientoCesta" value="2">
                                <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                              </form>
                            </tr>
                          </tbody>
                        </table>
                      </div>                  
          <?php
              }
            }
          ?>
          <?php
                if($contadorIndividual!=0){
                ?>
                    </div>
                  </div>
                <?php
                }
                ?>
          <?php
            $contadorDoble=0;
            foreach($habitacionesLibres as $h){
              if($h["ocupacionMax"]==2){
                if($contadorDoble!=1){
                  $contadorDoble=1;
          ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#doble" aria-expanded="false" aria-controls="doble">
                        Habitaciones dobles
                      </button>
                    </h2>
                    <div id="doble" class="accordion-collapse collapse mt-3" aria-labelledby="headingTwo" data-bs-parent="#acordeon">
              <?php
                }
              ?> 
                      <div class="accordion-body d-lg-flex colorAcordion bordeHabitacion">
                        <div class="col-lg-3 text-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                        <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="reservaTitulo text-center"><?=$h["nombre"]?></h3>
                          <p class="letraReserva"><?=$h["descripcion"]?></p>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-center colorOcupacion d-flex d-flex flex-column justify-content-center align-items-center p-1">
                          <p class="m-0 letraReserva">Ocupación seleccionada:</p>
                          <p class="mb-1 letraReserva"><?=$_SESSION["ocupacionAdulto".$h["numero"]]?> Adultos <?=$_SESSION["ocupacionNino".$h["numero"]]?> niños</p>
                          <form method="post" action="abreModalOcupacionMax.php">
                            <input type="hidden" name="ocupacionMax" value="<?=$h["ocupacionMax"]?>">
                            <input type="hidden" name="numero" value="<?=$h["numero"]?>">
                            <button type="submit" class="btn botonModificar letraReserva">Modificar</button>
                          </form>
                          <p class="letraReserva">(Max <?=$h["ocupacionMax"]?> ocupantes)</p>
                        </div>
                      </div>
                      <div>
                        <table class="table table-success mb-0">
                          <tbody>
                            <tr>
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                              <td class="text-end centrarTabla"><?=$h["precio_Alo"]?>€</td>
                              <form method="post" action="añadirCesta.php">
                                <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                                <input type="hidden" name="precioCesta" value="<?=$h["precio_Alo"]?>">
                                <input type="hidden" name="alojamientoCesta" value="1">
                                <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                              </form>
                            </tr>
                            <tr class="col-2">
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                              <td class="text-end centrarTabla"><?=$h["precio_AloDes"]?>€</td>
                              <form method="post" action="añadirCesta.php">
                                <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                                <input type="hidden" name="precioCesta" value="<?=$h["precio_AloDes"]?>">
                                <input type="hidden" name="alojamientoCesta" value="2">
                                <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                              </form>
                            </tr>
                          </tbody>
                        </table>
                      </div>                  
          <?php
              }
            }
          ?>
          <?php
                if($contadorDoble!=0){
                ?>
                    </div>
                  </div>
                <?php
                }
                ?>
          <?php
            $contadorFamiliar=0;
            foreach($habitacionesLibres as $h){
              if($h["ocupacionMax"]==6){
                if($contadorFamiliar!=1){
                  $contadorFamiliar=1;
          ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#familiares" aria-expanded="false" aria-controls="familiares">
                        Habitaciones Familiares
                      </button>
                    </h2>
                    <div id="familiares" class="accordion-collapse collapse mt-3" aria-labelledby="headingThree" data-bs-parent="#acordeon">
              <?php
                }
              ?> 
                      <div class="accordion-body d-lg-flex colorAcordion bordeHabitacion">
                        <div class="col-lg-3 text-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                        <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="text-center reservaTitulo"><?=$h["nombre"]?></h3>
                          <p class="letraReserva"><?=$h["descripcion"]?></p>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-center colorOcupacion d-flex d-flex flex-column justify-content-center align-items-center p-1">
                          <p class="m-0 letraReserva">Ocupación seleccionada:</p>
                          <p class="mb-1 letraReserva"><?=$_SESSION["ocupacionAdulto".$h["numero"]]?> Adultos <?=$_SESSION["ocupacionNino".$h["numero"]]?> niños</p>
                          <form method="post" action="abreModalOcupacionMax.php">
                            <input type="hidden" name="ocupacionMax" value="<?=$h["ocupacionMax"]?>">
                            <input type="hidden" name="numero" value="<?=$h["numero"]?>">
                            <button type="submit" class="btn botonModificar letraReserva">Modificar</button>
                          </form>
                          <p class="letraReserva">(Max <?=$h["ocupacionMax"]?> ocupantes)</p>
                        </div>
                      </div>
                      <div>
                        <table class="table table-success mb-0">
                          <tbody>
                            <tr>
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                              <td class="text-end centrarTabla"><?=$h["precio_Alo"]?>€</td>
                              <form method="post" action="añadirCesta.php">
                                <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                                <input type="hidden" name="precioCesta" value="<?=$h["precio_Alo"]?>">
                                <input type="hidden" name="alojamientoCesta" value="1">
                                <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                              </form>
                            </tr>
                            <tr class="col-2">
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                              <td class="text-end centrarTabla"><?=$h["precio_AloDes"]?>€</td>
                              <form method="post" action="añadirCesta.php">
                                <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                                <input type="hidden" name="precioCesta" value="<?=$h["precio_AloDes"]?>">
                                <input type="hidden" name="alojamientoCesta" value="2">
                                <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                              </form>
                            </tr>
                          </tbody>
                        </table>
                      </div>
          <?php
              }
            }
          ?>
                <?php
                if($contadorFamiliar!=0){
                ?>
                    </div>
                  </div>
                <?php
                }
                ?>
          <?php
            $contadorTriple=0;
            foreach($habitacionesLibres as $h){
              if($h["ocupacionMax"]==3){
                if($contadorTriple!=1){
                  $contadorTriple=1;
          ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                      <button class="accordion-button collapsed bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#multiples" aria-expanded="false" aria-controls="multiples">
                        Habitaciones triples
                      </button>
                    </h2>
                    <div id="multiples" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#acordeon">
              <?php
                }
              ?>        
                      <div class="accordion-body d-lg-flex colorAcordion bordeHabitacion mt-3">
                        <div class="col-lg-3 text-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                        <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="text-center reservaTitulo"><?=$h["nombre"]?></h3>
                          <p class="letraReserva"><?=$h["descripcion"]?></p>
                        </div>
                        <div class="col-lg-3 col-12 text-lg-center colorOcupacion d-flex d-flex flex-column justify-content-center align-items-center p-1">
                          <p class="m-0 letraReserva">Ocupación seleccionada:</p>
                          <p class="mb-1 letraReserva"><?=$_SESSION["ocupacionAdulto".$h["numero"]]?> Adultos <?=$_SESSION["ocupacionNino".$h["numero"]]?> niños</p>
                          <form method="post" action="abreModalOcupacionMax.php">
                            <input type="hidden" name="ocupacionMax" value="<?=$h["ocupacionMax"]?>">
                            <input type="hidden" name="numero" value="<?=$h["numero"]?>">
                            <button type="submit" class="btn botonModificar letraReserva">Modificar</button>
                          </form>
                          <p class="letraReserva">(Max <?=$h["ocupacionMax"]?> ocupantes)</p>
                        </div>
                      </div>
                      <div>
                        <table class="table table-success mb-0">
                          <tbody>
                            <tr>
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                              <td class="text-end centrarTabla"><?=$h["precio_Alo"]?>€</td>
                              <form method="post" action="añadirCesta.php">
                                <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                                <input type="hidden" name="precioCesta" value="<?=$h["precio_Alo"]?>">
                                <input type="hidden" name="alojamientoCesta" value="1">
                                <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                              </form>
                            </tr>
                            <tr class="col-2">
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                              <td class="text-end centrarTabla"><?=$h["precio_AloDes"]?>€</td>
                              <form method="post" action="añadirCesta.php">
                                <input type="hidden" name="numeroCesta" value="<?=$h["numero"]?>">
                                <input type="hidden" name="precioCesta" value="<?=$h["precio_AloDes"]?>">
                                <input type="hidden" name="alojamientoCesta" value="2">
                                <td><button type="submit" class="btn botonAñadir letraReserva"><i class="bi bi-cart-plus"></i> AÑADIR</button></td>
                              </form>
                            </tr>
                          </tbody>
                        </table>
                      </div>
          <?php
              }
            }
          ?>
                <?php
                if($contadorTriple!=0){
                ?>
                    </div>
                  </div>
                <?php
                }
                ?>


        </div>
      </div>
    </section>

    <?php
    require_once("../vista/footer.php");
    ?>
    
<?php
//Abrimos modal si esta establecida la sesión ocupacionMax
if(isset($_SESSION["ocupacionMax"])){
  $ocupacionMax = $_SESSION["ocupacionMax"];
  echo "<script> $(document).ready(function()
  {
      $('#modalModificar').modal('show');
  }); </script>";
  unset($_SESSION["ocupacionMax"]);
}     
?>
<!-- Modal que se activa al pulsar el boton modificar para modificar la ocupación-->
<div class="modal fade" id="modalModificar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="exampleModalLabel">Ocupación</h5>
        <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="eligeOcupacionMaxima.php">
          <label class="ms-4 ps-1 fw-bold">Adultos</label>
          <div class="d-flex align-items-center mb-2">
            <i class="fas fa-user icono2 pe-1"></i>
            <select class="form-select" name="ocupacionAdulto" aria-label="Default select example">
                <option value="1">1</option>
                <option selected value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
          </div>
          <label class="ms-4 ps-1 fw-bold">Niños</label>
          <div class="d-flex align-items-center mb-2">
            <i class="fas fa-child icono22 pe-1"></i>
            <select class="form-select" name="ocupacionNino" aria-label="Default select example">
              <option selected value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div> 
      </div>
      <div class="modal-footer colorOcupacion">
          <button type="button" class="btn botonModificar letraReserva" data-bs-dismiss="modal">Cerrar</button>
          <input type="hidden" name="ocupacionMax2" value="<?=$ocupacionMax?>">
          <button type="submit" class="btn botonModificar letraReserva">Modificar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Offcanvas que salta al pulsar el boton reservar y contiene la cesta de las habitaciones añadidas-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cesta" aria-labelledby="cesta1">
  <div class="offcanvas-header bg-dark">
    <h5 id="cesta1" class="text-white">MI RESERVA</h5>
    <button type="button" class="btn-close text-reset bg-primary" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body p-0">
    <div class="colorCavas d-flex d-inline align-items-center p-2"><img class="icono me-1" src="../img/cama.png">Habitaciones añadidas (<?=$numeroDeHabitacionesCesta?>)</div>
    <?php 
      //Si la cesta tiene habitaciones la recorremos y mostramos las habitaciones añadidas y calculamos el precio
      //Si no mostramos que la cesta esta vacía
      $contador=1;
      $leerMas=1;
      $suma=1;
      $_SESSION["precioTotal"]=0;
      if ($cesta!=null){
        //Recorremos la cesta y mostramos los datos
        foreach ($cesta as $c) {
          $fechaIngreso = $c->getFechaIngreso();
          $fechaSalida = $c->getFechaSalida();
          $ocupacionCes = $c->getOcupacionSel();
          $alojamientoCes = $c->getFk_TipoAlojamiento();
          $nombreAlojamiento=$baseDatos->nombreTipoAlojamiento($alojamientoCes);   
          $precio = $c->getPrecio();
          $numero = $c->getFk_Numero();

          //Recorremos la lista de habitaciones para que cuando el número de la habitación de la cesta sea igual al número de la habitación
          //De la lista podamos mostrar el nombre de la habitación
          $listaHabitaciones=$_SESSION["listaHabitaciones"];
          foreach($listaHabitaciones as $hl){
            if($hl["numero"]==$c->getFk_Numero()){
            ?>
              <div class="d-flex align-items-center justify-content-between">
                <div class="p-2 pb-0">
                  <h6 class="mb-0 reservaTitulo"><?=$hl["nombre"]?></h6>               
                </div>
                <div class="p-2 pb-0">
                  <form method="post" action="eliminarHabitacion.php">
                    <input type="hidden" name="eliminarFechaIngreso" value="<?=$fechaIngreso?>">
                    <input type="hidden" name="eliminarFechaSalida" value="<?=$fechaSalida?>">
                    <input type="hidden" name="eliminarNumero" value="<?=$numero?>">
                    <td><button type="submit" class="btn pb-0"><i class="bi bi-trash-fill text-danger"></i></button></td>
                  </form>
                </div>
              </div>
            <?php 
            }    
          }
    ?>
          <div class="bordeCanvas p-2 pt-0">
            <!--Leer mas y ocultar texto-->
    <?php 
            $miCheck1=$leerMas;
            $miCheck2=$leerMas+1;
            echo "<input type='button' onclick='leerMas(".$contador.")' class='leermas p-0' id='".$miCheck1."' value='Ver detalles' />";
            echo "<input type='button' onclick='leerMas(".$contador.")' class='leermas p-0' id='".$miCheck2."' value='Ocultar Detalles' />";        
            echo "<span id='mastexto".$contador."'>";
    ?>
              
                <div class="d-flex justify-content-between">
                  <p class="mb-0">Entrada:</p>
                  <p class="mb-0"><?=$fechaIngreso?></p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-0">Salida:</p>
                  <p class="mb-0"><?=$fechaSalida?></p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-0">Régimen:</p>
                  <p class="mb-0"><?=$nombreAlojamiento[0]?></p>
                </div>
                <div class="d-flex justify-content-between">
                  <p class="mb-0">Ocupación:</p>
                  <p class="mb-0"><?=$ocupacionCes?></p>
                </div>
              </span>
          </div>
    <?php
        $leerMas= $leerMas+2;
        $contador++;
          if($_SESSION["noches"]->days==0){
            $_SESSION["precioTotal"]=$_SESSION["precioTotal"]+$precio;
          }else{
            $_SESSION["precioTotal"]=($_SESSION["precioTotal"]+$precio)*$_SESSION["noches"]->days;
          }
        }
        echo "<script> ocultarDatos('$numeroDeHabitacionesCesta'); </script>";
        
      ?>
        <div class="colorTotal p-2">
          <h6 class="text-center reservaTitulo">TOTAL DE LA RESERVA <?=$_SESSION["precioTotal"]?>€</h6>
          <!-- Al pulsar el boton Reserva Ahora se dirigirá al formulario de Reserva.html-->
          <a type="button" href="reserva_controlador.php" class="btn botonAñadir letraReserva d-flex justify-content-center align-items-center">!RESERVAR AHORA¡</a>
        </div>
    <?php
      }
    ?>
  </div>
</div>

</body>
</html>