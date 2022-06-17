<?php
//Sirve para quitar los espacios en blanco y carácteres raro
function valorSeguro($cadena){
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    $cadena = htmlspecialchars($cadena);
    return $cadena;
}

class Conectar{
    private $baseDatos;

    //Método que llama a la conexión de la base de datos
    public function __construct(){
        $this->baseDatos= $this->conexionBD();
    }

    //Método que conecta con la base de datos
    public static function conexionBD(){
        try{
            $dsn='mysql:host=localhost;dbname=proyectohotel';
            $conectar = new PDO($dsn,'root','');
            /*$dsn='mysql:host=mysql.webcindario.com;dbname=hotelfernando';
            $conectar = new PDO($dsn,'hotelfernando','Fernando');*/
            $conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conectar->exec("SET CHARACTER set UTF8");
            return $conectar;

        }catch(PDOException $e){
            echo "<h3>Error: " . $e->getMessage() . " Linea: " . $e->getLine() . "</h3>";
        }       
    }

    //Método que permite loguearte con tu nombre de usuario y contraseña con la que te has registrado como cliente
    public function loginCliente($usuario, $password){

        $usuarioValorSeguro = valorSeguro($usuario);
        $passwordValorSeguro = valorSeguro($password);
        $passwordValorSeguroMd5= md5($passwordValorSeguro);
        $sql = "SELECT * from clientes WHERE nomUsuario=:usuarios and contrasena=:pwd";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":usuarios", $usuarioValorSeguro);
        $pdoBd->bindParam(":pwd", $passwordValorSeguroMd5);
        
