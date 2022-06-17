<?php
    //Incluimos la base de datos los modelos y las vistas necesarias. 
    require_once("../db/db.php");
    require_once("../modelo/modelo_Cliente.php");
    session_start();

    //Si la sesión usuarioCliente esta establecida entra en el if para modificar los datos del cliente si no va a index.php
    if(isset($_SESSION["usuarioCliente"]) && isset($_POST["editarUsuario"])){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();

        //Llamamos al método editarCliente para editarlo en la base de datos
        $baseDatos->editarCliente($_POST["editarUsuario"], $_POST["editarContrasena"], $_POST["editarNombre"], $_POST["editarApellidos"], $_POST["editarDNI"], $_POST["editarEmail"], $_POST["editarTelefono"], $_POST["editarDireccion"], $_POST["editarPais"], $_POST["editarCiudad"], $_POST["editarCodPostal"]);

        //Cambios los datos de la sesión del cliente
        $_SESSION["usuarioCliente"]->setNomUsuario($_POST["editarUsuario"]);
        $_SESSION["usuarioCliente"]->setContrasena($_POST["editarContrasena"]);
        $_SESSION["usuarioCliente"]->setNombre($_POST["editarNombre"]);
        $_SESSION["usuarioCliente"]->setApellidos($_POST["editarApellidos"]);
        $_SESSION["usuarioCliente"]->setDni($_POST["editarDNI"]);
        $_SESSION["usuarioCliente"]->setEmail($_POST["editarEmail"]);
        $_SESSION["usuarioCliente"]->setTelefono($_POST["editarTelefono"]);
        $_SESSION["usuarioCliente"]->setDireccion($_POST["editarDireccion"]);
        $_SESSION["usuarioCliente"]->setPais($_POST["editarPais"]);
        $_SESSION["usuarioCliente"]->setCiudad($_POST["editarCiudad"]);
        $_SESSION["usuarioCliente"]->setCodigoPostal($_POST["editarCodPostal"]);
        $_SESSION["aciertoEditarPerfil"] = $_POST["editarNombre"]. " tus datos han sido editado correctamente";
       

        //Nos dirigimos al controlador editarClienteDatos_Controlador.php
        header("location:editarClienteDatos_Controlador.php");
    }else{
        //Nos dirigimos al index.php
        header("location:../index.php");
    }

?>