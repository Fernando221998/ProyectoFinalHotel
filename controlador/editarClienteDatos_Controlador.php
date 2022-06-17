<?php

    //Incluimos el modelo necesario
    require_once("../modelo/modelo_Cliente.php");
    session_start();

    //Si la sesión usuarioCliente esta establecida entra en el if y muestra vista datosClienteEditar si no va a index.php
    if(isset($_SESSION["usuarioCliente"])){
        //Cogemos los datosa que mostrará recogidos en el formulario
        $usuarioCli = $_SESSION["usuarioCliente"]->getNomUsuario();
        $nombreCli = $_SESSION["usuarioCliente"]->getNombre();
        $apellidosCli = $_SESSION["usuarioCliente"]->getApellidos();
        $dniCli = $_SESSION["usuarioCliente"]->getDni();
        $emailCli = $_SESSION["usuarioCliente"]->getEmail();
        $telefonoCli = $_SESSION["usuarioCliente"]->getTelefono();
        $direccionCli = $_SESSION["usuarioCliente"]->getDireccion();
        $paisCli = $_SESSION["usuarioCliente"]->getPais();
        $ciudadCli = $_SESSION["usuarioCliente"]->getCiudad();
        $codigoPostalCli = $_SESSION["usuarioCliente"]->getCodigoPostal();
        
        require_once("../vista/EditarPerfil.php");
        //Llamamos a la función de javascript para que se seleccione el pais al que pertenece el cliente 
        echo "<script> seleccionarSelect('$paisCli'); </script>";
    }else{
        //Nos dirigimos al index.php
        header("location:../index.php");
    }

?>