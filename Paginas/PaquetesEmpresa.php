<?php
    session_start();
    $varsession = $_SESSION['id'];
    $varsession = $_SESSION['Nombre'];
    $varsession = $_SESSION['Correo'];

    if($varsession == null || $varsession == '' || $varsession == '2') {
        echo "ERROR: 412 Usted no tiene acceso"
        header('Location: index.html');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/Normalize.css">
    <link rel="stylesheet" href="../Styles/Styles_Us.css?v=1.2">
    <link rel="stylesheet" href="../Styles/argon-dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Empresa</title>
    <link rel="icon" href="../img/favicon.svg">
</head>

<body>
    <main>
        <div class="d-flex" id="wrapper">
            <!--Sliderbar-->
            <div class="bg-dark" id="sidebar-wrapper">
                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                    <i class="fa-brands fa-uniregistry">ruz</i>
                </div>
                <div class="list-group list-group-flush my-3">
                    <a href="../Paginas/dashboard_empresa.html"
                        class="list-group-item list-group-item-action bg-transparent second-text active">
                        <i class="fa-solid fa-gauge-high"></i> Dashboard
                    </a>
                    <a  href="../Paginas/perfilDashboard.html" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-user"></i> Perfil
                    </a>
                    <a href="../Paginas/altapaquetes.html"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-plus"></i> Alta paquetes
                    </a>
                    <a href="../Paginas/paquetesEmpresa.html"
                        class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-address-card"></i> Todos mis paquetes
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
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
                    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarSypportedContent" aria-controls="navbarSupportedContent" 
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button> -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item-dropdown">
                                <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i>hola usuario
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="dropdown-link">
                                        <a href="#">Perfil</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Configuración</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="log-in">
                    <section class="registro-inicio">
                        <div class="General centrado container">
                            <table class=" table table-primary ">
                                <thead>
                                    <tr class="table-active">
                                        <!-- encabezado de la tabla-->

                                        <th scope="#">Id</th>
                                        <th scope="#">Nombre</th>
                                        <th scope="#">Descripción</th>
                                        <th scope="#">Numero de pax</th>
                                        <th scope="#">Locacción</th>
                                        <th scope="#">Dirección</th>
                                        <th scope="#">Disponibilidad</th>
                                        <th scope="#">Editar</th>
                                        <th scope="#">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">

                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </main>
<!-------- Scripts -------->
    <?php
    include('partials/Scripts.html');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function () {
            el.classList.toggle("toggle")
        }
    </script>
</body>

</html>