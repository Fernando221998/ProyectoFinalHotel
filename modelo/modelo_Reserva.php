<?php
//Incluimos el modelo necesario
include_once("modelo_Habitacion.php");
include_once("modelo_TipoAlojamiento.php");
include_once("modelo_Cliente.php");

//Clase reserva
class modelo_Reserva{
    private $idReserva;
    private $fk_numero;
    private $precio;
    private $fk_tipoAlojamiento;
    private $fechaIngreso;
    private $fechaSalida;
    private $fk_nomUsuario;
    private $ocupacionSel;

    //Constructor de la clase reserva
    public function __construct($idReserva, $fk_numero, $precio, $fk_tipoAlojamiento, $fechaIngreso, $fechaSalida, $fk_nomUsuario, $ocupacionSel){
        $this->idReserva = $idReserva;
        $this->fk_numero = $fk_numero;
        $this->precio = $precio;
        $this->fk_tipoAlojamiento = $fk_tipoAlojamiento;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaSalida = $fechaSalida;
        $this->fk_nomUsuario = $fk_nomUsuario;
        $this->ocupacionSel = $ocupacionSel;
    }
    
    //Métodos get y set
    function setReserva($idReserva){
        $this->idReserva = $idReserva; 
    }
    function getReserva(){
        return $this->idReserva;
    }

    function setFk_Numero($fk_numero){
        $this->fk_numero = $fk_numero; 
    }
    function getFk_Numero(){
        return $this->fk_numero;
    }

    function setPrecio($precio){
        $this->precio = $precio; 
    }
    function getPrecio(){
        return $this->precio;
    }
    
    function setFk_TipoAlojamiento($fk_tipoAlojamiento){
        $this->fk_tipoAlojamiento = $fk_tipoAlojamiento; 
    }
    function getFk_TipoAlojamiento(){
        return $this->fk_tipoAlojamiento;
    }

    function setFechaSalida($fechaSalida){
        $this->fechaSalida = $fechaSalida; 
    }
    function getFechaSalida(){
        return $this->fechaSalida;
    }

    function setFechaIngreso($fechaIngreso){
        $this->fechaIngreso = $fechaIngreso; 
    }
    function getFechaIngreso(){
        return $this->fechaIngreso;
    }
    
    function setFk_NomUsuario($fk_nomUsuario){
        $this->fk_nomUsuario = $fk_nomUsuario; 
    }
    function getFk_NomUsuario(){
        return $this->fk_nomUsuario;
    }

    function setOcupacionSel($ocupacionSel){
        $this->ocupacionSel = $ocupacionSel; 
    }
    function getOcupacionSel(){
        return $this->ocupacionSel;
    }
}
?>