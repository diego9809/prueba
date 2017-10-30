<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bootstrap 3, from LayoutIt!</title>

        <meta name="description" content="Source code generated using layoutit.com">
        <meta name="author" content="LayoutIt!">

        {{HTML::style('styles/style/style.css')}}   
        {{HTML::style('styles/style/menu.css')}}  
        {{HTML::style('styles/style/bootstrap.min.css')}} 

        <!--    <link href="styles/style/bootstrap.min.css" rel="stylesheet">
            <link href="styles/style/style.css" rel="stylesheet">-->

    </head>
    <body>

        <div class="container-fluid">
            <div  class="row" >

                <div class="col-md-4" >
                    <img style=" height: 50%; width:60% " {{HTML::image('img/kinapsis.png')}} 
                </div>
                <div class="col-md-7">
                </div>
                <div class="col-md-1">
                </div>
            </div>
            <div class="row">

                <div class="col-md-12" >
                    <nav class="navbar navbar-default" role="navigation" style="background-color: #0E509A">
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                            </button> {{HTML::link('sessiones/insert', 'inicio',["id"=>"texto","class"=>"navbar-brand"])}}
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="">

                                    {{HTML::link('secretaria/vistacita', 'cancelar cita ',["id"=>"texto"])}}
                                </li>
                                <li>

                                    {{HTML::link('cita/insert', 'registrar cita ',["id"=>"texto"])}}
                                </li>
                                <li class="">


                                    {{HTML::link('secretaria/vistahoraria', 'consultar agenda',["id"=>"texto"])}}
                                </li>
                                <li>
                                    {{HTML::link('paciente/registro', 'registrar paciente',["id"=>"texto"])}}

                                </li>
                                <li class="">
                                    {{HTML::link('paciente/consolitu', 'consultar solicitudes',["id"=>"texto"])}}
                                </li>



                            </ul>

                            <ul class="nav navbar-nav navbar-right" >

                                <li>
                                    <a id="textos" >{{Session::get('usuario')}}</a>

                                </li>
                                <li>

                                <li class="dropdown"><a id="textos" class="dropdown-toggle glyphicon glyphicon-user " data-toggle="dropdown">
                                    </a>
                                    <ul class="dropdown-menu">
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
                                                            secretaria
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
                                </li>


                            </ul>
                        </div>

                    </nav>
                </div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="col-md-2" style="white-space: 50%;">
                                <nav class="navbar navbar-default sidebar" role="navigation" id="textoc">


                                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1" >
                                        <ul class="nav navbar-nav" style="height: 600px;">
                                            <li> {{HTML::link('cita/cita', 'Registrar cita',["id"=>"textoc"])}}</li>
                                            <li>  {{HTML::link('cita/orden', 'Registrar orden',["id"=>"textoc"])}}</li>        

                                        </ul>
                                    </div>

                                </nav>
                            </div>
                            <div class="col-md-8">
                                
                            </div>
                            <div class="col-md-2">
                               
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                </div>
                <div class="col-md-2">
                </div>
            </div>


        </div>
    </div>
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/scripts.js') }} 
</body>
</html>


