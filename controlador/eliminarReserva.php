<?php
    //Inclimos la base de datos
    require_once("../db/db.php");
    session_start();

    //Si la sesión usuarioCliente y el numero2 estan establecidas entra en el if borra la reserva y muestra vista vistaMisReservas.php si no va a index.php
    if(isset($_SESSION["usuarioCliente"]) && isset($_POST["numero2"])){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();

        //Borramos el pago y la reserva seleccionada y la cancelo en el historico
        $baseDatos->borrarPago($_POST["id"]);
        $baseDatos->cancelarReserva($_POST["numero2"], $_POST["fechaEntrada2"], $_POST["fechaSalida2"]);
        $que=$baseDatos->cancelarReservaEnHistorico($_POST["numero2"], $_POST["fechaEntrada2"], $_POST["fechaSalida2"], true);

        //Mensaje que avisa de que la reserva a sido cancelada
        $_SESSION["cancelada"]="La reserva ha sido cancelada correctamente";
        header("location:misReservas.php");
    }else{
        //Nos dirigimos al index.php
        header("location:../index.php");
    }
?>