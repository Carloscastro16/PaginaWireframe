<?php
include('conec.php');
    session_start();
    $codUsuario = $_SESSION['cod_usuario'];
    $codMontaje = $_POST['codMontaje'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $numTel = $_POST['celular'];
    $codPaquete = $_POST['codPaquete'];
    $confirmacion = false;
    while($confirmacion != true){
        $numRand = random_int(1000, 999999);
        $consultaFolio = "SELECT COUNT(folio_evento) as folio FROM orden_evento WHERE folio_evento = '$numRand'";
        $resultado = mysqli_query($conexion, $consultaFolio);
        $filaFolio = mysqli_fetch_array($resultado);
        if ($filaFolio['folio'] == 0) {
            $confirmacion = true;
        }
    }
    //consulta mysql//
    $insertarOrden= "INSERT INTO orden_evento(folio_evento, fk_cod_usuario, fk_cod_montaje, fecha, hora_evento, num_tel, fk_cod_paquete) VALUE('$numRand','$codUsuario','$codMontaje', '$fecha', '$hora', '$numTel', '$codPaquete')";
    $resultados=mysqli_query($conexion,$insertarOrden);
    //mensaje si no se ingresa valores//
header('location: ../Paginas/ticket.php');
    //redireccionamiento//
?>