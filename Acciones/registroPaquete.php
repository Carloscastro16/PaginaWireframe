<?php
include('conec.php');

    session_start();
    if(isset($_POST['registro'])){
    
    //cargar imagen//
    $nomImagenPaquete= $_REQUEST["txtnom"];
    $imagenPaquete= $_FILES['imagen']['name'];
    $ruta= $_FILES["imagen"]["tmp_name"];
    $destino="imagenes/". $imagenPaquete;
    copy($ruta,$destino);
    //fin cargar imagen//
    $nombrePaquete= $_POST['nombrePaquete'];
    $tipoServicio= $_POST['tipoServicio'];
    $locacion= $_POST['ciudad'];
    $direccion= $_POST['direcEvento'];
    $disponibilidad= $_POST['disponibilidadEv'];
    $precioEvento= $_POST['precioEvento'];
    $cantidadPersonas= $_POST['cantidadPersonas'];
    $Descripcion= $_POST['descripcion'];
    //conuslta para registrar//
    $registrarPaquete= "CALL sp_registroPaquete ('$nomImagenPaquete','$nombrePaquete','$tipoServicio',
                                                '$locacion','$direccion','$disponibilidad',
                                                '$precioEvento','$cantidadPersonas','$Descripcion')";
    $resultados=mysqli_query($conexion,$registrarPaquete);
    if (!$resultados){
        echo '<script> alert ("los datos no se insertador") </script>';
        header('location: index.html');
    } else {
        echo '<script> alert("los datos se insertador") </script>';
    }
}
//redireccionar
header('location: altapquetes.php');
    
    
?>