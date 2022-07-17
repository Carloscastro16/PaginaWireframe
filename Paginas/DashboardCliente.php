<?php
    include ('../Acciones/conec.php');
    session_start();
    $varsession = $_SESSION['cod_usuario'];
    $correo = $_SESSION['Correo'];
    $rolUsuario = $_SESSION['rolUsuario'];
    $nombreUsuario = $_SESSION['nombre_usuario'];

    if($varsession == null || $varsession == '' || $rolUsuario == '3') {
        echo "ERROR: 412 Usted no tiene acceso";
        header('Location: ../index.html');
        die();
    }
    $consulta = "SELECT * FROM usuario WHERE cod_usuario = '$varsession'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    $apellidoMa = $fila['ape_materno'];
    $apellidoPa = $fila['ape_paterno'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include('partials/headerUsuarios.html');
    ?>
    <title>Empresa</title>
    <link rel="icon" href="img/favicon.svg">
</head>

<body>
    <main>
        
        <div class="d-flex" id="wrapper">
            <!--Sidebar-->
            <div class="bg-dark" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                    <i class="fa-brands fa-uniregistry">ruz</i>
                </div>
                <div class="list-group list-group-flush my-3">
                    <a href="DashboardCliente.html"
                        class="list-group-item list-group-item-action bg-transparent second-text active">
                        <i class="fa-solid fa-gauge-high"></i> Dashboard
                    </a>
                    <a  href="PerfilCliente.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-user"></i> Perfil
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </div>
            </div>
            <!-- End Sidebar-->

            <!-- Seccion del contenido --> 
            <!-- Se guarda todo el contenido en el div para que se respete al sidebar -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg  bg-dark py-3 px-4">
                    <div class="d-flex aling-items-center">
                        <i class="fas fa-aling-left primary-text fs-4 me-4" id="menu-toggle"></i>
                        <h2 class="navbarNav">Dashboard</h2>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <ion-icon name="grid-outline"></ion-icon>
                    </button>
                    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                        <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                            <li class='nav-item-dropdown'>
                                <a href='#' class='nav-link dropdown-toggle second-text fw-bold' id='navbarDropdown'
                                    role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='fas fa-user me-'></i> Hola, <?php echo $nombreUsuario ?>!
                                </a>
                                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                    <li class='dropdown-link'>
                                        <a href='../Paginas/PerfilCliente.html'>Perfil</a>
                                    </li>
                                    <li class='dropdown-link'>
                                        <a href='../Paginas/PerfilEmpresa.html'>Configuración</a>
                                    </li>
                                    <li class='dropdown-link'>
                                        <a href='../Acciones/Log-out.php'>Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <section class="log-in registro-inicio">
                    <div class="General container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="imaperfil">
                                    <img src="../Images/per4.jpg" alt=""/>
                                    <div class="file btn btn-lg btn-primary">
                                        Cambiar foto
                                        <input type="file" name="file"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="titulito">
                                    <h5>
                                        <?php
                                            echo $nombreUsuario,' ', $apellidoPa,' ', $apellidoMa;
                                        ?>
                                    </h5> 
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="registro" value="Editar perfil" 
                                class="btn btn-primary">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="perfil">
                                    <h6>Redes Sociales</h6>
                                    <a href="">Facebook</a><br/>
                                    <a href="">Whatsapp</a><br/>
                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>          
                    </div>
                </Section>
            </div>
        </div>
    </main>

    <?php
    include('partials/Scripts.html');
    ?>
</body>

</html>