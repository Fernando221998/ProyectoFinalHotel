<?php
//Clase habitación
class modelo_Habitacion{
    private $numero;
    private $nombre;
    private $imagen;
    private $descripcion;
    private $ocupacionMax;
    private $precio_Alo;
    private $precio_AloDes;

    //Constructor de la clase habitacion
    public function __construct($numero, $nombre, $imagen, $descripcion, $ocupacionMax, $precio_Alo, $precio_AloDes){
        $this->numero = $numero;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
        $this->ocupacionMax = $ocupacionMax;
        $this->precio_Alo = $precio_Alo;
        $this->precio_AloDes = $precio_AloDes;
    }

    //Métodos get y set
    function setNumero($numero){
        $this->numero = $numero; 
    }
    function getNumero(){
        return $this->numero;
    }

    function setNombre($nombre){
        $this->nombre = $nombre; 
    }
    function getNombre(){
        return $this->nombre;
    }

    function setImagen($imagen){
        $this->imagen = $imagen; 
    }
    function getImagen(){
        return $this->imagen;
    }
    
    function setDescripcion($descripcion){
        $this->descripcion = $descripcion; 
    }
    function getDescripcion(){
        return $this->descripcion;
    }

    function setOcupacionMax($ocupacionMax){
        $this->ocupacionMax = $ocupacionMax; 
    }
    function getOcupacionMax(){
        return $this->ocupacionMax;
    }

    function setPrecio_Alo($precio_Alo){
        $this->precio_Alo = $precio_Alo; 
    }
    function getPrecio_Alo(){
        return $this->precio_Alo;
    }

    function setPrecio_AloDes($precio_AloDes){
        $this->precio_AloDes = $precio_AloDes; 
    }
    function getPrecio_AloDes(){
        return $this->precio_AloDes;
    }
}
?>