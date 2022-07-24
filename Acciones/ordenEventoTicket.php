<?php
include('conec.php');
    session_start();
    $codUsuario = $_SESSION['cod_usuario'];
    $codMontaje = $_POST['codMontaje'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $numTel = $_POST['celular'];
    $codPaquete = $_POST['codPaquete'];
    //consulta mysql//
    $insertarOrden= "INSERT INTO orden_evento(fk_cod_usuario, fk_cod_montaje, fecha, hora_evento, num_tel, fk_cod_paquete) VALUE('$codUsuario','$codMontaje', '$fecha', '$hora', '$numTel', '$codPaquete')";
    $resultados=mysqli_query($conexion,$insertarOrden);
    //mensaje si no se ingresa valores//
/* header('location: ../Paginas/ticket.php'); */
    //redireccionamiento//
?>