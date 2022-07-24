<?php
include('../../Acciones/conec.php');

$codigoRol=$_GET['idRol'];
$eliminarRol="DELETE FROM rol_usuario WHERE cod_rol='$codigoRol'";
$resultadoRol=mysqli_query($conexion,$eliminarRol);
//falta direccionar
header('Location: ../EdicionAdmin/tablasUsuario.php');
?>