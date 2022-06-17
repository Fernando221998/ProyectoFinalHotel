<?php
    //Incluimos el modelo necesario y la base de datos. 
    require_once("../modelo/modelo_Cliente.php");
    require_once("../db/db.php");

    session_start();

    //Si el cliente y la sesión habitacionesLibres están establecidos entra en el if
    if(isset($_SESSION["usuarioCliente"]) && isset($_SESSION["habitacionesLibres"])){
      //Conectamos con la base de datos
      $baseDatos = new Conectar();

      //Incluimos la vista ReservaEligeHabitacion.php
      require_once("../vista/ReservaEligeHabitacion.php");
    }else{
      //Nos dirigimos al index.php
      header("location:../index.php");
    }

?>