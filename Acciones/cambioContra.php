<?php
include('conec.php');
    session_start();
    $pregunta = $_POST['pregunta'];
    $respuesta = $_POST['respuesta'];
    $codUsuario= $_POST['codUsuario'];
    $pass= $_POST['password'];
    $clave = password_hash($pass, PASSWORD_DEFAULT);
    //consulta mysql//
    $consultaUsuario = "SELECT * FROM recuperacion WHERE fk_cod_usuario = '$codUsuario' AND preg_seguridad LIKE '$pregunta'";
    $resultadoUsuario = mysqli_query($conexion,$consultaUsuario);
    $fila = mysqli_fetch_array($resultadoUsuario);
    $respuestaOriginal = $fila['resp_seguridad'];
    if ($respuesta == $respuestaOriginal){
        $consultaActualizar = "UPDATE usuario SET
            contra_usuario = '$clave'
            WHERE cod_usuario = $codUsuario";
        $respuestaActualizar = mysqli_query($conexion,$consultaActualizar);
        header('location: ../Paginas/LogIn.php');
    }else{
        /* echo "<script type='text/javascript' >alert('ERROR: NO SEAS HACKER')</script>";
        echo "<script type='text/javascript'>window.location.replace('../Paginas/LogIn.php');</script>"; */
    }
?>