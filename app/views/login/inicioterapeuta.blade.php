<!--<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>inicio terapeuta</title>

        {{HTML::style('styles/style/bootstrap.min.css')}}
        {{HTML::style('styles/style/menus.css')}}
        {{HTML::style('styles/style/menu.css')}}
        {{HTML::style('styles/style/menus_1.css')}}
        {{HTML::style('styles/style/menus_2.css')}}
        {{HTML::style('styles/style/menus_3.css')}} 
         Bootstrap Core CSS 





         HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries 
         WARNING: Respond.js doesn't work if you view the page via file:// 
        [if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]

    </head>

    <body>

        <div id="wrapper">

             Navigation 
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <img style=" height: 50px; width:60% " {{HTML::image('img/kinapsis.png')}} 

                </div>
                 /.navbar-header 
                
                    
               
                        

               
                <ul class="nav navbar-top-links navbar-right">


                    
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="glyphicon glyphicon-user"></i> 
                        </a>
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
                                            <span>{{$usuario->nombre_1}}  {{$usuario->apellido_1}}</span>
                                            <p class="text-muted small">
                                                {{$usuario->correo}}</p>
                                            <div class="divider">

                                            </div>

                                            <p class="text-muted small">
                                                Terapeuta
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
                         /.dropdown-user 
                    </li>
                     /.dropdown 
                </ul>
                 /.navbar-top-links 

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">
                                            <i class="glyphicon glyphicon-search"></i>
                                        </button>
                                    </span>
                                </div>
                                 /input-group 
                            </li>
                            <li>
                                {{HTML::link('sessiones/insert', ' inicio ')}}
                            </li>
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-list-alt"></i> Citas <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                          {{HTML::link('terapeuta/cancita', 'cancelar cita')}}
                                    </li>
                                    <li>
                                          {{HTML::link('terapeuta/concita', 'ver citas')}}
                                    </li>
                                </ul>
                                
                            </li>
                            
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-book"></i> Agenda <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                         {{HTML::link('terapeuta/horarios', 'crear agenda')}}
                                    </li>
                                    <li>
                                    {{HTML::link('terapeuta/modificarhorario', 'modificar  agenda')}}
                                    </li>
                                    <li>
                                    {{HTML::link('terapeuta/horariosvista', 'consultar agenda')}}
                                    </li>
                                </ul>
                                 /.nav-second-level 
                            </li>
                         
                        </ul>
                    </div>
                    
                </div>
                 /.navbar-static-side 
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Inicio</h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-10">



                        <div class="carousel slide" id="carousel-504902" style="margin-left: 60px;">
                                <ol class="carousel-indicators">
                                        <li data-slide-to="0" data-target="#carousel-504902">
                                        </li>
                                        <li data-slide-to="1" data-target="#carousel-504902">
                                        </li>
                                        <li data-slide-to="2" data-target="#carousel-504902" class="active">
                                        </li>
                                </ol>
                                <div class="carousel-inner">
                                        <div class="item" >
                                                <img alt="Carousel Bootstrap First" {{HTML::image('img/foto1.jpg')}}
                                                <div class="carousel-caption">
                                                    <h4>
                                                                Atencion Primaria
                                                        </h4>
                                                    <p style="color: #0084ca;" >
                                                                La atención primaria de salud es la asistencia sanitaria esencial accesible a todos los individuos y familias de la comunidad a través de medios aceptables
                                                        </p>
                                                </div>
                                        </div>
                                        <div class="item">
                                            <img alt="Carousel Bootstrap Second"  {{HTML::image('img/foto4.jpg')}}
                                                <div class="carousel-caption">
                                                        <h4>
                                                                Factor De Riesgo
                                                        </h4>
                                                        <p style="color: #0084ca;">
                                                                circunstancia o situación que aumenta las probabilidades de una persona de contraer una enfermedad o cualquier otro problema de salud.
                                                        </p>
                                                </div>
                                        </div>
                                        <div class="item active">
                                                <img alt="Carousel Bootstrap Third" {{HTML::image('img/foto3.jpg')}}
                                                <div class="carousel-caption">
                                                        <h4>
                                                                Gestion
                                                        </h4>
                                                        <p style="color: #0084ca;">
                                                                La preocupación por la disposición de los recursos y estructuras necesarias para que tenga lugar
                                                        </p>
                                                </div>
                                        </div>
                                </div> <a class="left carousel-control" href="#carousel-504902" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-504902" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                </div>
            <div class="col-md-2">
                </div>
        </div>
        <br>
        <br>
        <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                        <div class="row">
                                <div class="col-md-4">
                                        <div class="thumbnail">
                                                <img alt="Bootstrap Thumbnail First"  {{HTML::image('img/img1.jpg')}}
                                                <div class="caption">
                                                        <h3>
                                                                Mision De La Universidad Nacional
                                                                
                                                        </h3>
                                                        <p>
                                                                Como Universidad de la nacion fomenta el acceso con equidad al sistema educativo colombiano, provee la mayor oferta de programas academicos
                                                        </p>
                                                        <p>
                                                                <a class="btn btn-primary" href="#">leer mas</a> 
                                                        </p>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="thumbnail">
                                                <img alt="Bootstrap Thumbnail Second"  {{HTML::image('img/img2.jpg')}}
                                                <div class="caption">
                                                        <h3>
                                                                Vision De La Universidad Nacional
                                                        </h3>
                                                        <p>
                                                                La Universidad Nacional de Colombia, de acuerdo con su misión, definida en el Decreto Extraordinario 1210 de 1993, debe 
                                                        </p>
                                                        <p>
                                                                <a class="btn btn-primary" href="#">leer mas</a> 
                                                        </p>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <div class="thumbnail">
                                                <img alt="Bootstrap Thumbnail Third"  {{HTML::image('img/img3.jpg')}}
                                                <div class="caption">
                                                        <h3>
                                                                Centro Medico Universidad Nacional 
                                                        </h3>
                                                        <p>
                                                                Promueve el mejoramiento permanente de las condiciones físicas, psíquicas, mentales, sociales y ambientales en las que se desarrolla la vida universitaria,
                                                        </p>
                                                        <p>
                                                                <a class="btn btn-primary" href="#">leer mas</a> 
                                                        </p>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-md-3">
                </div>
        </div>




            </div>
             /.panel 


            {{ HTML::script('js/jquery.min.js') }}
            {{ HTML::script('js/bootstrap.min.js') }}
            {{ HTML::script('js/menus.js') }}
            {{ HTML::script('js/menus_1.js') }}
            {{ HTML::script('js/scripts.js') }} 
    </body>

