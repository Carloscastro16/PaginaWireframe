<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Styles/Normalize.css">
        <link rel="stylesheet" href="Styles/styles.css?v=1.0">
        <link rel="stylesheet" href="Styles/argon-dashboard.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;0,800;1,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" type="text/css">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        
        <title>Uruz planning</title>
    </head>
    <body>
        <main>
            <!--Barra de Navegacion Principal-->
        <section>
            <nav class="navbar navbar-expand-lg bg-dark">
                <div class="container-fluid">
                    <div class="logo">
                        <a class="navbar-brand" href="index.html">Uruz</a>
                    </div>
                    <div class="menu">
                        <ion-icon name="grid-outline"></ion-icon>
                    </div>
                    <ul class="navbar-nav navbarNav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Paginas/About_Us.html">Sobre nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Paginas/Contact_Us.html">Contactanos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Paginas/Eventos.html">Eventos</a>
                        </li>
                        
                    </ul>
                    <form action="Paginas/log-in.html" class="botones">
                        <button class="botoncin btn btn-outline-success">Login</button>
                    </form>
                    <form action="Paginas/sign-in.html">
                        <button class="botoncin btn btn-outline-secondary">Register</button>
                    </form>
                </div>
            </nav>
        </section>

        <section class="buscador-main">
            <div class="header buscador-inicial">
                <div class="container inner-header flex">
                    <div class="row">
                        <div class="col-12">
                            <form action="">
                                <div class="container">
                                    <div class="row buscadorsin">
                                        <div class="search-camp col-lg-4 col-md-4 col-sm-4">
                                            <ion-icon name="location-outline"></ion-icon>
                                            <input type="text" class="form-control form-evento" placeholder="¿Donde quieres tu evento?">
                                        </div>
                                        <div class="search-camp col-lg-3 col-md-3 col-sm-3" id="datepicker">
                                            <ion-icon name="calendar-outline"></ion-icon>
                                            <input type="text" class="form-control form-evento" placeholder="¿Cuando?">
                                        </div>
                                        <div class="search-camp col-lg-3 col-md-3 col-sm-3">
                                            <ion-icon name="person-outline"></ion-icon>
                                            <input type="text" class="form-control form-evento" placeholder="¿Cuantas personas?">
                                        </div>
                                        <div class="search-camp col-lg-2 col-md-2 col-sm-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div>
                    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xnlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                        <defs>
                            <path
                            id="gentle-wave"
                            d="M-180 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
                        </defs>
                        <g class="parallax">
                            <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)"/>
                            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)"/>
                            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)"/>
                            <use xlink:href="#gentle-wave" x="48" y="7" fill="#f4f9fe"/>
                        </g>
                    </svg>
                </div>
            </div>
        </section>
        <!--Seccion General-->
        <section class="portada">
            <h1>Hacemos realidad tus sueños</h1>
            <div class="sliderPortada">
                <ul>
                    <li>
                        <img src="img/bodaPlaya.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Cena.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/DamasHonor.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/newyear.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Casino.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/ted-talk.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/triatlon.jpg" alt="">
                    </li>
                    
                    <!--Repeticion para que sea infinito-->
                    <li>
                        <img src="img/bodaPlaya.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Cena.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/DamasHonor.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/newyear.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/Casino.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/ted-talk.jpg" alt="">
                    </li>
                    <li>
                        <img src="img/triatlon.jpg" alt="">
                    </li>
                </ul>
                
            </div>
        </section>
        <Section class="generalSection">
            <!--Portada de la pagina-->
            <section class="queHacemos">
                
                <div class="container queCosa">
                    <div class="row">
                        
                        <div class="tituloQue">
                            <h2>
                                ¿Qué hacemos?
                            </h2>
                            <p>
                                Tus asistentes están listos para crear y brindarte
                                una experiencia única en la gestión y logística 
                                de tu evento, contamos con colabores expertos en su 
                                área que harán de tu fiesta un inolvidable recuerdo  
                            </p>
                            
                        </div>
                    </div>
                    <div class="row Muestras">
                        
                        <!--Iconos Ejemplos -->
                        <div class="iconosMuestra col-md-5 offset-md-1">
                            <div class="card">
                                <h3>Sociales</h3>
                                <img src="img/Casino.jpg" alt="">
                                <p>
                                    Fiestas completamente personalizadas, 
                                    con las mejores comidas, incluyendo adornos
                                    y recuerdos para que el dia sea completamente
                                    inolvidable. 
                                </p>
                                <button class="butMues">
                                    <a href="Paginas/Eventos.html">Saber más</a>
                                </button>
                            </div>
                        </div>
                        <div class="iconosMuestra col-md-5">
                            <div class="card">
                                <h3>Corporativos</h3>
                                <img src="img/Boda.jpg" alt="">
                                <p>
                                    Creamos experiencias completamente inolvidables
                                    a la par de tus espectativas, tenemos colaboracion
                                    con las mejores pastelerias y salones de eventos de 
                                    Mexico. 
                                </p>
                                <button class="butMues" role="button">
                                    <a href="Paginas/Eventos.html">Saber más</a>
                                </button>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </section>
        </Section>
        <!--Slider para marcas-->
        <section class="seccionSlider">
            <h2>Empresas Vinculadas</h2>
            <div class="slider">
                <div class="galeria">
                    <div class="imagen">
                        <img src="img/Marcas/Amazon.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/DHL.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Ebay.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Facebook.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Zoom.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Forbes.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Google.png" alt="">
                    </div>
        
                    <!--Esta sera la repeticion de las imagenes-->
                    <div class="imagen">
                        <img src="img/Marcas/Amazon.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/DHL.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Ebay.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Facebook.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Zoom.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Forbes.png" alt="">
                    </div>
                    <div class="imagen">
                        <img src="img/Marcas/Google.png" alt="">
                    </div>
                    
                </div>
            </div>
        </section>
        
        <!--Seccion de Que hacemos-->
        <section class="masInfo">
            <div class="container">
                <div class="row filita" >
                    <div class="contamosMas col-sm-8">
                        <h2>Te contamos mas sobre nuestros eventos</h2>
                        <p>
                            Nuestra especialidad siempre sera la flexibilidad, buscamos crear todo lo que se te pueda ocurrir,
                            tenemos conexiones con muchas empresas que podran ayudarte a crear tu evento perfecto.
                        </p>
                        <button class="butMues" role="button">
                            <a href="Paginas/Eventos.html" >Saber más</a>
                        </button>
                    </div>
                    <div class="col-sm-4">
                        <img src="img/newyear.jpg" alt="">
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
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.html">Home</a></li>
                <li class="list-inline-item"><a href="Paginas/About_Us.html">Sobre nosotros</a></li>
                <li class="list-inline-item"><a href="Paginas/Contact_Us.html">Contactanos</a></li>
                <li class="list-inline-item"><a href="Paginas/Eventos.html">Eventos</a></li>
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
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        $(function(){
            $('#datepicker input').datepicker({
            format: "dd-mm-yyyy",
            todayBtn: "linked",
            clearBtn: true,
            language: "es"
            });
        })
    </script>
</body>
</html>