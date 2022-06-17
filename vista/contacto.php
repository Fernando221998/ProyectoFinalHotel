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
    <title>Contacto</title>
</head>
<body class="body1">
  <div class="colorRojo lineaSepara">
      <div class="container p-1 d-flex justify-content-around">
          <div class="d-flex align-items-center"> 
          <?php 
              if(isset($_SESSION["usuarioEmpleado"])){
                $nombreTra = $_SESSION["usuarioEmpleado"]->getNombre();
          ?>
                <p class="m-0 cabeceraLetra"><?=$nombreTra?> en esta página puedes ponerte en contacto con el Hotel Viriato</p>
          <?php 
              }else if(isset($_SESSION["usuarioCliente"])){
                $nombreCli = $_SESSION["usuarioCliente"]->getNombre();;
          ?>
                <p class="m-0 cabeceraLetra"><?=$nombreCli?> en esta página puedes ponerte en contacto con el Hotel Viriato</p>
          <?php 
              }else{
          ?>
                <p class="m-0 cabeceraLetra">En esta página puedes ponerte en contacto con el Hotel Viriato</p>
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
            <h2 class="mb-0 pb-2 text-center letraEditar">Contacto Hotel Viriato</h2>        
            <div class=" d-flex justify-content-center flex-column">
                <p class="text-center">Para ponerte en contacto con el Hotel Viriato de Sevilla solo tienes que rellenar el formulario web que encontrarás unas líneas más abajo y uno de los responsables de nuestra web oficial te responderá de forma personalizada. Estamos a tu disposición para acompañarte en todo el proceso de reserva de nuestro hotel en Sevilla, con las máximas garantías y atención permanente.</p>
                <p class="text-center mb-0">Correo electrónico:</p>
                <p class="text-center mb-4 pb-2 bordeHabitacion">recepcion@hotelviriato.es</p>
            </div>
            <form class="row g-3 needs-validation d-flex justify-content-center bg-white" novalidate method="POST" action="#">
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarNombre" class="form-label negritaform">Nombre</label>
                    <input type="text" class="form-control" name="editarNombre" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,25}" maxlength="25" id="editarNombre" required>
                    <div class="invalid-feedback">
                        Nombre no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarApellidos" class="form-label negritaform">Apellidos</label>
                    <input type="text" class="form-control" name="editarApellidos" placeholder="Cornejo Hernández" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,50}"  maxlength="50" id="editarApellidos" required>
                    <div class="invalid-feedback">
                        Apellidos no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarEmail" class="form-label negritaform">Correo electrónico</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text bg-primary text-white" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" name="editarEmail" placeholder="fernando@gmail.com" maxlength="100" pattern="[a-zA-Z0-9._]+@[a-z0-9.]+\.[a-z]{2,4}$" id="editarEmail" aria-describedby="inputGroupPrepend"  maxlength="100" required>
                        <div class="invalid-feedback">
                            No es un email valido. Ejemplo de email valido: fernando@gmail.com
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarTelefono" class="form-label negritaform">Teléfono</label>
                    <input type="text" class="form-control" name="editarTelefono" placeholder="+34 677498596" pattern="\+[0-9]{1,4} [0-9]{9}" id="editarTelefono" required>
                    <div class="invalid-feedback">
                        Número no valido. Desbes de añadir un espacio entre el prefijo y el número
                    </div>
                </div>
                <div class="form-floating ps-3 pe-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px" required></textarea>
                    <label for="floatingTextarea2" class="ps-4 pe-3">Comentario</label>
                    <div class="invalid-feedback">
                        Rellene el campo
                    </div>
                </div>
                
                <div class="col-md-12 mb-3 d-flex justify-content-center align-items-center">
                    <!-- Efecto con transition en boton enviar-->
                    <button class="btn botonReserva letraReserva2" type="submit">ENVIAR</button>
                </div>
            </form>
        </div>
    </section>
  <?php
  require_once("footer.php");
  ?>
<script type="text/javascript" src="../js/validacionFormulario.js"></script>
</body>
</html>