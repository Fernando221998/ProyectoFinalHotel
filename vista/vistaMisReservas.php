<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&family=Roboto+Mono&family=Rubik:wght@300&family=The+Nautigal:wght@700&display=swap" rel="stylesheet"> 

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Redressed&family=Roboto+Mono&family=Rubik:wght@300&family=The+Nautigal:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Mis Reservas</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<body class="body1">

    <?php
        require_once("../swal/swal.php");
        $_SESSION["usutra"]="bordefijo";
        require_once("../vista/header.php");
        unset($_SESSION["usutra"]);
    ?>

    <!-- Section que contiene un nav tab con la administración de empleados y reserva-->
    <section class="sectionAdministrador pt-4 pb-4">
        <div class="container containesAdministrador">
            <h1 class="text-center pt-2 letraAdministaracion">MIS RESERVAS</h1> 
            <div class="row">
                <div class="table-responsive pb-2">
                    <table class="table table-success table-striped table-hover responsive misreservas" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center centrarTabla">Nombre</th>
                            <th scope="col" class="text-center centrarTabla">Precio</th>
                            <th scope="col" class="text-center centrarTabla">Tipo alojamiento</th>
                            <th scope="col" class="text-center centrarTabla">Entrada</th>
                            <th scope="col" class="text-center centrarTabla">Salida</th>
                            <th scope="col" class="text-center centrarTabla">Ocupación</th>
                            <th scope="col" class="text-center centrarTabla">Gestión</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            //Recorremos los empleados y lo mostramos
                            foreach ($reservas as $r) {
                                $nombreHabi = $baseDatos->nombreHabitación($r["fk_numero"]);
                                $tipoAloja = $baseDatos->nombreTipoAlojamiento($r["fk_tipoAlojamiento"]);
                                $fechaEntradaDiferencia = new DateTime($r["fechaIngreso"]);
                                $fechaSalidaDiferencia = new DateTime($r["fechaSalida"]);
                                $noches = $fechaSalidaDiferencia->diff($fechaEntradaDiferencia);
                                $fechaEntrada = date("Y/m/d", strtotime($r["fechaIngreso"]));
                                $fechaSalida = date("Y/m/d", strtotime($r["fechaSalida"]));
                        ?>                   
                                <tr>
                                    <td class="text-center centrarTabla"><?=$nombreHabi[0]?></td>
                                    <td class="text-center centrarTabla"><?=$r["precio"]*$noches->days?>€</td>
                                    <td class="text-center centrarTabla"><?=$tipoAloja[0]?></td>
                                    <td class="text-center centrarTabla"><?=$fechaEntrada?></td>
                                    <td class="centrarTabla text-center"><?=$fechaSalida?></td>
                                    <td class="centrarTabla text-center"><?=$r["ocupacionSel"]?></td>
                                    <td class="centrarTabla text-center">
                                        <div class="btn-group divBoton" role="group" aria-label="Basic mixed styles example">                                        
                                                <?php
                                                if($fecha>=$r["fechaIngreso"]){
                                                ?>
                                                    <button type="button" disabled class="btn btn-danger ms-2 letraAdministaracion"> <i class="bi bi-trash-fill"></i> Cancelar</button>
                                                <?php
                                                }else{
                                                ?>
                                                    <form method="post" action="ReservaAEliminar.php">
                                                        <input type="hidden" name="numero" value="<?=$r["fk_numero"]?>">
                                                        <input type="hidden" name="fechaEntrada" value="<?=$r["fechaIngreso"]?>">
                                                        <input type="hidden" name="fechaSalida" value="<?=$r["fechaSalida"]?>">
                                                        <button type="submit" class="btn btn-danger ms-2 letraAdministaracion"> <i class="bi bi-trash-fill"></i> Cancelar</button>
                                                    </form>
                                                <?php   
                                                }
                                                ?>                                         
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            }                   
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <?php
        if(isset($_SESSION["reservaAEliminar"])){
            $array = $_SESSION["reservaAEliminar"];
            $id = $array[0];
            $numero = $array[1];
            $fechaEntrada = $array[4];
            $fechaSalida = $array[5];
            $nombreHabi = $baseDatos->nombreHabitación($numero);
            $fechaEntrada2 = date("d/m/Y", strtotime($fechaEntrada));
            $fechaSalida2 = date("d/m/Y", strtotime($fechaSalida));
            echo "<script> $(document).ready(function()
            {
                $('#eliminarReserva').modal('show');
            }); </script>";
            unset($_SESSION['reservaAEliminar']);  
        }
    ?>

    <div class="modal fade" id="eliminarReserva" tabindex="-1" aria-labelledby="eliminarReserva" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h5 class="text-white mb-0" id="exampleModalLabel">ELIMINAR RESERVA</h5>
                    <button type="button" class="btn-close bg-primary" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Deseas eliminar la <?=$nombreHabi[0]?> con fecha de entrada <?=$fechaEntrada2?> y de salida <?=$fechaSalida2?> 
                </div>
                <div class="modal-footer">
                <form method="post" action="eliminarReserva.php">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="numero2" value="<?=$numero?>">
                    <input type="hidden" name="fechaEntrada2" value="<?=$fechaEntrada?>">
                    <input type="hidden" name="fechaSalida2" value="<?=$fechaSalida?>">
                    <button type="submit" class="btn btn-success">Si</button>
                </form>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once("../vista/footer.php");
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="../js/tabla.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap5.min.css">
</body>
</html>