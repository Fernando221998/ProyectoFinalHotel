<?php
    //Inclimos la base de datos
    require_once("../db/db.php");
    session_start();

    //Si la sesión usuarioCliente y numero estan establecidas entra en el if entra en la vista vistaMisReservas.php y muestra el modal si no va a index.php
    if(isset($_SESSION["usuarioCliente"]) && isset($_POST["numero"])){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();
        //Cegemos la reserva seleccionada
        $reservaAEliminar=$baseDatos->ConseguirReserva($_POST["numero"], $_POST["fechaEntrada"], $_POST["fechaSalida"]);
        //Lo guardamos en una sesión la reserva
        $_SESSION["reservaAEliminar"] = $reservaAEliminar;

        header("location:misReservas.php");
    }else{
        //Nos dirigimos al index.php
        header("location:../index.php");
    }

?>