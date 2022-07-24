<?php
include('conec.php');

$codigoUsuario=$_GET['idUsuario'];
$eliminarUsuario="DELETE FROM usuario WHERE cod_usuario='$codigoUsuario'";
$resultado=mysqli_query($conexion,$eliminarUsuario);
//falta direccionar
header('Location: ../tablasUsuario.php');
?>