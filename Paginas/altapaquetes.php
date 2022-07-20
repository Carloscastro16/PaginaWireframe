<?php
    session_start();
    $varsession = $_SESSION['cod_usuario'];
    $correo = $_SESSION['correo'];
    $rolUsuario = $_SESSION['rolUsuario'];
    $nombreUsuario = $_SESSION['nombre_usuario'];

    if($varsession == null || $varsession == '' || $rolUsuario == '2') {
        echo "ERROR: 412 Usted no tiene acceso";
        header('Location: ../index.html');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('partials/headerUsuarios.html');
    ?>
    <title>Empresa</title>
    <link rel="icon" href="img/favicon.svg">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!--Sliderbar-->
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
                <a href="DashboardEmpresa.php"
                    class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fa-solid fa-gauge-high"></i>Dashboard
                </a>
                <a href="AltaPaquetes.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-user"></i>Alta de paquetes
                </a>
                <a href="../Acciones/Log-out.php"
                    class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-right-from-bracket"></i>Logout
                </a>
            </div>
        </div>
        <!-- End Sliderbar-->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg  bg-dark py-3 px-4">
                <div class="d-flex aling-items-center">
                    <i class="fas fa-aling-left primary-text fs-4 me-4" id="menu-toggle"></i>
                    <h2 class="navbarNav">Dashboard</h2>
                </div>

                <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                    <ul class='navbar-nav ms-auto mb-2 mb-lg-0'>
                        <li class='nav-item-dropdown'>
                            <a href='#' class='nav-link dropdown-toggle second-text fw-bold' id='navbarDropdown'
                                role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-user me-'></i> Hola 
                                <?php echo $nombreUsuario ?>!
                            </a>
                            <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                <li class='dropdown-link'>
                                    <a href='PerfilEmpresa.php'>Perfil</a>
                                </li>
                                <li class='dropdown-link'>
                                    <a href='EditPerfilEmpresa.php'>Configuración</a>
                                </li>
                                <li class='dropdown-link'>
                                    <a href='../Acciones/Log-out.php'>Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Seccion interior de la pagina -->
            <section class="altaPaquete">
                <div class="General container">
                    <form action="../Acciones/registroPaquete.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="imaperfil">
                                <!--<img src="../Images/imagenPaquete.jpg" alt="" />v -->
                                    
                                       

                                        <input type="hidden" name="fkcodEmpresa" value="<?php echo $varsession ?>" />
                                        <input type="file" accept="image/*"  name="txtFoto" id="txtFoto" />
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-title" for="">Nombre de paquete</label>
                                <input class="form-control" type="text" name="nombrePaquete">
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label class="form-title" for="">Tipo de servicio</label>
                                <select class="form-select" aria-label="Default select example" name="tipoServicio">
                                    <option selected>Ingrese el servicio</option>
                                    <?php
                                            include('../Acciones/conec.php');
                                            $consulta='SELECT*FROM tipo_servicio';
                                            $resultado= mysqli_query($conexion,$consulta); 
                                            WHILE ($fila=mysqli_fetch_array($resultado)){
                                    ?>
                                    <option value="<?php echo $fila['cod_tipo_servicio'] ?>"> <?php echo $fila['nom_servicio']?>
                                    </option>
                                    <?php  } ?>
                                    
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Ciudad de locación</label>
                                <select class="form-select" aria-label="Default select example" name="ciudad">
                                    <option selected>Ingrese la ciudad</option>
                                    <?php
                                        include('../Acciones/conec.php');
                                        $consulta='SELECT*FROM ciudad';
                                        $resultado= mysqli_query($conexion,$consulta); 
                                        WHILE($fila=mysqli_fetch_array($resultado)){
                                    ?>
                                    <option value="<?php echo $fila['cod_ciudad'] ?>"> <?php echo $fila['nombre_ciudad']?>
                                    </option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Dirección</label>
                                <input class="form-control" type="text" name="direcEvento">
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Disponibilidad</label>
                                <select class="form-select" aria-label="Default select example" name="disponibilidadEv">
                                    <option selected>Ingrese disponibilidad</option>
                                    <option value="1">Disponible</option>
                                    <option value="2">No disponible</option>
                                </select>

                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Precio</label>
                                <input class="form-control" type="text" name="precioEvento">
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">¿Para cuantas personas?</label>
                                <input class="form-control" type="text" name="cantidadPersonas">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-title" for="">Descripcion</label>
                                <textarea name="descripcion" class="form-control" id="" rows="3"></textarea>
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="registro" value="Añadir paquete" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="General mt-5 container">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="ejemplo" class="table-responsive tablita display" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Imagen</th>
                                        <th>nombre</th>
                                        <th>Tipo</th>
                                        <th>ciudad</th>
                                        <th>Direccion</th>
                                        <th>Estado</th>
                                        <th>Precio</th>
                                        <th>No. pax</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Conexion a la BD-->
                                        <?php
                                        include('../Acciones/conec.php');
                                        $consulta="SELECT * FROM paquete WHERE fk_cod_empresa = $varsession";
                                        $resultado=mysqli_query($conexion,$consulta); 
                                        while($fila=mysqli_fetch_array($resultado)){
                                        ?>
                                    <tr>
                                        <td> <?php echo $fila["cod_paquete"]?></th>
                                        <td><img  class="img-thumbnail" width="100px" src="../Imagenes<?php echo ["txtFoto"];?>" /></td> 

                                        <!--<td> <img src="<?php if( $fila["imagen_paquete"]!=NULL || $fila["imagen_paquete"] !=0){
                                        echo $fila["imagen_paquete"];
                                        }else{
                                        echo '../images/imagen.jpg';
                                        } ?>"></td> -->
                                        <!--<td> <?php echo $fila["imagen_paquete"] ?> </td>-->
                                        <td> <?php echo $fila["nom_paquete"] ?> </td>
                                        <td> <?php echo $fila["fk_cod_tipo_servicio"] ?> </td>
                                        <td> <?php echo $fila["fk_cod_ciudad"] ?> </td>
                                        <td> <?php echo $fila["direc_evento"] ?> </td>
                                        <td> <?php echo $fila["disponibilidad_evento"] ?> </td>
                                        <td> <?php echo $fila["precio_paquete"] ?> </td>
                                        <td> <?php echo $fila["cant_personas"] ?> </td>
                                        <td> <?php echo $fila["descrip_paquete"] ?> </td>
                                        <td>  
                                            <a target="_self" href="../Acciones/eliminarPaquete.php?idProducto=<?php echo $fila["codigo"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_blank" href="paginasEdicion/edicionPaquete.php?idProducto=<?php echo $fila["codigo"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a> 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Imagen</th>
                                        <th>nombre</th>
                                        <th>Tipo</th>
                                        <th>ciudad</th>
                                        <th>Direccion</th>
                                        <th>Estado</th>
                                        <th>Precio</th>
                                        <th>No. pax</th>
                                        <th>Descripcion</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <?php
    include('partials/Scripts.html');
    ?>
</body>

</html>