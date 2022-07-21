<?php
// No mostrar los errores de PHP
// Para que se inicialice la variable de session
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    include('partials/headerGeneral.html');
    ?>
    <title>Eventos</title>
    <link rel="icon" href="img/favicon.svg">
    
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

        <!--Inicio de barra de navegacion-->
        <header>
            <nav class="navbar navbar-expand-lg bg-dark ">
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
                        session_start();
                        $varsession = $_SESSION['cod_usuario'];
                        $correo = $_SESSION['Correo'];
                        $rolUsuario = $_SESSION['rolUsuario'];
                        $nombreUsuario = $_SESSION['nombre_usuario'];
                        if ($rolUsuario == "2"){
                            $perfil = "PerfilCliente.php";
                        }else{
                            $perfil = "PerfilEmpresa.php";
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
                                                <a href='../Paginas/$perfil'>Perfil</a>
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
    <!--fin de barra de navegacion-->
    <section class="General container">
        <div class="centrado">
            <!--<h1>Nuestros eventos</h1> -->
            <div class="letras">
                <span>E</span>
                <span>v</span>
                <span>e</span>
                <span>n</span>
                <span>t</span>
                <span>o</span>
                <span>s</span>
            
            </div>
        </div>
        <div class="row eventotes">
            <div class="col-4 eventitos">
                <img src="../img/Boda.jpg" alt="">
                <h4>Bodas</h4>
                <p>Con nuestros diseñadores y maestros en el arte de crear hermosos 
                    recuerdos, te garantizamos una gran variedad de opciones para 
                    crear un evento a la medida de tus necesidades para que ese 
                    día especial sea un momento inolvidable. </p>
            </div>
            <div class="col-4 eventitos">
                <img src="../img/Casino.jpg" alt="">
                <h4>Juegos interactivos</h4>
                <p>Contamos con los servicios que usted necesite para realizar sus 
                    competiciones, solo imagínelo y nosotros nos encargamos de 
                    llevarlo a cabo.</p>
            </div>
            <div class="col-4 eventitos">
                <img src="../img/cena-grande.jpg" alt="">
                <h4>Mega eventos</h4>
                <p>Uruz Planning está a su disposición para organizar con éxitos 
                    sus eventos masivos, pues contamos con grandes empresas destinadas 
                    a la logística estratégica de servicios requerida para la realización 
                    exitosa de estos.</p>
            </div>
            <div class="col-4 eventitos">
                <img src="../img/AñoNuevo.jpg" alt="">
                <h4>Fin de año</h4>
                <p>Olvídate del estrés por organizar la mejor fiesta del año, 
                    pues nuestros colaboradores se encargarán de todo. Con nuestro sistema
                    no tendrás que preocuparte por el lugar, la comida y 
                    el buen ambiente, podrás disfrutar de las fiestas decembrinas 
                    sin preocupación.</p>
            </div>
            <div class="col-4 eventitos">
                <img src="../img/navidad.jpg" alt="">
                <h4>Posadas</h4>
                <p>Tus fiestas no serán las mismas si decides trabajar con Uruz Planning, 
                    con nuestro sistema tendrás las reuniones más atractivas para que tanto 
                    tú como los demás se la pasen increíble. </p>
            </div>
            <div class="col-4 eventitos">
                <img src="../img/conferencia.jpg" alt="">
                <h4>Conferencias</h4>
                <p>Enfatizamos en el ramo por el grado de calidad y exigencia que manejamos, 
                    usando los instrumentos más actualizados y modernos, construyendo con 
                    ello un equipo de primera calidad y al menor precio. </p>
            </div>
            <div class="col-4 eventitos">
                <img src="../img/FinAño.jpg" alt="">
                <h4>Cenas especiales</h4>
                <p>Nuestros diseñadores encargados serán los responsables de 
                    convertir un momento cualquiera, en un recuerdo maravilloso, anímate a 
                    contactarlos y disfrutar de una cena espectacular en compañía de tus 
                    invitados. </p>
            </div>
            <div class="col-4 eventitos">
                <img src="../img/ted-talk.jpg" alt="">
                <h4>Seminarios</h4>
                <p>Para la realización de seminarios es necesario que tengas todo lo 
                    necesario para que no falte ningún detalle. Ponemos a tu disposición 
                    todo lo que necesites para realizar tus proyectos y mucho más.</p>
            </div>
            <div class="col-4 eventitos">
                <img src="../img/triatlon.jpg" alt="">
                <h4>Carreras o Triatlones</h4>
                <p>Nuestros servicios son de excelencia, cuidando siempre los detalles de 
                    cada evento, es por ello que Uruz Planning antepone ante todo la calidad 
                    e imagen que desees para los invitados, haciendo que cada acontecimiento 
                    sea diferente e inigualable.</p>
            </div>
        </div>
    </section>

    
    </main>
    <!-------------------Seccion del footer----------------------->
    <div class="footerBasic">
        <footer>
            <nav class="social">
                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#"><ion-icon name="logo-github"></ion-icon></a>
                <a href="#"><ion-icon name="logo-linkedin"></ion-icon></a>
            <ul class="list-inline navegaFooter">
                <li class="list-inline-item"><a href="../index.html">Home</a></li>
                <li class="list-inline-item"><a href="#">Sobre nosotros</a></li>
                <li class="list-inline-item"><a href="#">Contactanos</a></li>
                <li class="list-inline-item"><a href="#">Eventos</a></li>
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