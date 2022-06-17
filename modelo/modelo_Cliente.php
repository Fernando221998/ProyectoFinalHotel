<?php
//Incluimos el modelo necesaario
include_once("modelo_Reserva.php");
//Clase cliente
class modelo_Cliente{
    private $nomUsuario;
    private $contrasena;
    private $nombre;
    private $apellidos;
    private $dni;
    private $email;
    private $telefono;
    private $direccion;
    private $pais;
    private $ciudad;
    private $codigoPostal;
    private $cesta;

    //Constructor de la clase cliente
    public function __construct($nomUsuario, $contrasena, $nombre, $apellidos, $dni, $email, $telefono, $direccion, $pais, $ciudad, $codigoPostal){
        $this->nomUsuario = $nomUsuario;
        $this->contrasena = $contrasena;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->pais = $pais;
        $this->ciudad = $ciudad;
        $this->codigoPostal = $codigoPostal;
        $this->cesta = null;
    }

    //Método para guardar las habitaciones en la cesta
    function guardarHabitaciónCesta($habitacion){
        if($this->cesta == null){
            $this->cesta[]=$habitacion;
        }else{
            array_push($this->cesta, $habitacion);
        }
    }

    //Métodos get y set
    function setNomUsuario($nomUsuario){
        $this->nomUsuario = $nomUsuario; 
    }
    function getNomUsuario(){
        return $this->nomUsuario;
    }

    function setContrasena($contrasena){
        $this->contrasena = $contrasena; 
    }
    function getContrasena(){
        return $this->contrasena;
    }

    function setNombre($nombre){
        $this->nombre = $nombre; 
    }
    function getNombre(){
        return $this->nombre;
    }

    function setApellidos($apellidos){
        $this->apellidos = $apellidos; 
    }
    function getApellidos(){
        return $this->apellidos;
    }
    
    function setDni($dni){
        $this->dni = $dni; 
    }
    function getDni(){
        return $this->dni;
    }

    function setEmail($email){
        $this->email = $email; 
    }
    function getEmail(){
        return $this->email;
    }

    function setTelefono($telefono){
        $this->telefono = $telefono; 
    }
    function getTelefono(){
        return $this->telefono;
    }

    function setDireccion($direccion){
        $this->direccion = $direccion; 
    }
    function getDireccion(){
        return $this->direccion;
    }

    function setPais($pais){
        $this->pais = $pais; 
    }
    function getPais(){
        return $this->pais;
    }

    function setCiudad($ciudad){
        $this->ciudad = $ciudad; 
    }
    function getCiudad(){
        return $this->ciudad;
    }

    function setCodigoPostal($codigoPostal){
        $this->codigoPostal = $codigoPostal; 
    }
    function getCodigoPostal(){
        return $this->codigoPostal;
    }

    function setCesta($cesta){
        $this->cesta = $cesta; 
    }
    
    function getCesta(){
        return $this->cesta;
    }
}
?>