<?php
    //Incluimos el modelo necesario. 
    require_once("../modelo/modelo_Cliente.php");

    session_start();

    //Si el cliente, ocupacionAdulto y ocupacionMax2 están establecidos entra en el if
    if(isset($_SESSION["usuarioCliente"]) && isset($_POST["ocupacionMax2"]) && isset($_POST["ocupacionAdulto"])){

        //Si el número de personas es mayor que el número de ocupación máxima de la habitación se guardará en una sesión un error para
        //mostrarselo al cliente si no se modificará la ocupación seleccionada.
        if(($_POST["ocupacionAdulto"]+$_POST["ocupacionNino"])>$_POST["ocupacionMax2"]){
            $_SESSION["errorOcupacion"]="La ocupación máxima de la habitación es de ".$_POST["ocupacionMax2"]." personas.";
            //Nos dirigimos a vistaHabitaciones.php que lo que hará es mostrar la vista ReservaEligeHabitaciones.php
            header("location:vistaHabitaciones.php");
        }else{
            $_SESSION["ocupacionAdulto".$_SESSION["numero"]]=$_POST["ocupacionAdulto"];
            $_SESSION["ocupacionNino".$_SESSION["numero"]]=$_POST["ocupacionNino"];
            //Nos dirigimos a vistaHabitaciones.php que lo que hará es mostrar la vista ReservaEligeHabitaciones.php
            header("location:vistaHabitaciones.php");
        }  
    }else{
      //Nos dirigimos al index.php
      header("location:../index.php");
    }

?>