<?php
include('conec.php');

$codigoOrden=$_GET['idOrden'];
$eliminarOrden="DELETE FROM orden_evento WHERE cod_orden_evento='$codigoOrden'";
$resultado=mysqli_query($conexion,$eliminarOrden);
header('Location: ../Paginas/EdicionAdmin/tablaSistema.php');
?>