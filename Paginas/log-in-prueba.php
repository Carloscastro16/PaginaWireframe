<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Acciones/styles/stylesIndex.css?v=2.2">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="Acciones/styles/nucleo-icons.css?v=2.3" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="Acciones/styles/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="Acciones/styles/material-dashboard.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">
    <title>pagina principal</title>
</head>

<body>

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12 barraNav">
                <nav class="navbar navbar-expand-lg blur border-radius-lg start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                            Argon Dashboard 2
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                        href="pages/dashboard.php">
                                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                        Dashboard
                                    </a>
                                </li>
                                <!--
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="../pages/profile.html">
                                        <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                        Profile
                                    </a>
                                </li>
                                -->
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="pages/sign-up.php">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Sign Up
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="../pages/index.html">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Sign In
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <main class="sectionLogin">
        <div class="container General">
            <div class="row">
                <div class="col-6 contenido">
                    <div class="titulo">
                        <h1>Inicio de sesion</h1>
                    </div>
                    <img src="" alt="">
                    <form action="Acciones/login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <!--ingresa la lectura que se muestra en pantalla-->
                            <input type="text" class="form-control" name="correo">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <!--ingresa la lectura que se muestra en pantalla-->
                            <input type="text" class="form-control" name="password">
                        </div>
                        <input type="hidden" name="codigo" value="<?php echo $fila['codigo']?>">
                        <input type="submit" name="iniciar" value="Iniciar sesión" class="botoncin btn btn-primary" />
                    </form>
                </div>

                <div class="col-6 contenido imagen">
                    <h3>La vida es bonita</h3>
                </div>
            </div>
        </div>

    </main>

    <!-- Scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>