<?php
//Incluimos los modelos necesarios y la base de datos
require_once("../modelo/modelo_Trabajador.php");
require_once("../modelo/modelo_Cliente.php");
session_start();

//Esta sesión es para controlar que en el header la pagina en la que me encuentre tenga un subrayado
$_SESSION["bordefijo2"]="bordefijo";

require_once("../vista/contacto.php");
unset($_SESSION["bordefijo2"]);
?>