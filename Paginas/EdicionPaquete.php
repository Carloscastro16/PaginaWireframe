<?php
    include ('../Acciones/conec.php');
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
    
    $codPaquete= $_GET['idPaquete'];
    $consulta="SELECT * FROM paquete WHERE fk_cod_empresa = $varsession AND cod_paquete = '$codPaquete'";
    $resultado = mysqli_query($conexion, $consulta);
    $fila= mysqli_fetch_array($resultado);
    
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
        
            <section class="log-in registro-inicio">
                <div class="General container">
                    <form action="../Acciones/registroPaquete.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="titulito tituloConjunto">
                                    <h4>
                                        Paquete
                                    </h4>
                                </div>
                            </div>
                                
                            

                            <div class="col-md-6">
                                <label class="form-title" for="">Nombre de paquete</label>
                                <input type="hidden" name="fkcodEmpresa" value="<?php echo $varsession ?>" />
                                <input class="form-control" type="text" name="nombrePaquete" value="<?php echo $fila["nom_paquete"] ?>">
                                <input class="collapse form-control" type="text" name="codPaquete" value="<?php echo $fila["cod_paquete"] ?>">
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label class="form-title" for="">Tipo de servicio</label>
                                <select class="form-select" aria-label="Default select example" name="tipoServicio">
                                    <option selected>Ingrese el servicio</option>
                                    <?php
                                            include('../Acciones/conec.php');
                                            $consulta2='SELECT*FROM tipo_servicio';
                                            $resultado2= mysqli_query($conexion,$consulta2); 
                                            WHILE ($fila2=mysqli_fetch_array($resultado2)){
                                    ?>
                                    <option <?php
                                        if ($fila2["cod_tipo_servicio"] == $fila["fk_cod_tipo_servicio"])
                                        echo "selected='selected'"; ?> value="<?php echo $fila2['cod_tipo_servicio']?>">
                                        <?php echo $fila2['nom_servicio']?></option>
                                    <?php  } ?>
                                    
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Ciudad de locación</label>
                                <select class="form-select" aria-label="Default select example" name="ciudad">
                                    <option selected>Ingrese la ciudad</option>
                                    <?php
                                            include('../Acciones/conec.php');
                                            $consulta2='SELECT*FROM ciudad';
                                            $resultado2= mysqli_query($conexion,$consulta2); 
                                            WHILE ($fila2=mysqli_fetch_array($resultado2)){
                                    ?>
                                    <option <?php
                                        if ($fila2["cod_ciudad"] == $fila["fk_cod_ciudad"])
                                        echo "selected='selected'"; ?> value="<?php echo $fila2['cod_ciudad']?>">
                                        <?php echo $fila2['nombre_ciudad']?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Dirección</label>
                                <input class="form-control" type="text" name="direcEvento" value="<?php echo $fila["direc_evento"] ?>">
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Disponibilidad</label>
                                <select class="form-select" aria-label="Default select example" name="disponibilidadEv">
                                    <option selected>Ingrese disponibilidad</option>
                                    <option value="Disponible">Disponible</option>
                                    <option value="Ocupado">No disponible</option>
                                </select>

                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">Precio</label>
                                <input class="form-control" type="text" name="precioEvento" value="<?php echo $fila["precio_paquete"] ?>">
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label class="form-title" for="">¿Para cuantas personas?</label>
                                <input class="form-control" type="text" name="cantidadPersonas" value="<?php echo $fila["cant_personas"] ?>">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label class="form-title" for="">Descripcion</label>
                                <input name="descripcion" class="form-control" id="" rows="3" value="<?php echo $fila["descrip_paquete"] ?>">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" name="btnActualizar" value="Actualizar Paquete" class="btn btn-primary">
                            </div>
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
                                    <tr>
                                            <?php
                                            include('../Acciones/conec.php');
                                            $consulta45 = "SELECT * FROM paquete WHERE fk_cod_empresa = $varsession AND cod_paquete = '$codPaquete'";
                                            $resultado = mysqli_query($conexion, $consulta45);
                                            while($fila45=mysqli_fetch_array($resultado)){
                                                $imagen =$fila["imagen_paquete"];
                                            ?>
                                        <td> <?php echo $fila["cod_paquete"]?></th>
                                        
                                        <td> <?php echo "<img  class='img-thumbnail' width='100px' src='../imagenes/$imagen'/>" ?>
                                        </td>
                                        <td> <?php echo $fila["nom_paquete"] ?> </td>
                                        <td> <?php echo $fila["fk_cod_tipo_servicio"] ?> </td>
                                        <td> <?php echo $fila["fk_cod_ciudad"] ?> </td>
                                        <td> <?php echo $fila["direc_evento"] ?> </td>
                                        <td> <?php echo $fila["disponibilidad_evento"] ?> </td>
                                        <td> <?php echo $fila["precio_paquete"] ?> </td>
                                        <td> <?php echo $fila["cant_personas"] ?> </td>
                                        <td> <?php echo $fila["descrip_paquete"] ?> </td>
                                        <td>  
                                            <a target="_self" href="../Acciones/eliminarPaquete.php?idPaquete=<?php echo $fila["cod_paquete"]?>" name="id"><ion-icon class="trash" name="trash-outline"></ion-icon></a> 
                                            <a target="_self" href="EdicionPaquete.php?idPaquete=<?php echo $fila["cod_paquete"]?>" name="id"><ion-icon class="edit" name="create-outline"></ion-icon></a>  
                                           <!-- <button type="button" name="btnEliminar"  id="submit" class="btn btn-primary"><ion-icon class="trash" name="trash-outline"></ion-icon></button>
                                            <button type="button" name="btnModificar"  class="btn btn-primary"><ion-icon class="edit" name="create-outline"></ion-icon></button> -->
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                </tfoot>
                            </table>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <?php
    include('partials/Scripts.html');
    ?>
</body>

</html>