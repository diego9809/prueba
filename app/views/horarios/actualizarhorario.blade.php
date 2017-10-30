<!--<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>terapeuta horario modificar</title>

        {{HTML::style('styles/style/bootstrap.min.css')}}
        {{HTML::style('styles/style/menus.css')}}
        {{HTML::style('styles/style/menu.css')}}
        {{HTML::style('styles/style/menus_1.css')}}
        {{HTML::style('styles/style/menus_2.css')}}
        {{HTML::style('styles/style/menus_3.css')}} 
         Bootstrap Core CSS 
        {{HTML::style('styles/style/bootstrap.css')}}   
        {{HTML::style('styles/style/datepicker.css')}}
        {{HTML::style('styles/style/wickedpicker.css')}} 
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
              <link rel="stylesheet" href="/resources/demos/style.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <script>
$(document).ready(function () {
//hago la peticion AJX a pais/paises
//$.getajax


    $('.hora').timepicker({
        timeFormat: 'h:mm:p',
        interval: 60,
        minTime: '1:00am',
        maxTime: '11:00pm',
        defaultTime: '1',
        startTime: '1:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });

    $(".fecha").datepicker({
        "dateFormat": "yy-mm-dd",
        minDate: 0
    });
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
                        <h1 class="page-header">Modificar horario</h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-10">
     {{ Form::open(['class'=>'form-horizontal'])}}
                            <fieldset>


                             






                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fecha_inicio">fecha inicio</label>  
                                    <div class="col-md-4">
                                        {{Form::text('fecha_inicio',
                  $horario->fecha_inicio, 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"form-control input-md , fecha"
                    
                   ])
                                        }}

                                    </div>
                                    <strong class="alert-danger" align="center">{{$errors->first('fecha_inicio')}}</strong>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fecha_fin">fecha fin</label>  
                                    <div class="col-md-4">
                                        {{Form::text('fecha_fin',
                  $horario->fecha_fin, 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"form-control input-md , fecha"
                    
                   ])
                                        }}

                                    </div>
                                    <strong class="alert-danger" align="center">{{$errors->first('fecha_fin')}}</strong>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="Franja horaria">Franja horaria de trabajo</label>
                                    <div class="col-md-4">
                                    @foreach($coorhorario as $h)
                                    <label class="col-md-4 control-label" for="Franja horaria">{{$h->hora_de_trabajo_inicio}}</label>
                
                                    <br>
                                    <br>
                                        <div class="checkbox">
                                          
                                       @if($jh_1==false)
                                       
                                       @elseif($horario->franja_horaria=='7am-8am')
                                         <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','7am-8am',true) }}
                                                7am-8am
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','7am-8am') }}
                                                7am-8am
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_1==false)
                                       
                                       @elseif($horario->franja_horaria=='8am-9am')
                                         <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','8am-9am',true) }}
                                                8am-9am
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','8am-9am') }}
                                                8am-9am
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_2==false)
                                        @elseif($horario->franja_horaria=='9am-10am')
                                         <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','9am-10am',true) }}
                                                9am-10am
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','9am-10am') }}
                                                9am-10am
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_2==false)
                                        @elseif($horario->franja_horaria=='10am-11am')
                                         <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','10am-11am',true) }}
                                                10am-11am
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','9am-10am') }}
                                                10am-11am
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_3==false)
                                        @elseif($horario->franja_horaria=='11am-12am')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','11am-12am',true) }}
                                                11am-12am
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','11am-12am') }}
                                                11am-12am
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_3==false)
                                        @elseif($horario->franja_horaria=='12am-1pm')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','12am-1pm',true) }}
                                                12am-1pm
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','12am-1pm') }}
                                                12am-1pm
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_4==false)
                                        @elseif($horario->franja_horaria=='1pm-2pm')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','1pm-2pm',true) }}
                                                1pm-2pm
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','1pm-2pm') }}
                                                1pm-2pm
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_4==false)
                                        @elseif($horario->franja_horaria=='2pm-3pm')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','2pm-3pm',true) }}
                                                2pm-3pm
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','2pm-3pm') }}
                                                2pm-3pm
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_5==false)
                                        @elseif($horario->franja_horaria=='3pm-4pm')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','3pm-4pm',true) }}
                                                3pm-4pm
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','3pm-4pm') }}
                                                3pm-4pm
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_5==false)
                                        @elseif($horario->franja_horaria=='4pm-5pm')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','4pm-5pm',true) }}
                                                4pm-5pm
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','4pm-5pm') }}
                                                4pm-5pm
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_6==false)
                                        @elseif($horario->franja_horaria=='5pm-6pm')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','5pm-6pm',true) }}
                                                5pm-6pm
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria','5pm-6pm') }}
                                                5pm-6pm
                                            </label>
                                        </div>
                                        @endif
                                        
                                        
                                        

                                    </div>
                                    <br>
                                    
                                    <strong class="alert-danger" align="center">{{$errors->first('franja_horaria')}}</strong>
                                         <label class="col-md-4 control-label" for="Franja horaria">{{$h->hora_de_trabajo_fin}}</label>
                                          @endforeach
                                </div>
                                 </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="radios">Franja horaria de descanso</label>
                                    <div class="col-md-4">
                                        @if($jh_2==false)
                                        @elseif($horario->franja_horaria_descanso=='9am-10am')
                                         <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','9am-10am',true) }}
                                                9am-10am
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','9am-10am') }}
                                                9am-10am
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_3==false)
                                        @elseif($horario->franja_horaria_descanso=='11am-12am')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','11am-12am',true) }}
                                                11am-12am
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','11am-12am') }}
                                                11am-12am
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_4==false)
                                        @elseif($horario->franja_horaria_descanso=='1pm-2pm')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','1pm-2pm',true) }}
                                                1pm-2pm
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','1pm-2pm') }}
                                                1pm-2pm
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_5==false)
                                        @elseif($horario->franja_horaria_descanso=='3pm-4pm')
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','3pm-4pm',true) }}
                                                3pm-4pm
                                            </label>
                                        </div>
                                       @else()
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','3pm-4pm') }}
                                                3pm-4pm
                                            </label>
                                        </div>
                                        @endif
                                        <br>
                                        <strong class="alert-danger" align="center">{{Session::get('descanso') }}</strong>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    
                                    <div class="col-md-4">

                                        {{ Form::hidden('idhorario',$horario->horarios_idhorario) }}
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label class="col-md-4 control-label" for=""></label>
                                    <div class="col-md-4" align="center">
                                        <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                                        <br>
                                        <br>
                                       
                                        {{HTML::link('terapeuta/horariosvista', 'ver horario ',["class"=>"btn btn-danger"])}}
                                        {{Form::submit('Registrar',[
                    'class'=>"btn btn-primary"
                   ]) }}

                                    </div>
                                </div>


 

                            </fieldset>

                            {{ Form::close()  }}                                            



                        </div>
                        <div class="col-md-2">
                        </div>
        </div>

            
            {{ HTML::script('js/bootstrap.min.js') }}
            {{ HTML::script('js/menus.js') }}
            {{ HTML::script('js/menus_1.js') }}
            {{ HTML::script('js/scripts.js') }} 
    </body>

