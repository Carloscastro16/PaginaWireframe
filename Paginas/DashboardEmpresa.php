
<?php

    session_start();
    include('../Acciones/conec.php');
    $varsession = $_SESSION['id'];
    $correo = $_SESSION['Correo'];
    $rolUsuario = $_SESSION['rolUsuario'];
    $nombreUsuario = $_SESSION['nombre_usuario'];

    if($varsession == null || $varsession == '' || $rolUsuario == '2') {
        echo "ERROR: 412 Usted no tiene acceso";
        header('Location: ../index.html');
        die();
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
    <link rel="stylesheet" href="../Styles/Normalize.css">
    <link rel="stylesheet" href="../Styles/Styles_Us.css?v=1.3">
    <link rel="stylesheet" href="../Styles/argon-dashboard.css">
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
    
    <title>Empresa</title>
    <link rel="icon" href="img/favicon.svg">
</head>

<body>
    <main>
        <div class="d-flex" id="wrapper">
            <!--Sliderbar-->
            <div class="bg-dark centradoHorizontal" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                    <i class="fa-brands fa-uniregistry">ruz</i>
                </div>
                <button class="switchDashboard" id="switch">
                    <span>
                        <ion-icon name="sunny-outline">ligth</ion-icon>
                    </span>
                    <span>
                        <ion-icon name="moon-outline">Dark</ion-icon>
                    </span>
                </button>
                <div class="list-group list-group-flush my-3">
                    <a href="DashboardEmpresa.php"
                        class="list-group-item list-group-item-action bg-transparent second-text active">
                        <i class="fa-solid fa-gauge-high"></i>Dashboard
                    </a>
                    <a  href="PerfilEmpresa.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-user"></i>Perfil
                    </a>
                    <a  href="AltaPaquetes.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-user"></i>Alta de paquetes
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
                                        <a href='PerfilEmpresa.php'>Perfil</a>
                                    </li>
                                    <li class='dropdown-link'>
                                        <a href='EditPerfilEmpresa.php'>Configuración</a>
                                    </li>
                                    <li class='dropdown-link'>
                                        <a href='../Acciones/Log-out.php'>Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <section class="General">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="titulito titulo_packs">
                                    <h4>
                                        Perfil
                                    </h4>
                                </div>
                            </div>
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
                            <div class="col-sm-12">
                                <div class="titulito titulo_packs">
                                    <h4>
                                        Paquetes
                                    </h4>
                                </div>
                            </div>
                            <div class="col-md-12">
                            
                            <?php 
                            if($fila=mysqli_fetch_array($resultadoPaquetes)){
                                while($fila=mysqli_fetch_array($resultadoPaquetes)){
                                $nomPaquete = $fila["nom_paquete"];
                                $descPaquete = $fila["descrip_paquete"];
                                $cantPersonas= $fila["cant_personas"];
                                $prePaquete = $fila["precio_paquete"];
                                echo "<div class='col-sm-6 col-lg-4 col-md-4 col-log'>
                                    <h2 class='center'> $nomPaquete </h2>
                                    <img src=' alt='>
                                    <p>$descPaquete</p>
                                    <div>
                                        <p>Cantidad de personas: $cantPersonas</p>
                                        <p>Precio total: $prePaquete</p>
                                    </div>
                                    <button href='../Acciones/edicionPaquetes.php' class='btn btn-primary'>
                                        Editar Paquete
                                    </button>
                                </div>";
                                };
                            }else{
                                echo "
                                <div class='col-12 centrado paquetes'>
                                    <img src='../img/ningun_paquete.png' alt=''>
                                    <h5>Ups... Aun no has añadido ningun paquete</h5>
                                </div>
                                ";
                            }
                            ?>
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
    <script src="../js/modoOscuro.js"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function () {
            el.classList.toggle("toggle")
        }
    </script>
</body>

</html>