</html>
-->
@extends ('login.menu_ter')

@section('contenido')
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
             <div class="col-md-4">            
                <div class="card card-user">
                    <div class="image">
                         @if($usuario->imagen_fondo == null )
                             {{HTML::image('img/fondo_0.png')}}
                         @elseif($usuario->imagen_fondo != null )
                             {{HTML::image('img/perfil/'.$usuario->imagen_fondo)}}
                             @endif
                    </div>
                    <div class="content">
                        <div class="author">
                             @if($usuario->imagen_perfil == null )
                                 <img class="avatar border-white" {{HTML::image('img/images.jpg')}}
                             @elseif($usuario->imagen_perfil != null )
                                 <img class="avatar border-white" {{HTML::image('img/perfil/'.$usuario->imagen_perfil)}}
                                 @endif
                                 <h4 class="title">{{$usuario->nombre_1}}  {{$usuario->apellido_1}}<br />
                                <a href="#"><small>{{$usuario->correo}}</small></a>
                            </h4>
                        </div>
                        <p class="description text-center">
                            Rol:  Terapeuta<br>
                            Usuario: {{$usuario->username}} <br>

                        </p>

                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-2">


                            </div>
                            <div class="col-md-8">
                                <br>
                                {{HTML::link("login/perfil/$usuario->idusuario/2", 'Editar perfil',["class"=>"btn btn-info"])}}

                            </div>
                            <div class="col-md-2">


                            </div>
                        </div>
                    </div>
                    <br>
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
    @stop
