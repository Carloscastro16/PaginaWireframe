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
    $folio = $_SESSION['folio'];
    $consultaOrden ="SELECT folio_evento, fecha, hora_evento, paquete.nom_paquete, paquete.descrip_paquete,
    paquete.cant_personas, paquete.direc_evento, paquete.precio_paquete, imagen_paquete, montaje.nombre_montaje
    FROM orden_evento
    INNER JOIN paquete ON paquete.cod_paquete = orden_evento.fk_cod_paquete
    INNER JOIN montaje ON montaje.cod_montaje = orden_evento.fk_cod_montaje
    WHERE fk_cod_usuario = $varsession AND folio_evento = $folio";
    $resultadoOrden = mysqli_query($conexion, $consultaOrden);
    $filaOrden = mysqli_fetch_array($resultadoOrden);
    $nomMontaje = $filaOrden['nombre_montaje'];
    $nomPaquete = $filaOrden['nom_paquete'];
    $fecha = $filaOrden['fecha'];
    $hora = $filaOrden['hora_evento'];
    $direccion = $filaOrden['direc_evento'];
    $descripcionPack= $filaOrden['descrip_paquete'];
    $precio= $filaOrden['precio_paquete'];
    $imgPaquete = $filaOrden['imagen_paquete'];
    $cantPersonas = $filaOrden['cant_personas'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    // Todos los Meta y links estan dentro de este html
    // Para que verlo, ir a la carpeta Partials en el archivo HeaderGeneral
        include("partials/headerGeneral.html");
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- MDB -->
    <!--  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
    rel="stylesheet"
    />
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"
    ></script> -->
    <link href="lib/timepick.css" rel="stylesheet"/>
    <script type="text/javascript" src="lib/timepick.js?v=1.2"></script>
    <link rel="icon" href="../img/favicon.svg">
    <title>Paquetes</title>
    
</head>
<body class="orden">
    <!-- <div class="contenedor_carga" id="contenedor_carga">
        <div id="carga" class="centrado">
            <svg>
                <circle cx="160" cy="200" r="100" class="circle"/>
                <circle cx="120" cy="160" r="100" class="loader"/>
            </svg>
        </div>
    </div> -->
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
                            <a class="nav-link centrado" href="../index.php">
                                <ion-icon name="arrow-back-outline"></ion-icon> 
                                <div>Regresar a buscador</div>
                            </a>
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
                                                        <a href='../Acciones/Log-out.php'>Log-out</a>
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
            <form action="../Acciones/ordenEventoTicket.php" method="POST">
                <div class="row centrado">
                    <div class="col-sm-12">
                        <div class="container">
                            <div class="row col-log orden">
                                <div class="col-sm-4">
                                    <img src="../imagenes/<?php echo $imgPaquete ?>" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3>Informacion del pago</h3>
                                                <h4>Nombre del paquete: <?php echo $nomPaquete ?></h4>
                                            </div>
                                            <div class="col-sm-6 pack-camp">
                                                <p>Cantidad de personas: <?php echo $cantPersonas ?></p>
                                                <p>Ubicación: <?php echo $direccion ?></p>
                                                <p>Precio total: <?php echo $precio ?></p>
                                                <p>
                                                    Tipo de montaje: <?php echo $nomMontaje ?></p>  
                                                </p>
                                            </div>
                                            <div class="col-sm-3 order-camp">
                                                <p>
                                                    Fecha: <?php echo $fecha ?></p>  
                                                    
                                                </p>
                                                <p>Hora: <?php echo $hora ?></p>  </p>
                                            </div>
  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                    <p>Guarde este ticket por cualquier inconveniente</p>
                                    <input type="button" onClick="location.href='../index.php'" class="btn btn-danger" value="Regresar a perfil" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>    
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
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker({
                format: "yyyy-mm-dd",
                timepicker: true,
                autoclose: true,
            });
        });

        const pickerInline = document.querySelector('.timepicker-inline-12');
        const timepickerMaxMin = new mdb.Timepicker(pickerInline, { format12:true, inline: true });
    </script>
    <script src="../js/modoOscuro.js"></script>
    <script src="../js/tablas.js"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function () {
            el.classList.toggle("toggle")
        }
    </script>
    
    <script src="../js/menuBuscador.js"></script>
    <script>
        window.onload = function() {
            var contenedor = document.getElementById("contenedor_carga");

            contenedor.style.visibility = "hidden";
            contenedor.style.opacity = "0";
        }
    </script>
</body>
</html>