
<?php

session_start();
include('../Acciones/conec.php');
$varsession = $_SESSION['cod_usuario'];
$correo = $_SESSION['correo'];
$rolUsuario = $_SESSION['rolUsuario'];
$nombreUsuario = $_SESSION['nombre_usuario'];

if($varsession == null || $varsession == '' || $rolUsuario != '1') {
    echo "ERROR: 412 Usted no tiene acceso";
    header('Location: ../index.php');
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
    <?php
    include('partials/headerUsuarios.html');
    ?>
    <title>Empresa</title>
    <link rel="icon" href="../img/favicon.svg">
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
                <a href="DashboardAdmin.php"
                    class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fa-solid fa-gauge-high"></i>Dashboard
                </a>
                <a href="EdicionAdmin/tablasUsuario.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tablas de usuarios
                </a>
                <a href="EdicionAdmin/tablaSistema.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tablas de eventos
                </a>
                <a href="EdicionAdmin/tablaAdmin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tablas del Administrador
                </a>
                <a href="EdicionAdmin/tablaRegistros.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-table-list"></i>Tabla de registros
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
                            <ul class='dropdown-menu' id="dropdown-menu" aria-labelledby='navbarDropdown'>
                                <li class='dropdown-link'>
                                    <a href='../index.php' class="home">Home</a>
                                </li>
                                <li class='dropdown-link'>
                                    <a href='../Paginas/DashboardAdmin.php'>Dashboard</a>
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

                                <!--<div class="file btn btn-lg btn-primary">
                                    Cambiar foto
                                    <input type="file" name="file"/>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="titulito">
                                <h5>
                                    Hola, <?php echo $nombreUsuario ?>!
                                </h5>   
                            </div>
                        </div>
                    </div>
                            
                </div>
            </section>
        </div>
    </div>
</main>

<!-------- Scripts -------->
<?php
include('partials/Scripts.html');
?>
</body>

</html>