<?php
    //Incluimos la base de datos.
    require_once("../db/db.php");

    session_start();

    //Si entradaReserva2 y salidaReserva2 están establecidos entra en el if
    if(isset($_POST["entradaReserva2"]) && isset($_POST["salidaReserva2"])){
      //Conectamos con la base de datos
      $baseDatos = new Conectar();

      //Cambiamos el formato de fechas para mostrarlas en la vista buscarHabiSinLogin.php o en caso de que no haya habitaciones
      $_SESSION["fechaEntrada2"] = date("d/m/Y", strtotime($_POST["entradaReserva2"]));
      $_SESSION["fechaSalida2"] = date("d/m/Y", strtotime($_POST["salidaReserva2"]));

      //Si la fecha de entrada es mayor que la de salida nos dirigira al index y nos avisará del error
      if($_POST["entradaReserva2"]>$_POST["salidaReserva2"]){
        $_SESSION["sinHabitaciones"] = "La fecha de entrada ".$_SESSION["fechaEntrada2"]." no puede ser mayor que la de salida ".$_SESSION["fechaSalida2"]; 
        header("location:../index.php");
      }else{
        //Cogemos las habitaciones libres y la guardamos en un array
        $habitacionesLibres2=$baseDatos->habitacionesLibres($_POST["entradaReserva2"], $_POST["salidaReserva2"]);   
        $_SESSION["habitacionesLibres2"] = $habitacionesLibres2;

        //Para mostar el número de habitaciones en la vista buscarHabiSinLogin.php
        $numeroDeHabitaciones2=count($habitacionesLibres2);
        $_SESSION["numeroDeHabitaciones2"]=$numeroDeHabitaciones2;

        //Sacamos el número de noches que pasarán en el hotel
        $fechaEntradaDiferencia2 = new DateTime($_POST["entradaReserva2"]);
        $fechaSalidaDiferencia2 = new DateTime($_POST["salidaReserva2"]);
        $_SESSION["noches2"] = $fechaSalidaDiferencia2->diff($fechaEntradaDiferencia2);

        //Si numeroDeHabitaciones2 es cero es que no hay habitaciones entre esas 2 fechas y volvemos al inicio 
        if($numeroDeHabitaciones2==0){
          $_SESSION["sinHabitaciones"] = "No hay habitaciones disponibles del ".$_SESSION["fechaEntrada2"]." al ".$_SESSION["fechaSalida2"]; 
          header("location:../index.php");
        }else{
          //Nos dirigimos a la vista buscarHabiSinLogin.php 
          require_once("../vista/buscarHabiSinLogin.php");
        }
      }    
    }else{
      //Nos dirigimos al index.php
      header("location:../index.php");
    }

?>