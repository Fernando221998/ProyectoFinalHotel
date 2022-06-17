<?php
    //Incluimos el modelo necesario y la base de datos
    require_once("../modelo/modelo_Cliente.php");
    require_once("../db/db.php");
    session_start();

    //Si la sesión usuarioCliente esta establecida entra en el if y muestra vista vistaMisReservas.php si no va a index.php
    if(isset($_SESSION["usuarioCliente"])){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();
        $nombreCli = $_SESSION["usuarioCliente"]->getNombre();

        //Recogemos el nombre de usuario del cliente para buscar en la base de datos cuales son sus reservas
        $usuarioCli = $_SESSION["usuarioCliente"]->getNomUsuario();
        $fecha=date("Y-m-d");
        $reservas = $baseDatos->misReservas($usuarioCli, $fecha);
        
        //Contamos cuantas reservas tiene el cliente. si no tiene le llevara al index y le avisará. Si tiene le mostrará
        //la vista vistaMisReservas.php
        $numeroReserva=count($reservas);
        if($numeroReserva==0){
            $_SESSION["noReservas"]="No tienes ninguna reserva realizada";
            header("location:../index.php");
        }else{
            require_once("../vista/vistaMisReservas.php");
        }
        
    }else{
        //Nos dirigimos al index.php
        header("location:../index.php");
    }

?>