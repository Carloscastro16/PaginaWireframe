<?php
    include('conec.php');
    $btn = $_POST['btn'];
    $codAccion = $_POST['codAccion'];
    $nombreAccion = $_POST['inputAccion'];

    switch ($btn) {
        case 'Editar rol':
            $consulta = "UPDATE rol_usuario SET nom_rol = '$nombreAccion' WHERE cod_rol = $codAccion";
            $resultado = mysqli_query($conexion, $consulta);
            header('location: ../Paginas/EdicionAdmin/tablaAdmin.php');
            break;
        case 'Editar servicio':
            $consulta =  "UPDATE tipo_servicio SET nom_servicio = '$nombreAccion' WHERE cod_tipo_servicio = '$codAccion'";
            $resultado = mysqli_query($conexion, $consulta);
            header('location: ../Paginas/EdicionAdmin/tablaAdmin.php');
            break;
        case 'Editar ciudad':
            $consulta =  "UPDATE ciudad SET nombre_ciudad = '$nombreAccion' WHERE cod_ciudad = '$codAccion'";
            $resultado = mysqli_query($conexion, $consulta);
            header('location: ../Paginas/EdicionAdmin/tablaAdmin.php');
            break;
        case 'Editar montaje':
            $consulta =  "UPDATE montaje SET nombre_montaje = '$nombreAccion' WHERE cod_montaje = '$codAccion'";
            $resultado = mysqli_query($conexion, $consulta);
            header('location: ../Paginas/EdicionAdmin/tablaAdmin.php');
            break;
    }
    //redireccionamiento//
?>