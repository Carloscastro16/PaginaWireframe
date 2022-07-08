<?php
    include ('conec.php');


print_r($_POST);

    $email = $_POST['correo'];
    $pass = $_POST['password'];

    $consulta = "SELECT * FROM usuario WHERE correo = '$email'";
    $registro = "CALL tr_logeo_inicio('$email', '$pass')";
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    $registro2 = "CALL estado_login($fila['estado_usr'], '$email');"

    //Confirma que se hizo algo nadamas
    $respuesta = '';

    if(sizeof((array)$fila)>0){

        if($fila["clave"]==$pass){
            session_start();
            $_SESSION['id']=$fila["id"];
            $_SESSION['correo']=$fila["correo"];
            $_SESSION['usuario']=$fila["usuario"];
            $respuesta = 1;
            echo $respuesta;
            $resultado2 = mysqli_query($conexion, $registro2);
        
        }else{
        
            $respuesta = "La contraseña no coincide";
        
        }
    }else{
        $respuesta = "Email no encontrado";
    }

    
    if($respuesta==1){
        header('Location: ../pages/dashboard.php');
    }else{
        header('Location: ../index.html');
    }

?>