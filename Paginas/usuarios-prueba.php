<!DOCTYPE html>
<html lang="es">
<head>
<?php
    include('../partials/header.html');
    ?>
    <title>Usuarios</title>
</head>
<body class="g-sidenav-show">
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3"
    id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="#"
            target="_blank">
            <span class="ms-1 font-weight-bold text-white">Tiendita</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/dashboard.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="../pages/tables.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/productos.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Registro Productos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="../pages/fabricante.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Registro de Fabricantes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="../pages/usuarios.php">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                    </div>
                    <span class="nav-link-text ms-1">Registro de Usuarios</span>
                </a>
            </li>
        </ul>
    </div>

</aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <?php
    include('../partials/navbar.html');
    ?>
        <section class="General container">

            <div class="titulo">
                <H1>Ingrese Usuarios</H1>
            </div>
            <!--agregar formulario-->
            <form class="formulario" action="../Acciones/registroUsuario.php" method="POST">
                <div class="row">
                    <h2>Datos generales</h2>
                    <div class="col-12">
                        <input placeholder="Nombre" type="text" class="form-control" name="nomUser">
                    </div>
                    <div class="col-6">
                        <input placeholder="Apellido Paterno" type="text" class="form-control" name="apellPaU">
                    </div>
                    <div class="col-6">
                        <input placeholder="Apellido Materno" type="text" class="form-control" name="apellMaU">
                    </div>
                    <div class="col-5">
                        <input placeholder="Correo" type="text" class="form-control" name="correoUser">
                    </div>
                    <div class="col-3">
                        <input placeholder="Telefono" type="text" class="form-control" name="telefonoUser">
                    </div>
                    
                    <h2>Datos de Usuario</h2>
                    <div class="col-6">                    
                        <input placeholder="Username" type="text" class="form-control" name="username">
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6 offset-col-6">
                        
                        <input placeholder="Contraseña" type="password" class="form-control" name="password">
                    </div>
                </div>
                
                <input type="submit" name="agregar" value="Registrarme" class="botoncin btn btn-primary">
            </form>    
        </section>
        <!--inicio de la tabla--> 
        <div class="container tablaUsuarios">
            <div class="row">
                <div class="col-12">
                    <table class="table tablita">
                        <thead>
                            <tr>
                                <!-- encabezado de la tabla-->
                                
                                <th scope="col">Id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Celular</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Eliminar</th>
                                <th scope="col">Editar</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Conexion a la BD-->
                            <?php
                        include('../Acciones/conec.php');
                        
                        //esta consulta muestra datos del usuario
                        $consulta="SELECT * FROM ";
                        $resultado=mysqli_query($conexion,$consulta); 
                        while($fila=mysqli_fetch_array($resultado)){
                            ?>
                            <tr>
                                <!--muestra la numeracion en fila-->
                                <td> <?php echo $fila["id_usr"] ?></td>
                                <th scope="row">
                                    <p><?php echo $fila["nombre"]?></p>
                                    <p class="apellidos"><?php echo $fila["apellPa"] ?> <?php echo $fila["apellMa"] ?></p>
                                </th>
                                <td> <?php echo $fila["celular"] ?></td>
                                <td> <?php echo $fila["correo"] ?> </td>
                                <td> <?php echo $fila["username"] ?> </td>
                                <th scope="col">
                                    <a target="_self" href="../Acciones/eliminarUsuario.php?username=<?php echo $fila["username"]?>" name="id">
                                        borrar
                                    </a>
                                </th>
                                <th scope="col">
                                    <a target="_blank" href="paginasEdicion/edicionUsuario.php?username=<?php echo $fila["username"]?>" name="id">
                                        editar
                                    </a>
                                </th>
                                
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>
    
    <!--fin de la tabla-->

    <?php
    include('../partials/scripts.html')

    ?>
    
</body>
</html>