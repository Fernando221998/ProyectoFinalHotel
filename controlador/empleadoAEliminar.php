<?php
    //Inclimos la base de datos
    require_once("../db/db.php");
    session_start();

    //Si la sesión usuarioEmpleado y eliminarEmpleado estan establecidas entra en el if y va al controlador administracion_controlador.php
    // y muestra el modal si no va a index.php
    if(isset($_SESSION["usuarioEmpleado"]) && isset($_POST["eliminarEmpleado"])){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();
        //Cegemos el empleado seleccionado
        $empleadoAEliminar=$baseDatos->ConseguirUsuarioEmpleado($_POST["eliminarEmpleado"]);
        //Lo guardamos en una sesión al empleado
        $_SESSION["empleadoAEliminar"] = $empleadoAEliminar;

        header("location:administracion_controlador.php");
    }else{
        //Nos dirigimos al index.php
        header("location:../index.php");
    }

?>