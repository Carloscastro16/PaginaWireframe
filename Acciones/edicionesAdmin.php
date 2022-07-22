<?php
include('conec.php');
    session_start();
    $tipoEdicion = $_['tipoEdicion'];
    
    //Se realiza un Switch que analiza el valor de tipoEdicion, para realizar la edicion
    switch($tipoEdicion){
        case 'paquete':
            $codPaquete=$_POST["codPaquete"];
            $codusuario=$_POST['fkcodEmpresa'];
            $nombrePaquete= $_POST['nombrePaquete'];
            $tipoServicio= $_POST['tipoServicio'];
            $locacion= $_POST['ciudad'];
            $direccion= $_POST['direcEvento'];
            $disponibilidad= $_POST['disponibilidadEv'];
            $precioEvento= $_POST['precioEvento'];
            $cantidadPersonas= $_POST['cantidadPersonas'];
            $Descripcion= $_POST['descripcion'];
            $actualizar= "UPDATE paquete SET 
                fk_cod_empresa =$codusuario,
                nom_paquete = '$nombrePaquete',
                fk_cod_tipo_servicio= $tipoServicio,
                fk_cod_ciudad= '$locacion',
                direc_evento='$direccion',
                disponibilidad_evento='$disponibilidad',
                precio_paquete=$precioEvento,
                cant_personas=$cantidadPersonas,
                descrip_paquete='$Descripcion'
                WHERE cod_paquete=$codPaquete";
            $resultados=mysqli_query($conexion,$actualizar);
            //conuslta para registrar//
            //$registrarPaquete= "CALL sp_registroPaquete ('$nomImagenPaquete','$nombrePaquete','$tipoServicio',
            //  '$locacion','$direccion','$disponibilidad',
            //   '$precioEvento','$cantidadPersonas','$Descripcion')";
            header('location: ../Paginas/altapaquetes.php');
            break;
        case 'ciudad':
            $actualizar= "UPDATE paquete SET 
                fk_cod_empresa =$codusuario,
                nom_paquete = '$nombrePaquete',
                fk_cod_tipo_servicio= $tipoServicio,
                fk_cod_ciudad= '$locacion',
                direc_evento='$direccion',
                disponibilidad_evento='$disponibilidad',
                precio_paquete=$precioEvento,
                cant_personas=$cantidadPersonas,
                descrip_paquete='$Descripcion'
                WHERE cod_paquete=$codPaquete";
            $resultados=mysqli_query($conexion,$actualizar);
            //conuslta para registrar//
            //$registrarPaquete= "CALL sp_registroPaquete ('$nomImagenPaquete','$nombrePaquete','$tipoServicio',
            //  '$locacion','$direccion','$disponibilidad',
            //   '$precioEvento','$cantidadPersonas','$Descripcion')";
            header('location: ../Paginas/altapaquetes.php');
            break;
        case 'cliente':
            $actualizar= "UPDATE paquete SET 
                fk_cod_empresa =$codusuario,
                nom_paquete = '$nombrePaquete',
                fk_cod_tipo_servicio= $tipoServicio,
                fk_cod_ciudad= '$locacion',
                direc_evento='$direccion',
                disponibilidad_evento='$disponibilidad',
                precio_paquete=$precioEvento,
                cant_personas=$cantidadPersonas,
                descrip_paquete='$Descripcion'
                WHERE cod_paquete=$codPaquete";
            
            $resultados=mysqli_query($conexion,$actualizar);
            header('location: ../Paginas/altapaquetes.php');
        break; 
        case 'empresa':
            $actualizar= "UPDATE paquete SET 
                fk_cod_empresa =$codusuario,
                nom_paquete = '$nombrePaquete',
                fk_cod_tipo_servicio= $tipoServicio,
                fk_cod_ciudad= '$locacion',
                direc_evento='$direccion',
                disponibilidad_evento='$disponibilidad',
                precio_paquete=$precioEvento,
                cant_personas=$cantidadPersonas,
                descrip_paquete='$Descripcion'
                WHERE cod_paquete=$codPaquete";
            
            $resultados=mysqli_query($conexion,$actualizar);
            header('location: ../Paginas/altapaquetes.php');
        break; 
        case 'tipoServicio':
                $actualizar= "UPDATE paquete SET 
                fk_cod_empresa =$codusuario,
                nom_paquete = '$nombrePaquete',
                fk_cod_tipo_servicio= $tipoServicio,
                fk_cod_ciudad= '$locacion',
                direc_evento='$direccion',
                disponibilidad_evento='$disponibilidad',
                precio_paquete=$precioEvento,
                cant_personas=$cantidadPersonas,
                descrip_paquete='$Descripcion'
                WHERE cod_paquete=$codPaquete";
            
            $resultados=mysqli_query($conexion,$actualizar);
            header('location: ../Paginas/altapaquetes.php');
        break; 
        case 'orden':
                $actualizar= "UPDATE paquete SET 
                fk_cod_empresa =$codusuario,
                nom_paquete = '$nombrePaquete',
                fk_cod_tipo_servicio= $tipoServicio,
                fk_cod_ciudad= '$locacion',
                direc_evento='$direccion',
                disponibilidad_evento='$disponibilidad',
                precio_paquete=$precioEvento,
                cant_personas=$cantidadPersonas,
                descrip_paquete='$Descripcion'
                WHERE cod_paquete=$codPaquete";
            
            $resultados=mysqli_query($conexion,$actualizar);
            header('location: ../Paginas/altapaquetes.php');
        break; 
        case 'rol':
                $actualizar= "UPDATE paquete SET 
                fk_cod_empresa =$codusuario,
                nom_paquete = '$nombrePaquete',
                fk_cod_tipo_servicio= $tipoServicio,
                fk_cod_ciudad= '$locacion',
                direc_evento='$direccion',
                disponibilidad_evento='$disponibilidad',
                precio_paquete=$precioEvento,
                cant_personas=$cantidadPersonas,
                descrip_paquete='$Descripcion'
                WHERE cod_paquete=$codPaquete";
            
            $resultados=mysqli_query($conexion,$actualizar);
            header('location: ../Paginas/altapaquetes.php');
            break; 
        }
        

    
        
        //redireccionar
    
    
?>
        