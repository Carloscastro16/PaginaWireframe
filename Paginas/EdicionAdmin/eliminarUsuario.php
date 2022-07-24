<?php
include('../Acciones/conec.php');

$codigoUsuario=$_GET['idUsuario'];
$eliminarUsuario="DELETE FROM usuario WHERE cod_usuario='$codigoUsuario'";
$resultado=mysqli_query($conexion,$eliminarUsuario);
header('Location: ../Paginas/altapaquetes.php');
?>