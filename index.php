<?php
// No mostrar los errores de PHP
// Para que se inicialice la variable de session
    error_reporting(0);
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Styles/Normalize.css">
        <link rel="stylesheet" href="Styles/Styles_Us.css?v=3.4">
        <link rel="stylesheet" href="Styles/argon-dashboard.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" type="text/css">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="icon" href="img/favicon.svg">
        
        <title>Uruz planning</title>
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
            <!--Barra de Navegacion Principal-->
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
                                    <a class="nav-link" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Paginas/AboutUs.php">Sobre nosotros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Paginas/ContactUs.php">Contáctanos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Paginas/Eventos.php">Eventos</a>
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
                                include ('Acciones/conec.php');
                                
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
                                                        <a href='Paginas/$perfil'>Perfil</a>
                                                    </li>
                                                    <li class='dropdown-link'>
                                                        <a href='Acciones/Log-out.php'>Logout</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    ";
                                }else{
                                    echo "
                                    <div class='botones'>
                                        <form action='Paginas/LogIn.php'>
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
            <div class="buscador-main">
                <div class="header buscador-inicial ">
                    <div class="container menu">
                        <div class="row">
                            <div class="col-12">
                                <form action="Paginas/muestraPaquetes.php" method="POST">
                                    <div class="container">
                                        <div class="row buscadorsin">
                                            <div class="search-camp col-lg-12 col-md-12 col-sm-12">
                                                <ion-icon name="location-outline"></ion-icon>
                                                <select class="ubicaciones" name="ubicacion" id="ubicaciones">
                                                    <?php
                                                        //conectar a la base de datos//
                                                        include('Acciones/conec.php');
                                                        $consultaCity="SELECT DISTINCT ciudad.nombre_ciudad FROM ciudad 
                                                        INNER JOIN paquete ON paquete.fk_cod_ciudad= ciudad.cod_ciudad 
                                                        WHERE paquete.disponibilidad_evento LIKE 'Disponible'";
                                                        
                                                        $resultadoCity=mysqli_query($conexion,$consultaCity);
                                                        while($filaCity=mysqli_fetch_array($resultadoCity)){
                                                        ?>
                                                        <option value="<?php echo $filaCity["nombre_ciudad"]?>"><?php echo$filaCity["nombre_ciudad"]?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="search-camp col-lg-3 col-md-3 col-sm-3">
                                            <div style="overflow:hidden;">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <input id="datetimepicker12" type="text" name="hora" value="Consultar" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <style>
                                                @import url('https://fonts.googleapis.com/css?family=Barlow:100,200,300,400,500,600,700,800,900');
                                                td {
                                                border-radius: 0 !important;
                                                }

                                                tr th {
                                                    font-weight: 500;
                                                }

                                                .timepicker {
                                                max-width: 2rem;
                                                border-radius: 0;
                                                }
                                                .bootstrap-datetimepicker-widget input{
                                                    width: 1rem !important;
                                                    height: 1rem !important;
                                                }
                                            </style>
                                            <script type="text/javascript">
                                                moment.locale('en', {
                                                        week: { dow: 1 } // Monday is the first day of the week
                                                    });

                                                $('#datetimepicker12').datetimepicker({
                                                inline: true,
                                                sideBySide: true,
                                                format: 'HH:mm',
                                                stepping: 30,
                                                minDate: moment()
                                                });
                                            </script>
                                            </div>
                                            <div class="search-camp col-lg-3 col-md-3 col-sm-3">
                                                <input type="submit" name="agregar" value="Consultar" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div>
                        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xnlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                            <defs>
                                <path
                                id="gentle-wave"
                                d="M-180 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
                            </defs>
                            <g class="parallax">
                                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)"/>
                                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)"/>
                                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)"/>
                                <use xlink:href="#gentle-wave" x="48" y="7" fill="#344767"/>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
            <!--Seccion General-->
            <div class="portada">
                <!--<h1>Hacemos realidad tus sueños</h1>-->
                <div class="letras_separado portada">
                        <span>Hacemos realidad tus sueños</span> 
                </div>
                <div class="sliderPortada">
                    <ul>
                        <li>
                            <img src="img/bodaPlaya.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/Cena.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/DamasHonor.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/newyear.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/Casino.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/ted-talk.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/triatlon.jpg" alt="">
                        </li>
                        
                        <!--Repeticion para que sea infinito-->
                        <li>
                            <img src="img/bodaPlaya.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/Cena.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/DamasHonor.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/newyear.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/Casino.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/ted-talk.jpg" alt="">
                        </li>
                        <li>
                            <img src="img/triatlon.jpg" alt="">
                        </li>
                    </ul>
                    
                </div>
            </div>
            <Section class="General">
                <!--Portada de la pagina-->
                <div class="container queCosa">
                    <div class="row">
                        
                        <div class="tituloQue">
                            <h2>
                                ¿Qué hacemos?
                            </h2>
                            <p>
                                Tus asistentes están listos para crear y brindarte
                                una experiencia única en la gestión y logística 
                                de tu evento, contamos con colabores expertos en su 
                                área que harán de tu fiesta un inolvidable recuerdo  
                            </p>
                            
                        </div>
                    </div>
                    <div class="row Muestras">
                        
                        <!--Iconos Ejemplos -->
                        <div class="iconosMuestra col-sm-12 col-lg-6 col-md-6">
                            <div class="col-log">
                                <h3>Sociales</h3>
                                <img src="img/Casino.jpg" alt="">
                                <p>
                                    Fiestas completamente personalizadas, 
                                    con las mejores comidas, incluyendo adornos
                                    y recuerdos para que el dia sea completamente
                                    inolvidable. 
                                </p>
                                <button class="butMues">
                                    <a href="Paginas/Eventos.html">Saber más</a>
                                </button>
                            </div>
                        </div>
                        <div class="iconosMuestra col-sm-12 col-lg-6 col-md-6">
                            <div class="col-log">
                                <h3>Corporativos</h3>
                                <img src="img/Boda.jpg" alt="">
                                <p>
                                    Creamos experiencias completamente inolvidables
                                    a la par de tus espectativas, tenemos colaboracion
                                    con las mejores pastelerias y salones de eventos de 
                                    Mexico. 
                                </p>
                                <button class="butMues" role="button">
                                    <a href="Paginas/Eventos.php">Saber más</a>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </Section>
            <!--Slider para marcas-->
            <section class="seccionSlider">
                <h2>Empresas Vinculadas</h2>
                <div class="slider">
                    <div class="galeria">
                        <div class="imagen">
                            <img src="img/Marcas/Amazon.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/DHL.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Ebay.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Facebook.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Zoom.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Forbes.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Google.png" alt="">
                        </div>
            
                        <!--Esta sera la repeticion de las imagenes-->
                        <div class="imagen">
                            <img src="img/Marcas/Amazon.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/DHL.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Ebay.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Facebook.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Zoom.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Forbes.png" alt="">
                        </div>
                        <div class="imagen">
                            <img src="img/Marcas/Google.png" alt="">
                        </div>
                        
                    </div>
                </div>
            </section>
            
            <!--Seccion de Que hacemos-->
            <section class="masInfo">
                <div class="container">
                    <div class="row filita" >
                        <div class="contamosMas col-sm-8">
                            <h2>Te contamos mas sobre nuestros eventos</h2>
                            <p>
                                Nuestra especialidad siempre sera la flexibilidad, buscamos crear todo lo que se te pueda ocurrir,
                                tenemos conexiones con muchas empresas que podran ayudarte a crear tu evento perfecto.
                            </p>
                            <button class="butMues" role="button">
                                <a href="Paginas/Eventos.php" >Saber más</a>
                            </button>
                        </div>
                        <div class="col-sm-4">
                            <img src="img/newyear.jpg" alt="">
                        </div>
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
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.html">Home</a></li>
                <li class="list-inline-item"><a href="Paginas/AboutUs.php">Sobre nosotros</a></li>
                <li class="list-inline-item"><a href="Paginas/ContactUs.php">Contactanos</a></li>
                <li class="list-inline-item"><a href="Paginas/Eventos.php">Eventos</a></li>
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
    <script type="text/javascript">
            $('#ubicaciones').select2();
            $('#servicios').select2();
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.js"></script>
    <script src="js/modoOscuro.js"></script>
    <script src="js/tablas.js"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function () {
            el.classList.toggle("toggle")
        }
    </script>
    
    <script src="js/menuBuscador.js"></script>
    <script>
        window.onload = function() {
            var contenedor = document.getElementById("contenedor_carga");

            contenedor.style.visibility = "hidden";
            contenedor.style.opacity = "0";
        }
        
    </script>
    
</body>
</html>