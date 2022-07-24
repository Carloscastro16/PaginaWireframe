<?php
include('conec.php');

$codigoMontaje=$_GET['idMontaje'];
$eliminarMontaje="DELETE FROM montaje WHERE cod_montaje='$codigoMontaje'";
$resultado=mysqli_query($conexion,$eliminarMontaje);
header('Location: ../Paginas/EdicionAdmin/tablaAdmin.php');
?>