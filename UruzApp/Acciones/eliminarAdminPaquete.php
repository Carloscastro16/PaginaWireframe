<?php
include('conec.php');

$codigoPaquete=$_GET['idPaquete'];
$eliminarPaquete="DELETE FROM paquete WHERE cod_paquete='$codigoPaquete'";
$resultado=mysqli_query($conexion,$eliminarPaquete);
header('Location: ../Paginas/EdicionAdmin/tablaSistema.php');
?>