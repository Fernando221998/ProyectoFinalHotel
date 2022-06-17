<?php
    //Incluimos la base de datos y los modelos necesarios. 
    require_once("../db/db.php");
    require_once("../modelo/modelo_Trabajador.php");

    session_start();

    //Si el empleado está establecido entra en el if
    if(isset($_SESSION["usuarioEmpleado"])){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();

        //Si mantenimiento es true la variable cambio pasará a false para poner la habiatación a disponible si no, la variable
        //cambio pasará a true para poner la habitación en mantenimiento
        if($_POST["mantenimientoHabi"]==1){
            $cambio=0;
        }else{
            $cambio=1;
        }

        //Modificamos la disponibilidad de la habitación
        $baseDatos->disponibilidad($_POST["numeroHabi"], $cambio);

        //Esta sesión servirá para que vuelva al Tab-pane de disponibilidad en la vista y no se vaya el de empleados que esta por defecto
        $_SESSION["disponibilidad"]="si";

        //Nos dirigimos al controlador administracion_controlador.php
        header("location:administracion_controlador.php");
    }else{
        //Nos dirigimos al index.php
        header("location:../index.php");
    }

?>