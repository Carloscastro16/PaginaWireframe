<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/Normalize.css">
    <link rel="stylesheet" href="../Styles/Styles_Us.css?v=3.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../Styles/argon-dashboard.css?v=1.7">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Inicia Sesion</title>
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
                            <a class="nav-link" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="AboutUs.php">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ContactUs.php">Contactanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Eventos.php">Eventos</a>
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
                </div>
            </div>
        </nav>
    </header>
    <main class="log-in">
        <section class="registro-inicio">
            <div class="GeneralLogin container">
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="img-fluid collapse login imagenInicio" alt="" id="imagenInicio"></div>
                        <!-- <img src="../img/galaxiaFeria.jpg" class="img-fluid collapse" alt="" id="imagenInicio"> -->
                        <div class="container">
                            <button id="menuLogin" class="btn btn-primary botonMenus" type="button" data-bs-toggle="collapse" data-bs-target="#menuRegistro" aria-controls="menuRegistro aria-expanded="false" aria-label="Toggle navigation">
                                Or
                            </button>
                            <div class="menuInicio" id="menuInicio">
                                <form action="../Acciones/login.php" method="POST">
                                    <div class="row centrado col-log inicio">
                                        <div class="col-sm-12 col-md-12 col-lg-12 mt-6">
                                            <h2 class="center form-title">Log In</h2>
                                        </div>
                                        <div class="col-sm-10 col-lg-10 mt-7 centradoHorizontal col-md-12 login-form">
                                            <input class="form-control" placeholder="Email Adress" type="email" name="correo">
                                        </div>
                                        <div class="col-sm-10 mt-4">
                                            <input class="form-control" placeholder="*********" type="password" name="password">
                                        </div>
                                        <div class="col-sm-10 mt-7">
                                            <input type="submit" name="iniciar" value="Iniciar Sesion" class="mt-4 btn btn-primary">
                                        </div>
                                        <div class="col-sm-10 mt-4">
                                            <div class="lineaLogin"></div>
                                        </div>
                                        <div class="col-sm-10 mt-4">
                                            <p>¿Olvidaste tu contraseña?</p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="img-fluid imagenRegistro" alt="" id="imagenRegistro"></div>
                        <!-- <img src="../img/galaxiaFeria.jpg" class="img-fluid" alt="" id="imagenRegistro"> -->
                        <div class="container">
                            <div class="menuRegistro collapse login" id="menuRegistro">
                                <form action="../Acciones/sign-in.php" method="POST">
                                    <div class="row centrado col-log registro">
                                        <div class="col-12">
                                            <h2 class="center">Registrate</h2>
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-6">
                                            <label for="">Nombre</label>
                                            <input class="form-control" placeholder="" name="nombre" type="text">
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-3">
                                            <label for="">Apellido Paterno</label>
                                            <input class="form-control" placeholder="" name="apellPa" type="text">
                                        </div>
                                        <div class="col-sm-12 col-md-4 col-lg-3">
                                            <label for="">Apellido Materno</label>
                                            <input class="form-control" placeholder="" name="apellMa" type="text">
                                        </div>
                                        <div class="col-12">
                                            <label for="">Correo</label>
                                            <input class="form-control" placeholder="Email Adress" name="correo" type="email">
                                        </div>
                                        <div class="col-12">
                                            <label for="">Contraseña</label>
                                            <input class="form-control" placeholder="*********" name="password" type="password">
                                            <div class="invalid-feedback">
                                                Las contraseñas no coinciden.
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="">Confirma Contraseña</label>
                                            <input class="form-control" placeholder="*********" name="passwordConf" type="password">
                                            <a href="../Acciones/"></a>
                                        </div>
                                        <div class="col-12 centrado mt-4">
                                            <input type="submit" name="agregar" value="Registrame" class="botoncin btn btn-primary me-3" onClick="validarCampos2(this.form)">
                                        </div>
                                        <div class="col-12 centrado mt-4">
                                            <button class="btn btn-primary empresa" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" aria-controls="toggleMobileMenu" aria-expanded="false" aria-label="Toggle navigation">
                                                <ion-icon name="caret-down-outline"></ion-icon>Para empresas
                                            </button>
                                        </div>
                                        <div class="collapse" id="toggleMobileMenu">
                                            <div class="col-12">
                                                <label for="">Nombre de Empresa</label>
                                                <input class="form-control" placeholder="" name="nombreEmpresa" type="text">
                                            </div>
                                            <div class="col-12">
                                                <label for="">Telefono</label>
                                                <input class="form-control" placeholder="" name="telefono" type="text">
                                            </div>
                                                
                                            <div class="col-12">
                                                <label for="">RFC</label>
                                                <input class="form-control" placeholder="" name="rfc" type="text">
                                            </div>
                                            <div class="col-sm-12 mt-4 centrado">
                                                <input type="submit" name="agregar" value="Registrame" class="botoncin btn btn-primary me-3" onClick="validarCampos2(this.form)">
                                            </div>
                                        </div>
                                        <script languaje="javascript" src="../js/confContraseña.js?v=1.0"></script>   
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                <li class="list-inline-item"><a href="About_Us.html">Sobre nosotros</a></li>
                <li class="list-inline-item navbar-brand"><h3>Uruz</h3></li>
                <li class="list-inline-item"><a href="Contact_Us.html">Contactanos</a></li>
                <li class="list-inline-item"><a href="Eventos.html">Eventos</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="../js/modoOscuro.js"></script>
    <script src="../js/loginMenu.js"></script>
    <script>
        window.onload = function() {
            var contenedor = document.getElementById("contenedor_carga");

            contenedor.style.visibility = "hidden";
            contenedor.style.opacity = "0";
        }
    </script>
    
</body>
</html>