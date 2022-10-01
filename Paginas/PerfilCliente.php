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
    $consultaPaquetes = "SELECT paquete.nom_paquete, paquete.descrip_paquete, usuario.nombre_empresa, paquete.precio_paquete, paquete.cant_personas FROM orden_evento
    JOIN paquete ON paquete.cod_paquete = orden_evento.fk_cod_paquete
    JOIN usuario ON usuario.cod_usuario = orden_evento.fk_cod_usuario
    WHERE fk_cod_usuario = '3'";
    $resultadoPaquetes = mysqli_query($conexion, $consultaPaquetes);
    $resultadoPrueba = mysqli_query($conexion, $consultaPaquetes);
    $resultado = mysqli_query($conexion, $consulta);
    $filaUsuario= mysqli_fetch_array($resultado);
    $apellidoMa = $filaUsuario['ape_materno'];
    $apellidoPa = $filaUsuario['ape_paterno'];
    $imgUsuario = $filaUsuario['img_usuario'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('partials/headerUsuarios.html');
    ?>
    <link rel="icon" href="../img/favicon.svg">
    <title>Clientes</title>
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
                    <a  href="PerfilCliente.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-user"></i>Perfil
                    </a>
                    <a  href="../index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-magnifying-glass"></i>Buscador
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
                                        <a href='PerfilCliente.php'>Perfil</a>
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
                            <div class="col-sm-12">
                                <div class="titulito tituloConjunto">
                                    <h3>
                                        Perfil
                                    </h3>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="imaperfil">
                                    <img src="../Images/<?php echo $imgUsuario; ?>" alt=""/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="titulito">
                                    <h4>
                                        <?php
                                            echo $nombreUsuario,' ', $apellidoPa,' ', $apellidoMa;
                                        ?>!
                                    </h4> 
                                    <h4>Correo:
                                        <?php
                                            echo $correo;
                                        ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <form action="EdicionCliente.php" method="post">
                                    <input type="submit" name="registro" value="Editar perfil" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                        <div class="row contratados">
                            <div class="col-md-12">
                                <div class="titulito tituloConjunto">
                                    <h3>Paquetes contratados</h3>
                                </div>
                            </div>
                            <?php 
                            if(empty($filaPrueba=mysqli_fetch_array($resultadoPrueba))){
                                echo "
                                <div class='col-12 col-sm-12 col-md-12 col-lg-12 centrado paquetes'>
                                    <img src='../img/ningun_paquete.png' alt=''>
                                    <h5>Ups... Aun no has contratado ningun paquete</h5>
                                </div>
                                ";
                            }else{
                                WHILE ($filaPaquetes=mysqli_fetch_array($resultadoPaquetes)){
                                    $nomPaquete = $filaPaquetes["nom_paquete"];
                                    $descPaquete = $filaPaquetes["descrip_paquete"];
                                    $empresa= $filaPaquetes["nombre_empresa"];
                                    $prePaquete = $filaPaquetes["precio_paquete"];
                                    $cantPersonas = $filaPaquetes["cant_personas"];
                                    echo "<div class='col-sm-6'>
                                            <div class='col-log'>
                                                <h2 class='center'> $nomPaquete </h2>
                                                <img src=' alt='>
                                                <div>
                                                    <p>$descPaquete</p>
                                                    <p>Cantidad de personas: $cantPersonas</p>
                                                    <p>Precio total: $prePaquete</p>
                                                </div>
                                            </div>
                                        </div>";
                                    };
                            }
                            
                            ?>
                                    
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