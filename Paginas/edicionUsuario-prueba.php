<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../../Acciones/styles/nucleo-icons.css" rel="stylesheet" />
    <link href="../../Acciones/styles/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../../Acciones/styles/material-dashboard.css?v2.5" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous"/>
    <link rel="stylesheet" href="../../Acciones/styles/stylesEdiciones.css?v=2.0">
    <title>Edicion de Usuarios</title>
</head>
<body>
    <!-- cod de formulario-->
    <?php
    //Conexion a la base de datos

    include('../Acciones/conec.php');
    $ubicacion= $_POST['ubicacion'];
    $fecha = $_POST['fecha'];
    $cantPersonas = $_POST['cantPersonas'];
    //Consulta e insercion de la query
    $consulta="SELECT * FROM paquete where locacion_evento = '$ubicacion'";
    $resultado=mysqli_query($conexion,$consulta);
    ?>

<div class="container General">
    <div class="row">
        <div class="col-12">
            
            <div class="titulo">
                <H1> Edicion de Usuarios</H1>
            </div>
        </div>
        <div class="col-6">
            <table class="table tablita">
                <thead>
                    <tr>
                        <!-- encabezado de la tabla-->
                        
                        <th scope="col">id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Personas</th>
                        <th scope="col">Precio</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <!-- Conexion a la BD-->
                    <?php 
                while($fila=mysqli_fetch_array($resultado)){
                    ?>
                    <tr>
                        <!--muestra la numeracion en fila-->
                        <td> <?php echo $fila["cod_paquete"] ?></td>
                        <th scope="row">
                            <p><?php echo $fila["nom_paquete"]?></p>
                        </th>
                        <td> <?php echo $fila["cant_personas"] ?></td>
                        <td> <?php echo $fila["precio_paquete"] ?> </td>
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
        crossorigin="anonymous"></script>
</body>
</html>