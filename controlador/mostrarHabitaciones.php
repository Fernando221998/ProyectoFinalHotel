<?php
//Incluimos los modelos necesarios y la base de datos
require_once("../modelo/modelo_Trabajador.php");
require_once("../modelo/modelo_Cliente.php");
require_once("../db/db.php");
session_start();

//Esta sesión es para controlar que en el header la pagina en la que me encuentre tenga un subrayado
$_SESSION["bordefijo"]="bordefijo";

//Conectamos con la base de datos
$baseDatos = new Conectar();

//Cogemos la lista de habitaciones
$listaHabitaciones=$baseDatos->listaHabitaciones(); 

require_once("../vista/habitaciones.php");
unset($_SESSION["bordefijo"]);
?>