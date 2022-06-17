<?php
//Clase Trabajador
class modelo_Trabajador{
    private $nomUsuario;
    private $contrasena;
    private $nombre;
    private $apellidos;
    private $categoria;
    private $administrador;

    //Constructor de la clase trabajador
    public function __construct($nomUsuario, $contrasena, $nombre, $apellidos, $categoria, $administrador){
        $this->nomUsuario = $nomUsuario;
        $this->contrasena = $contrasena;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->categoria = $categoria;
        $this->administrador = $administrador;
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
    
    function setCategoria($categoria){
        $this->categoria = $categoria; 
    }
    function getCategoria(){
        return $this->categoria;
    }

    function setAdministrador($administrador){
        $this->administrador = $administrador; 
    }
    function getAdministrador(){
        return $this->administrador;
    }

}
?>