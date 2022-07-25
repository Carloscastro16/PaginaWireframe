<?php
include('conec.php');
    $btnValor = $_POST['editar'];

    switch ($btnValor) {
        case 'Editar paquete':
            $cod_usuario = $_POST['codUsuario'];
            $nombrePaquete= $_POST['nombrePaquete'];
            $tipoServicio= $_POST['tipoServicio'];
            $locacion= $_POST['ciudad'];
            $direccion= $_POST['direcEvento'];
            $disponibilidad= $_POST['disponibilidadEv'];
            $precioEvento= $_POST['precioEvento'];
            $cantidadPersonas= $_POST['cantidadPersonas'];
            $Descripcion= $_POST['descripcion'];
            $registrarPaquete= "UPDATE paquete SET 
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
            break;
        case 'Editar orden':
            
            break;
    }
    header('location: ../Paginas/EdicionAdmin/tablasSistema.php');