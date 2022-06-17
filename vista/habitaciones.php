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
    <title>Habitaciones</title>
</head>
<body>
  <div class="colorRojo lineaSepara">
      <div class="container p-1 d-flex justify-content-around">
          <div class="d-flex align-items-center"> 
          <?php 
              if(isset($_SESSION["usuarioEmpleado"])){
                $nombreTra = $_SESSION["usuarioEmpleado"]->getNombre();
          ?>
                <p class="m-0 cabeceraLetra">Aquí puedes ver las habitaciones del Hotel Viriato, <?=$nombreTra?></p>
          <?php 
              }else if(isset($_SESSION["usuarioCliente"])){
                $nombreCli = $_SESSION["usuarioCliente"]->getNombre();;
          ?>
                <p class="m-0 cabeceraLetra">Aquí puedes ver las habitaciones del Hotel Viriato, <?=$nombreCli?></p>
          <?php 
              }else{
          ?>
                <p class="m-0 cabeceraLetra">Aquí puedes ver las habitaciones del Hotel Viriato</p>
          <?php 
              }
          ?>                                          
          </div>           
      </div>
  </div>
  <?php
      require_once("../vista/header.php");
  ?>
  <section class="colorEligeHabitacion pt-5 pb-5">
    <div class="container bg-white p-3">
      <h2 class="bordeHabitacion mb-0 pb-2 text-center letraEditar">HABITACIONES</h2>
      <?php        
        foreach($listaHabitaciones as $h){
      ?> 
          <div class="p-4 d-lg-flex colorAcordion bordeHabitacion">
            <div class="col-lg-3 text-center d-flex align-items-center"><img src="../img/habitaciones/<?=$h["imagen"]?>" class="w-100 p-lg-0 px-5" alt="foto2"></div>
            <div class="px-lg-3 pt-lg-0 pt-2"><h3 class="text-center reservaTitulo"><?=$h["nombre"]?></h3>
              <p class="letraReserva mb-0"><?=$h["descripcion"]?></p>
              <p class="letraReserva fw-bold mb-0">La ocupación máxima de la habitación es de: <?=$h["ocupacionMax"]?> personas</p>
            </div>
          </div>
      <?php
        }
      ?>
    </div>
  </section>
  <?php
  require_once("footer.php");
  ?>


</body>
</html>