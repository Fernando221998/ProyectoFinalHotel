<?php
    //Incluimos la base de datos y los modelos necesarios. 
    require_once("../db/db.php");
    require_once("../modelo/modelo_Trabajador.php");

    session_start();

    //Si el empleado y reservasLista están establecidos entra en el if
    if(isset($_SESSION["usuarioEmpleado"])){
      //Conectamos con la base de datos
      $baseDatos = new Conectar();
      
      //Sacamos las reservas que ya han pasado
      $fecha=date("Y-m-d");
      $reservasPasadas=$baseDatos->reservasPasadas($fecha);

      //Recorremos la reservas pasadas y borramos las reservas y los pagos 
      foreach ($reservasPasadas as $rp) {
        $baseDatos->borrarPago($rp["idReserva"]); 
        $baseDatos->borraReserva($rp["idReserva"]);
      }

      //Guardamos en una sesión el mensaje de que todo ha ido correctamente y creamos otra sesión para que cuando vuelva a la vista
      //administracion.php marque reservas
      $_SESSION["reservasPasadasEliminadas"]="Se han elimando correctamente todas las reservas pasadas";
      $_SESSION["marcaReserva"]="si";
    
      //Nos dirigimos a administración_controlador.php
      header("location:administracion_controlador.php");
    }else{
      //Nos dirigimos al index.php
      header("location:../index.php");
    }

?>