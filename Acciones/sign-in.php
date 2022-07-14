<?php
include('conec.php');
$agregar = $_POST['agregar'];

    $nomUser= $_POST['nombre'];
    $apellPa= $_POST['apellPa'];
    $apellMa= $_POST['apellMa'];
    $correo= $_POST['correo'];
    $pass= $_POST['password'];
    $telefono= $_POST['telefono'];
    $rfc= $_POST['rfc'];
    $encryptPass = password_hash($pass, PASSWORD_DEFAULT);
    //consulta mysql//
    //mensaje si no se ingresa valores//

if(empty($rfc)){
    $insertarUsuario= "CALL sp_reg_cliente('$nomUser','$apellPa','$apellMa','$correo','$encryptPass')";
    $resultados=mysqli_query($conexion,$insertarUsuario);
    header ('location: ../Paginas/DashboardCliente.php');
}else{
    $insertarUsuario = "CALL sp_reg_usrempresa('$nomUser','$apellPa','$apellMa','$correo','$encryptPass',$telefono,'$rfc')";
    $resultados=mysqli_query($conexion,$insertarUsuario);
    header ('location: ../Paginas/DashboardEmpresa.php');
}
    //redireccionamiento//
?>