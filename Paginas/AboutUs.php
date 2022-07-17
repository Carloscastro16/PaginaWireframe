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
    <title>Nosotros</title>
    <link rel="icon" href="img/favicon.svg">
    
</head>
<body>
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
                                <a class="nav-link" href="../index.html">Home</a>
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
    
    <section class="General">
        <div class="nosotros container">
                <div class="filasQuienes row">
                    <div class=" col-sm-6">
                    
                        <div class="letras_separado titulo">
                            <span>¿Quiénes </span> 
                        </div>
                        <div class="letras_separado titulo">
                            <br>
                            <span>somos?</span> 
                        </br>
                        </div>
                        <p> <br>Somos una empresa 100% mexicana que brinda soluciones efectivas, 
                            creando eventos inolvidables para las familias y empresas.
                            Contamos con 35 años de experiencia que nos avala, 
                            trabajando para grandes empresas, facilitando la organización de eventos con el respaldo de la mejor tecnología disponibles
                            en el mercado para bridar las mejores experiencias. 
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <img src="../Images/us2.jpg" class="imanosotros">
                    </div>
    
                </div>
                <div class="Linea row">
                    <div class="col-sm-12">
                        <h3>Nuestra Evolucion</h3>
                    </div>
                    <div class="offset-sm-2 col-sm-4">
                        <ul class="linea-tiempo">
                            <li class="momento">
                                <h4>1987</h4>
                                <div class="descripcion"> 
                                    <p> Se funda Urus corporative</p>
                                </div>
                            </li>
                            <li class="momento">
                                <h4>1999</h4>
                                <div class="descripcion"> 
                                    <p>Se crea la primera sucursal en físico en el estado de México</p>
                                </div>
                            </li>
                            <li class="momento">
                                <h4>2005</h4>
                                <div class="descripcion"> 
                                    <p>La empresa obtiene el reconocimiento de la mejor tecnología </p>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                    <div class="col-sm-6">
                        <ul class="linea-tiempo">
                            <li class="momento">
                                <h4>2009</h4>
                                <div class="descripcion"> 
                                    <p>Grandes empresas firma contrato para realizar la gestión de sus eventos a nivel corporativo</p>
                                </div>
                            </li>
                            <li class="momento">
                                <h4>2015</h4>
                                <div class="descripcion"> 
                                    <p>La empresa se muda a la ciudad de Quintana Roo  </p>
                                </div>
                            </li>
                            <li class="momento">
                                <h4>2020</h4>
                                <div class="descripcion"> 
                                    <p>La empresa recibe el reconocimiento de uno de las mejores empresas para trabajar</p>
                                </div>
                            </li>
                        </ul>
                        
                    </div>
                </div>
                

                <div class="filasQuienes colaboradores row">
                    <div class="col-sm-4">
                        <div class="colaborador">              
                            <img src="../Images/per1.jpg" class="fotosp">
                            <h3>Diseñadora de interiores</h3>
                            <p >Con el mejor estudio del mercado y las mejores estrategias
                                que ofrece nuestra colaboradora.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="colaborador"> 
                            <img src="../Images/per2.jpg" class="fotosp">
                            <h3>Líder de proyecto </h3>
                            <p>
                                Con una larga trayectoria en el mercado, contamos conuno de 
                                los mejores organizadores de méxico
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="colaborador">  
                            <img src="../Images/per3.jpg" class="fotosp">
                            <h3>Contadora</h3>
                            <p>
                                Con una grann habilidad númerica, la mejor dentro del estado,
                                garantiza manejar costos accesibles a tu presupuesto.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="colaborador">
                            <img src="../Images/per4.jpg" class="fotosp">
                            <h3>Programador </h3>
                            <p>
                                Con una gran habilidad intelectual hace posible la automatizacón 
                                de nuestros servicios.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="colaborador">
                            <img src="../Images/per5.jpg" class="fotosp">
                            <h3>Analista </h3>
                            <p>
                                Con una larga trayectoria, innova con su conocimiento, haciendo rendir
                                y mejorando la calidad de nuestros servicios.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="colaborador">
                            <img src="../Images/per6.jpg" class="fotosp">
                            <h3>Decorador</h3>
                            <p>
                                Con una larga trayectoria en el mercado, contamos comno de 
                                los mejores organizadores de méxico.
                            </p>
                        </div>
                    </div>
                </div>          
        </div>
    </section>
<!--****************seccion de mision*****************-->
    <section class="General ">
        <div class="mision container">
            <div class="filaval row">
                <div class="imagenValor col-sm-6 ">
                    <img src="../Images/mision.jpg" class="imamision ">
                </div>
                <div class="col-sm-6">
                    <h2 class="subtimision text-end">Misión</h2> 
                        
                        <p class="textoMision text-end">
                            Nuestra misión es crear eventos inolvidables y promover pequeñas y medianas empresas
                            que se encuentran brindadando servicios para fiestas, apoyando a su crecimmiento
                            y a la optimizacion del tiempo de nuestros clientes.
                        </p>    
                </div>
            </div>
            
            
        </div>
</section>
    

<!--*************seccion vision**********-->  
<section class="General ">
    <div class="vision container">
        <div class="filavall row">
            <div class="col-sm-6">
                    <h2 class="subtivision text-start">Visión</h2>
                    <p class="text-start">
                        Movernos hacia un crecimiento rentable y hacer a Uruz 
                        aún mejor para seguir brindando a más clientes, cada día y hacer de sus mejores
                        momentos, un recuerdo inolvidable, guardando sus memorias en esplendidos 
                        paisajes.
                        </p>   
                    </div>
                    <div class="imagenValor col-sm-6">
                <img src="../Images/vision.jpg" class="imavision">
            </div>
        </div>
    </div>
</section>

<!--***********************seccion valores***************-->
    <section class="General">
            <div class="valor container">
                <div class="filaval row">
                    <div class="imagenValor col-sm-6">
                            <img src="../Images/us.jpg" class="imavalor ">
                    </div>
                    <div class="col-sm-6">
                            <h2 class="subtivalor text-center">Valores</h2>
                            <p class="text-center">
                                Respeto <br>
                                Puntualidad <br>
                                Trabajo en equipo <br>
                                Adaptabilidad <br>
                                Honestidad
                            </p>
                        </div>
                </div>
            </div>
    </section>

    <!-------------------Seccion del footer----------------------->
    
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
    <script src="../js/modoOscuro.js"></script>

</body>
</html>