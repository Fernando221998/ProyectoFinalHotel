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
        require_once("../vista/header.php");
    ?>

    <!--Section que contiene los tipos de habitaciones incluidas en un acordion-->
    <section class="colorEligeHabitacion pt-5 pb-5">
      <div class="container bg-white p-3">
      <h2 class="mb-0 pb-2 text-center letraEditar">HABITACIONES LIBRES</h2>
        <div class="d-flex justify-content-center flex-column align-items-center">
            <p class="fw-bold pt-2 mb-0 text-center letraReserva"><?=$_SESSION["numeroDeHabitaciones2"]?> habitaciones disponibles en el Hotel Viriato</p>
            <p class="fw-bold pt-1 letraReserva">Del <?=$_SESSION["fechaEntrada2"]?> al <?=$_SESSION["fechaSalida2"]?> (<?=$_SESSION["noches2"]->days?> noche)</p>
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
                $habitacionesLibres2=$_SESSION["habitacionesLibres2"];
                foreach($habitacionesLibres2 as $h){
              ?> 
                  <div class="accordion-body d-lg-flex colorAcordion bordeHabitacion">
                    <div class="col-lg-3 text-center d-flex align-items-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                    <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="text-center reservaTitulo"><?=$h["nombre"]?></h3>
                        <p class="letraReserva"><?=$h["descripcion"]?></p>
                        <p class="letraReserva fw-bold mb-0">La ocupación máxima de la habitación es de: <?=$h["ocupacionMax"]?> personas</p>
                    </div>
                  </div>
                  <div>
                    <table class="table table-success mb-0">
                      <tbody>
                        <tr>
                            <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                            <td class="text-end centrarTabla pe-5"><?=$h["precio_Alo"]?>€</td>
                        </tr>
                        <tr class="col-2">
                            <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                            <td class="text-end centrarTabla pe-5"><?=$h["precio_AloDes"]?>€</td>
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
            foreach($habitacionesLibres2 as $h){
              if($h["ocupacionMax"]==1){
                if($contadorIndividual!=1){
                  $contadorIndividual=1;
          ?>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#individual" aria-expanded="false" aria-controls="individual">
                        Habitaciones individuales
                      </button>
                    </h2>
                    <div id="individual" class="accordion-collapse collapse mt-3" aria-labelledby="headingTwo" data-bs-parent="#acordeon">
              <?php
                }
              ?> 
                      <div class="accordion-body d-lg-flex colorAcordion bordeHabitacion">
                        <div class="col-lg-3 text-center d-flex align-items-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                        <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="reservaTitulo text-center"><?=$h["nombre"]?></h3>
                            <p class="letraReserva"><?=$h["descripcion"]?></p>
                            <p class="letraReserva fw-bold mb-0">La ocupación máxima de la habitación es de: <?=$h["ocupacionMax"]?> personas</p>
                        </div>
                      </div>
                      <div>
                        <table class="table table-success mb-0">
                          <tbody>
                            <tr>
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                              <td class="text-end centrarTabla pe-5"><?=$h["precio_Alo"]?>€</td>
                            </tr>
                            <tr class="col-2">
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                              <td class="text-end centrarTabla pe-5"><?=$h["precio_AloDes"]?>€</td>
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
            foreach($habitacionesLibres2 as $h){
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
                        <div class="col-lg-3 text-center d-flex align-items-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                        <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="reservaTitulo text-center"><?=$h["nombre"]?></h3>
                            <p class="letraReserva"><?=$h["descripcion"]?></p>
                            <p class="letraReserva fw-bold mb-0">La ocupación máxima de la habitación es de: <?=$h["ocupacionMax"]?> personas</p>
                        </div>
                      </div>
                      <div>
                        <table class="table table-success mb-0">
                          <tbody>
                            <tr>
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                              <td class="text-end centrarTabla pe-5"><?=$h["precio_Alo"]?>€</td>
                            </tr>
                            <tr class="col-2">
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                              <td class="text-end centrarTabla pe-5"><?=$h["precio_AloDes"]?>€</td>
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
            foreach($habitacionesLibres2 as $h){
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
                        <div class="col-lg-3 text-center d-flex align-items-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                        <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="text-center reservaTitulo"><?=$h["nombre"]?></h3>
                          <p class="letraReserva"><?=$h["descripcion"]?></p>
                          <p class="letraReserva fw-bold mb-0">La ocupación máxima de la habitación es de: <?=$h["ocupacionMax"]?> personas</p>
                        </div>
                      </div>
                      <div>
                        <table class="table table-success mb-0">
                          <tbody>
                            <tr>
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                              <td class="text-end centrarTabla pe-5"><?=$h["precio_Alo"]?>€</td>
                            </tr>
                            <tr class="col-2">
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                              <td class="text-end centrarTabla pe-5"><?=$h["precio_AloDes"]?>€</td>
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
            foreach($habitacionesLibres2 as $h){
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
                        <div class="col-lg-3 text-center d-flex align-items-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
                        <div class="px-lg-3 pt-lg-0 pt-3"><h3 class="text-center reservaTitulo"><?=$h["nombre"]?></h3>
                            <p class="letraReserva"><?=$h["descripcion"]?></p>
                            <p class="letraReserva fw-bold mb-0">La ocupación máxima de la habitación es de: <?=$h["ocupacionMax"]?> personas</p>
                        </div>
                      </div>
                      <div>
                        <table class="table table-success mb-0">
                          <tbody>
                            <tr>
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Solo alojamiento</td>
                              <td class="text-end centrarTabla pe-5"><?=$h["precio_Alo"]?>€</td>
                            </tr>
                            <tr class="col-2">
                              <td colspan="2" class="centrarTabla letraReserva"><i class="bi bi-info-circle-fill"></i> Alojamiento y desayuno</td>
                              <td class="text-end centrarTabla pe-5"><?=$h["precio_AloDes"]?>€</td>
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
    

</body>
</html>