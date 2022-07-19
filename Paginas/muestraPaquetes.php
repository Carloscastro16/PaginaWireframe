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
        <div class="container menu">
            <div class="row">
                <div class="col-12">
                    <form action="muestraPaquetes.php" method="POST">
                        <div class="container">
                            <div class="row buscadorsin">
                                <div class="search-camp col-lg-4 col-md-4 col-sm-4">
                                    <ion-icon name="location-outline"></ion-icon>
                                    <input name="ubicacion" type="text" class="form-control form-evento" placeholder="¿Donde quieres tu evento?" required>
                                </div>
                                <div class="search-camp col-lg-3 col-md-3 col-sm-3">
                                    <ion-icon name="calendar-outline"></ion-icon>
                                    <select class="seleccionFab form-select" aria-label="Default select example" name="codFabricante">
                                        <option value="Selected">Tipo de evento</option>
                                        <?php
                                        //conectar a la base de datos//
                                        include('Acciones/conec.php');
                                        $consulta2="SELECT * FROM tipo_servicio";
                                        
                                        $resultado2=mysqli_query($conexion,$consulta2);
                                        while($fila2=mysqli_fetch_array($resultado2)){
                                        ?>
                                        <option value="<?php echo $fila2["cod_tipo_servicio"]?>"><?php echo$fila2["nom_servicio"]?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="search-camp col-lg-3 col-md-3 col-sm-3">
                                    <ion-icon name="person-outline"></ion-icon>
                                    <input name="cantPersonas" type="text" class="form-control form-evento" placeholder="¿Cuantas personas?">
                                </div>
                                <div class="search-camp col-lg-2 col-md-2 col-sm-2">
                                    <input type="submit" name="agregar" value="Consultar" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main class="log-in">
        <?php
        //Conexion a la base de datos

        include('../Acciones/conec.php');
        $ubicacion= $_POST['ubicacion'];
        /* $tipo = $_POST['tipo_servicio']; */
        $cantPersonas = $_POST['cantPersonas'];
        //Consulta e insercion de la query
        
        
        $consulta1="SELECT * FROM paquete 
                    where locacion_evento like '$ubicacion' 
                    AND disponibilidad_evento = 'Disponible' 
                    AND cant_personas = $cantPersonas";
        $consulta2="SELECT * FROM paquete 
                    INNER JOIN ciudad ON ciudad.cod_ciudad = paquete.fk_cod_ciudad
                    where disponibilidad_evento = 'Disponible' 
                    AND ciudad.nombre_ciudad like '$ubicacion'";

        if(empty($cantPersonas)){
            $consulta = $consulta2;
        }else{
            $consulta = $consulta1;
        }
        $resultado=mysqli_query($conexion,$consulta);
        ?>
        <div class="General container">
            <div class="row centrado">
                <div class="col-sm-12">
                    <div class="titulito centrado">
                        <h2>Paquetes</h2>
                    </div>
                </div>
                <?php 
                if($fila=mysqli_fetch_array($resultado)){
                    while($fila=mysqli_fetch_array($resultado)){
                        $nomPaquete = $fila["nom_paquete"];
                        /* $imgPaquete = echo $fila["img_paquete"]; */
                        $descripcion = $fila["descrip_paquete"];
                        $cantPersonas = $fila["cant_personas"];
                        $precio = $fila["precio_paquete"];
                        echo "
                        <div class='col-sm-6 col-lg-4 col-md-4 col-log'>
                            <h2 class='center'>$nomPaquete</h2>
                            <img src=' alt='>
                            <p> $descripcion</p>
                            <div>
                                <p>Cantidad de personas: $cantPersonas</p>
                                <p>Precio total: $precio</p>
                            </div>
                        </div>";
                    }
                }else{
                    echo "
                    <div class='col-12 col-sm-12 col-md-12 col-lg-12 centrado paquetes'>
                        <img src='../img/ningun_paquete.png' alt=''>
                        <h5>Ups... Por el momento no contamos con lo que buscas</h5>
                    </div>
                    ";
                }
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