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
    <title>Servicios</title>
</head>
<body class="body1">
  <div class="colorRojo lineaSepara">
      <div class="container p-1 d-flex justify-content-around">
          <div class="d-flex align-items-center"> 
          <?php 
              if(isset($_SESSION["usuarioEmpleado"])){
                $nombreTra = $_SESSION["usuarioEmpleado"]->getNombre();
          ?>
                <p class="m-0 cabeceraLetra"><?=$nombreTra?> en esta página se pueden ver los servicios del Hotel Viriato</p>
          <?php 
              }else if(isset($_SESSION["usuarioCliente"])){
                $nombreCli = $_SESSION["usuarioCliente"]->getNombre();;
          ?>
                <p class="m-0 cabeceraLetra"><?=$nombreCli?> en esta página se pueden ver los servicios del Hotel Viriato</p>
          <?php 
              }else{
          ?>
                <p class="m-0 cabeceraLetra">En esta página se pueden ver los servicios del Hotel Viriato</p>
          <?php 
              }
          ?>                                          
          </div>           
      </div>
  </div>
  <?php
      require_once("../vista/header.php");
  ?>
    <section class="colorEligeHabitacion1 pt-5 pb-5">
        <div class="container bg-white p-3">
            <h2 class="mb-0 pb-2 text-center letraEditar">Servicios del Hotel Viriato</h2>        
            <div class=" d-flex justify-content-center flex-column bordeHabitacion mb-2">
                <p class="text-center">Los servicios del Hotel Viriato de Sevilla se han diseñado para que puedas complementar tu estancia en Sevilla con atenciones a tu medida, adaptadas a tus necesidades como cafetería, desayunos buffet, parking privado con una plaza gratis por habitación si reservas en esta web oficial, atención y recepción 24 horas, WiFi gratis, guarda equipaje, salones para eventos, salida tardía del hotel, traslados al aeropuerto bajo disponibilidad en dos vehículos que tienen diferente capacidad… y, además, el hotel admite el alojamiento para mascotas de hasta 10 kilos.</p>
            </div>
            <div class="d-sm-flex justify-content-sm-center d-flex justify-content-center flex-wrap"> 
                <div id="Tamaño1" class="m-2">
                    <div class="tamañoCajaImagen1">
                        <img class="imagenReserva1" src="../img/servicios/wifi.jpg">
                        <p class="Libre1 fs-3 fw-bold">WIFI GRATUITO</p>
                        <p class="Libre2 fs-6 fw-bold">Conéctate desde cualquier punto del hotel totalmente gratis.</p>  
                    </div>
                </div>
                <div id="Tamaño1" class="m-2">
                    <div class="tamañoCajaImagen1">
                        <img class="imagenReserva1" src="../img/servicios/equipaje.jpg">
                        <p class="Libre1 fs-3 fw-bold">CONSIGNA DE EQUIPAJE</p>
                        <p class="Libre2 fs-6 fw-bold">Disfruta de Sevilla en todo momento de tu estancia y hasta el último minuto con el servicio de guarda equipaje.</p>  
                    </div>
                </div>
                <div id="Tamaño1" class="m-2">
                    <div class="tamañoCajaImagen1">
                        <img class="imagenReserva1" src="../img/servicios/ani.jpg">
                        <p class="Libre3 fs-3 fw-bold">ALOJAMIENTO PARA TUS MASCOTAS</p>
                        <p class="Libre4 fs-6 fw-bold">Viaja a Sevilla con tu animal de compañía. Tiene un cargo extra de 20 euros por noche. Hasta 10 kg.</p>  
                    </div>
                </div>
                <div id="Tamaño1" class="m-2">
                    <div class="tamañoCajaImagen1">
                        <img class="imagenReserva1" src="../img/servicios/info.jpg">
                        <p class="Libre1 fs-3 fw-bold">INFORMACIÓN TURÍSTICA</p>
                        <p class="Libre2 fs-6 fw-bold">Te asesoramos con todo lo que quieras conocer de Sevilla. Estamos a tu entera disposición.</p>  
                    </div>
                </div>
                <div id="Tamaño1" class="m-2">
                    <div class="tamañoCajaImagen1">
                        <img class="imagenReserva1" src="../img/servicios/parking.jpg">
                        <p class="Libre1 fs-3 fw-bold">PARKING PRIVADO</p>
                        <p class="Libre2 fs-6 fw-bold">Tenemos a tu disposición 102 plazas, una plaza por cada habitación. El coste es de 5 euros por día.</p>  
                    </div>
                </div>
                <div id="Tamaño1" class="m-2">
                    <div class="tamañoCajaImagen1">
                        <img class="imagenReserva1" src="../img/servicios/buffet-hotel.jpg">
                        <p class="Libre1 fs-3 fw-bold">DESAYUNOS BUFFET DIARIOS</p>
                        <p class="Libre2 fs-6 fw-bold">Para levantarse con la mejor energía. De estilo buffet, tienen un coste extra de 8 euros por día y persona.</p>  
                    </div>
                </div>
            </div>
        </div>
    </section>
  <?php
  require_once("footer.php");
  ?>

</body>
</html>