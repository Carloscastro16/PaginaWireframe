<?php
    include ('../Acciones/conec.php');
    session_start();
    $varsession = $_SESSION['cod_usuario'];
    $correo = $_SESSION['correo'];
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
    <title>Clientes</title>
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
            <!--Sidebar-->
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
                    <a  href="../Paginas/PerfilCliente.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-user"></i> Perfil
                    </a>
                    <a href="../Acciones/Log-out.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                        <h2 class="navbarNav">Perfil de <?php echo $nombreUsuario ?></h2>
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
                                        <a href='../index.php'>Home</a>
                                    </li>
                                    <li class='dropdown-link'>
                                        <a href='../Paginas/PerfilCliente.php'>Perfil</a>
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
                        <form action="../Acciones/edicionUsuario.php" method="post" enctype="multipart/">
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
                                            Nombre
                                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombreUsuario;?>">
                                        </h5> 
                                        <h5>
                                            Apellido Paterno
                                            <input name="apellPa" type="text" class="form-control" value="<?php echo $apellidoPa;?>">
                                        </h5>
                                        <h5>
                                            Apellido Materno
                                            <input name="apellMa" type="text" class="form-control" value="<?php echo $apellidoMa;?>">
                                        </h5> 
                                        <h5>
                                            Correo
                                            <input name="correo" type="text" class="form-control" value="<?php echo $correo;?>">
                                        </h5>
                                        <div class="col-12">
                                            <button class="btn btn-primary empresa" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                                                <ion-icon name="bag-outline"></ion-icon>Cambiar contraseña
                                            </button>
                                        </div>
                                        <div class="collapse" id="toggleMobileMenu">
                                            <label for="">Contraseña</label>
                                            <input class="form-control" placeholder="**********" name="password" type="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="registro" value="Editar" 
                                    class="btn btn-primary">
                                </div>
                            </div>
                        </form>
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