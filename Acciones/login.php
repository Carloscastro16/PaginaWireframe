<?php
    include ('conec.php');


print_r($_POST);

    $email = $_POST['correo'];
    $pass = $_POST['password'];
    //password_hash sirve para encriptar la contraseña y se añade en el registro
    /* $encryptPass = password_hash($pass, PASSWORD_DEFAULT); */
    
    $consulta = "SELECT * FROM usuario WHERE correo_usuario = '$email'";
    /* $registro = "CALL tr_logeo_inicio('$email', '$pass')"; */
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    
    //Confirma que se hizo algo nadamas
    $respuesta = '';
    
    //password_hash sirve para verificar la contraseña
    $encryptPass = password_verify($pass, $fila["contra_usuario"]);

    //Se evita todo esto para usar el anterior
        if(sizeof((array)$fila)>0){
            if ($encryptPass){
                session_start();
                $_SESSION['id']=$fila["cod_usuario"];
                $_SESSION['correo']=$fila["correo_usuario"];
                $_SESSION['password']=$fila["contra_usuario"];
                $respuesta = 1;
                echo $respuesta;
                /* $resultado2 = mysqli_query($conexion, $registro); */
            } else {
                $respuesta = "La respuesta no coincide";
            }
        }else{
            $respuesta = "Email no encontrado";
        }
    //Se evita hasta aqui.
    
    if($respuesta==1 && $fila["fk_rol_usuario"] == 2){
        header('Location: ../Paginas/DashboardCliente.php');
    }else if ($respuesta==1 && $fila["fk_rol_usuario"] == 3){
        header('Location: ../Paginas/DashboardEmpresa.php');
    }else{
        header('Location: ../Paginas/LogIn.html');
    }

?>