<?php

session_start();
include('../../Acciones/conec.php');
$varsession = $_SESSION['cod_usuario'];
$correo = $_SESSION['correo'];
$rolUsuario = $_SESSION['rolUsuario'];
$nombreUsuario = $_SESSION['nombre_usuario'];

if($varsession == null || $varsession == '' || $rolUsuario != '1') {
    echo "ERROR: 412 Usted no tiene acceso";
    header('Location: ../index.html');
    die("Usted no tiene acceso");
}
$consulta = "SELECT * FROM usuario WHERE cod_usuario = '$varsession'";
$consultaPaquete = "SELECT * FROM paquete WHERE fk_cod_empresa = '$varsession'";
$resultadoPaquetes = mysqli_query($conexion, $consultaPaquete);
$resultado = mysqli_query($conexion, $consulta);
$filaUsr= mysqli_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/Normalize.css">
    <link rel="stylesheet" href="../../Styles/Styles_Us.css?v=3.2">
    <link rel="stylesheet" href="../../Styles/argon-dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    
    <!-- prueba -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.css"/>

    <title>Empresa</title>
    <link rel="icon" href="img/favicon.svg">
</head>

<body>
    <div class="contenedor_carga" id="contenedor_carga">
        <div id="carga" class="centrado">
            <svg>
                <circle cx="160" cy="200" r="100" class="circle"/>
                <circle cx="120" cy="160" r="100" class="loader"/>
            </svg>
        </div>
    </div>
