<?php
    //Incluimos el modelo necesario y la base de datos
    require_once("../db/db.php");
    require_once("../modelo/modelo_Cliente.php");
    //require_once("../modelo/modelo_Reserva.php");
    session_start();

    //Si la sesión usuarioCliente esta establecida entra en el if y si esta establecida la cesta modifica los datos del cliente
    //Inserta el método de pago en la base de datos y las reservas de las habitaciones
    if(isset($_SESSION["usuarioCliente"])){
        $cesta = $_SESSION["usuarioCliente"]->getCesta();
        if($cesta!=null){
            //Conectamos con la base de datos
            $baseDatos = new Conectar();

            //Llamamos al método editarCliente2 para editarlo en la base de datos
            $baseDatos->editarCliente2($_POST["editarUsuario"], $_POST["editarNombre"], $_POST["editarApellidos"], $_POST["editarDNI"], $_POST["editarEmail"], $_POST["editarTelefono"], $_POST["editarDireccion"], $_POST["editarPais"], $_POST["editarCiudad"], $_POST["editarCodPostal"]);

            //Cambios los datos de la sesión del cliente
            $_SESSION["usuarioCliente"]->setNomUsuario($_POST["editarUsuario"]);
            $_SESSION["usuarioCliente"]->setNombre($_POST["editarNombre"]);
            $_SESSION["usuarioCliente"]->setApellidos($_POST["editarApellidos"]);
            $_SESSION["usuarioCliente"]->setDni($_POST["editarDNI"]);
            $_SESSION["usuarioCliente"]->setEmail($_POST["editarEmail"]);
            $_SESSION["usuarioCliente"]->setTelefono($_POST["editarTelefono"]);
            $_SESSION["usuarioCliente"]->setDireccion($_POST["editarDireccion"]);
            $_SESSION["usuarioCliente"]->setPais($_POST["editarPais"]);
            $_SESSION["usuarioCliente"]->setCiudad($_POST["editarCiudad"]);
            $_SESSION["usuarioCliente"]->setCodigoPostal($_POST["editarCodPostal"]);

            //Recorremos la cesta.
            foreach ($cesta as $c) {
                //Cambiamos el formato de la fecha para insertarla en reserva
                $fechaIngreso=$c->getFechaIngreso();
                $fechaSalida=$c->getFechaSalida();

                $arr = explode('/', $fechaIngreso);  
                $fechaIngreso = $arr[2].'-'.$arr[1].'-'.$arr[0];

                $arr = explode('/', $fechaSalida);  
                $fechaSalida = $arr[2].'-'.$arr[1].'-'.$arr[0];

                //Llamamos al método para insertar la reserva.
                $baseDatos->reserva($c->getFk_Numero(), $c->getPrecio(), $c->getFk_TipoAlojamiento(), $fechaIngreso, $fechaSalida, $c->getFk_NomUsuario(), $c->getOcupacionSel());
                
                //Sacamos el ultimo id de la reserva para insertarlo en pago
                $fk_idReserva=$baseDatos->idReserva();
                
                //Lammamos al método pago para insertar el pago de cada reserva
                $baseDatos->pago($fk_idReserva[0], $_POST["titularTarjeta"], $_POST["numeroTarjeta"], $_POST["mes"], $_POST["ano"], $_POST["cvv"]);

                //Lammamos al método historico para insertar la reserva y el pago en una tabla
                $fechaHoyhis=date("Y-m-d");
                $baseDatos->historico($c->getFk_Numero(), $c->getPrecio(), $c->getFk_TipoAlojamiento(), $fechaHoyhis, $fechaIngreso, $fechaSalida, 0, $c->getFk_NomUsuario(), $c->getOcupacionSel(), $_POST["titularTarjeta"], $_POST["numeroTarjeta"], $_POST["mes"], $_POST["ano"], $_POST["cvv"]);
            }

            //Vaciamos la cesta para que cuando vuelva a reservar no tenga habitaciones en la cesta
            $_SESSION["usuarioCliente"]->setCesta(null);

            //Sesión que mostraremos cuando la reserva se haya ejecutado correctamente
            $_SESSION["reservaExito"]="Tu reserva ha sido realizada con exito";

            //Nos dirigimos al index.php
            header("location:../index.php");
        }else{
            //Nos dirigimos al index.php
            header("location:../index.php");
        }
    }else{
        //Nos dirigimos al index.php
        header("location:../index.php");
    }

?>