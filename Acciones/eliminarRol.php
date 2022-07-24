<?php
include('conec.php');

$codigoRol=$_GET['idRol'];
$eliminarRol="DELETE FROM rol_usuario WHERE cod_rol='$codigoRol'";
$resultadoRol=mysqli_query($conexion,$eliminarRol);

header('Location: ../Paginas/EdicionAdmin/tablaAdmin.php');
?>