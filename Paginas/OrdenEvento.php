<?php
// No mostrar los errores de PHP
// Para que se inicialice la variable de session
error_reporting(0);
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
                                session_start();
                                $varsession = $_SESSION['cod_usuario'];
                                $correo = $_SESSION['Correo'];
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
    <?php
    $consultaPaquete = "SELECT * FROM paquete WHERE cod_paquete = $codPaquete";
    $resultadoPaquetes = mysqli_query($conexion, $consultaPaquete);
    $fila = mysqli_fetch_array($resultadoPaquetes);
    $nomPaquete = $fila["nom_paquete"];
    $imgPaquete = $fila["imagen_paquete"];
    $direccion = $fila["direc_evento"];
    $descripcion = $fila["descrip_paquete"];
    $cantPersonas = $fila["cant_personas"];
    $precio = $fila["precio_paquete"];
    ?>
    <main class="log-in">
        <div class="General container">
            <form action="../Acciones/ordenEventoTicket.php" method="POST">
                <div class="row centrado">
                    <div class="col-sm-12">
                        <div class="container">
                            <div class="row col-log orden">
                                <div class="col-sm-4">
                                    <img class='img-thumbnail' width='auto' src="../imagenes/<?php echo $imgPaquete ?>" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h3>Informacion del paquete</h3>
                                                <h4>Nombre del paquete: <?php echo $nomPaquete ?></h4>
                                            </div>
                                            <div class="col-sm-6 pack-camp">
                                                <p>Cantidad de personas: <?php echo $cantPersonas ?></p>
                                                <p>Ubicación: <?php echo $direccion ?></p>
                                                <p>Precio total: <?php echo $precio ?></p>
                                                <p>Celular
                                                    <input type="text" class='form-control' id="celular" placeholder="9987654312" name='celular' required>
                                                </p>
                                                <p>
                                                    Selecciona un tipo de montaje:
                                                    <select class="seleccionFab form-control" aria-label="Default select example" name="codMontaje">
                                                        <option value="Selected">Tipo de evento</option>
                                                        <?php
                                                        //conectar a la base de datos//
                                                        include('../Acciones/conec.php');
                                                        $consulta2="SELECT * FROM montaje";
                                                        
                                                        $resultado2=mysqli_query($conexion,$consulta2);
                                                        while($fila2=mysqli_fetch_array($resultado2)){
                                                        ?>
                                                        <option value="<?php echo $fila2["cod_montaje"]?>"><?php echo$fila2["nombre_montaje"]?></option>
                                                        <?php } ?>
                                                    </select>
                                                </p>
                                            </div>
                                            <div class="col-sm-3 order-camp centradoHorizontal">
                                                <div class="input-group date" id="datepicker">
                                                    <label for="text" class="control-label">¿Para cuando quieres tu evento?</label>
                                                    <input type="text" class="form-control" placeholder="MM/DD/YYYY" name="fecha" required readonly>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text">
                                                            <ion-icon name="calendar-outline"></ion-icon>
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 order-camp centradoHorizontal">     
                                                <label for="text" class="control-label">¿A que hora se realizará?</label>
                                                <div>
                                                    <input id="timepkr" style="width:100px;float:left;" class="form-control" placeholder="HH:MM" name="hora" required readonly/>
                                                    <button type="button" class="btn btn-primary " onclick="showpickers('timepkr',24)"><ion-icon name="time-outline"></ion-icon></button>
                                                </div>
                                            </div>
                                            <div class="timepicker"></div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 centrado mt-4">
                                    <button class="btn btn-primary empresa" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                                        <ion-icon name="caret-down-outline"></ion-icon>Pagar
                                    </button>
                                </div>
                                <div class="collapse panel panel-default" id="toggleMobileMenu">
                                    <div class="panel-heading">
                                        <div class="row ">
                                            <div class="col-sm-12">
                                                <h4>Datos bancarios</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <span class="help-block text-muted small-font">Numero de tarjeta</span>
                                                <input type="text" class="form-control" placeholder="Enter Card Number" required/>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-3 col-sm-3 col-xs-3 centrado">
                                                <div class="texto">
                                                    <span class="help-block text-muted small-font" >Mes de Expiracion</span>
                                                    <input type="text" class="form-control" placeholder="MM" required/>
                                                </div>
                                                <div class="barraPago centrado">
                                                    <h4> / </h4>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <span class="help-block text-muted small-font" >Año de Expiracion</span>
                                                <input type="text" class="form-control" placeholder="YY" required/>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                <span class="help-block text-muted small-font" >CCV</span>
                                                <input type="text" class="form-control" placeholder="CCV" required/>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-md-12 pad-adjust">
                                                <span class="help-block text-muted small-font">Nombre en la tarjeta</span>
                                                <input type="text" class="form-control" placeholder="Nombre en la tarjeta" required/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pad-adjust">
                                                <div class="checkbox">
                                                <label>
                                                <input type="checkbox" checked class="text-muted">Guardar datos para despues
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                            <input type="button" onClick="location.href='../index.php'" class="btn btn-danger" value="Cancelar" />
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                            <input class='collapse' type='hidden' name='codPaquete' value='<?php echo $codPaquete ?>'>
                                            <input class='btn btn-primary' type='submit' value='Pagar ahora' name='comprar'>
                                        </div>
                                    </div>
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