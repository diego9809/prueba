<!--<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Paciente registrar solicitud</title>

        {{HTML::style('styles/style/bootstrap.min.css')}}
        {{HTML::style('styles/style/menus.css')}}
        {{HTML::style('styles/style/menu.css')}}
        {{HTML::style('styles/style/menus_1.css')}}
        {{HTML::style('styles/style/menus_2.css')}}
        {{HTML::style('styles/style/menus_3.css')}} 
        {{HTML::style('styles/style/datepicker.css')}} 
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
                                        {{HTML::link('paciente/cita','ver citas')}}
                                    </li>
                                    <li>
                                        {{HTML::link('paciente/citacancelar','cancelar citas')}}
                                    </li>
                                </ul>
                                 /.nav-second-level 
                            </li>
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-envelope"></i> Solicitud <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                                <ul class="nav nav-second-level">
                                  <li>
                                {{HTML::link('paciente/solicitud', ' ingresar solicitud ')}}
                                  </li>
                                </ul>
                                 /.nav-second-level 
                            </li>

                        </ul>
                    </div>
                     /.sidebar-collapse 
                </div>
                 /.navbar-static-side 
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Registrar solicitud</h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-10">
{{ Form::open(['class'=>'form-horizontal'])}}
                            <fieldset>


                         






                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="EPS">asunto</label>  
                                    <div class="col-md-4">
                                        {{Form::text('asunto',
                  Input::old('asunto'), 
                  [' placeholder'=>"ingrese la solicitud ",
                    'class'=>"form-control input-md"
                   ])
                                        }}


                                    </div>
                                    <strong class="alert-danger" align="center">{{$errors->first('asunto')}}</strong>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="EPS">descripcion</label>  
                                    <div class="col-md-4">
                                        {{Form::textarea('descripcion',
                  Input::old('descripcion'), 
                  [' placeholder'=>"ingrese la descripsion ",
                    'class'=>"form-control input-md"
                   ])
                                        }}

                                    </div>
                                    <strong class="alert-danger" align="center">{{$errors->first('descripcion')}}</strong>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fecha_cita">fecha de cita</label>  
                                    <div class="col-md-4">
                                        {{Form::text('fecha_cita',
                  Input::old('fecha_cita'), 
                  [
                    'class'=>"form-control input-md , fechas"
                    
                   ])
                                        }}

                                    </div>
                                    <strong class="alert-danger" align="center">{{$errors->first('fecha_cita')}}</strong>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="idpaciente"></label>
                                    <div class="col-md-4">

                                        {{ Form::hidden('idpaciente', Session::get('id')) }}

                                    </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-md-4">
                                        {{Form::hidden('fecha_solicitud',
                  Input::old('fecha_solicitud'), 
                  [
                    'class'=>"form-control input-md , fecha"
                    
                   ])
                                        }}

                                    </div>
                                </div>





                                <div class="form-group">

                                    <label class="col-md-4 control-label" for=""></label>
                                    <div class="col-md-4" align="center">
                                        <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                                        <br>
                                        <br>


                                        {{HTML::link('sessiones/insert', 'Atras',["class"=>"btn btn-danger"])}}
                                        {{Form::submit('Registrar',[
                    'class'=>"btn btn-primary"
                   ]) }}

                                    </div>
                                </div>

<input type="text" name="fecha" id="fecha"></input>   

                            </fieldset>

                            {{ Form::close()  }}                                            

            </div>
             /.panel 



            {{ HTML::script('js/bootstrap.min.js') }}
            {{ HTML::script('js/menus.js') }}
            {{ HTML::script('js/menus_1.js') }} 
    </body>

</html>
-->
@extends ('login.menu')

@section('contenido')

<div class="row">
    
    <div class="card" style="">
    <div class="col-lg-12">
        <h2 class="page-header">Solicitar cita</h2>
    </div>
    <div class="row">
    <div class="col-lg-12">
        
        
        {{ Form::open(['class'=>'form-horizontal'])}}
        <fieldset>
            
            <div class="form-group">
                <label class="col-md-4 control-label" for="EPS">Asunto</label>  
                <div class="col-md-4">
                    {{Form::text('asunto',
                  Input::old('asunto'), 
                  [' placeholder'=>"Ingrese la solicitud ",
                    'class'=>"form-control  border-input"
                   ])
                    }}


                </div>
                <strong class="alert-danger" align="center">{{$errors->first('asunto')}}</strong>
            </div>

            
            <div class="form-group">
                <label class="col-md-4 control-label" for="EPS">Descripcion</label>  
                <div class="col-md-4">
                    {{Form::textarea('descripcion',
                  Input::old('descripcion'), 
                  [' placeholder'=>"Ingrese la descripsion ",
                    'class'=>"form-control border-input"
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('descripcion')}}</strong>
            </div>

            
            <div class="form-group">
                <label class="col-md-4 control-label" for="fecha_cita">Fecha de cita</label>  
                <div class="col-md-4">
                    {{Form::text('fecha_cita',
                  Input::old('fecha_cita'), 
                  [
                    'class'=>"form-control border-input , fechas"
                    
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('fecha_cita')}}</strong>
            </div>
            
            <div class="form-group">
                <label class="col-md-4 control-label" for="idpaciente"></label>
                <div class="col-md-4">

                    {{ Form::hidden('idpaciente', Session::get('id')) }}

                </div>
            </div>
            
            <div class="form-group">

                <div class="col-md-4">
                    {{Form::hidden('fecha_solicitud',
                  Input::old('fecha_solicitud'), 
                  [
                    'class'=>"form-control border-input , fecha"
                    
                   ])
                    }}

                </div>
            </div>





            <div class="form-group">

                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-4" align="center">
                    <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                    <br>
                    <br>


                   
                    {{Form::submit('Solicitar',[
                    'class'=>"btn btn-primary"
                   ]) }}

                </div>
            </div>



        </fieldset>

        {{ Form::close()  }}                                            

    </div>
</div>
</div>
</div>

    @stop