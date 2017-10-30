<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Paper Dashboard by Creative Tim</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        {{HTML::style('styles/style/animate.min.css')}}
        {{HTML::style('styles/style/bootstrap.min.css')}}
        {{HTML::style('styles/style/paper-dashboard.css')}}
        {{HTML::style('styles/style/interfaz.css')}}
        {{HTML::style('styles/style/interfaz_1.css')}}


        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/themify-icons.css" rel="stylesheet">

    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-background-color="white" data-active-color="danger">

                <!--
                            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
                            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <img style="width: 100%" {{HTML::image('img/kinapsis.png')}}
                    </div>

                    <ul class="nav" id="side-menu">

                        <li class="active">

                            <a href="dashboard.html">
                                <i class="ti-home"></i>
                                <p>Inicio</p>
                            </a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-agenda "></i> Citas <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="login/login">
                                        <i class="ti-eye"></i>
                                        <p>Ver</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="login/login">
                                        <i class="ti-pencil-alt "></i>
                                        <p>Cancelar</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li>
                            <a href="#"><i class="ti-email"></i> Solicitud <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="login/login">
                                        <i class="ti-marker-alt"></i>
                                        <p>Ingresar</p>
                                    </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar bar1"></span>
                                <span class="icon-bar bar2"></span>
                                <span class="icon-bar bar3"></span>
                            </button>
                            <a class="navbar-brand" href="#">SISTEMA DE AGENDAMIENTO DE CITAS</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="ti-panel"></i>
                                        <p>Stats</p>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <p class="notification">5</p>
                                        <p>Notificaciones</p>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Notification 1</a></li>
                                        <li><a href="#">Notification 2</a></li>
                                        <li><a href="#">Notification 3</a></li>
                                        <li><a href="#">Notification 4</a></li>
                                        <li><a href="#">Another notification</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-settings"></i>
                                        <p>configuracion</p>
                                    </a>
                                </li>
                            </ul>
                                                    <ul class="dropdown-menu ">
                            <li>
                                <div class="navbar-content">
                                    <div class="row">
                                        <div class="col-md-5">


                                            <img id="profile-img" class="profile-img-card img-responsive" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                                            <p class="text-center small">
                                            </p>
                                        </div>
                                        <div class="col-md-7">
                                            <span></span>
                                            <p class="text-muted small">
                                            </p>
                                            <div class="divider">

                                            </div>

                                            <p class="text-muted small">
                                                paciente
                                            </p>



                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-footer">
                                    <div class="navbar-footer-content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="#" class="btn btn-default btn-sm">Cambiar Contraseña</a>
                                            </div>
                                            <div class="col-md-6">

                                                {{HTML::link('login/logout', 'Cerrar Seccion',["class"=>"btn btn-default btn-sm pull-right"])}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-md-8">
                                <div class="card">

                                    <div class="content">
                                        <div class="carousel slide" id="carousel-504902">
                                            <ol class="carousel-indicators">
                                                <li data-slide-to="0" data-target="#carousel-504902">
                                                </li>
                                                <li data-slide-to="1" data-target="#carousel-504902">
                                                </li>
                                                <li data-slide-to="2" data-target="#carousel-504902" class="active">
                                                </li>
                                            </ol>
                                            <div class="carousel-inner">
                                                <div class="item" align="center">
                                                    <img alt="Carousel Bootstrap First" {{HTML::image('img/foto1.jpg')}}
                                                     <div class="carousel-caption" style="background-color: rgba(185, 228, 230, 0.58); right: 0%; left: 0%;">
                                                        <h4>
                                                            Atencion Primaria
                                                        </h4>
                                                        <p style="color: #f1f3f5;" >
                                                            La atención primaria de salud es la asistencia sanitaria esencial accesible a todos los individuos y familias de la comunidad a través de medios aceptables
                                                        </p>
                                                    </div>
                                            </div>
                                                <div class="item" align="center">
                                                    <img alt="Carousel Bootstrap Second"  {{HTML::image('img/foto4.jpg')}}
                                                         <div class="carousel-caption" style="background-color: rgba(185, 228, 230, 0.58); right: 0%; left: 0%;">
                                                        <h4>
                                                            Factor De Riesgo
                                                        </h4>
                                                        <p style="color: #f1f3f5;">
                                                            circunstancia o situación que aumenta las probabilidades de una persona de contraer una enfermedad o cualquier otro problema de salud.
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="item active" align="center">
                                                    <img alt="Carousel Bootstrap Third" {{HTML::image('img/foto3.jpg')}}
                                                         <div class="carousel-caption" style="background-color: rgba(185, 228, 230, 0.58); right: 0%; left: 0%;">
                                                        <h4>
                                                            Gestion
                                                        </h4>
                                                        <p style="color:#f1f3f5;">
                                                            La preocupación por la disposición de los recursos y estructuras necesarias para que tenga lugar en el centro de terapias de la universidad nacional
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> <a class="left carousel-control" href="#carousel-504902" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-504902" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-warning text-center">
                                                    <img alt="Bootstrap Thumbnail First" style="width: 90%" {{HTML::image('img/img1.jpg')}}
                                                </div>
                                            </div>
                                            <div class="col-xs-12">

                                                <h4>Mision De La Universidad Nacional</h4>
                                                <br>
                                                <p style="text-align: justify;">Como Universidad de la nacion fomenta el acceso con equidad al sistema educativo colombiano, provee la mayor oferta de programas academicos</p>

                                            </div>
                                        </div>
                                        <div class="footer">
                                            <hr />
                                            <div class="stats">
                                                <a class="btn btn-primary" href="#">leer mas</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-warning text-center">
                                                    <img alt="Bootstrap Thumbnail First" style="width: 90%" {{HTML::image('img/img1.jpg')}}
                                                </div>
                                            </div>
                                            <div class="col-xs-12">

                                                <h4>Mision De La Universidad Nacional</h4>
                                                <br>
                                                <p style="text-align: justify;">Como Universidad de la nacion fomenta el acceso con equidad al sistema educativo colombiano, provee la mayor oferta de programas academicos</p>

                                            </div>
                                        </div>
                                        <div class="footer">
                                            <hr />
                                            <div class="stats">
                                                <a class="btn btn-primary" href="#">leer mas</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-warning text-center">
                                                    <img alt="Bootstrap Thumbnail First" style="width: 90%"  {{HTML::image('img/img1.jpg')}}
                                                </div>
                                            </div>
                                            <div class="col-xs-12">

                                                <h4>Mision De La Universidad Nacional</h4>
                                                <br>
                                                <p style="text-align: justify;">Como Universidad de la nacion fomenta el acceso con equidad al sistema educativo colombiano, provee la mayor oferta de programas academicos</p>

                                            </div>
                                        </div>
                                        <div class="footer">
                                            <hr />
                                            <div class="stats">
                                                <a class="btn btn-primary" href="#">leer mas</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-warning text-center">
                                                    <img alt="Bootstrap Thumbnail First" style="width: 90%" {{HTML::image('img/img3.jpg')}}
                                                </div>
                                            </div>
                                            <div class="col-xs-12">

                                                <h4>Centro Medico Universidad Nacional</h4>
                                                <br>
                                                <p style="text-align: justify;">Promueve el mejoramiento permanente de las condiciones físicas, psíquicas, mentales, sociales y ambientales en las que se desarrolla la vida universitaria,</p>

                                            </div>
                                        </div>
                                        <div class="footer">
                                            <hr />
                                            <div class="stats">
                                                <a class="btn btn-primary" href="#">leer mas</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="icon-big icon-warning text-center">
                                                    <img alt="Bootstrap Thumbnail First" style="width: 90%" {{HTML::image('img/img2.jpg')}}
                                                </div>
                                            </div>
                                            <div class="col-xs-12">

                                                <h4>Vision De La Universidad Nacional</h4>
                                                <br>
                                                <p style="text-align: justify;">La Universidad Nacional de Colombia, de acuerdo con su misión, definida en el Decreto Extraordinario 1210 de 1993, debe </p>

                                            </div>
                                        </div>
                                        <div class="footer">
                                            <hr />
                                            <div class="stats">
                                                <a class="btn btn-primary" href="#">leer mas</a> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>

                                <li>
                                    <a href="http://www.creative-tim.com">
                                        Creative Tim
                                    </a>
                                </li>
                                <li>
                                    <a href="http://blog.creative-tim.com">
                                        Blog
                                    </a>
                                </li>
                                <li>
                                    <a href="http://www.creative-tim.com/license">
                                        Licenses
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright pull-right">
                            &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                        </div>
                    </div>
                </footer>

            </div>
        </div>


    </body>

    <!--   Core JS Files   -->
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/menus.js') }}
    {{ HTML::script('js/menus_1.js') }} 

</html>
