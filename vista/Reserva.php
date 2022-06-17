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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/selectPaisSeleccionar.js"></script>
    <title>Reserva</title>
</head>
<body>

    <?php
        $_SESSION["usutra"]="bordefijo";
        require_once("../vista/header.php");
        unset($_SESSION["usutra"]);
    ?>

    <!-- Bloque formulario reserva y validación del formulario-->
    <section class="colorReserva pt-3 pb-3">
        <div class="container pt-4">
            <form class="row g-3 needs-validation d-flex justify-content-center bg-white" novalidate method="POST" action="confirmarReserva.php">
            
                <div class="d-flex align-items-center pb-3">
                    <div class="right2 active d-flex align-items-center justify-content-center"><img class="icono me-1" src="../img/cama2.png">Habitaciones</div>
                    <div class="left2 d-flex align-items-center justify-content-center"><i class="bi bi-check-circle pe-1"></i>Confirmación</div>
                </div>  
                
                <h2 class="ps-3 letraReserva2 text-center">RESERVA</h2>
                <h4 class="ps-3 reservadatos">Datos personales</h4>
                <input type="hidden" name="editarUsuario" value="<?=$usuarioCli?>">
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarNombre" class="form-label negritaform">Nombre</label>
                    <input type="text" class="form-control" name="editarNombre" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,25}" maxlength="25" id="editarNombre" required value="<?=$nombreCli?>">
                    <div class="invalid-feedback">
                        Nombre no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarApellidos" class="form-label negritaform">Apellidos</label>
                    <input type="text" class="form-control" name="editarApellidos" placeholder="Cornejo Hernández" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,50}"  maxlength="50" id="editarApellidos" required value="<?=$apellidosCli?>">
                    <div class="invalid-feedback">
                        Apellidos no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarEmail" class="form-label negritaform">Cambiar email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text bg-primary text-white" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" name="editarEmail" placeholder="fernando@gmail.com" maxlength="100" pattern="[a-zA-Z0-9._]+@[a-z0-9.]+\.[a-z]{2,4}$" id="editarEmail" aria-describedby="inputGroupPrepend"  maxlength="100" required value="<?=$emailCli?>">
                        <div class="invalid-feedback">
                            No es un email valido. Ejemplo de email valido: fernando@gmail.com
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarDNI" class="form-label negritaform">DNI/NIF/NIE</label>
                    <input type="text" class="form-control" name="editarDNI" placeholder="11111111H" pattern="[0-9]{8}[A-Za-z]{1}" id="editarDNI" required value="<?=$dniCli?>">
                    <div class="invalid-feedback">
                        DNI no valido.
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarTelefono" class="form-label negritaform">Teléfono</label>
                    <input type="text" class="form-control" name="editarTelefono" placeholder="+34 677498596" pattern="\+[0-9]{1,4} [0-9]{9}" id="editarTelefono" required value="<?=$telefonoCli?>">
                    <div class="invalid-feedback">
                        Número no valido. Desbes de añadir un espacio entre el prefijo y el número
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarDireccion" class="form-label negritaform">Dirección</label>
                    <input type="text" class="form-control" name="editarDireccion" placeholder="Calle brasil - numero 4" pattern="[^\s][0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,-]+[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,200}"  maxlength="200" id="editarDireccion" required value="<?=$direccionCli?>">
                    <div class="invalid-feedback">
                        Dirección incorrecta. Debes poner mínimo 3 caracteres y un máximo de 200 y no añadir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarCiudad" class="form-label negritaform">Ciudad</label>
                    <input type="text" class="form-control" name="editarCiudad" placeholder="Sevilla" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,50}" id="editarCiudad"  maxlength="50" required value="<?=$ciudadCli?>">
                    <div class="invalid-feedback">
                        Ciudad incorrecta. Debes poner mínimo 3 caracteres y un máximo de 50 y no añadir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarCodPostal" class="form-label negritaform">Código postal</label>
                    <input type="text" class="form-control" name="editarCodPostal" placeholder="41004" pattern="[0-9]{4,8}" id="editarCodPostal" required value="<?=$codigoPostalCli?>">
                    <div class="invalid-feedback">
                        Código postal incorrecto. Debe contener mínimo 4 números y máximo 8.
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="editarPais" class="form-label negritaform">País</label>
                    <select class="form-select" id="editarPais" name="editarPais" required>
                        <option value="">Seleccione un país</option>
                        <option value="Afganistán" id="AF">Afganistán</option>
                        <option value="Albania" id="AL">Albania</option>
                        <option value="Alemania" id="DE">Alemania</option>
                        <option value="Andorra" id="AD">Andorra</option>
                        <option value="Angola" id="AO">Angola</option>
                        <option value="Anguila" id="AI">Anguila</option>
                        <option value="Antártida" id="AQ">Antártida</option>
                        <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                        <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                        <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                        <option value="Argelia" id="DZ">Argelia</option>
                        <option value="Argentina" id="AR">Argentina</option>
                        <option value="Armenia" id="AM">Armenia</option>
                        <option value="Aruba" id="AW">Aruba</option>
                        <option value="Australia" id="AU">Australia</option>
                        <option value="Austria" id="AT">Austria</option>
                        <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                        <option value="Bahamas" id="BS">Bahamas</option>
                        <option value="Bahrein" id="BH">Bahrein</option>
                        <option value="Bangladesh" id="BD">Bangladesh</option>
                        <option value="Barbados" id="BB">Barbados</option>
                        <option value="Bélgica" id="BE">Bélgica</option>
                        <option value="Belice" id="BZ">Belice</option>
                        <option value="Benín" id="BJ">Benín</option>
                        <option value="Bermudas" id="BM">Bermudas</option>
                        <option value="Bhután" id="BT">Bhután</option>
                        <option value="Bielorrusia" id="BY">Bielorrusia</option>
                        <option value="Birmania" id="MM">Birmania</option>
                        <option value="Bolivia" id="BO">Bolivia</option>
                        <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                        <option value="Botsuana" id="BW">Botsuana</option>
                        <option value="Brasil" id="BR">Brasil</option>
                        <option value="Brunei" id="BN">Brunei</option>
                        <option value="Bulgaria" id="BG">Bulgaria</option>
                        <option value="Burkina Faso" id="BF">Burkina Faso</option>
                        <option value="Burundi" id="BI">Burundi</option>
                        <option value="Cabo Verde" id="CV">Cabo Verde</option>
                        <option value="Camboya" id="KH">Camboya</option>
                        <option value="Camerún" id="CM">Camerún</option>
                        <option value="Canadá" id="CA">Canadá</option>
                        <option value="Chad" id="TD">Chad</option>
                        <option value="Chile" id="CL">Chile</option>
                        <option value="China" id="CN">China</option>
                        <option value="Chipre" id="CY">Chipre</option>
                        <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                        <option value="Colombia" id="CO">Colombia</option>
                        <option value="Comores" id="KM">Comores</option>
                        <option value="Congo" id="CG">Congo</option>
                        <option value="Corea" id="KR">Corea</option>
                        <option value="Corea del Norte" id="KP">Corea del Norte</option>
                        <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                        <option value="Costa Rica" id="CR">Costa Rica</option>
                        <option value="Croacia" id="HR">Croacia</option>
                        <option value="Cuba" id="CU">Cuba</option>
                        <option value="Dinamarca" id="DK">Dinamarca</option>
                        <option value="Djibouri" id="DJ">Djibouri</option>
                        <option value="Dominica" id="DM">Dominica</option>
                        <option value="Ecuador" id="EC">Ecuador</option>
                        <option value="Egipto" id="EG">Egipto</option>
                        <option value="El Salvador" id="SV">El Salvador</option>
                        <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                        <option value="Eritrea" id="ER">Eritrea</option>
                        <option value="Eslovaquia" id="SK">Eslovaquia</option>
                        <option value="Eslovenia" id="SI">Eslovenia</option>
                        <option value="España" id="ES">España</option>
                        <option value="Estados Unidos" id="US">Estados Unidos</option>
                        <option value="Estonia" id="EE">Estonia</option>
                        <option value="c" id="ET">Etiopía</option>
                        <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
                        <option value="Filipinas" id="PH">Filipinas</option>
                        <option value="Finlandia" id="FI">Finlandia</option>
                        <option value="Francia" id="FR">Francia</option>
                        <option value="Gabón" id="GA">Gabón</option>
                        <option value="Gambia" id="GM">Gambia</option>
                        <option value="Georgia" id="GE">Georgia</option>
                        <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
                        <option value="Ghana" id="GH">Ghana</option>
                        <option value="Gibraltar" id="GI">Gibraltar</option>
                        <option value="Granada" id="GD">Granada</option>
                        <option value="Grecia" id="GR">Grecia</option>
                        <option value="Groenlandia" id="GL">Groenlandia</option>
                        <option value="Guadalupe" id="GP">Guadalupe</option>
                        <option value="Guam" id="GU">Guam</option>
                        <option value="Guatemala" id="GT">Guatemala</option>
                        <option value="Guayana" id="GY">Guayana</option>
                        <option value="Guayana francesa" id="GF">Guayana francesa</option>
                        <option value="Guinea" id="GN">Guinea</option>
                        <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                        <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                        <option value="Haití" id="HT">Haití</option>
                        <option value="Holanda" id="NL">Holanda</option>
                        <option value="Honduras" id="HN">Honduras</option>
                        <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                        <option value="Hungría" id="HU">Hungría</option>
                        <option value="India" id="IN">India</option>
                        <option value="Indonesia" id="ID">Indonesia</option>
                        <option value="Irak" id="IQ">Irak</option>
                        <option value="Irán" id="IR">Irán</option>
                        <option value="Irlanda" id="IE">Irlanda</option>
                        <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                        <option value="Isla Christmas" id="CX">Isla Christmas</option>
                        <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                        <option value="Islandia" id="IS">Islandia</option>
                        <option value="Islas Caimán" id="KY">Islas Caimán</option>
                        <option value="Islas Cook" id="CK">Islas Cook</option>
                        <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                        <option value="Islas Faroe" id="FO">Islas Faroe</option>
                        <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                        <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                        <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                        <option value="Islas Marshall" id="MH">Islas Marshall</option>
                        <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                        <option value="Islas Palau" id="PW">Islas Palau</option>
                        <option value="Islas Salomón" d="SB">Islas Salomón</option>
                        <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                        <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                        <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                        <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
                        <option value="Israel" id="IL">Israel</option>
                        <option value="Italia" id="IT">Italia</option>
                        <option value="Jamaica" id="JM">Jamaica</option>
                        <option value="Japón" id="JP">Japón</option>
                        <option value="Jordania" id="JO">Jordania</option>
                        <option value="Kazajistán" id="KZ">Kazajistán</option>
                        <option value="Kenia" id="KE">Kenia</option>
                        <option value="Kirguizistán" id="KG">Kirguizistán</option>
                        <option value="Kiribati" id="KI">Kiribati</option>
                        <option value="Kuwait" id="KW">Kuwait</option>
                        <option value="Laos" id="LA">Laos</option>
                        <option value="Lesoto" id="LS">Lesoto</option>
                        <option value="Letonia" id="LV">Letonia</option>
                        <option value="Líbano" id="LB">Líbano</option>
                        <option value="Liberia" id="LR">Liberia</option>
                        <option value="Libia" id="LY">Libia</option>
                        <option value="Liechtenstein" id="LI">Liechtenstein</option>
                        <option value="Lituania" id="LT">Lituania</option>
                        <option value="Luxemburgo" id="LU">Luxemburgo</option>
                        <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                        <option value="Madagascar" id="MG">Madagascar</option>
                        <option value="Malasia" id="MY">Malasia</option>
                        <option value="Malawi" id="MW">Malawi</option>
                        <option value="Maldivas" id="MV">Maldivas</option>
                        <option value="Malí" id="ML">Malí</option>
                        <option value="Malta" id="MT">Malta</option>
                        <option value="Marruecos" id="MA">Marruecos</option>
                        <option value="Martinica" id="MQ">Martinica</option>
                        <option value="Mauricio" id="MU">Mauricio</option>
                        <option value="Mauritania" id="MR">Mauritania</option>
                        <option value="Mayotte" id="YT">Mayotte</option>
                        <option value="México" id="MX">México</option>
                        <option value="Micronesia" id="FM">Micronesia</option>
                        <option value="Moldavia" id="MD">Moldavia</option>
                        <option value="Mónaco" id="MC">Mónaco</option>
                        <option value="Mongolia" id="MN">Mongolia</option>
                        <option value="Montserrat" id="MS">Montserrat</option>
                        <option value="Mozambique" id="MZ">Mozambique</option>
                        <option value="Namibia" id="NA">Namibia</option>
                        <option value="Nauru" id="NR">Nauru</option>
                        <option value="Nepal" id="NP">Nepal</option>
                        <option value="Nicaragua" id="NI">Nicaragua</option>
                        <option value="Níger" id="NE">Níger</option>
                        <option value="Nigeria" id="NG">Nigeria</option>
                        <option value="Niue" id="NU">Niue</option>
                        <option value="Norfolk" id="NF">Norfolk</option>
                        <option value="Noruega" id="NO">Noruega</option>
                        <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                        <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                        <option value="Omán" id="OM">Omán</option>
                        <option value="Panamá" id="PA">Panamá</option>
                        <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                        <option value="Paquistán" id="PK">Paquistán</option>
                        <option value="Paraguay" id="PY">Paraguay</option>
                        <option value="Perú" id="PE">Perú</option>
                        <option value="Pitcairn" id="PN">Pitcairn</option>
                        <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                        <option value="Polonia" id="PL">Polonia</option>
                        <option value="Portugal" id="PT">Portugal</option>
                        <option value="Puerto Rico" id="PR">Puerto Rico</option>
                        <option value="Qatar" id="QA">Qatar</option>
                        <option value="Reino Unido" id="UK">Reino Unido</option>
                        <option value="República Centroafricana" id="CF">República Centroafricana</option>
                        <option value="República Checa" id="CZ">República Checa</option>
                        <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
                        <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
                        <option value="República Dominicana" id="DO">República Dominicana</option>
                        <option value="Reunión" id="RE">Reunión</option>
                        <option value="Ruanda" id="RW">Ruanda</option>
                        <option value="Rumania" id="RO">Rumania</option>
                        <option value="Rusia" id="RU">Rusia</option>
                        <option value="Samoa" id="WS">Samoa</option>
                        <option value="Samoa occidental" id="AS">Samoa occidental</option>
                        <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                        <option value="San Marino" id="SM">San Marino</option>
                        <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                        <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
                        <option value="Santa Helena" id="SH">Santa Helena</option>
                        <option value="Santa Lucía" id="LC">Santa Lucía</option>
                        <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
                        <option value="Senegal" id="SN">Senegal</option>
                        <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                        <option value="Sychelles" id="SC">Seychelles</option>
                        <option value="Sierra Leona" id="SL">Sierra Leona</option>
                        <option value="Singapur" id="SG">Singapur</option>
                        <option value="Siria" id="SY">Siria</option>
                        <option value="Somalia" id="SO">Somalia</option>
                        <option value="Sri Lanka" id="LK">Sri Lanka</option>
                        <option value="Suazilandia" id="SZ">Suazilandia</option>
                        <option value="Sudán" id="SD">Sudán</option>
                        <option value="Suecia" id="SE">Suecia</option>
                        <option value="Suiza" id="CH">Suiza</option>
                        <option value="Surinam" id="SR">Surinam</option>
                        <option value="Svalbard" id="SJ">Svalbard</option>
                        <option value="Tailandia" id="TH">Tailandia</option>
                        <option value="Taiwán" id="TW">Taiwán</option>
                        <option value="Tanzania" id="TZ">Tanzania</option>
                        <option value="Tayikistán" id="TJ">Tayikistán</option>
                        <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
                        <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                        <option value="Timor Oriental" id="TP">Timor Oriental</option>
                        <option value="Togo" id="TG">Togo</option>
                        <option value="Tonga" id="TO">Tonga</option>
                        <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                        <option value="Túnez" id="TN">Túnez</option>
                        <option value="Turkmenistán" id="TM">Turkmenistán</option>
                        <option value="Turquía" id="TR">Turquía</option>
                        <option value="Tuvalu" id="TV">Tuvalu</option>
                        <option value="Ucrania" id="UA">Ucrania</option>
                        <option value="Uganda" id="UG">Uganda</option>
                        <option value="Uruguay" id="UY">Uruguay</option>
                        <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                        <option value="Vanuatu" id="VU">Vanuatu</option>
                        <option value="Venezuela" id="VE">Venezuela</option>
                        <option value="Vietnam" id="VN">Vietnam</option>
                        <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                        <option value="Yemen" id="YE">Yemen</option>
                        <option value="Zambia" id="ZM">Zambia</option>
                        <option value="Zimbabue" id="ZW">Zimbabue</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione un país.
                    </div>
                </div>
                <h4 class="separacionReserva ps-3 pe-3 pt-3 reservadatos">Metodo de pago</h4>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="titularTarjeta" class="form-label negritaform">Titular de la tarjeta</label>
                    <input type="text" class="form-control" pattern="[^\s][a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]+[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð]{1,50}" maxlength="50" name="titularTarjeta" id="titularTarjeta" required>
                    <div class="invalid-feedback">
                        Titular no valido, no se permiten números, caracteres que no sean letras, dejar el campo vacio ni añadir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6 ps-3 pe-3">
                    <label for="numeroTarjeta" class="form-label negritaform">Número de la tarjeta</label>
                    <input type="text" class="form-control" placeholder="2342 2221 3333 3333" pattern="(([0-9]{4}\s){3}[0-9]{4,4})" name="numeroTarjeta" id="numeroTarjeta" required>
                    <div class="invalid-feedback">
                        Error. Ejemplo: 2342 2221 3333 3333
                    </div>
                </div>
                <div class="col-md-4 ps-3 pe-3">
                    <label for="mes" class="form-label negritaform">Mes de caducidad</label>
                    <select class="form-select" id="mes" name="mes" required>
                        <option selected disabled value="">Seleccione una fecha</option>
                        <option value="1" id="uno">1</option>
                        <option value="2" id="dos">2</option>
                        <option value="3" id="tres">3</option>
                        <option value="4" id="cuatro">4</option>
                        <option value="5" id="cinco">5</option>
                        <option value="6" id="seis">6</option>
                        <option value="7" id="siete">7</option>
                        <option value="8" id="ocho">8</option>
                        <option value="9" id="nueve">9</option>
                        <option value="10" id="diez">10</option>
                        <option value="11" id="once">11</option>
                        <option value="12" id="doce">12</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione un mes.
                    </div>
                </div>
                <div class="col-md-4 ps-3 pe-3">
                    <label for="ano" class="form-label negritaform">Año de caducidad</label>
                    <select class="form-select" id="ano" name="ano" required>
                        <option selected disabled value="">Seleccione un año</option>
                        <option value="2022" id="año1">2022</option>
                        <option value="2023" id="año2">2023</option>
                        <option value="2024" id="año3">2024</option>
                        <option value="2025" id="año4">2025</option>
                        <option value="2026" id="año5">2026</option>
                        <option value="2027" id="año6">2027</option>
                        <option value="2028" id="año7">2028</option>
                        <option value="2029" id="año8">2029</option>
                        <option value="2030" id="año9">2030</option>
                        <option value="2031" id="año10">2031</option>
                        <option value="2032" id="año11">2032</option>
                        <option value="2033" id="año12">2033</option>
                        <option value="2034" id="año13">2034</option>
                    </select>
                    <div class="invalid-feedback">
                        Seleccione un año.
                    </div>
                </div>
                <div class="col-md-4 ps-3 pe-3">
                    <label for="cvv" class="form-label negritaform">CVV</label>
                    <input type="text" class="form-control" placeholder="123" pattern="[0-9]{3,3}" id="cvv" name="cvv" required>
                    <div class="invalid-feedback">
                        Error. Ejemplo: 123
                    </div>
                </div>

                <h4 class="ps-3 pe-3 pt-3 mb-0 separacionReserva reservadatos">Resumen de la reserva</h4>
                <hr>
                <?php
                $numeroCesta=count($cesta);
                $contador=1;
                foreach ($cesta as $c) {
                    $fechaIngreso = $c->getFechaIngreso();
                    $fechaSalida = $c->getFechaSalida();
                    $ocupacionCes = $c->getOcupacionSel();
                    $alojamientoCes = $c->getFk_TipoAlojamiento();
                    $nombreAlojamiento=$baseDatos->nombreTipoAlojamiento($alojamientoCes);   
          
                    //Recorremos la lista de habitaciones para que cuando el número de la habitación de la cesta sea igual al número de la habitación
                    //De la lista podamos mostrar el nombre de la habitación
                    $listaHabitaciones=$_SESSION["listaHabitaciones"];
                    foreach($listaHabitaciones as $hl){
                      if($hl["numero"]==$c->getFk_Numero()){
                      ?>
                        <p class="mb-1 mt-1 ps-3"><strong>Habitación:</strong> <?=$hl["nombre"]?></p>
                      <?php 
                      }    
                    }
                ?>
                    <p class="mb-1 mt-1 ps-3"><strong>Entrada:</strong> <?=$fechaIngreso?></p>
                    <p class="mb-1 mt-1 ps-3"><strong>Salida:</strong> <?=$fechaSalida?></p>
                    <p class="mb-1 mt-1 ps-3"><strong>Ocupación:</strong> <?=$ocupacionCes?></p>
                    <p class="mb-1 mt-1 ps-3"><strong>Régimen:</strong> <?=$nombreAlojamiento[0]?></p>
                    
                <?php
                    if($contador!=$numeroCesta){
                    ?>
                        <hr>
                    <?php
                    }
                    $contador++;
                }
                ?>   
                
                <div class="d-flex justify-content-between align-items-center mt-1 px-0 precioReserva">
                    <p class="ps-3 mb-0 letraReserva2">TOTAL RESERVA</p>
                    <p class="pe-3 mb-0"><?=$_SESSION["precioTotal"]?>€</p>
                </div>
                
                <div class="col-md-12 mb-3 d-flex justify-content-center align-items-center">
                    <!-- Efecto con transition en boton confirmar reserva-->
                    <button class="btn botonReserva letraReserva2" type="submit">CONFIRMAR RESERVA</button>
                </div>
            </form>
        </div>
    </section>

    <?php
    require_once("../vista/footer.php");
    ?>

    <script type="text/javascript" src="../js/validacionFormulario.js"></script>
</body>
</html>