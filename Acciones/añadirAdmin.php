<?php
    include('conec.php');
    $btn = $_POST['btn'];
    switch ($btn) {
        case 'Añadir Montaje':
            $montaje = $_POST['valorAñadido'];
            $consulta = "INSERT INTO montaje (nombre_montaje) VALUE ('$montaje')";
            $resultado = mysqli_query($conexion, $consulta);
            header('location: ../Paginas/EdicionAdmin/tablaAdmin.php');
            break;
        case 'Añadir Tipo':
            $tipoPaquete = $_POST['valorAñadido'];
            $consulta = "INSERT INTO tipo_servicio (nom_servicio) VALUE ('$tipoPaquete')";
            $resultado = mysqli_query($conexion, $consulta);
            header('location: ../Paginas/EdicionAdmin/tablaAdmin.php');
            break;
        case 'Añadir Ciudad':
            $ciudad = $_POST['valorAñadido'];
            $consulta = "INSERT INTO ciudad (nombre_ciudad) VALUE ('$ciudad')";
            $resultado = mysqli_query($conexion, $consulta);
            header('location: ../Paginas/EdicionAdmin/tablaAdmin.php');
            break;

    }
    //redireccionamiento//
?>