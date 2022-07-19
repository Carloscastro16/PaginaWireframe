<?php
include('conec.php');

    $nomUser= $_POST['nombre'];
    $apellPa= $_POST['apellPa'];
    $apellMa = $_POST['apellMa'];
    $celular= $_POST['telefono'];
    $correo= $_POST['correo'];
    $usuario= $_POST['username'];
    $clave= $_POST['password'];
    //consulta mysql//
    $editarUsuario= "CALL sp_editUsers('$nomUser','$apellPa', '$apellMa', '$celular', '$correo', '$clave', '$usuario')";


    $resultados=mysqli_query($conexion,$editarUsuario);
    

    //Redireccionamiento a index sino funciona
    if (!$resultados){
        header('location: ../index.html');
        //redireccionamiento//
    }
header('location: ../pages/usuarios.php');
    //Redireccionamiento Automatico
?>