<?php
include('conec.php');
    $btnValor = $_POST['editar'];

    switch ($btnValor) {
        case 'Editar cliente':
            $rol = $_POST['rol'];
            $cod_usuario = $_POST['codUsuario'];
            $nomUser= $_POST['nombre'];
            $apellPa= $_POST['apellPa'];
            $apellMa = $_POST['apellMa'];
            $correo= $_POST['correo'];
            $pass= $_POST['password'];
            $clave = password_hash($pass, PASSWORD_DEFAULT);
            //consulta mysql//
            $consulta1 = "UPDATE usuario SET
            fk_rol_usuario = '$rol',  
            nombre_usuario = '$nomUser', 
            ape_paterno = '$apellPa', 
            ape_materno = '$apellMa', 
            correo_usuario = '$correo'
            WHERE cod_usuario = $cod_usuario";

            $consulta2 = "UPDATE usuario SET
            fk_rol_usuario = '$rol',  
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
            /* header('location: ../Paginas/EdicionAdmin/tablasUsuario.php'); */
            //Redireccionamiento Automatico
            break;
        case 'Editar empresa':
            $rol = $_POST['rol'];
            $cod_usuario = $_POST['codUsuario'];
            $nomUser= $_POST['nombre'];
            $apellPa= $_POST['apellPa'];
            $apellMa = $_POST['apellMa'];
            $correo= $_POST['correo'];
            $pass= $_POST['password'];
            $clave = password_hash($pass, PASSWORD_DEFAULT);
            $nombreEmpresa = $_POST['nomEmpresa'];
            $telEmpresa = $_POST['telEmpresa'];
            $rfc = $_POST['rfc'];
            //consulta mysql//
            $consulta1 = "UPDATE usuario SET 
            fk_rol_usuario = '$rol', 
            nombre_usuario = '$nomUser', 
            ape_paterno = '$apellPa', 
            ape_materno = '$apellMa', 
            correo_usuario = '$correo',
            nombre_empresa = '$nombreEmpresa', 
            tel_empresa = '$telEmpresa',
            rfc = '$rfc'
            WHERE cod_usuario = $cod_usuario";

            $consulta2 = "UPDATE usuario SET 
            fk_rol_usuario = '$rol', 
            nombre_usuario = '$nomUser', 
            ape_paterno = '$apellPa', 
            ape_materno = '$apellMa', 
            correo_usuario = '$correo', 
            contra_usuario = '$clave',
            nombre_empresa = '$nombreEmpresa', 
            tel_empresa = '$telEmpresa',
            rfc = '$rfc' 
            WHERE cod_usuario = $cod_usuario";
            if (empty($clave)){
                $editarUsuario= $consulta2;
            }else {
                $editarUsuario= $consulta1;
            }
            $resultados=mysqli_query($conexion,$editarUsuario);
            
            //Redireccionamiento Automatico
            break;
        case 'Editar admin':
            $rol = $_POST['rol'];
            $cod_usuario = $_POST['codUsuario'];
            $nomUser= $_POST['nombre'];
            $apellPa= $_POST['apellPa'];
            $apellMa = $_POST['apellMa'];
            $correo= $_POST['correo'];
            $pass= $_POST['password'];
            $clave = password_hash($pass, PASSWORD_DEFAULT);
            //consulta mysql//
            $consulta1 = "UPDATE usuario SET
            fk_rol_usuario = '$rol', 
            nombre_usuario = '$nomUser', 
            ape_paterno = '$apellPa', 
            ape_materno = '$apellMa', 
            correo_usuario = '$correo'
            WHERE cod_usuario = $cod_usuario";

            $consulta2 = "UPDATE usuario SET 
            fk_rol_usuario = '$rol', 
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
            /* header('location: ../Paginas/EdicionAdmin/tablasUsuario.php'); */
            //Redireccionamiento Automatico
            break;
    }
    header('location: ../Paginas/EdicionAdmin/tablasUsuario.php');
    //Redireccionamiento a index sino funciona
    /* if (!$resultados){
        header('location: ../Paginas/PerfilCliente.php');
        //redireccionamiento//
    }else{
        header('location: ../Paginas/PerfilCliente.php');
    }; */
?>