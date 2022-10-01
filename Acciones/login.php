
<?php
    include ('conec.php');
    $email = $_POST['correo'];
    $pass = $_POST['password'];  
    $consulta = "SELECT * FROM usuario WHERE correo_usuario LIKE '$email'";

    /* Colsulta para guardar el registro en una tabla */
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    $rolUsuario = $fila["fk_rol_usuario"];
    $idUsuario = $fila["cod_usuario"];
    $nombre_usuario = $fila["nombre_usuario"];
    $registro = "CALL tr_logeo_usuarios('$email', $idUsuario, $rolUsuario)";
    
    //Confirma que se hizo algo nadamas
    $respuesta = '';
    
    //password_hash sirve para verificar la contraseña
    $encryptPass = password_verify($pass, $fila["contra_usuario"]);

    if(count($fila) > 0){
        if ($encryptPass){
            session_start();
            $_SESSION['cod_usuario']= $idUsuario;
            $_SESSION['correo']= $email;
            $_SESSION['rolUsuario'] = $rolUsuario;
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            $respuesta = 1;
            echo $respuesta;
            $resultado2 = mysqli_query($conexion, $registro);
        } else {
            $respuesta = "La respuesta no coincide";
            echo "<script>alert('Contraseña Incorrecta');</script>";
        }
    }else{
        $respuesta = "No existe tu perfil";
        echo $respuesta;
    }
        if($respuesta==1 && $rolUsuario == 2){
            header('Location: ../Paginas/PerfilCliente.php');
        }else if ($respuesta==1 && $rolUsuario == 3){
            header('Location: ../Paginas/DashboardEmpresa.php');
            
        }else if ($respuesta==1 && $rolUsuario == 1){
            header('Location: ../Paginas/DashboardAdmin.php');
        }else{
            /* header('Location: ../Paginas/LogIn.php'); */
            
            echo "<script>window.location.href = '../Paginas/LogIn.php';</script>";
        }

?>