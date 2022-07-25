<?php
include('conec.php');

$codigoTipo=$_GET['idTipo'];
$eliminarTipo="DELETE FROM tipo_servicio WHERE cod_tipo_servicio='$codigoTipo'";
$resultado=mysqli_query($conexion,$eliminarTipo);
header('Location: ../Paginas/EdicionAdmin/tablaAdmin.php');
?>