</html>

-->

@extends ('login.menu_ter')

@section('contenido')

<div class="row">
    <div class="card" style="width: 100%;">
    <div class="col-lg-12">
        <h2 class="page-header">Modificar horario</h2>
    </div>
   

<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['class'=>'form-horizontal'])}}
        <fieldset>

            <div class="form-group">
                <label class="col-md-4 control-label" for="fecha_inicio">Fecha inicio</label>  
                <div class="col-md-4">
                    {{Form::text('fecha_inicio',
                  $horario->fecha_inicio, 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"form-control border-input inicio"
                    
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('fecha_inicio')}}</strong>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="fecha_fin">Fecha fin</label>  
                <div class="col-md-4">
                    {{Form::text('fecha_fin',
                  $horario->fecha_fin, 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"form-control border-input fin"
                    
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('fecha_fin')}}</strong>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="Franja horaria">Franja horaria de trabajo</label>
                <div class="col-md-4">
                    @foreach($coorhorario as $h)
                    <label class="col-md-4 control-label" for="Franja horaria">{{$h->hora_de_trabajo_inicio}}</label>

                    <br>
                    <br>
                    <div >

                        @if($jh_1==false)

                        @elseif($horario->franja_horaria=='7am-8am')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','7am-8am',true) }}
                                7am-8am
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','7am-8am') }}
                                7am-8am
                            </label>
                        </div>
                        @endif

                        @if($jh_1==false)

                        @elseif($horario->franja_horaria=='8am-9am')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','8am-9am',true) }}
                                8am-9am
                            </label>
                        </div>
                        @else()
                       <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','8am-9am') }}
                                8am-9am
                            </label>
                        </div>
                        @endif

                        @if($jh_2==false)
                        @elseif($horario->franja_horaria=='9am-10am')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','9am-10am',true) }}
                                9am-10am
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','9am-10am') }}
                                9am-10am
                            </label>
                        </div>
                        @endif

                        @if($jh_2==false)
                        @elseif($horario->franja_horaria=='10am-11am')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','10am-11am',true) }}
                                10am-11am
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','9am-10am') }}
                                10am-11am
                            </label>
                        </div>
                        @endif

                        @if($jh_3==false)
                        @elseif($horario->franja_horaria=='11am-12am')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','11am-12am',true) }}
                                11am-12am
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','11am-12am') }}
                                11am-12am
                            </label>
                        </div>
                        @endif

                        @if($jh_3==false)
                        @elseif($horario->franja_horaria=='12am-1pm')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','12am-1pm',true) }}
                                12am-1pm
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','12am-1pm') }}
                                12am-1pm
                            </label>
                        </div>
                        @endif

                        @if($jh_4==false)
                        @elseif($horario->franja_horaria=='1pm-2pm')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','1pm-2pm',true) }}
                                1pm-2pm
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','1pm-2pm') }}
                                1pm-2pm
                            </label>
                        </div>
                        @endif

                        @if($jh_4==false)
                        @elseif($horario->franja_horaria=='2pm-3pm')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','2pm-3pm',true) }}
                                2pm-3pm
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','2pm-3pm') }}
                                2pm-3pm
                            </label>
                        </div>
                        @endif

                        @if($jh_5==false)
                        @elseif($horario->franja_horaria=='3pm-4pm')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','3pm-4pm',true) }}
                                3pm-4pm
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','3pm-4pm') }}
                                3pm-4pm
                            </label>
                        </div>
                        @endif

                        @if($jh_5==false)
                        @elseif($horario->franja_horaria=='4pm-5pm')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','4pm-5pm',true) }}
                                4pm-5pm
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','4pm-5pm') }}
                                4pm-5pm
                            </label>
                        </div>
                        @endif

                        @if($jh_6==false)
                        @elseif($horario->franja_horaria=='5pm-6pm')
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','5pm-6pm',true) }}
                                5pm-6pm
                            </label>
                        </div>
                        @else()
                        <div>
                            <label for="radios-0">
                                {{ Form::radio('franja_horaria','5pm-6pm') }}
                                5pm-6pm
                            </label>
                        </div>
                        @endif




                    </div>
                    <br>

                    <strong class="alert-danger" align="center">{{$errors->first('franja_horaria')}}</strong>
                    <label class="col-md-4 control-label" for="Franja horaria">{{$h->hora_de_trabajo_fin}}</label>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="radios">Franja horaria de descanso</label>
                <div class="col-md-4">
                    @if($jh_2==false)
                    @elseif($horario->franja_horaria_descanso=='9am-10am')
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','9am-10am',true) }}
                            9am-10am
                        </label>
                    </div>
                    @else()
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','9am-10am') }}
                            9am-10am
                        </label>
                    </div>
                    @endif

                    @if($jh_3==false)
                    @elseif($horario->franja_horaria_descanso=='11am-12am')
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','11am-12am',true) }}
                            11am-12am
                        </label>
                    </div>
                    @else()
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','11am-12am') }}
                            11am-12am
                        </label>
                    </div>
                    @endif

                    @if($jh_4==false)
                    @elseif($horario->franja_horaria_descanso=='1pm-2pm')
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','1pm-2pm',true) }}
                            1pm-2pm
                        </label>
                    </div>
                    @else()
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','1pm-2pm') }}
                            1pm-2pm
                        </label>
                    </div>
                    @endif

                    @if($jh_5==false)
                    @elseif($horario->franja_horaria_descanso=='3pm-4pm')
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','3pm-4pm',true) }}
                            3pm-4pm
                        </label>
                    </div>
                    @else()
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','3pm-4pm') }}
                            3pm-4pm
                        </label>
                    </div>
                    @endif
                    <br>
                    <strong class="alert-danger" align="center">{{Session::get('descanso') }}</strong>
                </div>
            </div>
            <div class="form-group">

                <div class="col-md-4">

                    {{ Form::hidden('idhorario',$horario->horarios_idhorario) }}
                </div>
            </div>

            <div class="form-group">

                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-4" align="center">
                    <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                    <br>
                    <br>

                    {{HTML::link('terapeuta/horariosvista', 'ver horario ',["class"=>"btn btn-danger"])}}
                    {{Form::submit('Registrar',[
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