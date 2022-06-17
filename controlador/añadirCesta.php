<?php
//Incluimos la base de datos y los modelos necesarios 
require_once("../db/db.php");
require_once("../modelo/modelo_Cliente.php");
require_once("../modelo/modelo_Reserva.php");
session_start();

//Variable que si no existe el producto lo añadirá a la cesta
$existe=false;
if(isset($_SESSION["usuarioCliente"]) && isset($_POST["numeroCesta"])){
    //Conectamos con la base de datos
    $baseDatos = new Conectar();

    //Sacamos el nombre de usuario del cliente y la ocupación que ha seleccionado
    $usuarioCli = $_SESSION["usuarioCliente"]->getNomUsuario();
    //Dependiendo de si selecciono niño o no la cadena de texto será distinta
    if($_SESSION["ocupacionNino".$_POST["numeroCesta"]]!=0){
        $ocupacionSel = $_SESSION["ocupacionAdulto".$_POST["numeroCesta"]]. " Adultos y " .$_SESSION["ocupacionNino".$_POST["numeroCesta"]]. " niños.";
    }else{
        $ocupacionSel = $_SESSION["ocupacionAdulto".$_POST["numeroCesta"]]. " Adultos.";
    }

    //Creamos un objeto reserva.
    $habitacionAReservar = new modelo_Reserva(null, $_POST["numeroCesta"], $_POST["precioCesta"], $_POST["alojamientoCesta"], $_SESSION["fechaEntrada"], $_SESSION["fechaSalida"], $usuarioCli, $ocupacionSel);

    //Cogemos la cesta y si el numero de la habitación está en la cesta ponemos la variable existe a true
    $cesta = $_SESSION["usuarioCliente"]->getCesta();
    foreach ($cesta as $c) {
        if($c->getFk_Numero()==$_POST["numeroCesta"]){
            if($c->getFechaIngreso() <= $_SESSION["fechaEntrada"] && $c->getFechaSalida() >= $_SESSION["fechaEntrada"] || $c->getFechaIngreso() >= $_SESSION["fechaEntrada"] && $c->getFechaIngreso() <= $_SESSION["fechaSalida"]){
                $existe=true;
                $_SESSION["habitacionExite"]="No puedes añadir la misma habitación a la cesta 2 veces. La habitación ya se encuentra añadida en la cesta";
            }      
        }
    }

    //Si no exite la habitación la añadimos a la cesta y ponemos la cantidad a 1
    if(!$existe){
        $_SESSION["usuarioCliente"]->guardarHabitaciónCesta($habitacionAReservar);
        $_SESSION["habitacionAñadida"]="La habitación se ha añadido correctamente a la cesta.";
    }

}

//Borramos numeroCesta
unset($_POST["numeroCesta"]); 

//Nos dirigimos al controlador vistaHabitaciones.php
header("location:vistaHabitaciones.php");
?>