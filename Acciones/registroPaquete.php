<?php
include('conec.php');
    session_start();
    $accion= (isset($_POST['registro']));
    $codusuario=$_POST['fkcodEmpresa'];
        //cargar imagen//
    $imagenPaquete= $_FILES['txtFoto']['name'];
    $ruta= $_FILES["txtFoto"]["tmp_name"];
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
    switch($accion){
        case "btnAgregar":
            $registrarPaquete= "INSERT INTO paquete(fk_cod_empresa,imagen_paquete,nom_paquete,fk_cod_tipo_servicio,
    fk_cod_ciudad,direc_evento,disponibilidad_evento,precio_paquete,cant_personas,descrip_paquete) 
    VALUE ('$codusuario',' $imagenPaquete','$nombrePaquete',$tipoServicio,'$locacion','$direccion',' $disponibilidad',
    $precioEvento,'$cantidadPersonas','$Descripcion')";
    
    $resultados=mysqli_query($conexion,$registrarPaquete);
    //conuslta para registrar//
    //$registrarPaquete= "CALL sp_registroPaquete ('$nomImagenPaquete','$nombrePaquete','$tipoServicio',
                                              //  '$locacion','$direccion','$disponibilidad',
                                             //   '$precioEvento','$cantidadPersonas','$Descripcion')";
            break;
      
    }
        

    

//redireccionar
header('location: ../Paginas/altapaquetes.php');
    
    
?>