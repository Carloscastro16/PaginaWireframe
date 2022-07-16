<?php
    include ('../Acciones/conec.php');
    session_start();
    $varsession = $_SESSION['id'];
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/Normalize.css">
    <link rel="stylesheet" href="../Styles/Styles_Us.css?v=1.3">
    <link rel="stylesheet" href="../Styles/argon-dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                    <a href="../Paginas/DashboardCliente.php"
                        class="list-group-item list-group-item-action bg-transparent second-text active">
                        <i class="fa-solid fa-gauge-high"></i> Dashboard
                    </a>
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

    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function () {
            el.classList.toggle("toggle")
        }
    </script>
</body>

</html>