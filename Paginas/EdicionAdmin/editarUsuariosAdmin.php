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
    $codUsuario=$_POST['idUsuario'];
    $consulta = "SELECT * FROM usuario WHERE cod_usuario = '$codUsuario'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    $rolUsuario = $fila['fk_rol_usuario'];
    $nombreUsuario = $fila['nombre_usuario'];
    $correo = $fila['correo_usuario'];
    $apellidoMa = $fila['ape_materno'];
    $apellidoPa = $fila['ape_paterno'];
    $RFC = $fila['rfc'];
    $nomEmpresa = $fila['nombre_empresa'];
    $telEmpresa = $fila['tel_empresa'];
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
                        <form action="../../Acciones/edicionUsuarioAdmin.php" method="post" enctype="multipart/">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="titulito tituloConjunto">
                                        <h4>
                                            Perfil
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
                                    case 'editarCliente':
                                        echo "<div class='col-md-6'>
                                                <div class='titulito'>
                                                    <h5>
                                                        Rol de usuario
                                                        <input name='rol' type='text' class='form-control' value='$rolUsuario'>
                                                    </h5> 
                                                    <h5>
                                                        Nombre
                                                        <input name='nombre' type='text' class='form-control' value='$nombreUsuario'>
                                                    </h5> 
                                                    <h5>
                                                        Apellido Paterno
                                                        <input name='apellPa' type='text' class='form-control' value='$apellidoPa'>
                                                    </h5>
                                                    <h5>
                                                        Apellido Materno
                                                        <input name='apellMa' type='text' class='form-control' value='$apellidoMa'>
                                                    </h5> 
                                                    <h5>
                                                        Correo
                                                        <input name='correo' type='text' class='form-control' value='$correo'>
                                                    </h5>
                                                    <div class='col-12'>
                                                        <button class='btn btn-primary empresa' type='button' data-bs-toggle='collapse' data-bs-target='#toggleMobileMenu' aria-controls='toggleMobileMenu' aria-expanded='false' aria-label='Toggle navigation'>
                                                            <ion-icon name='bag-outline'></ion-icon>Cambiar contraseña
                                                        </button>
                                                    </div>
                                                    <div class='collapse' id='toggleMobileMenu'>
                                                        <label for=''>Contraseña</label>
                                                        <input class='form-control' placeholder='**********' name='password' type='password'>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-md-2'>
                                                <input type='hidden' name='codUsuario' value='$codUsuario' 
                                                class='btn btn-primary'>
                                                <input type='submit' value='Editar cliente' name='editar' 
                                                class='btn btn-primary'>
                                            </div>";
                                        break;
                                        case 'editarEmpresa':
                                            echo "<div class='col-md-6'>
                                                    <div class='titulito'>
                                                        <h5>
                                                            Rol de usuario
                                                            <input name='rol' type='text' class='form-control' value='$rolUsuario'>
                                                        </h5> 
                                                        <h5>
                                                            Nombre
                                                            <input name='nombre' type='text' class='form-control' value='$nombreUsuario'>
                                                        </h5> 
                                                        <h5>
                                                            Apellido Paterno
                                                            <input name='apellPa' type='text' class='form-control' value='$apellidoPa'>
                                                        </h5>
                                                        <h5>
                                                            Apellido Materno
                                                            <input name='apellMa' type='text' class='form-control' value='$apellidoMa'>
                                                        </h5> 
                                                        <h5>
                                                            Correo
                                                            <input name='correo' type='text' class='form-control' value='$correo'>
                                                        </h5>
                                                        <h5>
                                                            Nombre de Empresa 
                                                            <input name='nomEmpresa' type='text' class='form-control' value='$nomEmpresa'>
                                                        </h5>
                                                        <h5>
                                                            Telefono de Empresa 
                                                            <input name='telEmpresa' type='text' class='form-control' value='$telEmpresa'>
                                                        </h5>
                                                        <h5>
                                                            RFC
                                                            <input name='rfc' type='text' class='form-control' value='$RFC'>
                                                        </h5>
                                                        <div class='col-12'>
                                                            <button class='btn btn-primary empresa' type='button' data-bs-toggle='collapse' data-bs-target='#toggleMobileMenu' aria-controls='toggleMobileMenu' aria-expanded='false' aria-label='Toggle navigation'>
                                                                <ion-icon name='bag-outline'></ion-icon>Cambiar contraseña
                                                            </button>
                                                        </div>
                                                        <div class='collapse' id='toggleMobileMenu'>
                                                            <label for=''>Contraseña</label>
                                                            <input class='form-control' placeholder='**********' name='password' type='password'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-2'>
                                                    <input type='hidden' name='codUsuario' value='$codUsuario' 
                                                    class='btn btn-primary'>
                                                    <input type='submit' value='Editar empresa' name='editar' 
                                                    class='btn btn-primary'>
                                                </div>";
                                            break;
                                        case 'editarAdmin':
                                            echo "<div class='col-md-6'>
                                                    <div class='titulito'>
                                                        <h5>
                                                            Rol de usuario
                                                            <input name='rol' type='text' class='form-control' value='$rolUsuario'>
                                                        </h5> 
                                                        <h5>
                                                            Nombre
                                                            <input name='nombre' type='text' class='form-control' value='$nombreUsuario'>
                                                        </h5> 
                                                        <h5>
                                                            Apellido Paterno
                                                            <input name='apellPa' type='text' class='form-control' value='$apellidoPa'>
                                                        </h5>
                                                        <h5>
                                                            Apellido Materno
                                                            <input name='apellMa' type='text' class='form-control' value='$apellidoMa'>
                                                        </h5> 
                                                        <h5>
                                                            Correo
                                                            <input name='correo' type='text' class='form-control' value='$correo'>
                                                        </h5>
                                                        <div class='col-12'>
                                                            <button class='btn btn-primary empresa' type='button' data-bs-toggle='collapse' data-bs-target='#toggleMobileMenu' aria-controls='toggleMobileMenu' aria-expanded='false' aria-label='Toggle navigation'>
                                                                <ion-icon name='bag-outline'></ion-icon>Cambiar contraseña
                                                            </button>
                                                        </div>
                                                        <div class='collapse' id='toggleMobileMenu'>
                                                            <label for=''>Contraseña</label>
                                                            <input class='form-control' placeholder='**********' name='password' type='password'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-2'>
                                                    <input type='hidden' name='codUsuario' value='$codUsuario' 
                                                    class='btn btn-primary'>
                                                    <input type='submit' value='Editar admin' name='editar'
                                                    class='btn btn-primary'>
                                                </div>";
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