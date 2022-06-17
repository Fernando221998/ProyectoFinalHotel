<?php
//Clase tipo de alojamiento
class modelo_TipoAlojamiento{
    private $id;
    private $tipo;

    //Constructor de la clase tipo de reserva
    public function __construct($id, $tipo){
        $this->id = $id;
        $this->tipo = $tipo;
    }

    //Métodos get y set
    function setId($id){
        $this->id = $id; 
    }
    function getId(){
        return $this->id;
    }

    function setTipo($tipo){
        $this->tipo = $tipo; 
    }
    function getTipo(){
        return $this->tipo;
    }

}
?>