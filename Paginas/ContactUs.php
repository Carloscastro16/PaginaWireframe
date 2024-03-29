<?php
// No mostrar los errores de PHP
// Para que se inicialice la variable de session
    error_reporting(0);
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include('partials/headerGeneral.html');
    ?>
    <title>Contactanos</title>
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
    <main class="vistasIniciales">
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
                                <a class="nav-link" href="AboutUs.php">Sobre nosotros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ContactUs.php">Contáctanos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Eventos.php">Eventos</a>
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
                        $varsession = $_SESSION['cod_usuario'];
                        $correo = $_SESSION['correo'];
                        $rolUsuario = $_SESSION['rolUsuario'];
                        $nombreUsuario = $_SESSION['nombre_usuario'];
                        switch ($rolUsuario) {
                            case '1':
                                $perfil = "DashboardAdmin.php";
                                break;
                            case '2':
                                $perfil = "PerfilCliente.php";
                                break;
                            case '3':
                                $perfil = "PerfilEmpresa.php";
                                break;
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
                                                <a href='../index.php'>Home</a>
                                            </li>
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
    
        <section class="General redes">
            <div class="container">
                <div class="row">
                    <div class="textoRedes col-sm-12">
                        <div class="letras_separado titulo">
                            <span>Contacto</span> 
                        </div>
                        <p>Conoce un poco más acerca de nuestro trabajo a través de nuestras redes sociales:</p>
    
                    </div>
                    <div class="redesSociales col-sm-12">
                        <ul>
                            <li class="botonSociales borroso" >
                                <a class="btn btn-primary" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="botonSociales" >
                                <a class="btn btn-primary" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="botonSociales" >
                                <a class="btn btn-primary" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="botonSociales" >
                                <a class="btn btn-primary" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                                    </svg>
                                </a>
                            </li>
                            <li class="botonSociales" >
                                <a class="btn btn-primary" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    <section class="General">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 textoRedes">
                    <h2 class="frase">
                        Usa ahora Uruz Planning y consigue todo lo cual 
                        necesites para hacer realidad tus sueños. 
                    </h2>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="container">
                        <form action="">
                            <div class="row col-log centrado">
                                <div class="col-12">
                                    <h3 class="colaborador">Contáctanos</h3>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Nombre">
                                </div>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" placeholder="Apellidos">
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="Correo">
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="" id="" rows="3" class="form-control"
                                        placeholder="Mensaje"></textarea>
                                </div>
                                <input type="button" class="botonGeneral btn btn-primary" value="Enviar"">
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>

            <div class="frase">
                <p> ¿No sabes cómo lograr una buena organización para tus eventos? ¿Necesitas conseguir empresas de manera inmediata y a precios accesibles? 
                    No te preocupes, en Uruz Planning tienes la posibilidad de diseñar tus eventos sin complicaciones. Contamos con el patrocinio de varias 
                    empresas donde podrás elegir la mejor opción para tu actividad y poder disfrutar del día. Es muy importante que verifiques las condiciones 
                    y ofertas que cada empresa maneja, ya que pueden variar entre una y otra. ¿Qué estas esperando? Utiliza ahora Uruz Planning y consigue todo 
                    lo que necesites para hacer realidad tus sueños.
                </p>
            </div>
        </div>
    </section>

    <section class="General">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 textoRedes">
                    <H2> Si quieres recibir información más detallada sobre nuestros servicios y funcionamiento, no dudes en enviarnos un mensaje.</H2>
                    
                    <p>Soporte@uruzcorporative.mx</p>
                </div>
            </div>
        </div>
    </section>
    <!------------------Inicio de chat------------------------>

    
</main>
<!-------------------Seccion del footer----------------------->
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
            <li class="list-inline-item"><a href="AboutUs.php">Sobre nosotros</a></li>
            <li class="list-inline-item"><a href="ContactUs.html">Contactanos</a></li>
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
    include('partials/Scripts.html');
    ?>
</body>

</html>