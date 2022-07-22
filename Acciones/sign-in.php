<?php
include('conec.php');
$agregar = $_POST['agregar'];

    $nomUser= $_POST['nombre'];
    $apellPa= $_POST['apellPa'];
    $apellMa= $_POST['apellMa'];
    $correo= $_POST['correo'];
    $pass= $_POST['password'];
    $nombreEmpresa= $_POST['nombreEmpresa'];
    $telefono= $_POST['telefono'];
    $rfc= $_POST['rfc'];
    $encryptPass = password_hash($pass, PASSWORD_DEFAULT);
    //consulta mysql//
    //mensaje si no se ingresa valores//
    $consultaEmail = "SELECT COUNT(*) as contador FROM usuario WHERE correo_usuario = '$correo'";
    $validacion = mysqli_query($conexion, $consultaEmail);
    $validacionEmail = mysqli_fetch_array($validacion);

    if($validacionEmail['contador'] == 0){
        if(empty($rfc)){
            $insertarUsuario= "CALL sp_reg_cliente('$nomUser','$apellPa','$apellMa','$correo','$encryptPass')";
            $resultados=mysqli_query($conexion,$insertarUsuario);
            header ('location: ../Paginas/PerfilCliente.php');
        }else{
            $insertarUsuario = "CALL sp_reg_usrempresa('$nomUser','$apellPa','$apellMa','$correo','$encryptPass',$telefono,'$rfc')";
            $resultados=mysqli_query($conexion,$insertarUsuario);
            header ('location: ../Paginas/DashboardEmpresa.php');
        }
    }else {
        
        header ('location: ../Paginas/LogIn.php');
        echo "<script type='text/javascript'> alert('El correo ya existe en la base de datos');</script>";
    }
    //redireccionamiento//
?>