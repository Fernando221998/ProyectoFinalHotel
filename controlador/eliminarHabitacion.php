<?php
ob_start();
//Incluimos el modelo necesario
require_once("../modelo/modelo_Cliente.php");

session_start();

if(isset($_SESSION["usuarioCliente"]) && isset($_POST["eliminarNumero"])){
    //Cogemos la cesta
    $cesta=$_SESSION["usuarioCliente"]->getCesta();
    $contadorBorrar=0;
    //Recorremos la cesta y si el número de la habitacion y la fecha coincide con el seleccionado lo borramos 
    foreach ($cesta as $c) {
        if($c->getFk_Numero()==$_POST["eliminarNumero"] && $c->getFechaIngreso()==$_POST["eliminarFechaIngreso"] && $c->getFechaSalida()==$_POST["eliminarFechaSalida"]){
            unset($cesta[$contadorBorrar]);
            $_SESSION["habitacionEliminada"]="La habitación se ha eliminado de la cesta correctamente";
        }
        $contadorBorrar++;
    }
    //Con este metodo hacemos que el array vulva a empezar en la posición 0
    $cesta=array_values($cesta);
    //Guardamos la cesta modificada en la sesión del usuario
    $_SESSION["usuarioCliente"]->setCesta($cesta);
}

//Nos dirigimos al controlador vistaHabitaciones.php
header("location:vistaHabitaciones.php");
ob_end_flush();
?>