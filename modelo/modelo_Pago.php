<?php
//Incluimos el modelo necesario
include_once("modelo_Reserva.php");

//Clase pago
class modelo_Pago{
    private $id;
    private $fk_idReserva;
    private $titularTarjeta;
    private $numTarjeta;
    private $mes;
    private $ano;
    private $numCVV;

    //Constructor de la clase pago
    public function __construct($id, $fk_idReserva, $titularTarjeta, $numTarjeta, $mes, $ano, $numCVV){
        $this->id = $id;
        $this->fk_idReserva = $fk_idReserva;
        $this->titularTarjeta = $titularTarjeta;
        $this->numTarjeta = $numTarjeta;
        $this->mes = $mes;
        $this->ano = $ano;
        $this->numCVV = $numCVV;
    }

    //Métodos get y set
    function setId($id){
        $this->id = $id; 
    }
    function getId(){
        return $this->id;
    }

    function setFk_IdReserva($fk_idReserva){
        $this->fk_idReserva = $fk_idReserva; 
    }
    function getFk_IdReserva(){
        return $this->fk_idReserva;
    }

    function setTitularTarjeta($titularTarjeta){
        $this->titularTarjeta = $titularTarjeta; 
    }
    function getTitularTarjeta(){
        return $this->titularTarjeta;
    }

    function setNumTarjeta($numTarjeta){
        $this->numTarjeta = $numTarjeta; 
    }
    function getNumTarjeta(){
        return $this->numTarjeta;
    }
    
    function setMes($mes){
        $this->mes = $mes; 
    }
    function getMes(){
        return $this->mes;
    }

    function setAno($ano){
        $this->ano = $ano; 
    }
    function getAno(){
        return $this->ano;
    }

    function setNumCVV($numCVV){
        $this->numCVV = $numCVV; 
    }
    function getNumCVV(){
        return $this->numCVV;
    }

}
?>