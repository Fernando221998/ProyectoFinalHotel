<?php
//Incluimos la base de datos. 
require_once("../db/db.php");
session_start();


//Si el nombre de usuario del trabajador está establecido entramos en el if
if(isset($_POST["nomUsuarioTraModificar"])){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();
        //si esta establecido el administrador boolean será true si no false
        if(isset($_POST["administradorTraModificar"])){
            $boolean="1";
        }else{
            $boolean="0";
        }
        //Llamamos al método editarEmpleado para editarlo en la base de datos
        $baseDatos->editarEmpleado($_POST["nomUsuarioTraModificar"], $_POST["contrasenaTraModificar"], $_POST["nombreTraModificar"], $_POST["apellidosTraModificar"], $_POST["categoriaTraModificar"], $boolean);

        //Guardamos en la sesión aciertoModificar un mensaje que se mostrará cuando se modifique con exito
        $_SESSION["aciertoModificar"] = $_POST["nombreTraModificar"]." ha sido modificado con exito";
        
        //Nos dirigimos al controlador administracion_controlador.php
        header("location:administracion_controlador.php");
}else{
    //Nos dirigimos al index.php
    header("location:../index.php");
}
?>