<?php
//Incluimos la base de datos y los modelos necesarios. 
require_once("../db/db.php");
require_once("../modelo/modelo_Trabajador.php");
session_start();

//Si el nombre de usuario del trabajador está establecido entramos en el if
if(isset($_POST["nomUsuarioTra"])){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();
        //si esta establecido el administrador boolean será true si no false
        if(isset($_POST["administradorTra"])){
            $boolean="1";
        }else{
            $boolean="0";
        }
        //Llamamos al método contratarEmpleado para contratarlo e insertarlo en la base de datos
        $resultado = $baseDatos->contratarEmpleado($_POST["nomUsuarioTra"], $_POST["contrasenaTra"], $_POST["nombreTra"], $_POST["apellidosTra"], $_POST["categoriaTra"], $boolean); 
        
        //Si se ha contratado correctamente creamos la sesión acierto si no creamos la sesión error
        if($resultado){
            $_SESSION["acierto"] = $_POST["nombreTra"]." ha sido contratado con exito";
            //Borramos la sesión de los datos del trabajador
            unset($_SESSION['datosTrabajador']);
            //Nos dirigimos al controlador administracion_controlador.php
            header("location:administracion_controlador.php");
        }else{
            $_SESSION["error"] = "EL nombre de usuario ya existe";
            //Creamos un objeto con los datos del trabajador que acabamos de intentar contratar 
            //para no tener que volver a rellenar todos los datos
            $datosTrabajador = new modelo_Trabajador($_POST["nomUsuarioTra"], $_POST["contrasenaTra"], $_POST["nombreTra"], $_POST["apellidosTra"], $_POST["categoriaTra"], $boolean);
            //Lo guardamos en una sesión al trabajador 
            $_SESSION["datosTrabajador"] = $datosTrabajador;
            //Nos dirigimos al controlador administracion_controlador.php
            header("location:administracion_controlador.php");
        }
}else{
    //Nos dirigimos al index.php
    header("location:../index.php");
}
?>