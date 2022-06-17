<?php
    //Incluimos el modelo necesario. 
    require_once("../modelo/modelo_Cliente.php");

    session_start();

    //Si el cliente y ocupacionMax están establecidos entra en el if
    if(isset($_SESSION["usuarioCliente"]) && isset($_POST["ocupacionMax"])){
      
      //Guardamos la ocupacion máxima en una sesión
      $_SESSION["ocupacionMax"]=$_POST["ocupacionMax"];
      $_SESSION["numero"]=$_POST["numero"];

      //Nos dirigimos a vistaHabitaciones.php que lo que hará es mostrar la vista ReservaEligeHabitaciones.php
      header("location:vistaHabitaciones.php");
    }else{
      //Nos dirigimos al index.php
      header("location:../index.php");
    }

?>