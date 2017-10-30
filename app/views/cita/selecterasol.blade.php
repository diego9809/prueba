<!--<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>secretaria registrar cita</title>

        {{HTML::style('styles/style/bootstrap.min.css')}}
        {{HTML::style('styles/style/menus.css')}}
        {{HTML::style('styles/style/menu.css')}}
        {{HTML::style('styles/style/menus_1.css')}}
        {{HTML::style('styles/style/menus_2.css')}}
        {{HTML::style('styles/style/menus_3.css')}} 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



        <script>
$(function () {
    $("#accordion").accordion();
});
        </script>

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
                                                Secretaria
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
                                        {{HTML::link('cita/cita', 'registrar cita ')}}
                                    </li>
                                    <li>
                                        {{HTML::link('cita/orden', 'registrar orden ')}}
                                    </li>
                                    <li>
                                        {{HTML::link('secretaria/vistacita', 'cancelar cita ')}}
                                    </li>
                                </ul>
                                 /.nav-second-level 
                            </li>

                            <li>
                                <a href="#"><i class="glyphicon glyphicon-book"></i> Agenda <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        {{HTML::link('secretaria/vistahoraria', 'consultar agenda')}}
                                    </li>
                                </ul>
                                 /.nav-second-level 
                            </li>

                            <li>
                                <a href="#"><i class="glyphicon glyphicon-user"></i> Paciente <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        {{HTML::link('paciente/registro', 'registrar paciente')}}
                                    </li>
                                </ul>
                                 /.nav-second-level 
                            </li>

                            <li>
                                <a href="#"><i class="glyphicon glyphicon-envelope"></i> Solicitudes <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        {{HTML::link('paciente/consolitu', 'consultar solicitudes')}}
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
                        <h1 class="page-header">seleccion terapeuta</h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        {{ Form::open(["class"=>"form-horizontal"])}}
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="termino">Ingrese el documento del terapeuta</label>  
                            <div class="col-md-4">

                                <input id="textinput" name="termino" placeholder="Terapeuta" class="form-control input-md" type="text">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton"></label>
                            <div class="col-md-4">
                                <button id="singlebutton" name="singlebutton" type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>

                        </fieldset>
                        {{Form::close()}}


                        <table class="table table-bordered table-hover "  style=" border: 3px solid #757065; background-color:  #cecece ;

                               ">

                            <thead class="" style="background-color: #0084ca; font-size: 18px; color: white;">
                                <tr>
                                    <td style="font-size: 15px">Nombre del terapeuta</td>
                                    <td style="font-size: 15px">Documento</td>
                                    <td style="font-size: 15px">Codigo</td>
                                    <td style="font-size: 15px">Matricula</td>
                                    <td style="font-size: 15px">jornada <br> Hora de  inicio</td>
                                    <td style="font-size: 15px">jornada <br>Hora de fin</td>

                                    <td style="font-size: 15px">Ver</td>



                                </tr>              
                            </thead>
                            <tbody>

                                @foreach($horariocoordinador as $h)

                                <tr>
                                    <td style="background-color: ">
                                        <br>
                                        {{$h->nombre_1}} {{$h->apellido_1}}

                                    </td>
                                    <td style="background-color: ">
                                        <br>
                                        {{$h->documento}}

                                    </td>
                                    <td style="background-color: ">
                                        <br>
                                        {{$h->fisioterapeuta_usuario_idusuario}}

                                    </td> 
                                    <td style="background-color: ">
                                        <br>
                                        {{$h->matricula}}
                                    </td>    
                                    <td style="background-color: ">
                                        <br>
                                        {{$h->hora_de_trabajo_inicio}}
                                    </td>    
                                    <td style="background-color: " >
                                        <br> 
                                        {{$h->hora_de_trabajo_fin}}
                                    </td>


                                    <td style="background-color: ">
                                        <br>

                                        {{HTML::link("cita/verhorariocitasol/$h->fisioterapeuta_usuario_idusuario/$idorden/$id/$idsol","",["class"=>" glyphicon  glyphicon-eye-open"])}}

                                    </td>

                                </tr>
                                @ENDFOREACH
                                {{$horariocoordinador->links()}}
                            </tbody>
                        </table>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-4" align="center">
                                {{HTML::link("cita/ordenesol/$id/$idsol", 'Atras',["class"=>"btn btn-danger"])}}

                            </div>

                        </div>
                    </div>    



                </div>


                {{ HTML::script('js/bootstrap.min.js') }}
                {{ HTML::script('js/menus.js') }}
                {{ HTML::script('js/menus_1.js') }}
                {{ HTML::script('js/scripts.js') }} 
                </body>

                </html>-->




@extends ('login.menu_sec')

@section('contenido')

<div class="row">
    <div class="col-lg-12">
        {{ Form::open(["class"=>"form-horizontal"])}}
        <div class="form-group">
            <label class="col-md-4 control-label" for="termino">Ingrese el documento del terapeuta</label>  
            <div class="col-md-4">

                <input id="textinput" name="termino" placeholder="Terapeuta" class="form-control input-md" type="text">

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>

        </fieldset>
        {{Form::close()}}

        <div class="card">
            <div class="header">
                <h4 class="title">Terapeutas</h4>
                <p class="category">selecione el terapeuta para la cita</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">

                    <thead class="" style="background-color: #0084ca; font-size: 18px; color: white;">
                        <tr>
                            <td style="font-size: 15px">Nombre del terapeuta</td>
                            <td style="font-size: 15px">Documento</td>
                            <td style="font-size: 15px">Codigo</td>
                            <td style="font-size: 15px">Matricula</td>
                            <td style="font-size: 15px">jornada <br> Hora de  inicio</td>
                            <td style="font-size: 15px">jornada <br>Hora de fin</td>

                            <td style="font-size: 15px">Ver</td>



                        </tr>              
                    </thead>
                    <tbody>

                        @foreach($horariocoordinador as $h)

                        <tr>
                            <td style="background-color: ">
                                <br>
                                {{$h->nombre_1}} {{$h->apellido_1}}

                            </td>
                            <td style="background-color: ">
                                <br>
                                {{$h->documento}}

                            </td>
                            <td style="background-color: ">
                                <br>
                                {{$h->fisioterapeuta_usuario_idusuario}}

                            </td> 
                            <td style="background-color: ">
                                <br>
                                {{$h->matricula}}
                            </td>    
                            <td style="background-color: ">
                                <br>
                                {{$h->hora_de_trabajo_inicio}}
                            </td>    
                            <td style="background-color: " >
                                <br> 
                                {{$h->hora_de_trabajo_fin}}
                            </td>


                            <td style="background-color: ">
                                <br>

                                {{HTML::link("cita/verhorariocitasol/$h->fisioterapeuta_usuario_idusuario/$idorden/$id/$idsol","",["class"=>" glyphicon  glyphicon-eye-open"])}}

                            </td>

                        </tr>
                        @ENDFOREACH
                        {{$horariocoordinador->links()}}
                    </tbody>
                </table>

                <div class="form-group">

                    <label class="col-md-4 control-label" for=""></label>
                    <div class="col-md-4" align="center">
                        <br>
                        <br>
                        {{HTML::link("cita/ordenesol/$id/$idsol", 'Atras',["class"=>"btn btn-danger"])}}

                    </div>

                </div>
            </div>    
        </div>    
</div>
</div>

        @stop