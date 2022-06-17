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
    <title>Ofertas</title>
</head>
<body class="body1">
  <div class="colorRojo lineaSepara">
      <div class="container p-1 d-flex justify-content-around">
          <div class="d-flex align-items-center"> 
          <?php 
              if(isset($_SESSION["usuarioEmpleado"])){
                $nombreTra = $_SESSION["usuarioEmpleado"]->getNombre();
          ?>
                <p class="m-0 cabeceraLetra"><?=$nombreTra?> en esta página se pueden ver las ofertas del Hotel Viriato</p>
          <?php 
              }else if(isset($_SESSION["usuarioCliente"])){
                $nombreCli = $_SESSION["usuarioCliente"]->getNombre();;
          ?>
                <p class="m-0 cabeceraLetra"><?=$nombreCli?> en esta página se pueden ver las ofertas del Hotel Viriato</p>
          <?php 
              }else{
          ?>
                <p class="m-0 cabeceraLetra">En esta página se pueden ver las ofertas del Hotel Viriato</p>
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
            <h2 class="mb-0 pb-2 text-center letraEditar">Ofertas del Hotel Viriato</h2>        
            <div class=" d-flex justify-content-center flex-column bordeHabitacion mb-2">
                <p class="text-center">Presume del hotel Viriato en Sevilla, hotel céntrico al precio más bajo online disponible. Reserva ahora con las ofertas y promociones del Hotel Viriato en Sevilla que encontrarás en exclusiva aquí y disfruta de las garantías y descuentos especiales del hotel en Sevilla que sólo nuestra web oficial puede ofrecerte.</p>
            </div>
            <div class="d-sm-flex justify-content-sm-center d-flex justify-content-center flex-wrap"> 
                <div id="Tamaño2" class="m-2">
                    <div class="tamañoCajaImagen2">
                        <img class="imagenReserva2" src="../img/habitaciones/17.jpg">                        
                    </div>
                    <p class="fs-4 fw-bold text-center mb-0">Enero</p>
                    <p class="fs-6 mb-0 cambiar me-1">Precio desde</p>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación doble</p>
                        <p class="fs-5 fw-bold mb-0 me-1">35€</p>
                    </div>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación familiar</p>
                        <p class="fs-5 fw-bold mb-0 me-1">55€</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="fs-5 mb-0 ms-1">Habitación triple</p>
                        <p class="fs-5 fw-bold mb-0 me-1">45€</p>
                    </div>
                </div>
                <div id="Tamaño2" class="m-2">
                    <div class="tamañoCajaImagen2">
                        <img class="imagenReserva2" src="../img/habitaciones/17.jpg">                        
                    </div>
                    <p class="fs-4 fw-bold text-center mb-0">Febrero</p>
                    <p class="fs-6 mb-0 cambiar me-1">Precio desde</p>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación doble</p>
                        <p class="fs-5 fw-bold mb-0 me-1">38€</p>
                    </div>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación familiar</p>
                        <p class="fs-5 fw-bold mb-0 me-1">60€</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="fs-5 mb-0 ms-1">Habitación triple</p>
                        <p class="fs-5 fw-bold mb-0 me-1">50€</p>
                    </div>
                </div>
                <div id="Tamaño2" class="m-2">
                    <div class="tamañoCajaImagen2">
                        <img class="imagenReserva2" src="../img/habitaciones/17.jpg">                        
                    </div>
                    <p class="fs-4 fw-bold text-center mb-0">Marzo</p>
                    <p class="fs-6 mb-0 cambiar me-1">Precio desde</p>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación doble</p>
                        <p class="fs-5 fw-bold mb-0 me-1">38€</p>
                    </div>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación familiar</p>
                        <p class="fs-5 fw-bold mb-0 me-1">60€</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="fs-5 mb-0 ms-1">Habitación triple</p>
                        <p class="fs-5 fw-bold mb-0 me-1">50€</p>
                    </div>
                </div>
                <div id="Tamaño2" class="m-2">
                    <div class="tamañoCajaImagen2">
                        <img class="imagenReserva2" src="../img/habitaciones/17.jpg">                        
                    </div>
                    <p class="fs-4 fw-bold text-center mb-0">Abril</p>
                    <p class="fs-6 mb-0 cambiar me-1">Precio desde</p>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación doble</p>
                        <p class="fs-5 fw-bold mb-0 me-1">40€</p>
                    </div>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación familiar</p>
                        <p class="fs-5 fw-bold mb-0 me-1">60€</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="fs-5 mb-0 ms-1">Habitación triple</p>
                        <p class="fs-5 fw-bold mb-0 me-1">55€</p>
                    </div>
                </div>
                <div id="Tamaño2" class="m-2">
                    <div class="tamañoCajaImagen2">
                        <img class="imagenReserva2" src="../img/habitaciones/17.jpg">                        
                    </div>
                    <p class="fs-4 fw-bold text-center mb-0">Mayo</p>
                    <p class="fs-6 mb-0 cambiar me-1">Precio desde</p>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación doble</p>
                        <p class="fs-5 fw-bold mb-0 me-1">40€</p>
                    </div>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación familiar</p>
                        <p class="fs-5 fw-bold mb-0 me-1">60€</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="fs-5 mb-0 ms-1">Habitación triple</p>
                        <p class="fs-5 fw-bold mb-0 me-1">55€</p>
                    </div>
                </div>
                <div id="Tamaño2" class="m-2">
                    <div class="tamañoCajaImagen2">
                        <img class="imagenReserva2" src="../img/habitaciones/17.jpg">                        
                    </div>
                    <p class="fs-4 fw-bold text-center mb-0">Junio</p>
                    <p class="fs-6 mb-0 cambiar me-1">Precio desde</p>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación doble</p>
                        <p class="fs-5 fw-bold mb-0 me-1">42€</p>
                    </div>
                    <div class="d-flex justify-content-between cambiar">
                        <p class="fs-5 mb-0 ms-1">Habitación familiar</p>
                        <p class="fs-5 fw-bold mb-0 me-1">62€</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="fs-5 mb-0 ms-1">Habitación triple</p>
                        <p class="fs-5 fw-bold mb-0 me-1">57€</p>
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