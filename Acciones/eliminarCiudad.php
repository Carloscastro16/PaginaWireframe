<?php
include('conec.php');

$codigoCiudad=$_GET['idCiudad'];
$eliminarCiudad="DELETE FROM ciudad WHERE cod_ciudad='$codigoCiudad'";
$resultado=mysqli_query($conexion,$eliminarCiudad);
header('Location: ../Paginas/EdicionAdmin/tablaAdmin.php');
?>