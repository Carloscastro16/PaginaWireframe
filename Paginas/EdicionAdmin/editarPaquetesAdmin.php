<?php
    include ('../../Acciones/conec.php');
    session_start();
    $varsession = $_SESSION['cod_usuario'];
    $rolUsuario = $_SESSION['rolUsuario'];

     if($varsession == null || $varsession == '' || $rolUsuario == '3') {
    echo "ERROR: 412 Usted no tiene acceso";
        header('Location: ../index.html');
        die();
    }
    $btnUsuarios=$_POST['btn-edit'];
    
    //paquetes
    $consultaPaquete = "SELECT * FROM paquete";
    $resultadoPaquete = mysqli_query($conexion, $consultaPaquete);
    $filaPaquete= mysqli_fetch_array($resultadoPaquete);
    $nombrePaquete= $filaPaquete['nom_paquete'];
    $tipoServicio= $filaPaquete['fk_cod_tipo_servicio'];
    $locacion= $filaPaquete['fk_cod_ciudad'];
    $direccion= $filaPaquete['direc_evento'];
    $disponibilidad= $filaPaquete['disponibilidad_evento'];
    $precioEvento= $filaPaquete['precio_paquete'];
    $cantidadPersonas=$filaPaquete['cant_personas'];
    $Descripcion=$filaPaquete['descrip_paquete'];

    //ordenes
   // $consultaOrdenes = "SELECT * FROM orden_evento";
   // $resultadoOrdenes= mysqli_query($conexion,$consultaOrdenes);
   // $filaOrdenes= mysqli_fetch_array($resultadoOrdenes);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Styles/Normalize.css">
    <link rel="stylesheet" href="../../Styles/Styles_Us.css?v=3.7">
    <link rel="stylesheet" href="../../Styles/argon-dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <!-- prueba -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.css"/>

        
    <title>Clientes</title>
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
    <main>
        
        <div class="d-flex" id="wrapper">
            <!--Sidebar-->
            <div class="bg-dark centradoHorizontal" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                    <i class="fa-brands fa-uniregistry">ruz</i>
                </div>
                <button class="switchDashboard" id="switch">
                    <span class="switchIcon">
                        <ion-icon name="sunny-outline"></ion-icon>
                    </span>
                    <span class="switchIcon">
                        <ion-icon name="moon-outline"></ion-icon>
                    </span>
                </button>
                <div class="list-group list-group-flush my-3">
                    <a  href="../Paginas/PerfilCliente.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-user"></i> Perfil
                    </a>
                    <a href="../Acciones/Log-out.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>
                </div>
            </div>
            <!-- End Sidebar-->

            <!-- Seccion del contenido --> 
            <!-- Se guarda todo el contenido en el div para que se respete al sidebar -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg  bg-dark py-3 px-4">
                    <div class="d-flex aling-items-center">
                        <i class="fas fa-aling-left primary-text fs-4 me-4" id="menu-toggle"></i>
                        <h2 class="navbarNav">Perfil de <?php echo $nombreUsuario ?></h2>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <ion-icon name="grid-outline"></ion-icon>
                    </button>
                    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                        <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                            <li class='nav-item-dropdown'>
                                <a href='#' class='nav-link dropdown-toggle second-text fw-bold' id='navbarDropdown'
                                    role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='fas fa-user me-'></i> Hola, <?php echo $nombreUsuario ?>!
                                </a>
                                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                    <li class='dropdown-link'>
                                        <a href='../index.php'>Home</a>
                                    </li>
                                    <li class='dropdown-link'>
                                        <a href='../Paginas/PerfilCliente.php'>Perfil</a>
                                    </li>
                                    <li class='dropdown-link'>
                                        <a href='../Acciones/Log-out.php'>Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <section class="log-in registro-inicio">
                    <div class="General container">
                        <form action="../../Acciones/edicionServiciosAdmin.php" method="post" enctype="multipart/">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="titulito tituloConjunto">
                                        <h4>
                                            Paquete
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="imaperfil">
                                        <img src="../Images/fotoPrincipal.png" alt=""/>
                                    </div>
                                </div>
                                <?php
                                switch ($btnUsuarios){
                                    case 'editarPaquete':
                                        echo "<div class='col-sm-12'>
                                        <div class='titulito tituloConjunto'>
                                            <h4>
                                                Paquete
                                            </h4>
                                        </div>
                                    </div>
                                        
                                    
        
                                    <div class='col-md-6'>
                                        <label class='form-title' >Nombre de paquete</label>
                                        <input type='hidden' name='fkcodEmpresa' value='$varsession' />
                                        <input class='form-control' type='text' name='nombrePaquete' value='$filaPaquete[nom_paquete]'>
                                        <input class='collapse form-control' type='text' name='codPaquete' value='$fila[cod_paquete]'>
                                    </div>
                                    <div class='col-sm-12 col-md-4'>
                                        <label class='form-title' >Tipo de servicio</label>
                                        <select class='form-select' aria-label='Default select example' name='tipoServicio'>
                                            <option selected>Ingrese el servicio</option>
                                            <?php
                                                    include('../Acciones/conec.php');
                                                    $consulta2='SELECT*FROM tipo_servicio';
                                                    $resultado2= mysqli_query($conexion,$consulta2); 
                                                    WHILE ($fila2=mysqli_fetch_array($resultado2)){
                                            ?>
                                            <option <?php
                                                if ($fila2[cod_tipo_servicio] == $fila[fk_cod_tipo_servicio])
                                                echo 'selected='selected''; ?> value='$fila2[cod_tipo_servicio]'>
                                                $fila2[nom_servicio]</option>
                                            <?php  } ?>
                                            
                                        </select>
                                    </div>
                                    <div class='col-sm-6 col-md-4'>
                                        <label class='form-title' >Ciudad de locación</label>
                                        <select class='form-select' aria-label='Default select example' name='ciudad'>
                                            <option selected>Ingrese la ciudad</option>
                                            <?php
                                                    include('../Acciones/conec.php');
                                                    $consulta2='SELECT*FROM ciudad';
                                                    $resultado2= mysqli_query($conexion,$consulta2); 
                                                    WHILE ($fila2=mysqli_fetch_array($resultado2)){
                                            ?>
                                            <option <?php
                                                if ($fila2[cod_ciudad] == $fila[fk_cod_ciudad])
                                                ech'selected='selected''; ?> value='$fila2[cod_ciudad]?>'>
                                                <?php echo $fila2[nombre_ciudad]?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                    <div class='col-sm-6 col-md-4'>
                                        <label class='form-title' >Dirección</label>
                                        <input class='form-control' type='text' name='direcEvento' value=' $fila[direc_evento]'>
                                    </div>
                                    <div class='col-sm-6 col-md-4'>
                                        <label class='form-title' >Disponibilidad</label>
                                        <select class='form-select' aria-label='Default select example' name='disponibilidadEv'>
                                            <option selected>Ingrese disponibilidad</option>
                                            <option value='Disponible'>Disponible</option>
                                            <option value='Ocupado'>No disponible</option>
                                        </select>
        
                                    </div>
                                    <div class='col-sm-6 col-md-4'>
                                        <label class='form-title' >Precio</label>
                                        <input class='form-control' type='text' name='precioEvento' value='$fila[precio_paquete]'>
                                    </div>
                                    <div class='col-sm-6 col-md-4'>
                                        <label class='form-title' >¿Para cuantas personas?</label>
                                        <input class='form-control' type='text' name='cantidadPersonas' value='$fila[cant_personas]'>
                                    </div>
                                    <div class='col-sm-12 col-md-6'>
                                        <label class='form-title'>Descripcion</label>
                                        <input name='descripcion' class='form-control' id='' rows='3' value='$fila[descrip_paquete]'>
                                    </div>
                                    <div class='col-md-2'>
                                        <input type='submit' name='editar' value='Actualizar Paquete' class='btn btn-primary'>
                                    </div>";
                                    break;
                                        case 'editarOrden':
                                            echo " ";
                                    break;
                                        }
                                        ?> 
                            </div>
                        </form>
                    </div>
                </Section>
            </div>
        </div>
    </main>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $('#datepicker').datetimepicker({
                format: "mm-dd-yy",
                language: "es",
                daysOfWeekDisabled: "0"
            })
        })
    </script>
    <script src="../../js/modoOscuro.js"></script>
    <script src="../../js/tablas.js"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function () {
            el.classList.toggle("toggle")
        }
    </script>
    
    <script src="../../js/menuBuscador.js"></script>
    <script>
        window.onload = function() {
            var contenedor = document.getElementById("contenedor_carga");

            contenedor.style.visibility = "hidden";
            contenedor.style.opacity = "0";
        }
    </script>
    
</body>

</html>