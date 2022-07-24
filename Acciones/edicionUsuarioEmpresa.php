<?php
include('conec.php');
    session_start();
    $rolUsuario = $_SESSION['rolUsuario'];
    $cod_usuario = $_POST['codUsuario'];
    $nomUser= $_POST['nombre'];
    $apellPa= $_POST['apellPa'];
    $apellMa = $_POST['apellMa'];
    $nomEmpresa = $_POST['nombreEm'];
    $correo= $_POST['correo'];
    $pass= $_POST['password'];
    $clave = password_hash($pass, PASSWORD_DEFAULT);
    //consulta mysql//
    $consulta1 = "UPDATE usuario SET 
    nombre_usuario = '$nomUser', 
    ape_paterno = '$apellPa', 
    ape_materno = '$apellMa',
    nombre_empresa ='$nomEmpresa', 
    correo_usuario = '$correo'
    WHERE cod_usuario = $cod_usuario";

    $consulta2 = "UPDATE usuario SET 
    nombre_usuario = '$nomUser', 
    ape_paterno = '$apellPa', 
    ape_materno = '$apellMa', 
    nombre_empresa ='$nomEmpresa',
    correo_usuario = '$correo', 
    contra_usuario = '$clave' 
    WHERE cod_usuario = $cod_usuario";
    if (empty($clave)){
        $editarUsuario= $consulta2;
    }else {
        $editarUsuario= $consulta1;
    }
    $resultados=mysqli_query($conexion,$editarUsuario);
    if (!$resultados){
        //redireccionamiento//
        header('location: ../Paginas/DashboardAdmin.php');
    }else{
        header('location: ../Paginas/DashboardAdmin.php');
    };
?>