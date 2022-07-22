<?php
    include ('../Acciones/conec.php');
    session_start();
    $varsession = $_SESSION['cod_usuario'];
    $correo = $_SESSION['correo'];
    $rolUsuario = $_SESSION['rolUsuario'];
    $nombreUsuario = $_SESSION['nombre_usuario'];

    if($varsession == null || $varsession == '' || $rolUsuario != '1') {
        echo "ERROR: 412 Usted no tiene acceso";
        header('Location: ../index.html');
        die();
    }
    $codCiudad = $_GET['idCiudad'];
    $consulta = "SELECT * FROM ciudad WHERE cod_ciudad = '$codCiudad'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    $nombreCiudad = $fila['nombre_ciudad'];
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('partials/headerUsuarios.html');
    ?>
    <title>Clientes</title>
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
                
                <section class="log-in registro-inicio">
                    <div class="General container">
                        <form action="../Acciones/edicionesAdmin.php" method="post" enctype="multipart/">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="titulito tituloConjunto">
                                        <h4>
                                            Edicion de Ciudad
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="titulito">
                                        <h5>
                                            Valor
                                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombreUsuario;?>">
                                        </h5> 
                                        <h5>
                                            Apellido Paterno
                                            <input name="apellPa" type="text" class="form-control" value="<?php echo $apellidoPa;?>">
                                        </h5>
                                        <h5>
                                            Apellido Materno
                                            <input name="apellMa" type="text" class="form-control" value="<?php echo $apellidoMa;?>">
                                        </h5> 
                                        <h5>
                                            Correo
                                            <input name="correo" type="text" class="form-control" value="<?php echo $correo;?>">
                                        </h5>
                                        <div class="col-12">
                                            <button class="btn btn-primary empresa" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                                                <ion-icon name="bag-outline"></ion-icon>Cambiar contraseña
                                            </button>
                                        </div>
                                        <div class="collapse" id="toggleMobileMenu">
                                            <label for="">Contraseña</label>
                                            <input class="form-control" placeholder="**********" name="password" type="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="registro" value="Editar" 
                                    class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </Section>
            </div>
        </div>
    </main>

    <?php
    include('partials/Scripts.html');
    ?>
</body>

</html>