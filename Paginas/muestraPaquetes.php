<?php
// No mostrar los errores de PHP
// Para que se inicialice la variable de session
    error_reporting(0);
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
                        <li class="nav-item">
                            <a class="nav-link" href="About_Us.html">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Contact_Us.html">Contactanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Eventos.html">Eventos</a>
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
                                        <form action='LogIn.html'>
                                            <button class='botoncin btn btn-outline-success'>Login</button>
                                        </form>
                                        <form action='SignIn.html'>
                                            <button class='botoncin btn btn-outline-secondary'>Register</button>
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
        <?php
        //Conexion a la base de datos

        include('../Acciones/conec.php');
        $ubicacion= $_POST['ubicacion'];
        $fecha = $_POST['fecha'];
        $cantPersonas = $_POST['cantPersonas'];
        //Consulta e insercion de la query
        
        
        $consulta1="SELECT * FROM paquete 
                    where locacion_evento like '$ubicacion' 
                    AND disponibilidad_evento = 'Disponible' 
                    AND cant_personas = $cantPersonas";
        $consulta2="SELECT * FROM paquete 
                    where disponibilidad_evento = 'Disponible' 
                    AND locacion_evento like '$ubicacion'";

        if(empty($cantPersonas)){
            $consulta = $consulta2;
        }else{
            $consulta = $consulta1;
        }
        $resultado=mysqli_query($conexion,$consulta);
        ?>
        <section class="registro-inicio">
            <div class="General container">
                <div class="row centrado">
                    <div class="col-sm-12">
                        <div class="titulito">
                            <h2>Paquetes</h2>
                        </div>
                    </div>
                    <?php 
                    while($fila=mysqli_fetch_array($resultado)){
                        ?>
                    <div class="col-sm-6 col-lg-4 col-md-4 col-log">
                        <h2 class="center"><?php echo $fila["nom_paquete"]?></h2>
                        <img src="" alt="">
                        <p> <?php echo $fila["descrip_paquete"]?></p>
                        <div>
                            <p>Cantidad de personas: <?php echo $fila["cant_personas"]?></p>
                            <p>Precio total: <?php echo $fila["precio_paquete"]?></p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
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
                <li class="list-inline-item"><a href="../index.html">Home</a></li>
                <li class="list-inline-item"><a href="About_Us.html">Sobre nosotros</a></li>
                <li class="list-inline-item navbar-brand"><h3>Uruz</h3></li>
                <li class="list-inline-item"><a href="Contact_Us.html">Contactanos</a></li>
                <li class="list-inline-item"><a href="Eventos.html">Eventos</a></li>
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