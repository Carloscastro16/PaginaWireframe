<?php
include('conec.php');

    session_start();
    $cod_empresa = $_SESSION['id'];
    $imagenPaquete= $_FILES['imagenPaquete'],['imagenPaquete'];
    $nombrePaquete= $_POST['nombrePaquete'];
    $tipoServicio= $_POST['tipoServicio'];
    $locacion= $_POST['locacion'];
    $ubicacion= $_POST['ubicacion'];
    $disponibilidad= $_POST['DisponibilidadEv'];
    $precioEvento= $_POST['precioEvento'];
    $cantidadPersonas= $_POST['cantidadPersonas'];
    $Descripcion= $_POST['Descripcion'];
    //consulta mysql//
    //mensaje si no se ingresa valores//
    //redireccionamiento//
?>