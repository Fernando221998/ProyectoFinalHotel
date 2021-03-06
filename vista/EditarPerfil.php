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
    <link href="https://fonts.googleapis.com/css2?family=Redressed&family=Roboto+Mono&family=Rubik:wght@300&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="../js/selectPaisSeleccionar.js"></script>
    <title>Editar Perfil</title>
</head>
<body>
    <?php
        require_once("../swal/swal.php");
                      
        if(isset($_SESSION["usuarioCliente"])){
    ?>
        <div class="colorRojo lineaSepara">
            <div class="container p-1 d-flex justify-content-around">
                <div class="d-flex align-items-center">                   
                    <p class="m-0 cabeceraLetra">Aqui puedes editar tu perfil <?=$nombreCli?></p>               
                </div>           
            </div>
        </div>
    <?php
        }
        $_SESSION["usutra"]="bordefijo";
        require_once("../vista/header.php");
        unset($_SESSION["usutra"]);
    ?>

    <!-- Bloque formulario editar perfil y validaci??n del formulario-->
    <section class="colorFormulario pt-3 pb-3">
        <div class="container pt-4 colorDivFormulario">
            <h2 class="letraEditar text-center">EDITAR PERFIL</h2>
            <p class="text-center letraEditar">Aqui podr??s editar los datos de tu cuenta</p>
            <form class="row g-3 needs-validation d-flex justify-content-center" novalidate method="POST" action="editarPerfilCliente.php">
                <input type="hidden" name="editarUsuario" value="<?=$usuarioCli?>">
                <div class="col-md-6">
                    <label for="editarNombre" class="form-label negritaform">Nombre</label>
                    <input type="text" class="form-control" name="editarNombre" pattern="[^\s][a-zA-Z??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ]+[a-zA-Z???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????]{1,25}" maxlength="25" id="editarNombre" required value="<?=$nombreCli?>">
                    <div class="invalid-feedback cambioColorError">
                        Nombre no valido, no se permiten n??meros, caracteres que no sean letras, dejar el campo vacio ni a??adir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="editarApellidos" class="form-label negritaform">Apellidos</label>
                    <input type="text" class="form-control" name="editarApellidos" placeholder="Cornejo Hern??ndez" pattern="[^\s][a-zA-Z??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ]+[a-zA-Z???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????]{1,50}"  maxlength="50" id="editarApellidos" required value="<?=$apellidosCli?>">
                    <div class="invalid-feedback cambioColorError">
                        Apellidos no valido, no se permiten n??meros, caracteres que no sean letras, dejar el campo vacio ni a??adir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="editarEmail" class="form-label negritaform">Cambiar email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text bg-primary text-white" id="inputGroupPrepend">@</span>
                        <input type="email" class="form-control" name="editarEmail" placeholder="fernando@gmail.com" maxlength="100" pattern="[a-zA-Z0-9._]+@[a-z0-9.]+\.[a-z]{2,4}$" id="editarEmail" aria-describedby="inputGroupPrepend"  maxlength="100" required value="<?=$emailCli?>">
                        <div class="invalid-feedback cambioColorError">
                            No es un email valido. Ejemplo de email valido: fernando@gmail.com
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="editarContrasena" class="form-label negritaform">Cambiar contrase??a</label>
                    <input type="password" class="form-control" name="editarContrasena" id="editarContrasena" pattern="[0-9a-zA-Z???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????*+_.]{1,20}" maxlength="20" required>
                    <div class="invalid-feedback cambioColorError">
                        Debes rellenar el campo y no se pueden a??adir espacios.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="editarDNI" class="form-label negritaform">DNI/NIF/NIE</label>
                    <input type="text" class="form-control" name="editarDNI" placeholder="11111111H" pattern="[0-9]{8}[A-Za-z]{1}" id="editarDNI" required value="<?=$dniCli?>">
                    <div class="invalid-feedback cambioColorError">
                        DNI no valido.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="editarTelefono" class="form-label negritaform">Tel??fono</label>
                    <input type="text" class="form-control" name="editarTelefono" placeholder="+34 677498596" pattern="\+[0-9]{1,4} [0-9]{9}" id="editarTelefono" required value="<?=$telefonoCli?>">
                    <div class="invalid-feedback cambioColorError">
                        N??mero no valido. Desbes de a??adir un espacio entre el prefijo y el n??mero
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="editarDireccion" class="form-label negritaform">Direcci??n</label>
                    <input type="text" class="form-control" name="editarDireccion" placeholder="Calle brasil - numero 4" pattern="[^\s][0-9a-zA-Z??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ,-]+[0-9a-zA-Z???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????]{1,200}"  maxlength="200" id="editarDireccion" required value="<?=$direccionCli?>">
                    <div class="invalid-feedback cambioColorError">
                        Direcci??n incorrecta. Debes poner m??nimo 3 caracteres y un m??ximo de 200 y no a??adir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="editarCiudad" class="form-label negritaform">Ciudad</label>
                    <input type="text" class="form-control" name="editarCiudad" placeholder="Sevilla" pattern="[^\s][a-zA-Z??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????? ]+[a-zA-Z???????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????]{1,50}" id="editarCiudad"  maxlength="50" required value="<?=$ciudadCli?>">
                    <div class="invalid-feedback cambioColorError">
                        Ciudad incorrecta. Debes poner m??nimo 3 caracteres y un m??ximo de 50 y no a??adir espacios al principio o al final.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="editarCodPostal" class="form-label negritaform">C??digo postal</label>
                    <input type="text" class="form-control" name="editarCodPostal" placeholder="41004" pattern="[0-9]{4,8}" id="editarCodPostal" required value="<?=$codigoPostalCli?>">
                    <div class="invalid-feedback cambioColorError">
                        C??digo postal incorrecto. Debe contener m??nimo 4 n??meros y m??ximo 8.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="editarPais" class="form-label negritaform">Pa??s</label>
                    <select class="form-select" id="editarPais" name="editarPais" required>
                        <option value="">Seleccione un pa??s</option>
                        <option value="Afganist??n" id="AF">Afganist??n</option>
                        <option value="Albania" id="AL">Albania</option>
                        <option value="Alemania" id="DE">Alemania</option>
                        <option value="Andorra" id="AD">Andorra</option>
                        <option value="Angola" id="AO">Angola</option>
                        <option value="Anguila" id="AI">Anguila</option>
                        <option value="Ant??rtida" id="AQ">Ant??rtida</option>
                        <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                        <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                        <option value="Arabia Saud??" id="SA">Arabia Saud??</option>
                        <option value="Argelia" id="DZ">Argelia</option>
                        <option value="Argentina" id="AR">Argentina</option>
                        <option value="Armenia" id="AM">Armenia</option>
                        <option value="Aruba" id="AW">Aruba</option>
                        <option value="Australia" id="AU">Australia</option>
                        <option value="Austria" id="AT">Austria</option>
                        <option value="Azerbaiy??n" id="AZ">Azerbaiy??n</option>
                        <option value="Bahamas" id="BS">Bahamas</option>
                        <option value="Bahrein" id="BH">Bahrein</option>
                        <option value="Bangladesh" id="BD">Bangladesh</option>
                        <option value="Barbados" id="BB">Barbados</option>
                        <option value="B??lgica" id="BE">B??lgica</option>
                        <option value="Belice" id="BZ">Belice</option>
                        <option value="Ben??n" id="BJ">Ben??n</option>
                        <option value="Bermudas" id="BM">Bermudas</option>
                        <option value="Bhut??n" id="BT">Bhut??n</option>
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
                        <option value="Camer??n" id="CM">Camer??n</option>
                        <option value="Canad??" id="CA">Canad??</option>
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
                        <option value="Costa del Marf??l" id="CI">Costa del Marf??l</option>
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
                        <option value="Espa??a" id="ES">Espa??a</option>
                        <option value="Estados Unidos" id="US">Estados Unidos</option>
                        <option value="Estonia" id="EE">Estonia</option>
                        <option value="c" id="ET">Etiop??a</option>
                        <option value="Ex-Rep??blica Yugoslava de Macedonia" id="MK">Ex-Rep??blica Yugoslava de Macedonia</option>
                        <option value="Filipinas" id="PH">Filipinas</option>
                        <option value="Finlandia" id="FI">Finlandia</option>
                        <option value="Francia" id="FR">Francia</option>
                        <option value="Gab??n" id="GA">Gab??n</option>
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
                        <option value="Hait??" id="HT">Hait??</option>
                        <option value="Holanda" id="NL">Holanda</option>
                        <option value="Honduras" id="HN">Honduras</option>
                        <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                        <option value="Hungr??a" id="HU">Hungr??a</option>
                        <option value="India" id="IN">India</option>
                        <option value="Indonesia" id="ID">Indonesia</option>
                        <option value="Irak" id="IQ">Irak</option>
                        <option value="Ir??n" id="IR">Ir??n</option>
                        <option value="Irlanda" id="IE">Irlanda</option>
                        <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                        <option value="Isla Christmas" id="CX">Isla Christmas</option>
                        <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                        <option value="Islandia" id="IS">Islandia</option>
                        <option value="Islas Caim??n" id="KY">Islas Caim??n</option>
                        <option value="Islas Cook" id="CK">Islas Cook</option>
                        <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                        <option value="Islas Faroe" id="FO">Islas Faroe</option>
                        <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                        <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                        <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                        <option value="Islas Marshall" id="MH">Islas Marshall</option>
                        <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                        <option value="Islas Palau" id="PW">Islas Palau</option>
                        <option value="Islas Salom??n" d="SB">Islas Salom??n</option>
                        <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                        <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                        <option value="Islas V??rgenes EE.UU." id="VI">Islas V??rgenes EE.UU.</option>
                        <option value="Islas V??rgenes Reino Unido" id="VG">Islas V??rgenes Reino Unido</option>
                        <option value="Israel" id="IL">Israel</option>
                        <option value="Italia" id="IT">Italia</option>
                        <option value="Jamaica" id="JM">Jamaica</option>
                        <option value="Jap??n" id="JP">Jap??n</option>
                        <option value="Jordania" id="JO">Jordania</option>
                        <option value="Kazajist??n" id="KZ">Kazajist??n</option>
                        <option value="Kenia" id="KE">Kenia</option>
                        <option value="Kirguizist??n" id="KG">Kirguizist??n</option>
                        <option value="Kiribati" id="KI">Kiribati</option>
                        <option value="Kuwait" id="KW">Kuwait</option>
                        <option value="Laos" id="LA">Laos</option>
                        <option value="Lesoto" id="LS">Lesoto</option>
                        <option value="Letonia" id="LV">Letonia</option>
                        <option value="L??bano" id="LB">L??bano</option>
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
                        <option value="Mal??" id="ML">Mal??</option>
                        <option value="Malta" id="MT">Malta</option>
                        <option value="Marruecos" id="MA">Marruecos</option>
                        <option value="Martinica" id="MQ">Martinica</option>
                        <option value="Mauricio" id="MU">Mauricio</option>
                        <option value="Mauritania" id="MR">Mauritania</option>
                        <option value="Mayotte" id="YT">Mayotte</option>
                        <option value="M??xico" id="MX">M??xico</option>
                        <option value="Micronesia" id="FM">Micronesia</option>
                        <option value="Moldavia" id="MD">Moldavia</option>
                        <option value="M??naco" id="MC">M??naco</option>
                        <option value="Mongolia" id="MN">Mongolia</option>
                        <option value="Montserrat" id="MS">Montserrat</option>
                        <option value="Mozambique" id="MZ">Mozambique</option>
                        <option value="Namibia" id="NA">Namibia</option>
                        <option value="Nauru" id="NR">Nauru</option>
                        <option value="Nepal" id="NP">Nepal</option>
                        <option value="Nicaragua" id="NI">Nicaragua</option>
                        <option value="N??ger" id="NE">N??ger</option>
                        <option value="Nigeria" id="NG">Nigeria</option>
                        <option value="Niue" id="NU">Niue</option>
                        <option value="Norfolk" id="NF">Norfolk</option>
                        <option value="Noruega" id="NO">Noruega</option>
                        <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                        <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                        <option value="Om??n" id="OM">Om??n</option>
                        <option value="Panam??" id="PA">Panam??</option>
                        <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                        <option value="Paquist??n" id="PK">Paquist??n</option>
                        <option value="Paraguay" id="PY">Paraguay</option>
                        <option value="Per??" id="PE">Per??</option>
                        <option value="Pitcairn" id="PN">Pitcairn</option>
                        <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                        <option value="Polonia" id="PL">Polonia</option>
                        <option value="Portugal" id="PT">Portugal</option>
                        <option value="Puerto Rico" id="PR">Puerto Rico</option>
                        <option value="Qatar" id="QA">Qatar</option>
                        <option value="Reino Unido" id="UK">Reino Unido</option>
                        <option value="Rep??blica Centroafricana" id="CF">Rep??blica Centroafricana</option>
                        <option value="Rep??blica Checa" id="CZ">Rep??blica Checa</option>
                        <option value="Rep??blica de Sud??frica" id="ZA">Rep??blica de Sud??frica</option>
                        <option value="Rep??blica Democr??tica del Congo Zaire" id="CD">Rep??blica Democr??tica del Congo Zaire</option>
                        <option value="Rep??blica Dominicana" id="DO">Rep??blica Dominicana</option>
                        <option value="Reuni??n" id="RE">Reuni??n</option>
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
                        <option value="Santa Luc??a" id="LC">Santa Luc??a</option>
                        <option value="Santo Tom?? y Pr??ncipe" id="ST">Santo Tom?? y Pr??ncipe</option>
                        <option value="Senegal" id="SN">Senegal</option>
                        <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                        <option value="Sychelles" id="SC">Seychelles</option>
                        <option value="Sierra Leona" id="SL">Sierra Leona</option>
                        <option value="Singapur" id="SG">Singapur</option>
                        <option value="Siria" id="SY">Siria</option>
                        <option value="Somalia" id="SO">Somalia</option>
                        <option value="Sri Lanka" id="LK">Sri Lanka</option>
                        <option value="Suazilandia" id="SZ">Suazilandia</option>
                        <option value="Sud??n" id="SD">Sud??n</option>
                        <option value="Suecia" id="SE">Suecia</option>
                        <option value="Suiza" id="CH">Suiza</option>
                        <option value="Surinam" id="SR">Surinam</option>
                        <option value="Svalbard" id="SJ">Svalbard</option>
                        <option value="Tailandia" id="TH">Tailandia</option>
                        <option value="Taiw??n" id="TW">Taiw??n</option>
                        <option value="Tanzania" id="TZ">Tanzania</option>
                        <option value="Tayikist??n" id="TJ">Tayikist??n</option>
                        <option value="Territorios brit??nicos del oc??ano Indico" id="IO">Territorios brit??nicos del oc??ano Indico</option>
                        <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                        <option value="Timor Oriental" id="TP">Timor Oriental</option>
                        <option value="Togo" id="TG">Togo</option>
                        <option value="Tonga" id="TO">Tonga</option>
                        <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                        <option value="T??nez" id="TN">T??nez</option>
                        <option value="Turkmenist??n" id="TM">Turkmenist??n</option>
                        <option value="Turqu??a" id="TR">Turqu??a</option>
                        <option value="Tuvalu" id="TV">Tuvalu</option>
                        <option value="Ucrania" id="UA">Ucrania</option>
                        <option value="Uganda" id="UG">Uganda</option>
                        <option value="Uruguay" id="UY">Uruguay</option>
                        <option value="Uzbekist??n" id="UZ">Uzbekist??n</option>
                        <option value="Vanuatu" id="VU">Vanuatu</option>
                        <option value="Venezuela" id="VE">Venezuela</option>
                        <option value="Vietnam" id="VN">Vietnam</option>
                        <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                        <option value="Yemen" id="YE">Yemen</option>
                        <option value="Zambia" id="ZM">Zambia</option>
                        <option value="Zimbabue" id="ZW">Zimbabue</option>
                    </select>
                    <div class="invalid-feedback cambioColorError">
                        Seleccione un pa??s.
                    </div>
                </div>
                <div class="col-md-12 mb-4 d-flex justify-content-center">
                    <button class="btn btn-success text-white letraEditar" type="submit">Actualizar el perfil</button>
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