<?php
//Incluimos la base de datos y  los modelos necesarios. 
require_once("../db/db.php");
require_once("../modelo/modelo_Trabajador.php");
session_start();

//Conectamos con la base de datos
$baseDatos = new Conectar();

//Si el empleado esta establecido entra en el if.
if(isset($_POST["empleadoAModificar"])){

    //Cegemos a el usuario seleccionado
    $usuarioAModificar=$baseDatos->ConseguirUsuarioEmpleado($_POST["empleadoAModificar"]);
    //Cremmos un objeto de trabajador
    $usuarioAModificar = new modelo_Trabajador($usuarioAModificar["nomUsuario"], $usuarioAModificar["contrasena"], $usuarioAModificar["nombre"], $usuarioAModificar["apellidos"], $usuarioAModificar["categoria"], $usuarioAModificar["administrador"]);
    //Lo guardamos en una sesión al trabajador a modificar
    $_SESSION["usuarioAModificar"] = $usuarioAModificar;

    //Nos dirigimos al controlador administracion_controlador.php
    header("location:administracion_controlador.php");
}else{
    //Nos dirigimos al index.php
    header("location:../index.php");
}
?>