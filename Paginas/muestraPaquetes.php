<?php
// No mostrar los errores de PHP
// Para que se inicialice la variable de session
error_reporting(0);
session_start();
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
                                <div>Regresar</div>
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
                                include('../Acciones/conec.php');
                                
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
                                        $perfil = "DashboardEmpresa.php";
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
                                                        <a href='../index.php'>Home</a>
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
        <div class="container menu">
            <div class="row">
                <div class="col-12">
                    <form action="muestraPaquetes.php" method="POST">
                        <div class="container">
                            <div class="row buscadorsin">
                                <div class="search-camp col-lg-5 col-md-5 col-sm-5">
                                    <ion-icon name="location-outline"></ion-icon>
                                    <input name="ubicacion" type="text" class="form-control form-evento" placeholder="¿Donde quieres tu evento?" required>
                                </div>
                                <div class="search-camp col-lg-4 col-md-4 col-sm-4">
                                    <ion-icon name="calendar-outline"></ion-icon>
                                    <select class="seleccionFab form-select" aria-label="Default select example" name="codServicio">
                                        <option value="Selected">Tipo de evento</option>
                                        <?php
                                        //conectar a la base de datos//
                                        include('../Acciones/conec.php');
                                        $consulta2="SELECT * FROM tipo_servicio";
                                        $resultado2=mysqli_query($conexion,$consulta2);
                                        while($fila2=mysqli_fetch_array($resultado2)){
                                        ?>
                                        <option value="<?php echo $fila2["cod_tipo_servicio"]?>"><?php echo $fila2["nom_servicio"]?></option>
                                        <?php } ?>
                                    </select>
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
    </header>
    <main class="log-in">
        <?php
        //Conexion a la base de datos

        include('../Acciones/conec.php');
        $ubicacion = $_POST['ubicacion'];
        $tipo = $_POST['codServicio'];
        //Consulta e insercion de la query
        $hora = $_POST['hora'];
        
        $consultaCTipo="SELECT * FROM paquete 
                    JOIN ciudad ON ciudad.cod_ciudad = paquete.fk_cod_ciudad
                    WHERE disponibilidad_evento = 'Disponible' 
                    AND ciudad.nombre_ciudad like '$ubicacion' 
                    AND fk_cod_tipo_servicio = '$tipo'";
        $consultaSTipo="SELECT * FROM paquete 
                    JOIN ciudad ON ciudad.cod_ciudad = paquete.fk_cod_ciudad
                    WHERE disponibilidad_evento = 'Disponible' 
                    AND ciudad.nombre_ciudad like '$ubicacion'";

        if(empty($tipo) || isset($tipo) || $tipo = null){
            $consulta = $consultaSTipo;
        }else{
            $consulta = $consultaCTipo;
        }
        $consultaPrueba = $consulta;
        $resultadoPrueba=mysqli_query($conexion,$consultaPrueba);
        /*$filaPrueba= mysqli_fetch_array($resultadoPrueba);*/
        ?>
        <div class="General container">
            <div class="row centrado">
                <div class="col-sm-12">
                    <div class="titulito centrado">
                    <?php echo $hora, $ubicacion?>
                        <h2>Paquetes</h2>
                    </div>
                </div>
                <?php 
                include('../Acciones/conec.php');

                $resultadoMuestra=mysqli_query($conexion,$consulta);
                
                if(empty($filaPrueba= mysqli_fetch_array($resultadoPrueba))){
                    echo "
                    <div class='col-12 col-sm-12 col-md-12 col-lg-12 centrado paquetes'>
                        <img src='../img/ningun_paquete.png' alt=''>
                        <h5>Ups... Por el momento no contamos con lo que buscas</h5>
                    </div>";
                }else{
                    
                    while($filaMuestra=mysqli_fetch_array($resultadoMuestra)){
                        $codPaquete =$filaMuestra["cod_paquete"];
                        $nomPaquete = $filaMuestra["nom_paquete"];
                        $imgPaquete = $filaMuestra["imagen_paquete"];
                        $descripcion = $filaMuestra["descrip_paquete"];
                        $cantPersonas = $filaMuestra["cant_personas"];
                        $precio = $filaMuestra["precio_paquete"];
                        $imgPaquete = $filaMuestra["imagen_paquete"];
                        echo "
                        <div class='col-sm-4 col-lg-4 col-md-4'>
                            <form action='OrdenEvento.php' method='POST'>
                                <div class='col-log'>
                                    <h2 class='center'>$nomPaquete</h2>
                                    <img class='img-thumbnail' width='auto' src='../imagenes/$imgPaquete' alt=''>
                                    <p> $descripcion</p>
                                    <div>
                                        <p>Cantidad de personas: $cantPersonas</p>
                                        <p>Precio total: $precio</p>
                                    </div>
                                    <input class='collapse' type='hidden' name='sesion' value='$varsession'>
                                    <input class='collapse' type='hidden' name='codPaquete' value='$codPaquete'>
                                    <input class='btn btn-primary' type='submit' value='Comprar' name='comprar' onClick='validarCompra(this.form)'>
                                </div>
                                <script languaje='text/javascript' src='../js/compra.js?v=2.0'></script> 
                            </form>
                        </div>
                        ";
                    }
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