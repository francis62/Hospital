<!--
    admin
kroko99
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" sizes="32x32" href="resources/images/1.png">
        <link rel="stylesheet" href="resources/css/index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://kit.fontawesome.com/36defbaad1.js" crossorigin="anonymous"></script>
        <title>Medical History</title>
    </head>
    <body id="inicio">
        <!--NAVBAR-->
        <nav>
            <div class="navbar navbar-expand">
                <div class="container-xxl navbarChanges">
                    <a class="navbar-brand" href="#">
                        <img class="img-fluid logo" src="resources/images/3.png" alt="" >
                    </a>
    
                    <ul class="navbar-nav ps-sm-4">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#inicio">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#beneficios">Beneficios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">FAQ</a>
                        </li>  
                    </ul>
                </div>
    
                <div class="navbarButtons me-sm-5 ms-sm-5">
                    <ul class="navbar-nav mr-auto">
                        <a href="medicalRols/user/registration.php"><button type="button" class="btn btn-primary btn-sm ps-3 pe-3 me-sm-2 buttonsNav">Crear cuenta</button></a>
                        <a href="login.php"><button type="button" class="btn btn-primary btn-sm ps-3 pe-3 ms-sm-2 buttonsNav">Iniciar sesion</button></a>
                    </ul>
                </div>
            </div>
        </nav>

        <!--FIRST PRESENTATION - TWO COLUMNS-->
        <div class="container-fluid pt-5 firstPresentation">
            <div class="row justify-content-around pb-5 pt-5">
                <div class="col-md-5 order-2 order-sm-first align-self-center text-center text-sm-start pt-4">
                    <h1 class="firstPresentationText"> 
                        Tus registros médicos <br>siempre presentes
                    </h1>

                    <p class="fs-6 text-muted">
                        Lleva contigo todas tus historias clínicas y <br> nunca las pierdas de vista.
                    </p>

                    <a href="medicalRols/user/registration.php"><button type="button" class="btn btn-primary btn-sm ps-5 pe-5">Crear cuenta</button></a>
                </div>
                <div class="col-md-4 order-1 order-sm-last align-self-center text-center text-sm-start pt-4">
                    <img src="resources/images/Azul Moderno Gradiente Médico Logotipo de Salud.png" class="img-fluid firstPresentationImage" alt="">
                </div>
            </div>
        </div>

        <!--FIVES ICON DIV SEPARATOR-->
        <div class="container-fluid align-self-center text-center pt-sm-5 pb-sm-5 mt-5 thirdPresentation">
            <img src="resources/images/diente.png" class="thirdPresentationIcon" alt="">
            <img src="resources/images/cerebro.png" class="thirdPresentationIcon margin cerebro" alt="">
            <img src="resources/images/ostetoscopio.png" class="thirdPresentationIcon margin" alt="">
            <img src="resources/images/pulmon.png" class="thirdPresentationIcon margin pulmon" alt="">
            <img src="resources/images/hueso.png" class="thirdPresentationIcon" alt="">
        </div>

        <!--SECOND PRESENTATION - ONE COLUMN - TWO COLUMNS-->
        <div class="container-fluid pt-sm-5 fourthPresentation">
            <div class="align-self-center text-center pt-sm-5">
                <h1> 
                    Todo en una misma plataforma, <br>simple y cómodo.
                </h1>
            </div>

            <div class="row justify-content-around pt-sm-5 fourthPresentationColumns">
                <div class="col-md-5 order-2 order-sm-first align-self-center text-center text-sm-start pt-sm-5">
                    <h2>
                       Observa toda tu información en <br> cualquier dispositivo. 
                    </h2>

                    <p class="fs-6 text-muted">
                        Añade, elimina y edita tu informacion
                        en cualquier <br> momento y en todos los dispositivos.
                        <br><br>
                        Puedes crear un equipo médico y
                        visualizar las historias clínicas <br> que
                        que compartes con tus colegas.
                    </p>
                </div>
                <div class="col-md-4 order-1 order-sm-last align-self-center text-center text-sm-start pt-sm-5 pb-sm-5">
                    <img src="resources/images/fourthPresentation.png" class="img-fluid fourthPresentationImage pb-sm-5" alt="">
                </div>
            </div>
        </div>
        <!--THIRD PRESENTATION - ONE COLUMN - THREE COLUMNS -->
        <div class="container-fluid pt-sm-5 fifthPresentation" id="beneficios">
            <div class="align-self-center text-center pt-sm-5">
                <h1> 
                    <!--JUNTO A OTROS PROFESIONALES-->
                    <!--JUNTO A TUS COMPAÑEROS-->
                    Una solución flexible para el trabajo en <br> equipo con tus compañeros.
                </h1>
            </div>

            <div class="row justify-content-evenly pt-sm-5 fifthPresentationColumns">
                <div class="col-md-3 order-3 order-sm-0 text-center text-sm-start pt-sm-5 pb-sm-5">
                    <div class="card" style="width: 22rem;">
                        <div class="card-body"> 
                            <h5 class="card-title mb-4">
                                <div class="float mb-4">
                                    <i class="fa-solid fa-clipboard"></i>
                                </div>
                                Anota tu información de la <br> manera que tu quieras.
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Puedes decidir como anotar la información de tus pacientes, 
                                ya sea un archivo externo o con nuestro propio bloc de notas integrado.
                                <br> 
                                <br>
                                También puedes añadir imágenes de las recetas, radiografías y todo lo que necesites.                          
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 order-sm-1 text-center text-sm-start pt-sm-5 pb-sm-5">
                    <div class="card" style="width: 22rem;">
                        <div class="card-body">
                            <h5 class="card-title mb-4">
                                <div class="float mb-4">
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                Facilidad de manejo y <br> flexibilidad.
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Nuestra plataforma es tan simple que provee sencillez a la hora
                                de aprender a utilizarla.
                                <br> 
                                <br>
                                Tenemos un sector de preguntas frecuentes para terminar de resolver tus dudas.
                            </h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-2 order-sm-2 text-center text-sm-start pt-sm-5 pb-sm-5">
                    <div class="card" style="width: 22rem;">
                        <div class="card-body">
                            <h5 class="card-title mb-4">
                                <div class="float mb-4">
                                    <i class="fa-solid fa-face-grin"></i>
                                </div>
                                Tus pacientes podrán <br> observar su historial.
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Van a tener la oportunidad de visualizar todas sus recetas, diagnósticos y lo que 
                                usted quiera que lean.
                                <br> 
                                <br>
                                Siempre con seguridad van a poder observar pero nunca hacer cambios sobre la información.
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SUBSCRIPTIONS BUTTON DIV -->
        <div class="container-fluid align-self-center text-center pt-5 pb-5 mt-5 mb-5">
            <button type="button" class="btn btn-primary btn-lg ps-5 pe-5 mt-5 mb-5">Consultar suscripciones</button>
        </div>

        <!-- FOOTER - FOUR COLUMNS -->
        <div class="container-fluid pt-3 pb-3 mt-3 mb-3 footer" style="background-color: #edf0f4;" id="contacto">
            <div class="row justify-content-center pt-5">
                <div class="col-md-3 order-1 order-sm-0 align-self-center text-center text-sm-center pt-sm-2 pb-sm-2">
                    <img src="resources/images/1.png" class="img-fluid footerLogo" alt="">
                </div>

                <div class="col-md-3 order-0 order-sm-1 align-self-center text-center text-sm-start pt-sm-2 pb-sm-2">
                    <a href="#contacto"><h5 class="card-title text-muted footerLinks">CONTACTO</h5></a>
                    <a href="#beneficios"><h5 class="card-title text-muted footerLinks">BENEFICIOS</h5></a>
                    <a class="disabled" href="#"><h5 class="card-title text-muted footerLinks">PREGUNTAS FRECUENTES</h5></a>
                </div>

                <div class="col-md-3 order-2 order-sm-2 align-self-center text-center text-sm-start pt-sm-2 pb-sm-2">
                    <a href="login.php"><button type="button" class="btn btn-primary btn-sm ps-4 pe-4 ms-sm-3">Iniciar sesión</button></a>
                    <a href="medicalRols/user/registration.php"><button type="button" class="btn btn-primary btn-sm ps-4 pe-4 ms-sm-3">Crear cuenta</button></a>
                </div>

                <div class="col-md-3 order-3 order-sm-3 align-self-center text-center text-sm-start pt-sm-2 pb-sm-2">
                    <div class="mb-2 footerIcons">
                        <a href="#" class="pe-1"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#" class="ps-1 pe-1"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="ps-1"><i class="fa-brands fa-facebook-square"></i></a>
                    </div>

                    <h6 class="card-subtitle text-muted">
                        <i class="fa-solid fa-copyright"></i> 2022 - MediHistory.com
                        <br>
                        Términos de servicio - Política de privacidad
                    </h6>
                </div>
            </div>
        </div>
    </body>
</html>