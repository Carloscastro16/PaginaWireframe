<?php
include('conec.php');
    session_start();
    if(isset($_POST['registro'])){
    
    //cargar imagen//
    //$nomImagenPaquete= $_REQUEST["txtnom"];
    $codusuario=$_POST['fkcodEmpresa'];
    $imagenPaquete= $_FILES['txtnom']['name'];
    $ruta= $_FILES["txtnom"]["tmp_name"];
    $destino="../imagenes/" . $imagenPaquete;
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
<<<<<<< HEAD
    switch($accion){
        case "btnAgregar":
            $registrarPaquete= "INSERT INTO paquete(fk_cod_empresa,imagen_paquete,nom_paquete,fk_cod_tipo_servicio,
    fk_cod_ciudad,direc_evento,disponibilidad_evento,precio_paquete,cant_personas,descrip_paquete) 
    VALUE ('$codusuario',' $imagenPaquete','$nombrePaquete',$tipoServicio,'$locacion','$direccion',' $disponibilidad',
    $precioEvento,'$cantidadPersonas','$Descripcion')";
    
    $resultados=mysqli_query($conexion,$registrarPaquete);
=======
>>>>>>> parent of b4ce980 (Merge branch 'main' of https://github.com/Carloscastro16/PaginaWireframe)
    //conuslta para registrar//
    //$registrarPaquete= "CALL sp_registroPaquete ('$nomImagenPaquete','$nombrePaquete','$tipoServicio',
                                              //  '$locacion','$direccion','$disponibilidad',
                                             //   '$precioEvento','$cantidadPersonas','$Descripcion')";
<<<<<<< HEAD
            break;
      
    }
        

    

=======
    $registrarPaquete= "INSERT INTO paquete(fk_cod_empresa,imagen_paquete,nom_paquete,fk_cod_tipo_servicio,
    fk_cod_ciudad,direc_evento,disponibilidad_evento,precio_paquete,cant_personas,descrip_paquete) 
    VALUE ('$codusuario',' $imagenPaquete','$nombrePaquete',$tipoServicio,'$locacion','$direccion',' $disponibilidad',
    $precioEvento,'$cantidadPersonas','$Descripcion')";
    $resultados=mysqli_query($conexion,$registrarPaquete);
    if (!$resultados){
        echo '<script> alert ("los datos no se insertador") </script>';
        header('location: index.php');
    } else {
        echo '<script> alert("los datos se insertador") </script>';
    }
}
>>>>>>> parent of b4ce980 (Merge branch 'main' of https://github.com/Carloscastro16/PaginaWireframe)
//redireccionar
header('location: ../Paginas/altapaquetes.php');
    
    
?>