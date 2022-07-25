<?php
include('conec.php');
if(isset($_POST['agregar'])){
    $ubicacion= $_POST['ubicacion'];
    $fecha = $_POST['fecha'];
    $cantPersonas = $_POST['cantPersonas'];
    
    //consulta mysql//
    $insertarUsuario= "CALL `sp_registrarUsuario`('$nomUser','$apellPa','$apellMa','$celular','$correo','$usuario','$clave')";
    $resultados=mysqli_query($conexion,$insertarUsuario);
    //mensaje si no se ingresa valores//
    
}
header('location: ../pages/usuarios.php');
    //redireccionamiento//
?>