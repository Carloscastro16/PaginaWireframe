<?php
include('conec.php');
    session_start();
    $accion= (isset($_POST['btnAgregar']));
    //$nomImagenPaquete= $_REQUEST["txtnom"];
    $codPaquete=$_POST["codPaquete"];
    $codusuario=$_POST['fkcodEmpresa'];

    if(empty($imagenPaquete=$_FILES['txtnom']['name'])){
        //Registra el paquete sin imagen
        $registrarPaquete= "INSERT INTO paquete(fk_cod_empresa,nom_paquete,fk_cod_tipo_servicio,
            fk_cod_ciudad,direc_evento,disponibilidad_evento,precio_paquete,cant_personas,descrip_paquete) 
            VALUE ('$codusuario','$nombrePaquete',$tipoServicio,'$locacion','$direccion',' $disponibilidad',
            $precioEvento,'$cantidadPersonas','$Descripcion')";
    }else{
        $ruta= $_FILES["txtnom"]["tmp_name"];
        $destino="../imagenes/".$imagenPaquete;
        copy($ruta,$destino);
        $registrarPaquete= "INSERT INTO paquete(fk_cod_empresa,imagen_paquete,nom_paquete,fk_cod_tipo_servicio,
            fk_cod_ciudad,direc_evento,disponibilidad_evento,precio_paquete,cant_personas,descrip_paquete) 
            VALUE ('$codusuario','$imagenPaquete','$nombrePaquete',$tipoServicio,'$locacion','$direccion',' $disponibilidad',
            $precioEvento,'$cantidadPersonas','$Descripcion')";
    }
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
            
            $resultados=mysqli_query($conexion,$registrarPaquete);
            //conuslta para registrar//
            //$registrarPaquete= "CALL sp_registroPaquete ('$nomImagenPaquete','$nombrePaquete','$tipoServicio',
            //  '$locacion','$direccion','$disponibilidad',
            //   '$precioEvento','$cantidadPersonas','$Descripcion')";
        break;
        case "btnActualizar":
            if(empty($imagenPaquete)){
                $registrarPaquete= "UPDATE paquete SET 
                fk_cod_empresa =$codusuario;
                nom_paquete = $nombrePaquete;
                fk_cod_tipo_servicio= $tipoServicio;
                fk_cod_ciudad= $locacion;
                direc_evento=$direccion;
                disponibilidad_evento=$disponibilidad;
                precio_paquete=$precioEvento;
                cant_personas=$cantidadPersonas;
                descript_paquete=$Descripcion;
                WHERE cod_paquete=$codPaquete";
            }
            $resultados=mysqli_query($conexion,$registrarPaquete);
        break; 
    }
        

    

//redireccionar
header('location: ../Paginas/altapaquetes.php');
    
    
?>