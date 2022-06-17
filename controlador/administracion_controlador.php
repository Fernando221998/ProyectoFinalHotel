<?php
    //Incluimos la base de datos y los modelos necesarios. 
    require_once("../db/db.php");
    require_once("../modelo/modelo_Trabajador.php");

    session_start();

    //Si el empleado está establecido entra en el if
    if(isset($_SESSION["usuarioEmpleado"])){
      //Conectamos con la base de datos
      $baseDatos = new Conectar();
      
      //Cogemos todos los trabajadores de la base de datos y lo guardamos en un array
      $trabajadores=$baseDatos->listaEmpleados();
      
      //Cogemos las habitaciones de las 4 plantas
      $primeraPlanta=$baseDatos->habitacionesPrimeraPlanta();
      $segundaPlanta=$baseDatos->habitacionesSegundaPlanta();
      $terceraPlanta=$baseDatos->habitacionesTerceraPlanta();
      $cuartaPlanta=$baseDatos->habitacionesCuartaPlanta();

      //Cogemos todos las reservas de la tabla reservas para mostrarlas
      $reservasLista=$baseDatos->listaReservas();

      //Cogemos todos las reservas de la tabla historico para mostrarlas
      $reservasListaHistorico=$baseDatos->listaReservasHistorico();

      //Incluimos la vista administracion.php
      require_once("../vista/Administracion.php");
    }else{
      //Nos dirigimos al index.php
      header("location:../index.php");
    }

?>