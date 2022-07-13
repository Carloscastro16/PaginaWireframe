<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/Normalize.css">
    <link rel="stylesheet" href="../Styles/Styles_Us.css?v=1.2">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../Styles/argon-dashboard.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Inicia Sesion</title>
    
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
                    <div class="botones">
                        <form action="log-in.php">
                            <button class="botoncin btn btn-outline-success">Login</button>
                        </form>
                        <form action="sign-in.php">
                            <button class="botoncin btn btn-outline-secondary">Register</button>
                        </form>
                    </div>

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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/modoOscuro.js"></script>
</body>
</html>