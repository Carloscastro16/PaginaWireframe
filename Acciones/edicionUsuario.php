<?php
include('conec.php');
    session_start();
    $cod_usuario = $_SESSION['cod_usuario'];
    $nomUser= $_POST['nombre'];
    $apellPa= $_POST['apellPa'];
    $apellMa = $_POST['apellMa'];
    $correo= $_POST['correo'];
    $pass= $_POST['password'];
    $clave = password_hash($pass, PASSWORD_DEFAULT);
    //consulta mysql//
    $consulta1 = "UPDATE usuario SET 
    nombre_usuario = '$nomUser', 
    ape_paterno = '$apellPa', 
    ape_materno = '$apellMa', 
    correo_usuario = '$correo'
    WHERE cod_usuario = $cod_usuario";

    $consulta2 = "UPDATE usuario SET 
    nombre_usuario = '$nomUser', 
    ape_paterno = '$apellPa', 
    ape_materno = '$apellMa', 
    correo_usuario = '$correo', 
    contra_usuario = '$clave' 
    WHERE cod_usuario = $cod_usuario";
    if (empty($clave)){
        $editarUsuario= $consulta2;
    }else {
        $editarUsuario= $consulta1;
    }
    $resultados=mysqli_query($conexion,$editarUsuario);
    //Redireccionamiento a index sino funciona
    if (!$resultados){
        header('location: ../Paginas/PerfilCliente.php');
        //redireccionamiento//
    }else{
        header('location: ../Paginas/PerfilCliente.php');
    };
    //Redireccionamiento Automatico
?>