        try{
            $pdoBd ->execute();
            return $pdoBd->fetch();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que devuelve un cliente al pasarle el nombre de usuario
    public function ConseguirUsuarioCliente($usuario){

        $usuarioValorSeguro = valorSeguro($usuario);
        $sql = "SELECT * from clientes WHERE nomUsuario=:usuarios";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":usuarios", $usuarioValorSeguro);
        try{
            $pdoBd ->execute();
            return $pdoBd->fetch();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que permite loguearte con tu nombre de usuario y contraseña como empleado
    public function loginEmpleado($usuario, $password){

        $usuarioValorSeguro = valorSeguro($usuario);
        $passwordValorSeguro = valorSeguro($password);
        $passwordValorSeguroMd5= md5($passwordValorSeguro);
        $administrador=true;

        $sql = "SELECT * from trabajador WHERE nomUsuario=:usuarios and contrasena=:pwd and administrador=:adminis";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":usuarios", $usuarioValorSeguro);
        $pdoBd->bindParam(":pwd", $passwordValorSeguroMd5);
        $pdoBd->bindParam(":adminis", $administrador);
        
        try{
            $pdoBd ->execute();
            return $pdoBd->fetch();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que devuelve un empleado al pasarle el nombre de usuario
    public function ConseguirUsuarioEmpleado($usuario){

        $usuarioValorSeguro = valorSeguro($usuario);
        $sql = "SELECT * from trabajador WHERE nomUsuario=:usuarios";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":usuarios", $usuarioValorSeguro);
        try{
            $pdoBd ->execute();
            return $pdoBd->fetch();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que registra a un cliente y te manda al index.php
    public function registrarCliente($usuario, $nombre, $email, $password){
   
        $usuarioValorSeguro = valorSeguro($usuario);
        $nombreValorSeguro = valorSeguro($nombre);
        $emailValorSeguro = valorSeguro($email);
        $passwordValorSeguro = valorSeguro($password);    
        $passwordValorSeguroMd5 = md5($passwordValorSeguro);
        
        $sql = "INSERT INTO clientes(nomUsuario, contrasena, nombre, apellidos, dni, email, telefono, direccion, pais, ciudad, codigoPostal) VALUES (:usuario, :pwd, :nombre, '', '', :email, '', '', '', '', '')";
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":usuario", $usuarioValorSeguro);
        $pdoBd->bindParam(":nombre", $nombreValorSeguro);
        $pdoBd->bindParam(":email", $emailValorSeguro);
        $pdoBd->bindParam(":pwd", $passwordValorSeguroMd5);
        
        try{
            $valor=$pdoBd ->execute();
        }catch(PDOException $e){
            $_SESSION["error"] = "EL nombre de usuario ya existe";
            $valor=false;
            header("location:../index.php");
        }

        if ($valor){
            $_SESSION["acierto"] = "Su registro se ha completado con exito";
            header("location:../index.php");
        }
    
    }

    //Método que devuelve todos los empleados de la base de datos
    public function listaEmpleados(){
        $sql=$this->baseDatos->query("SELECT * FROM trabajador WHERE nomUsuario != 'admin'");
        try{
            return $sql->fetchAll();
        }catch(PDOException $e){
            return false;
        }
        
    }

    //Método que elimina un empleado pasandole su nombre de usuario
    public function eliminarEmpleado($nomUsuario){
        $sql="DELETE FROM trabajador WHERE nomUsuario='".$nomUsuario."'";
        try{
            $this-> baseDatos->exec($sql);
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que contrata a un empleado y te manda al controlador administracion_controlador.php que finalmente nos llevará a la vista administracion.php
    public function contratarEmpleado($usuario, $password, $nombre, $apellidos, $categoria, $administrador){   
        $usuarioValorSeguro = valorSeguro($usuario);
        $passwordValorSeguro = valorSeguro($password);    
        $passwordValorSeguroMd5 = md5($passwordValorSeguro);
        $nombreValorSeguro = valorSeguro($nombre);  
        $apellidosValorSeguro = valorSeguro($apellidos);  
        $categoriaValorSeguro = valorSeguro($categoria); 
        $administradorValorSeguro = valorSeguro($administrador);  

        $sql = "INSERT INTO trabajador(nomUsuario, contrasena, nombre, apellidos, categoria, administrador) VALUES (:usuario, :pwd, :nombre, :apellidos, :categoria, :administrador)";
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":usuario", $usuarioValorSeguro);
        $pdoBd->bindParam(":pwd", $passwordValorSeguroMd5);
        $pdoBd->bindParam(":nombre", $nombreValorSeguro);
        $pdoBd->bindParam(":apellidos", $apellidosValorSeguro);
        $pdoBd->bindParam(":categoria", $categoriaValorSeguro);
        $pdoBd->bindParam(":administrador", $administradorValorSeguro);
        
        try{
            $valor=$pdoBd ->execute();
            return $valor;
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }
    
    //Método que edita a el empleado seleccionado y te manda al controlador administracion_controlador.php que finalmente nos llevará a la vista administracion.php
    public function editarEmpleado($usuario, $password, $nombre, $apellidos, $categoria, $administrador){   
        $usuarioValorSeguro = valorSeguro($usuario);
        $passwordValorSeguro = valorSeguro($password);    
        $passwordValorSeguroMd5 = md5($passwordValorSeguro);
        $nombreValorSeguro = valorSeguro($nombre);  
        $apellidosValorSeguro = valorSeguro($apellidos);  
        $categoriaValorSeguro = valorSeguro($categoria); 
        $administradorValorSeguro = valorSeguro($administrador);  

        $sql = "UPDATE trabajador SET contrasena=:pwd, nombre=:nombre, apellidos=:apellidos, categoria=:categoria, administrador=:administrador WHERE nomUsuario=:usuario";    
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":usuario", $usuarioValorSeguro);
        $pdoBd->bindParam(":pwd", $passwordValorSeguroMd5);
        $pdoBd->bindParam(":nombre", $nombreValorSeguro);
        $pdoBd->bindParam(":apellidos", $apellidosValorSeguro);
        $pdoBd->bindParam(":categoria", $categoriaValorSeguro);
        $pdoBd->bindParam(":administrador", $administradorValorSeguro);
        
        try{
            $pdoBd ->execute();
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }
 
    //Método que edita a el cliente logueado y te manda al controlador editarClienteDatos_Controlador.php que finalmente nos llevará a la vista EditarPerfil.php
    public function editarCliente($usuario, $password, $nombre, $apellidos, $dni, $email, $telefono, $direccion, $pais, $ciudad, $codPostal){   
        $usuarioValorSeguro = valorSeguro($usuario);
        $passwordValorSeguro = valorSeguro($password);    
        $passwordValorSeguroMd5 = md5($passwordValorSeguro);
        $nombreValorSeguro = valorSeguro($nombre);  
        $apellidosValorSeguro = valorSeguro($apellidos);  
        $dniValorSeguro = valorSeguro($dni); 
        $emailValorSeguro = valorSeguro($email);
        $telefonoValorSeguro = valorSeguro($telefono);  
        $direccionValorSeguro = valorSeguro($direccion);  
        $paisValorSeguro = valorSeguro($pais);
        $ciudadValorSeguro = valorSeguro($ciudad);
        $codPostalValorSeguro = valorSeguro($codPostal);

        $sql = "UPDATE clientes SET contrasena=:pwd, nombre=:nombre, apellidos=:apellidos, dni=:dni, email=:email, telefono=:telefono, direccion=:direccion , pais=:pais, ciudad=:ciudad, codigoPostal=:codPostal WHERE nomUsuario=:usuario"; 
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":usuario", $usuarioValorSeguro);
        $pdoBd->bindParam(":pwd", $passwordValorSeguroMd5);
        $pdoBd->bindParam(":nombre", $nombreValorSeguro);
        $pdoBd->bindParam(":apellidos", $apellidosValorSeguro);
        $pdoBd->bindParam(":dni", $dniValorSeguro);
        $pdoBd->bindParam(":email", $emailValorSeguro);
        $pdoBd->bindParam(":telefono", $telefonoValorSeguro);
        $pdoBd->bindParam(":direccion", $direccionValorSeguro);
        $pdoBd->bindParam(":pais", $paisValorSeguro);
        $pdoBd->bindParam(":ciudad", $ciudadValorSeguro);
        $pdoBd->bindParam(":codPostal", $codPostalValorSeguro);       
        
        try{
            $pdoBd ->execute();
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }

    //Método que edita a el cliente logueado al realizar la reserva y te manda al index.php
    public function editarCliente2($usuario, $nombre, $apellidos, $dni, $email, $telefono, $direccion, $pais, $ciudad, $codPostal){   
        $usuarioValorSeguro = valorSeguro($usuario);
        $nombreValorSeguro = valorSeguro($nombre);  
        $apellidosValorSeguro = valorSeguro($apellidos);  
        $dniValorSeguro = valorSeguro($dni); 
        $emailValorSeguro = valorSeguro($email);
        $telefonoValorSeguro = valorSeguro($telefono);  
        $direccionValorSeguro = valorSeguro($direccion);  
        $paisValorSeguro = valorSeguro($pais);
        $ciudadValorSeguro = valorSeguro($ciudad);
        $codPostalValorSeguro = valorSeguro($codPostal);

        $sql = "UPDATE clientes SET  nombre=:nombre, apellidos=:apellidos, dni=:dni, email=:email, telefono=:telefono, direccion=:direccion , pais=:pais, ciudad=:ciudad, codigoPostal=:codPostal WHERE nomUsuario=:usuario"; 
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":usuario", $usuarioValorSeguro);
        $pdoBd->bindParam(":nombre", $nombreValorSeguro);
        $pdoBd->bindParam(":apellidos", $apellidosValorSeguro);
        $pdoBd->bindParam(":dni", $dniValorSeguro);
        $pdoBd->bindParam(":email", $emailValorSeguro);
        $pdoBd->bindParam(":telefono", $telefonoValorSeguro);
        $pdoBd->bindParam(":direccion", $direccionValorSeguro);
        $pdoBd->bindParam(":pais", $paisValorSeguro);
        $pdoBd->bindParam(":ciudad", $ciudadValorSeguro);
        $pdoBd->bindParam(":codPostal", $codPostalValorSeguro);       
        
        try{
            $pdoBd ->execute();
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }

    //Método que recoge el número de las habitaciones reservadas para saber que habitaciones estan libres 
    public function habitacionesLibres($entrada, $salida){   
        $entradaValorSeguro = valorSeguro($entrada);
        $salidaValorSeguro = valorSeguro($salida);

        $sql = "SELECT DISTINCT fk_numero FROM reserva WHERE fechaIngreso <= :entrada AND fechaSalida >= :entrada OR fechaIngreso >= :entrada AND fechaIngreso <= :salida";
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":entrada", $entradaValorSeguro);
        $pdoBd->bindParam(":salida", $salidaValorSeguro);   
        
        try{
            $pdoBd ->execute();
            $habitacionesOcupadas = $pdoBd->fetchAll();
            //Si el array habitaciones ocupadas esta vacio todas loas habitaciones estan libre
            if(empty($habitacionesOcupadas)){
                $sql=$this->baseDatos->query("SELECT * FROM habitacion WHERE mantenimiento=0;");
                return $sql->fetchAll();
            //Si no se hará una consulta para saber que habitaciones estan libres
            }else{
                $contador=0;
                $cadena="";
                foreach($habitacionesOcupadas as $h){
                    if($contador==0){
                    $cadena= "numero != ". $h["fk_numero"];
                    }else{
                    $cadena.= " and numero != ". $h["fk_numero"];
                    }
                    $contador++;
                }
                $sql=$this->baseDatos->query("SELECT * FROM habitacion WHERE ".$cadena." AND mantenimiento=0;");
                return $sql->fetchAll();
            }
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }

    //Metodo que devuelve todas las habitaciones
    public function listaHabitaciones(){
        $sql=$this->baseDatos->query("SELECT * FROM habitacion");
        try{
            return $sql->fetchAll();
        }catch(PDOException $e){
            return false;
        }
        
    }

    //Metodo que devuelve las habitaciones de la primera planta
    public function habitacionesPrimeraPlanta(){
        $sql=$this->baseDatos->query("SELECT * FROM habitacion WHERE numero < 200;");
        try{
            return $sql->fetchAll();
        }catch(PDOException $e){
            return false;
        }
        
    }

    //Metodo que devuelve las habitaciones de la segunda planta
    public function habitacionesSegundaPlanta(){
        $sql=$this->baseDatos->query("SELECT * FROM habitacion WHERE numero > 200 AND numero < 300;");
        try{
            return $sql->fetchAll();
        }catch(PDOException $e){
            return false;
        }
        
    }

    //Metodo que devuelve las habitaciones de la tercera planta
    public function habitacionesTerceraPlanta(){
        $sql=$this->baseDatos->query("SELECT * FROM habitacion WHERE numero > 300 AND numero < 400;");
        try{
            return $sql->fetchAll();
        }catch(PDOException $e){
            return false;
        }
        
    }

    //Metodo que devuelve las habitaciones de la cuarta planta
    public function habitacionesCuartaPlanta(){
        $sql=$this->baseDatos->query("SELECT * FROM habitacion WHERE numero > 400 AND numero < 500;");
        try{
            return $sql->fetchAll();
        }catch(PDOException $e){
            return false;
        }
        
    }

    //Método que devuelve el nombre del tipo de alojamiento
    public function nombreTipoAlojamiento($id){
        $idValorSeguro = valorSeguro($id);
        $sql = "SELECT tipo from tipoalojamiento WHERE id=:id";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":id", $idValorSeguro);
        try{
            $pdoBd ->execute();
            return $pdoBd->fetch();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que cambia si una habitación esta disponible para reservar o en mantenimiento
    public function disponibilidad($numero, $mantenimiento){   
        $numeroValorSeguro = valorSeguro($numero);
        $mantenimientoValorSeguro = valorSeguro($mantenimiento);    

        $sql = "UPDATE habitacion SET mantenimiento=:mantenimiento WHERE numero=:numero";    
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":numero", $numeroValorSeguro);
        $pdoBd->bindParam(":mantenimiento", $mantenimientoValorSeguro);
        
        try{
            $pdoBd ->execute();
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }

    //Método que inserta en la base de datos las reservas de las habitaciones
    public function reserva($fk_numero, $precio, $fk_tipoAlojamiento, $fechaIngreso, $fechaSalida, $fk_nomUsuario, $ocupacionSel){   
        $fk_numeroValorSeguro = valorSeguro($fk_numero);
        $precioValorSeguro = valorSeguro($precio);    
        $fk_tipoAlojamientoValorSeguro = valorSeguro($fk_tipoAlojamiento);  
        $fechaIngresoValorSeguro = valorSeguro($fechaIngreso);  
        $fechaSalidaValorSeguro = valorSeguro($fechaSalida); 
        $fk_nomUsuarioValorSeguro = valorSeguro($fk_nomUsuario);
        $ocupacionSelValorSeguro = valorSeguro($ocupacionSel);  

        $sql = "INSERT INTO reserva(idReserva, fk_numero, precio, fk_tipoAlojamiento, fechaIngreso, fechaSalida, fk_nomUsuario, ocupacionSel) VALUES (null, :numero, :precio, :alojamiento, :fechaIngreso, :fechaSalida, :nomUsuario, :ocupacion)";
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":numero", $fk_numeroValorSeguro);
        $pdoBd->bindParam(":precio", $precioValorSeguro);
        $pdoBd->bindParam(":alojamiento", $fk_tipoAlojamientoValorSeguro);
        $pdoBd->bindParam(":fechaIngreso", $fechaIngresoValorSeguro);
        $pdoBd->bindParam(":fechaSalida", $fechaSalidaValorSeguro);
        $pdoBd->bindParam(":nomUsuario", $fk_nomUsuarioValorSeguro);
        $pdoBd->bindParam(":ocupacion", $ocupacionSelValorSeguro);
        
        try{
            $valor=$pdoBd ->execute();
            return $valor;
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }

    //Método para sacar el último id de la reserva
    public function idReserva(){
        $sql=$this->baseDatos->query("SELECT MAX(idReserva) from reserva");
        try{
            return $sql->fetch();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que inserta en la base de datos el pago del cliente
    public function pago($fk_idReserva, $titularTarjeta, $numTarjeta, $mes, $ano, $numCVV){   
        $fk_idReservaValorSeguro = valorSeguro($fk_idReserva);
        $titularTarjetaValorSeguro = valorSeguro($titularTarjeta);    
        $numTarjetaValorSeguro = valorSeguro($numTarjeta);  
        $mesValorSeguro = valorSeguro($mes);  
        $anoValorSeguro = valorSeguro($ano); 
        $numCVVValorSeguro = valorSeguro($numCVV);

        $sql = "INSERT INTO pago(id, fk_idReserva, titularTarjeta, numTarjeta, mes, ano, numCVV) VALUES (null, :fk_idReserva, :titularTarjeta, :numTarjeta, :mes, :ano, :numCVV)";
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":fk_idReserva", $fk_idReservaValorSeguro);
        $pdoBd->bindParam(":titularTarjeta", $titularTarjetaValorSeguro);
        $pdoBd->bindParam(":numTarjeta", $numTarjetaValorSeguro);
        $pdoBd->bindParam(":mes", $mesValorSeguro);
        $pdoBd->bindParam(":ano", $anoValorSeguro);
        $pdoBd->bindParam(":numCVV", $numCVVValorSeguro);
        
        try{
            $valor=$pdoBd ->execute();
            return $valor;
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }

    //Método que devuelve un array de las reservas actuales de un cliente
    public function misReservas($nombreUsu, $fecha){
        $nombreUsuValorSeguro = valorSeguro($nombreUsu);
        $fechaValorSeguro = valorSeguro($fecha);
        $sql = "SELECT * from reserva WHERE fk_nomUsuario=:nombreUsu AND fechaSalida>=:fecha";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":nombreUsu", $nombreUsuValorSeguro);
        $pdoBd->bindParam(":fecha", $fechaValorSeguro);
        try{
            $pdoBd ->execute();
            return $pdoBd->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que devuelve el nombre de la habitacion
    public function nombreHabitación($numero){
        $numeroValorSeguro = valorSeguro($numero);
        $sql = "SELECT nombre from habitacion WHERE numero=:numero";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":numero", $numeroValorSeguro);
        try{
            $pdoBd ->execute();
            return $pdoBd->fetch();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que devuelve la reserva
    public function ConseguirReserva($numero, $fechaEntrada, $fechaSalida){
        $numeroValorSeguro = valorSeguro($numero);
        $fechaEntradaValorSeguro = valorSeguro($fechaEntrada);
        $fechaSalidaValorSeguro = valorSeguro($fechaSalida);
        $sql = "SELECT * from reserva WHERE fk_numero=:numero AND fechaIngreso=:fechaEntrada AND fechaSalida=:fechaSalida";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":numero", $numeroValorSeguro);
        $pdoBd->bindParam(":fechaEntrada", $fechaEntradaValorSeguro);
        $pdoBd->bindParam(":fechaSalida", $fechaSalidaValorSeguro);
        try{
            $pdoBd ->execute();
            return $pdoBd->fetch();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que elimina la reserva seleccionada
    public function cancelarReserva($numero, $fechaIngreso, $fechaSalida){
        $numeroValorSeguro = valorSeguro($numero);
        $fechaEntradaValorSeguro = valorSeguro($fechaIngreso);
        $fechaSalidaValorSeguro = valorSeguro($fechaSalida);
        $sql="DELETE FROM reserva WHERE fk_numero=:numero AND fechaIngreso=:fechaEntrada AND fechaSalida=:fechaSalida";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":numero", $numeroValorSeguro);
        $pdoBd->bindParam(":fechaEntrada", $fechaEntradaValorSeguro);
        $pdoBd->bindParam(":fechaSalida", $fechaSalidaValorSeguro);
        try{
            $pdoBd ->execute();   
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que elimina el pago de la reserva seleccionada
    public function borrarPago($id){
        $sql="DELETE FROM pago WHERE fk_idReserva='".$id."'";
        try{
            $this-> baseDatos->exec($sql);
        }catch(PDOException $e){
            return false;
        }
    }
    
    //Método que devuelve un array de las todas las reservas de la tabla reserva
    public function listaReservas(){
        $sql=$this->baseDatos->query("SELECT * FROM reserva");
        try{
            return $sql->fetchAll();
        }catch(PDOException $e){
            return false;
        }
        
    }

    //Método que devuelve un array con las reservas pasadas
    public function reservasPasadas($fecha){
        $fechaValorSeguro = valorSeguro($fecha);
        $sql = "SELECT * from reserva WHERE fechaSalida<:fecha";
        $pdoBd = $this-> baseDatos->prepare($sql);
        $pdoBd->bindParam(":fecha", $fechaValorSeguro);
        try{
            $pdoBd ->execute();
            return $pdoBd->fetchAll();
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que elimina el pago de la reserva seleccionada
    public function borraReserva($id){
        $sql="DELETE FROM reserva WHERE idReserva='".$id."'";
        try{
            $this-> baseDatos->exec($sql);
        }catch(PDOException $e){
            return false;
        }
    }

    //Método que inserta la reserva y el pago a la tabla historico 
    public function historico($fk_numerohis, $preciohis, $fk_tipoAlojamientohis, $fechaHoyhis, $fechaIngresohis, $fechaSalidahis, $canceladahis, $fk_nomUsuariohis, $ocupacionSelhis, $titularTarjetahis, $numTarjetahis, $meshis, $anohis, $numCVVhis){   
        $fk_numeroValorSeguro = valorSeguro($fk_numerohis);
        $precioValorSeguro = valorSeguro($preciohis);    
        $fk_tipoAlojamientoValorSeguro = valorSeguro($fk_tipoAlojamientohis);
        $fechaHoyhisValorSeguro = valorSeguro($fechaHoyhis);   
        $fechaIngresoValorSeguro = valorSeguro($fechaIngresohis);  
        $fechaSalidaValorSeguro = valorSeguro($fechaSalidahis);
        $canceladahisValorSeguro = valorSeguro($canceladahis); 
        $fk_nomUsuarioValorSeguro = valorSeguro($fk_nomUsuariohis);
        $ocupacionSelValorSeguro = valorSeguro($ocupacionSelhis);
        $titularTarjetaValorSeguro = valorSeguro($titularTarjetahis);    
        $numTarjetaValorSeguro = valorSeguro($numTarjetahis);  
        $mesValorSeguro = valorSeguro($meshis);  
        $anoValorSeguro = valorSeguro($anohis); 
        $numCVVValorSeguro = valorSeguro($numCVVhis);
  

        $sql = "INSERT INTO historico(idHistorico, fk_numerohis, preciohis, fk_tipoAlojamientohis, fechaHoyHis, fechaIngresohis, fechaSalidahis, canceladahis, fk_nomUsuariohis, ocupacionSelhis, titularTarjetahis, numTarjetahis, meshis, anohis, numCVVhis) VALUES (null, :numero, :precio, :alojamiento, :fechaActual, :fechaIngreso, :fechaSalida, :cancelada, :nomUsuario, :ocupacion, :titularTarjeta, :numTarjeta, :mes, :ano, :numCVV)";
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":numero", $fk_numeroValorSeguro);
        $pdoBd->bindParam(":precio", $precioValorSeguro);
        $pdoBd->bindParam(":alojamiento", $fk_tipoAlojamientoValorSeguro);
        $pdoBd->bindParam(":fechaActual", $fechaHoyhisValorSeguro);
        $pdoBd->bindParam(":fechaIngreso", $fechaIngresoValorSeguro);
        $pdoBd->bindParam(":fechaSalida", $fechaSalidaValorSeguro);
        $pdoBd->bindParam(":cancelada", $canceladahisValorSeguro);
        $pdoBd->bindParam(":nomUsuario", $fk_nomUsuarioValorSeguro);
        $pdoBd->bindParam(":ocupacion", $ocupacionSelValorSeguro);
        $pdoBd->bindParam(":titularTarjeta", $titularTarjetaValorSeguro);
        $pdoBd->bindParam(":numTarjeta", $numTarjetaValorSeguro);
        $pdoBd->bindParam(":mes", $mesValorSeguro);
        $pdoBd->bindParam(":ano", $anoValorSeguro);
        $pdoBd->bindParam(":numCVV", $numCVVValorSeguro);
        
        try{
            $valor=$pdoBd ->execute();
            return $valor;
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }

    //Método que edita a el empleado seleccionado y te manda al controlador administracion_controlador.php que finalmente nos llevará a la vista administracion.php
    public function cancelarReservaEnHistorico($numerohis, $fechaIngresohis, $fechaSalidahis, $cancelada){   
        $numerohisValorSeguro = valorSeguro($numerohis);
        $fechaIngresohisValorSeguro = valorSeguro($fechaIngresohis);    
        $fechaSalidahisValorSeguro = valorSeguro($fechaSalidahis); 
        $canceladaValorSeguro = valorSeguro($cancelada);

        $sql = "UPDATE historico SET canceladahis=:cancelada WHERE fk_numerohis=:numero AND fechaIngresohis=:fechaEntrada AND fechaSalidahis=:fechaSalida";    
        $pdoBd =$this-> baseDatos->prepare($sql);
    
        $pdoBd->bindParam(":numero", $numerohisValorSeguro);
        $pdoBd->bindParam(":fechaEntrada", $fechaIngresohisValorSeguro);
        $pdoBd->bindParam(":fechaSalida", $fechaSalidahisValorSeguro);
        $pdoBd->bindParam(":cancelada", $canceladaValorSeguro);
        
        try{
            $pdoBd ->execute();
        }catch(PDOException $e){
            $valor=false;
            return $valor;
        }
    }

    //Método que devuelve un array de las todas las reservas de la tabla historico
    public function listaReservasHistorico(){
        $sql=$this->baseDatos->query("SELECT * FROM historico");
        try{
            return $sql->fetchAll();
        }catch(PDOException $e){
            return false;
        }
        
    }
}
?>