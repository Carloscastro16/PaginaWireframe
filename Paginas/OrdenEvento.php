<?php
// No mostrar los errores de PHP
// Para que se inicialice la variable de session
/* error_reporting(0); */
session_start();
    include('../Acciones/conec.php');
    $varsession = $_SESSION['cod_usuario'];
    $correo = $_SESSION['correo'];
    $rolUsuario = $_SESSION['rolUsuario'];
    $nombreUsuario = $_SESSION['nombre_usuario'];

    if($varsession == null || $varsession == '') {
        echo "ERROR: 412 Usted no tiene acceso";
        header('Location: ../index.php');
        die();
    }
    $codPaquete = $_POST['codPaquete'];
    if($codPaquete== 4) {
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    // Todos los Meta y links estan dentro de este html
    // Para que verlo, ir a la carpeta Partials en el archivo HeaderGeneral
        include("partials/headerGeneral.html");
    ?>
    <title>Paquetes</title>
    
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
    <header>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid barraNav ">
                <div class="logo">
                    <a class="navbar-brand" href="../index.php">
                        Uruz
                    </a>
                </div>
                <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#toggleMobileMenu"
                aria-controls="toggleMobileMenu"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <ion-icon name="grid-outline"></ion-icon>
                </button>
                <div class="navbar-nav navbarNav collapse navbar-collapse" id="toggleMobileMenu">
                    <ul class="navbar-nav navbarNav">
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                    </ul>
                    <button class="switch" id="switch">
                        <span>
                            <ion-icon name="sunny-outline"></ion-icon>
                        </span>
                        <span>
                            <ion-icon name="moon-outline"></ion-icon>
                        </span>
                    </button>
                            <?php
                                include ('../Acciones/conec.php');
                                session_start();
                                $varsession = $_SESSION['cod_usuario'];
                                $correo = $_SESSION['Correo'];
                                $rolUsuario = $_SESSION['rolUsuario'];
                                $nombreUsuario = $_SESSION['nombre_usuario'];
                                if ($rolUsuario == "2"){
                                    $perfil = "PerfilCliente.php";
                                }else{
                                    $perfil = "DashboardEmpresa.php";
                                }
                                if(isset($varsession)){
                                    echo "
                                    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                                        <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                                            <li class='nav-item-dropdown'>
                                                <a href='#' class='nav-link dropdown-toggle second-text fw-bold' id='navbarDropdown'
                                                    role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                                    <i class='fas fa-user me-'></i> Hola, $nombreUsuario!
                                                </a>
                                                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                                    <li class='dropdown-link'>
                                                        <a href='$perfil'>Perfil</a>
                                                    </li>
                                                    <li class='dropdown-link'>
                                                        <a href='../Acciones/Log-out.php'>Logout</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    ";
                                }else{
                                    echo "
                                    <div class='botones'>
                                        <form action='LogIn.php'>
                                            <button class='botoncin btn btn-outline-success'>Unete</button>
                                        </form>
                                    </div>
                                    ";
                                }
                            ?>
                </div>
            </div>
        </nav>
    </header>
    <main class="log-in">
        <div class="General container">
            <div class="row centrado">
                <div class="col-sm-12">
                    <div class="titulito centrado">
                        <h2>Orden de Paquete</h2>
                    </div>
                </div>
                <?php
                
                $codPaquete = $_POST['codPaquete'];
                $consultaPaquete = "SELECT * FROM paquete
                WHERE = $codPaquete";
                $resultadoPaquetes = mysqli_query($conexion, $consultaPaquete);
                $fila = mysqli_fetch_array($resultadoPaquetes)
                $codPaquete = $fila["cod_paquete"];
                $nomPaquete = $fila["nom_paquete"];
                /* $imgPaquete = echo $fila["img_paquete"]; */
                $descripcion = $fila["descrip_paquete"];
                $cantPersonas = $fila["cant_personas"];
                $precio = $fila["precio_paquete"];
                echo "
                <form action='OrdenEvento.php'>
                    <div class='col-sm-6 col-lg-4 col-md-4 col-log'>
                        <h2 class='center'>$nomPaquete</h2>
                        <img src=' alt='>
                        <p> $descripcion</p>
                        <div>
                            <p>Cantidad de personas: $cantPersonas</p>
                            <p>Precio total: $precio</p>
                        </div>
                        <input class='collapse' type='hidden' name='codPaquete' value='$codPaquete'>
                        <input class='btn btn-primary' type='submit' value='Comprar' name='comprar'>
                    </div>
                </form>"; 
                ?>
                
            </div>
        </div>
    </main>
    <div class="footerBasic">
        <footer>
            <nav class="social">

                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#"><ion-icon name="logo-github"></ion-icon></a>
                <a href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
            </nav>
            
            <ul class="list-inline navegaFooter">
                <li class="list-inline-item"><a href="../index.php">Home</a></li>
                <li class="list-inline-item"><a href="About_Us.php">Sobre nosotros</a></li>
                <li class="list-inline-item navbar-brand"><h3>Uruz</h3></li>
                <li class="list-inline-item"><a href="Contact_Us.php">Contactanos</a></li>
                <li class="list-inline-item"><a href="Eventos.php">Eventos</a></li>
            </ul>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Esmeralda Mendoza Jimenez</a></li>
                <li class="list-inline-item"><a href="#">Carlos Andre Castro Rodriguez</a></li>
                <li class="list-inline-item"><a href="#">Odalys Mendez Torres</a></li>
            </ul>
            <p class="copyright">Uruz corpotative &copy; 2022</p>
        </footer>
    </div>    
    <!-------- Scripts -------->
    <?php
    // Todos los Meta y links estan dentro de este html
    // Para que verlo, ir a la carpeta Partials en el archivo HeaderGeneral
        include("partials/Scripts.html");
    ?>
</body>
</html>