<?php
//Mostramos mensajes de error o exito al ejecutar acciones en la página web

if(isset($_SESSION["error"])){
    echo "<script> swal({
        title: 'Error',
        text: '".$_SESSION["error"]."',
        icon: 'error',
        button: 'Aceptar',
      }); </script>";
}
unset($_SESSION['error']);

if(isset($_SESSION["sinHabitaciones"])){
    echo "<script> swal({
        title: 'Error',
        text: '".$_SESSION["sinHabitaciones"]."',
        icon: 'error',
        button: 'Aceptar',
      }); </script>";
}
unset($_SESSION['sinHabitaciones']);

if(isset($_SESSION["reservaExito"])){
    echo "<script> swal({
        title: 'Exito',
        text: '".$_SESSION["reservaExito"]."',
        icon: 'success',
        button: 'Aceptar',
      }); </script>";
}
unset($_SESSION['reservaExito']);

if(isset($_SESSION["aciertoEditarPerfil"])){
    echo "<script> swal({
        title: 'Exito',
        text: '".$_SESSION["aciertoEditarPerfil"]."',
        icon: 'success',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['aciertoEditarPerfil']);

if(isset($_SESSION["acierto"])){
    echo "<script> swal({
        title: 'Exito',
        text: '".$_SESSION["acierto"]."',
        icon: 'success',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['acierto']);

if(isset($_SESSION["eliminado"])){
    echo "<script> swal({
        title: 'Exito',
        text: '".$_SESSION["eliminado"]."',
        icon: 'success',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['eliminado']);


if(isset($_SESSION["aciertoModificar"])){
    echo "<script> swal({
        title: 'Exito',
        text: '".$_SESSION["aciertoModificar"]."',
        icon: 'success',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['aciertoModificar']);

if(isset($_SESSION["errorOcupacion"])){
    echo "<script> swal({
        title: 'Error',
        text: '".$_SESSION["errorOcupacion"]."',
        icon: 'error',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['errorOcupacion']); 

if(isset($_SESSION["habitacionExite"])){
    echo "<script> swal({
        title: 'Error',
        text: '".$_SESSION["habitacionExite"]."',
        icon: 'error',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['habitacionExite']); 

if(isset($_SESSION["habitacionAñadida"])){
    echo "<script> swal({
        title: 'Añadida',
        text: '".$_SESSION["habitacionAñadida"]."',
        icon: 'success',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['habitacionAñadida']); 

if(isset($_SESSION["habitacionEliminada"])){
    echo "<script> swal({
        title: 'Eliminada',
        text: '".$_SESSION["habitacionEliminada"]."',
        icon: 'success',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['habitacionEliminada']);

if(isset($_SESSION["noReservas"])){
    echo "<script> swal({
        title: 'Sin reservas',
        text: '".$_SESSION["noReservas"]."',
        icon: 'error',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['noReservas']); 

if(isset($_SESSION["cancelada"])){
    echo "<script> swal({
        title: 'Cancelada',
        text: '".$_SESSION["cancelada"]."',
        icon: 'success',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['cancelada']); 

if(isset($_SESSION["reservasPasadasEliminadas"])){
    echo "<script> swal({
        title: 'Reservas eliminadas',
        text: '".$_SESSION["reservasPasadasEliminadas"]."',
        icon: 'success',
        button: 'Aceptar',
        }); </script>";
}
unset($_SESSION['reservasPasadasEliminadas']); 
?>