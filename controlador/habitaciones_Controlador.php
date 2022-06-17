<?php
    //Incluimos la base de datos y los modelos necesarios. 
    require_once("../db/db.php");
    require_once("../modelo/modelo_Cliente.php");

    session_start();

    //Si el cliente y entradaReserva están establecidos entra en el if
    if(isset($_SESSION["usuarioCliente"]) && isset($_POST["entradaReserva"])){
      //Conectamos con la base de datos
      $baseDatos = new Conectar();

      //Cambiamos el formato de fechas para mostrarlas en la vista ReservaEligeHabitacion.php o en caso de que no haya habitaciones
      $_SESSION["fechaEntrada"] = date("d/m/Y", strtotime($_POST["entradaReserva"]));
      $_SESSION["fechaSalida"] = date("d/m/Y", strtotime($_POST["salidaReserva"]));

      //Si la fecha de entrada es mayor que la de salida nos dirigira al index y nos avisará del error
      if($_POST["entradaReserva"]>$_POST["salidaReserva"]){
        $_SESSION["sinHabitaciones"] = "La fecha de entrada ".$_SESSION["fechaEntrada"]." no puede ser mayor que la de salida ".$_SESSION["fechaSalida"]; 
        header("location:../index.php");
      }else{
        //Cogemos las habitaciones libres y la guardamos en un array
        $habitacionesLibres=$baseDatos->habitacionesLibres($_POST["entradaReserva"], $_POST["salidaReserva"]);   
        $_SESSION["habitacionesLibres"] = $habitacionesLibres;

        //Para mostar el número de habitaciones en la vista ReservaEligeHabitacion.php
        $numeroDeHabitaciones=count($habitacionesLibres);
        $_SESSION["numeroDeHabitaciones"]=$numeroDeHabitaciones;

        //Sacamos el número de noches que pasarán en el hotel
        $fechaEntradaDiferencia = new DateTime($_POST["entradaReserva"]);
        $fechaSalidaDiferencia = new DateTime($_POST["salidaReserva"]);
        $_SESSION["noches"] = $fechaSalidaDiferencia->diff($fechaEntradaDiferencia);

        //Establecemos una ocupación determinada y la guardamos en sesiones
        foreach($habitacionesLibres as $h){
          $_SESSION["ocupacionAdulto".$h["numero"]]="1";
          $_SESSION["ocupacionNino".$h["numero"]]="0";
        }

        //Cogemos todas las habitaciones que nos servirá para sacar el nombre de la habitación en la cesta del cliente
        $listaHabitaciones=$baseDatos->listaHabitaciones();   
        $_SESSION["listaHabitaciones"] = $listaHabitaciones;

        //Si numeroDeHabitaciones es cero es que no hay habitaciones entre esas 2 fechas y volvemos al inicio 
        if($numeroDeHabitaciones==0){
          $_SESSION["sinHabitaciones"] = "No hay habitaciones disponibles del ".$_SESSION["fechaEntrada"]." al ".$_SESSION["fechaSalida"]; 
          header("location:../index.php");
        }else{
          //Nos dirigimos a vistaHabitaciones.php que lo que hará es mostrar la vista ReservaEligeHabitaciones.php
          header("location:vistaHabitaciones.php");
        }
      }    
    }else{
      //Nos dirigimos al index.php
      header("location:../index.php");
    }

?>