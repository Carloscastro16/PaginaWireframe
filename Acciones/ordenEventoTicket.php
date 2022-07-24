<?php
include('conec.php');
    session_start();
    
    $codUsuario = $_SESSION['cod_usuario'];
    $codMontaje = $_POST['codMontaje'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $numTel = $_POST['celular'];
    $codPaquete = $_POST['codPaquete'];
    $confirmacion = false;
    while($confirmacion != true){
        $numRand = random_int(1000, 999999);
        $consultaFolio = "SELECT COUNT(folio_evento) as folio FROM orden_evento WHERE folio_evento = '$numRand'";
        $resultado = mysqli_query($conexion, $consultaFolio);
        $filaFolio = mysqli_fetch_array($resultado);
        if ($filaFolio['folio'] == 0) {
            $confirmacion = true;
        }
    }
    $consultaDisp = "SELECT COUNT(fecha) as fecha FROM eventos_ocup WHERE fecha = '$fecha'";
        $resultado = mysqli_query($conexion, $consultaDisp);
        $filaDisp = mysqli_fetch_array($resultado);
        if($filaDisp['fecha']== 0){
            $_SESSION['folio'] = $numRand; 
            //consulta mysql//
            $insertarOrden= "INSERT INTO orden_evento(folio_evento, fk_cod_usuario, fk_cod_montaje, fecha, hora_evento, num_tel, fk_cod_paquete) VALUE('$numRand','$codUsuario','$codMontaje', '$fecha', '$hora', '$numTel', '$codPaquete')";
            $resultados=mysqli_query($conexion,$insertarOrden);
            //mensaje si no se ingresa valores//
            header('location: ../Paginas/ticket.php');
            //redireccionamiento//
        }else{
            echo "<script>alert('EL USUARIO NO EXISTE');</script>";
	        echo 'window.location.href = "../index.php"';
        }
?>