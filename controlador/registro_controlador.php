<?php

session_start();
//Incluimos la base de datos. 
require_once("../db/db.php");


//Si el nombre de usuari está establecido entramos en el if
if(isset($_POST["nomUsuClienteRe"])){
    if (strcmp($_POST["contraClienteRe"], $_POST["ConfirmaContraClienteRe"]) === 0){
        //Conectamos con la base de datos
        $baseDatos = new Conectar();
        //Llamamos al método registrar cliente para registrarlo
        $baseDatos->registrarCliente($_POST["nomUsuClienteRe"], $_POST["nombreUsuRe"], $_POST["emailClienteRe"], $_POST["contraClienteRe"]);
    }else{
        $_SESSION["error"] = "Las contraseñas no coinciden";
        header("location:../index.php");
    }
    
}else{
    //Nos dirigimos al index.php
    header("location:../index.php");
}

?>