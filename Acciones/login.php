<?php
    include ('conec.php');


print_r($_POST);

    $email = $_POST['correo'];
    $pass = $_POST['password'];
    //password_hash sirve para encriptar la contraseña y se añade en el registro
    /* $encryptPass = password_hash($pass, PASSWORD_DEFAULT); */
    
    $consulta = "SELECT * FROM usuario WHERE correo = '$email'";
    $registro = "CALL tr_logeo_inicio('$email', '$pass')";
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    
    //Confirma que se hizo algo nadamas
    $respuesta = '';
    
    //password_hash sirve para verificar la contraseña
    $encryptPass = password_verify($pass, $fila["password"]);

    if ($encryptPass){
        session_start();
        $_SESSION['id']=$fila["id"];
        $_SESSION['correo']=$fila["correo"];
        $_SESSION['password']=$fila["password"];
        $respuesta = 1;
        echo $respuesta;
        $resultado2 = mysqli_query($conexion, $registro2);
    } else {
        $respuesta = "La respuesta no coincide";
    }
    //Se evita todo esto para usar el anterior
        if(sizeof((array)$fila)>0){

            if($fila["clave"]==$pass){
                session_start();
                $_SESSION['id']=$fila["id"];
                $_SESSION['correo']=$fila["correo"];
                $_SESSION['password']=$fila["password"];
                $respuesta = 1;
                echo $respuesta;
                $resultado2 = mysqli_query($conexion, $registro2);
            
            }else{
            
                $respuesta = "La contraseña no coincide";
            
            }
        }else{
            $respuesta = "Email no encontrado";
        }
    //Se evita hasta aqui.
    
    if($respuesta==1){
        header('Location: ../pages/dashboard.php');
    }else{
        header('Location: ../index.html');
    }

?>