<?php

session_start();
//Incluimos la base de datos y modelos necesarios. 
require_once("../db/db.php");
require_once("../modelo/modelo_Cliente.php");


//Si el nombre de usuari está establecido entramos en el if
if(isset($_POST["nomUsuClienteRe"])){
    if (strcmp($_POST["contraClienteRe"], $_POST["ConfirmaContraClienteRe"]) === 0){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();
        //Llamamos al método registrar cliente para registrarlo
        $baseDatos->registrarCliente($_POST["nomUsuClienteRe"], $_POST["nombreUsuRe"], $_POST["emailClienteRe"], $_POST["contraClienteRe"]);
    }else{
        $_SESSION["error"] = "Las contraseñas no coinciden";
        //Creamos un objeto con los datos del cliente que acaba de intentar registrarse 
        //para no tener que volver a rellenar todos los datos
        $datosCliente = new modelo_Cliente($_POST["nomUsuClienteRe"], $_POST["contraClienteRe"], $_POST["nombreUsuRe"], "", "", $_POST["emailClienteRe"], "", "", "", "", "");
        //Lo guardamos en una sesión al cliente 
        $_SESSION["datosCliente"] = $datosCliente;
        //Nos dirigimos al index
        header("location:../index.php");
    }
    
}else{
    //Nos dirigimos al index.php
    header("location:../index.php");
}

?>
