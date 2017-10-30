<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>kinapsis </title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        {{HTML::style('styles/style/animate.min.css')}}
        {{HTML::style('styles/style/bootstrap.min.css')}}
        {{HTML::style('styles/style/paginate.css')}}
        {{HTML::style('styles/style/paper-dashboard.css')}}
        {{HTML::style('styles/style/interfaz.css')}}
        {{HTML::style('styles/style/interfaz_1.css')}}
        {{HTML::style('styles/style/datepicker.css')}}
        {{HTML::style('styles/style/menu.css')}}

        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
              <link rel="stylesheet" href="/resources/demos/style.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
$(document).ready(function () {
    //hago la peticion AJX a pais/paises
    //$.getajax


    $(".fecha").datepicker({
        "dateFormat": "yy-mm-dd",
        minDate: 0
    }).datepicker("setDate", new Date());

    $(".fechas").datepicker({
        "dateFormat": "yy-mm-dd",
        minDate: 3
    }).datepicker("setDate", new Date());

});
        </script>



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
                        <img style="width: 98%" {{HTML::image('img/kinapsis.png')}}
                             
                    </div>

                    <ul class="nav" id="side-menu">

                        <li class="active ti-home" style=" font-size: 24px; margin-left:26px; color:#0084ca; ">

                            {{HTML::link('sessiones/insert','inicio',["style"=>"margin-top: -39px; margin-left:18px; font-size: 19px; color:#0084ca;" ])}}

                        </li>
                        <li>
                            <a href="#"><i class="ti-agenda "></i> Citas <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{HTML::link('paciente/cita','ver citas')}}
                                </li>
                                <li>
                                    {{HTML::link('paciente/citacancelar','cancelar citas')}}
                                </li>
                            </ul>

                        </li>
                        <li>
                            <a href="#"><i class="ti-email"></i> Solicitud <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    {{HTML::link('paciente/solicitud', ' ingresar solicitud ')}}
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

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <p class="notification">{{$numero}}</p>

                                        <b class="ti-bell"></b>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($lleno as $p)
                                        @if($p->estado == 2)
                                        <li>{{HTML::link('sessiones/insert',"la solicitud $p->asunto ha sido rechazada")}}</li>
                                        
                                        @else
                                        <li>{{HTML::link('sessiones/insert',"la solicitud $p->asunto ha sido agendada")}}</li>
                                        @endif
                                        @ENDFOREACH
                                    </ul>
                                </li>

                                <li>
                                    @if($usuario->imagen_perfil == null )
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="user-img" width="36" class="img-circle" {{HTML::image('img/images.jpg')}}</a>
                                    @elseif($usuario->imagen_perfil != null )
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img alt="user-img" width="36" class="img-circle" {{HTML::image('img/perfil/'.$usuario->imagen_perfil)}}</a>
                                    @endif


                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="navbar-content">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        @if($usuario->imagen_perfil == null )
                                                        <img id="profile-img" class="profile-img-card img-responsive" {{HTML::image('img/images.jpg')}}
                                                             @elseif($usuario->imagen_perfil != null )
                                                             <img id="profile-img" class="profile-img-card img-responsive" {{HTML::image('img/perfil/'.$usuario->imagen_perfil)}}
                                                             @endif

                                                             <p class="text-center small">
                                                        </p>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <span>{{$usuario->nombre_1}}  {{$usuario->apellido_1}}</span>
                                                        <p class="text-muted small" style="color: #0084ca;">
                                                            {{$usuario->correo}}</p>
                                                        <div class="divider">

                                                        </div>

                                                        <p class="text-muted small" style="color: #f8b133;">
                                                            paciente
                                                        </p>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        <li class="divider"></li>
                                        
                                            <div class="navbar-login navbar-login-session">
                                                <div class="row" style="margin-right: -6px;">
                                                    <div class="col-lg-7">
                                                        
                                                            {{HTML::link('login/logout', 'Cambiar contraseña',["class"=>"btn btn-info btn-block","on-leave"=>"cerrar","on-hover"=>"cerrar_icon"])}}
                                                        
                                                    </div>
                                                    <div class="col-lg-5">
                                                        
                                                            {{HTML::link('login/logout', 'Cerrar',["class"=>"btn btn-danger btn-block"])}}
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        
                                </li>
                            </ul>
                            </li>
                            </ul>

                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">

                        @yield('contenido')


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

    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/menus.js') }}
    {{ HTML::script('js/menus_1.js') }} 
    {{ HTML::script('js/scripts.js') }} 

</html>

