<?php
//Incluimos la base de datos. 
require_once("../db/db.php");
session_start();

//Si el empleado y eliminarEmpleado2 estan establecidos entra en el if.
if(isset($_SESSION["usuarioEmpleado"]) && isset($_POST["eliminarEmpleado2"])){
    //Conectamos con la base de datos
    $baseDatos = new Conectar();

    //Eliminamos el empleado seleccionado
    $baseDatos->eliminarEmpleado($_POST["eliminarEmpleado2"]);
    //Sesión eliminado para mostrar que se ha eliminado al trabajador
    $_SESSION["eliminado"] = "Se ha eliminado ". $_POST["nombre"] ." con exito"; 
    
    //Nos dirigimos al controlador administracion_controlador.php
    header("location:administracion_controlador.php");
}else{
    //Nos dirigimos al index.php
    header("location:../index.php");
}


?>