<?php
include('conec.php');
if(isset($_POST['agregar'])){
    $nomUser= $_POST['nomUser'];
    $apellPa= $_POST['apellPaU'];
    $apellMa = $_POST['apellMaU'];
    $celular= $_POST['telefonoUser'];
    $correo= $_POST['correoUser'];
    $usuario= $_POST['username'];
    $clave= $_POST['password'];
    //consulta mysql//
    $insertarUsuario= "CALL `sp_registrarUsuario`('$nomUser','$apellPa','$apellMa','$celular','$correo','$usuario','$clave')";
    $resultados=mysqli_query($conexion,$insertarUsuario);
    //mensaje si no se ingresa valores//
    
}
header('location: ../pages/usuarios.php');
    //redireccionamiento//
?>