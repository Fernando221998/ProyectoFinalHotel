<?php
ob_start();
    //Incluimos la base de datos los modelos y las vistas necesarias. 
    require_once("db/db.php");
    require_once("modelo/modelo_Trabajador.php");
    require_once("modelo/modelo_Cliente.php");
    session_start();

    $fecha=date("Y-m-d");
    $fechaManana=date("Y-m-d",strtotime($fecha."+ 1 days"));
    require_once("vista/Home.php");

    //Conectamos con la base de datos
    $baseDatos = new Conectar();

//Si usuario y contraseña de cliente están establecidos entra en el if
if(isset($_POST["nomUsuCliente"]) && isset($_POST["contraCliente"])){
  
    //Llamamos al método loginCliente y si es correcto devuelve la consulta si no false
    $resultadoCli=$baseDatos->loginCliente($_POST["nomUsuCliente"], $_POST["contraCliente"]);

    if($resultadoCli != false){
        //Cremmos un objeto del cliente
        $usuarioCliente = new modelo_Cliente($resultadoCli["nomUsuario"], $resultadoCli["contrasena"], $resultadoCli["nombre"], $resultadoCli["apellidos"], $resultadoCli["dni"], $resultadoCli["email"], $resultadoCli["telefono"], $resultadoCli["direccion"], $resultadoCli["pais"], $resultadoCli["ciudad"], $resultadoCli["codigoPostal"]);
        //Lo guardamos en una sesión al cliente 
        $_SESSION["usuarioCliente"] = $usuarioCliente;
        //Nos dirigimos a el index.php
        header("location:index.php");
    }else{
        //Manda mensaje de error
        $_SESSION["error"] = "Nombre de usuario o contraseña incorrectos";
        header("location:index.php");
    }
}


//Si usuario y contraseña de trabajador están establecidos entra en el if
if(isset($_POST["nomUsuTrabajador"]) && isset($_POST["contraTrabajador"])){
  
    //Llamamos al método loginEmpleado y si es correcto devuelve la consulta si no false
    $resultadoTra=$baseDatos->loginEmpleado($_POST["nomUsuTrabajador"], $_POST["contraTrabajador"]);

    if($resultadoTra != false){
        //Cremmos un objeto de trabajador
        $usuarioTrabajador = new modelo_Trabajador($resultadoTra["nomUsuario"], $resultadoTra["contrasena"], $resultadoTra["nombre"], $resultadoTra["apellidos"], $resultadoTra["categoria"], $resultadoTra["administrador"]);
        //Lo guardamos en una sesión al trabajador 
        $_SESSION["usuarioEmpleado"] = $usuarioTrabajador;
        //Nos dirigimos a el index.php
        header("location:index.php");
    }else{
        //Manda mensaje de error si el usuario y contraseña son incorrectos y si el empleado existe por que no es administrador
        $comprobarExisteTra = $baseDatos->ConseguirUsuarioEmpleado($_POST["nomUsuTrabajador"]);
        if($comprobarExisteTra != false && $comprobarExisteTra[5] == 0){
            $_SESSION["error"] = "No eres administrador";
        }else{
            $_SESSION["error"] = "Nombre de usuario o contraseña incorrectos";
        }
        //Nos dirigimos a el index.php
        header("location:index.php");
    }
}
ob_end_flush();
?>