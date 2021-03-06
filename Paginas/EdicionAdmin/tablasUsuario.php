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
                <a href="../DashboardAdmin.php"
                    class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fa-solid fa-gauge-high"></i>Dashboard
                </a>
                <a href="tablasUsuario.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tabla de Usuarios
                </a>
                <a href="tablaSistema.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tablas de servicios
                </a>
                <a href="tablaAdmin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tabla de administrador
                </a>
                <a href="tablaRegistros.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tabla de registros
                </a>
                <a href="../../Acciones/Log-out.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                        <li class='nav-item-dropdown'>
                            <a href='#' class='nav-link dropdown-toggle second-text fw-bold' id='navbarDropdown'
                                role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-user me-'></i> Hola, <?php echo $nombreUsuario ?>!
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <li class='dropdown-link'>
                                <a href='../DashboardAdmin.php'>Dashboard</a>
                                </li>
                                <li class='dropdown-link'>
                                    <a href='../../Acciones/Log-out.php'>Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <section class="General tablasAdmin">
                <div class="container">
                <div class="titulito">
                                <h5>
                                    Hola <?php echo $nombreUsuario ?>!
                                </h5>   
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
                                            <a class="btn" target="_self" href="../../Acciones/EliminarUsuario.php?idUsuario=<?php echo $fila["cod_usuario"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <form action="editarUsuariosAdmin.php" method="POST">
                                                <input type="hidden" name="idUsuario" value="<?php echo $fila["cod_usuario"]?>">
                                                <button class="btn" type="submit" name="btn-edit" value="editarCliente">
                                                    <ion-icon class="edit" name="create-outline"></ion-icon>
                                                </button>
                                            </form>
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
                                            <a class="btn" target="_self" href="../../Acciones/eliminarUsuario.php?idUsuario=<?php echo $fila["cod_usuario"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <form action="editarUsuariosAdmin.php" method="POST">
                                                <input type="hidden" name="idUsuario" value="<?php echo $fila["cod_usuario"]?>">
                                                <button class="btn" type="submit" name="btn-edit" value="editarEmpresa">
                                                    <ion-icon class="edit" name="create-outline"></ion-icon>
                                                </button>
                                            </form>
                                            <!-- <a target="_self" href="EdicionAdmin/editarempresa.php?idUsuario=<?php echo $fila["cod_usuario"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a>  -->
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
                        <!-- Tabla de Administradores -->
                        <div class="col-sm-12">
                            <div class="titulito tituloConjunto">
                                <h4>
                                    Tabla de Administradores
                                </h4>

                            </div>
                            <table id="empresas" class="table-responsive tablita display" >
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
                                        $consulta="SELECT * FROM usuario WHERE fk_rol_usuario = 1";
                                        $resultadoUsr=mysqli_query($conexion,$consulta); 
                                        while($fila=mysqli_fetch_array($resultadoUsr)){
                                        ?>
                                    <tr>
                                        <td> <?php echo $fila["cod_usuario"]?></th>
                                        <td> <?php echo $fila["fk_rol_usuario"] ?> </td>
                                        <td> <?php echo $fila["nombre_usuario"] ?> </td>
                                        <td> <?php echo $fila["correo_usuario"] ?> </td>
                                        <td>  
                                            <a class="btn" target="_self" href="../../Acciones/eliminarUsuario.php?idUsuario=<?php echo $fila["cod_usuario"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <form action="editarUsuariosAdmin.php" method="POST">
                                                <input type="hidden" name="idUsuario" value="<?php echo $fila["cod_usuario"]?>">
                                                <button class="btn" type="submit" name="btn-edit" value="editarAdmin">
                                                    <ion-icon class="edit" name="create-outline"></ion-icon>
                                                </button>
                                            </form>
                                            <!-- <a target="_self" href="EdicionAdmin/editarempresa.php?idUsuario=<?php echo $fila["cod_usuario"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a>  -->
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