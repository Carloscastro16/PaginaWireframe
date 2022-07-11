<?php
include('conec.php');
if(isset($_POST['agregar'])){
    $nomUser= $_POST['nombre'];
    $apellPa= $_POST['apellidos'];
    $correo= $_POST['correo'];
    $clave= $_POST['password'];
    $encryptPass = password_hash($pass, PASSWORD_DEFAULT);
    //consulta mysql//
    $insertarUsuario= "CALL `sp_registrarUsuario`('$nomUser','$apellPa','$apellMa','$celular','$correo','$usuario','$clave')";
    $resultados=mysqli_query($conexion,$insertarUsuario);
    //mensaje si no se ingresa valores//
    
}
header('location: ../pages/usuarios.php');
    //redireccionamiento//
?>