<main>
    <div class="d-flex" id="wrapper">
        <!--Sliderbar-->
        <div class="bg-dark centradoHorizontal" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class="fa-brands fa-uniregistry">ruz</i>
            </div>
            <button class="switchDashboard" id="switch">
                <span class="switchIcon">
                    <ion-icon name="sunny-outline"></ion-icon>
                </span>
                <span class="switchIcon">
                    <ion-icon name="moon-outline"></ion-icon>
                </span>
            </button>
            <div class="list-group list-group-flush my-3">
                <a href="DashboardEmpresa.php"
                    class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fa-solid fa-gauge-high"></i>Dashboard
                </a>
                <a href="tablasUsuario.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tablas de Usuarios
                </a>
                <a href="tablaSistema.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tablas del Sistema
                </a>
                <a href="tablaAdmin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tablas del Administrador
                </a>
                <a href="../Acciones/Log-out.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-right-from-bracket"></i>Logout
                </a>
            </div>
        </div>
        <!-- End Sliderbar-->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg  bg-dark py-3 px-4">
                <div class="d-flex aling-items-center">
                    <i class="fas fa-aling-left primary-text fs-4 me-4" id="menu-toggle"></i>
                    <h2 class="navbarNav">Dashboard</h2>
                </div>
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSypportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                        <li class='nav-item-dropdown'>
                            <a href='#' class='nav-link dropdown-toggle second-text fw-bold' id='navbarDropdown'
                                role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-user me-'></i> Hola, <?php echo $nombreUsuario ?>!
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <li class='dropdown-link'>
                                    <a href='../index.php'>Home</a>
                                </li>
                                <li class='dropdown-link'>
                                    <a href='PerfilEmpresa.php'>Dashboard</a>
                                </li>
                                <li class='dropdown-link'>
                                    <a href='../Acciones/Log-out.php'>Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="General tablasAdmin">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Perfil
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="imaperfil">
                                <img src="../Images/fotoPrincipal.png" alt=""/>
                                <div class="file btn btn-lg btn-primary">
                                    Cambiar foto
                                    <input type="file" name="file"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="titulito">
                                <h5>
                                    Hola <?php echo $nombreUsuario ?>!
                                </h5>   
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" name="registro" value="Editar perfil" 
                            class="btn btn-primary">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Tabla de Clientes -->
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Tabla de Usuarios Clientes
                                </h4>
                            </div>
                            <table id="usuarios" class="table-responsive tablita display" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rol</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Conexion a la BD-->
                                        <?php
                                        include('../../Acciones/conec.php');
                                        $consulta="SELECT * FROM usuario WHERE fk_rol_usuario = 2";
                                        $resultadoUsr=mysqli_query($conexion,$consulta); 
                                        while($fila=mysqli_fetch_array($resultadoUsr)){
                                        ?>
                                    <tr>
                                        <td> <?php echo $fila["cod_usuario"]?></th>
                                        <td> <?php echo $fila["fk_rol_usuario"] ?> </td>
                                        <td> <?php echo $fila["nombre_usuario"] ?> </td>
                                        <td> <?php echo $fila["correo_usuario"] ?> </td>
                                        <td>  
                                            <a target="_self" href="../Acciones/EliminarUsuario.php?idUsuario=<?php echo $fila["cod_usuario"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_self" href="EdicionAdmin/editarCliente.php?idUsuario=<?php echo $fila["cod_usuario"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Rol</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        </div>
                        <!-- Tabla de Empresas -->
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Tabla de Usuarios empresas
                                </h4>
                            </div>
                            <table id="empresas" class="table-responsive tablita display" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Rol</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Empresa</th>
                                        <th>Telefono</th>
                                        <th>RFC</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Conexion a la BD-->
                                        <?php
                                        include('../../Acciones/conec.php');
                                        $consulta="SELECT * FROM usuario WHERE fk_rol_usuario = 3";
                                        $resultadoUsr=mysqli_query($conexion,$consulta); 
                                        while($fila=mysqli_fetch_array($resultadoUsr)){
                                        ?>
                                    <tr>
                                        <td> <?php echo $fila["cod_usuario"]?></th>
                                        <td> <?php echo $fila["fk_rol_usuario"] ?> </td>
                                        <td> <?php echo $fila["nombre_usuario"] ?> </td>
                                        <td> <?php echo $fila["correo_usuario"] ?> </td>
                                        <td> <?php echo $fila["nombre_empresa"] ?> </td>
                                        <td> <?php echo $fila["tel_empresa"] ?> </td>
                                        <td> <?php echo $fila["rfc"] ?> </td>
                                        <td>  
                                            <a target="_self" href="../Acciones/eliminarUsuario.php?idUsuario=<?php echo $fila["cod_usuario"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_self" href="EdicionAdmin/editarempresa.php?idUsuario=<?php echo $fila["cod_usuario"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Rol</th>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Empresa</th>
                                        <th>Telefono</th>
                                        <th>RFC</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- Tabla de paquetes -->
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Tabla de Paquetes
                                </h4>
                            </div>
                            <table id="paquetes" class="table-responsive tablita display" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Imagen</th>
                                        <th>nombre</th>
                                        <th>Tipo</th>
                                        <th>ciudad</th>
                                        <th>Direccion</th>
                                        <th>Estado</th>
                                        <th>Precio</th>
                                        <th>No. pax</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Conexion a la BD-->
                                        <?php
                                        include('../../Acciones/conec.php');
                                        $consulta="SELECT * FROM paquete WHERE fk_cod_empresa = $varsession";
                                        $resultadoPack=mysqli_query($conexion,$consulta); 
                                        while($filaPack=mysqli_fetch_array($resultadoPack)){
                                        ?>
                                    <tr>
                                        <td> <?php echo $filaPack["cod_paquete"]?></th>
                                        <td>nada</th>Pack
                                        <td> <?php echo $filaPack["nom_paquete"] ?> </td>
                                        <td> <?php echo $filaPack["fk_cod_tipo_servicio"] ?> </td>
                                        <td> <?php echo $filaPack["fk_cod_ciudad"] ?> </td>
                                        <td> <?php echo $filaPack["direc_evento"] ?> </td>
                                        <td> <?php echo $filaPack["disponibilidad_evento"] ?> </td>
                                        <td> <?php echo $filaPack["precio_paquete"] ?> </td>
                                        <td> <?php echo $filaPack["cant_personas"] ?> </td>
                                        <td> <?php echo $filaPack["descrip_paquete"] ?> </td>
                                        <td>  
                                            <a target="_self" href="../Acciones/eliminarPaquete.php?idPaquete=<?php echo $filaPack["cod_paquete"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_self" href="EdicionAdmin/editarPaquete.php?idPaquete=<?php echo $filaPack["cod_paquete"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Imagen</th>
                                        <th>nombre</th>
                                        <th>Tipo</th>
                                        <th>ciudad</th>
                                        <th>Direccion</th>
                                        <th>Estado</th>
                                        <th>Precio</th>
                                        <th>No. pax</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- Tabla de Ordenes -->
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Tabla de Ordenes
                                </h4>
                            </div>
                            <table id="ordenes" class="table-responsive tablita display" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Folio</th>
                                        <th>Cliente</th>
                                        <th>montaje</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha Final</th>
                                        <th>Estado</th>
                                        <th>numero</th>
                                        <th># Paquete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Conexion a la BD-->
                                        <?php
                                        include('../../Acciones/conec.php');
                                        $consultaOrden="SELECT * FROM orden_evento";
                                        $resultadoOrden=mysqli_query($conexion,$consultaOrden); 
                                        while($filaOrden=mysqli_fetch_array($resultadoOrden)){
                                        ?>
                                    <tr>
                                        <td> <?php echo $filaOrden["cod_orden_evento"]?></th>
                                        <td> <?php echo $filaOrden["folio_evento"] ?> </td>
                                        <td> <?php echo $filaOrden["fk_cod_usuario"] ?> </td>
                                        <td> <?php echo $filaOrden["fk_cod_montaje"] ?> </td>
                                        <td> <?php echo $filaOrden["fec_inicio"] ?> </td>
                                        <td> <?php echo $filaOrden["fec_fin"] ?> </td>
                                        <td> <?php echo $filaOrden["num_tel"] ?> </td>
                                        <td> <?php echo $filaOrden["fk_cod_paquete"] ?> </td>
                                        <td>  
                                            <a target="_self" href="../Acciones/eliminarOrden.php?idOrden=<?php echo $filaOrden["cod_orden_evento"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_self" href="EdicionAdmin/editarOrden.php?idOrden=<?php echo $filaOrden["cod_orden_evento"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Folio</th>
                                        <th>Cliente</th>
                                        <th>montaje</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha Final</th>
                                        <th>Estado</th>
                                        <th>numero</th>
                                        <th># Paquete</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- Tabla de Roles -->
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Tabla de Roles
                                </h4>
                            </div>
                            <table id="roles" class="table-responsive tablita display" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Conexion a la BD-->
                                        <?php
                                        include('../../Acciones/conec.php');
                                        $consultaRol="SELECT * FROM rol_usuario";
                                        $resultadoRol=mysqli_query($conexion,$consultaRol); 
                                        while($filaRol=mysqli_fetch_array($resultadoRol)){
                                        ?>
                                    <tr>
                                        <td> <?php echo $filaRol["cod_rol"]?></th>
                                        <td> <?php echo $filaRol["nom_rol"] ?> </td>
                                        <td>  
                                            <a target="_self" href="../Acciones/eliminarRol.php?idRol=<?php echo $filaRol["cod_rol"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_self" href="EdicionAdmin/editarRol.php?idRol=<?php echo $filaRol["cod_rol"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        </div>
                        <!-- Tabla de tipos de Servicios -->
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Tabla de Tipos de Paquetes
                                </h4>
                            </div>
                            <table id="tipoServicio" class="table-responsive tablita display" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de paquete</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Conexion a la BD-->
                                        <?php
                                        include('../../Acciones/conec.php');
                                        $consultaTipoServ="SELECT * FROM tipo_servicio";
                                        $resultadoTipoServ=mysqli_query($conexion,$consultaTipoServ); 
                                        while($filaTipoServ=mysqli_fetch_array($resultadoTipoServ)){
                                        ?>
                                    <tr>
                                        <td> <?php echo $filaTipoServ["cod_tipo_servicio"]?></th>
                                        <td> <?php echo $filaTipoServ["nom_servicio"] ?> </td>
                                        <td>  
                                            <a target="_self" href="../Acciones/eliminarTipo.php?idTipo=<?php echo $filaTipoServ["cod_tipo_servicio"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_self" href="EdicionAdmin/editarTipo.php?idTipo=<?php echo $filaTipoServ["cod_tipo_servicio"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de paquete</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- Tabla de ciudad -->
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Tabla de ciudades
                                </h4>
                            </div>
                            <table id="ciudad" class="table-responsive tablita display" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Ciudad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Conexion a la BD-->
                                        <?php
                                        include('../../Acciones/conec.php');
                                        $consultaCiudad="SELECT * FROM ciudad";
                                        $resultadoCiudad=mysqli_query($conexion,$consultaCiudad); 
                                        while($filaCiudad=mysqli_fetch_array($resultadoCiudad)){
                                        ?>
                                    <tr>
                                        <td> <?php echo $filaCiudad["cod_ciudad"]?></th>
                                        <td> <?php echo $filaCiudad["nombre_ciudad"] ?> </td>
                                        <td>  
                                            <a target="_self" href="../Acciones/eliminarTipo.php?idCiudad=<?php echo $filaCiudad["cod_ciudad"]?>?" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_self" href="EdicionAdmin/editarTipo.php?idCiudad=<?php echo $filaCiudad["cod_ciudad"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de paquete</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>         
                </div>
            </section>
        </div>
    </div>
</main>

<!-------- Scripts -------->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.js"></script>
    <script src="../../js/modoOscuro.js"></script>
    <script src="../../js/tablas.js"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function () {
            el.classList.toggle("toggle")
        }
    </script>
    
    <script src="../../js/menuBuscador.js"></script>
    <script>
        window.onload = function() {
            var contenedor = document.getElementById("contenedor_carga");

            contenedor.style.visibility = "hidden";
            contenedor.style.opacity = "0";
        }
    </script>
    
</body>

</html>