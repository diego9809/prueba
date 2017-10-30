<!--<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>terapeuta crear horario</title>

        {{HTML::style('styles/style/bootstrap.min.css')}}
        {{HTML::style('styles/style/menus.css')}}
        {{HTML::style('styles/style/menu.css')}}
        {{HTML::style('styles/style/menus_1.css')}}
        {{HTML::style('styles/style/menus_2.css')}}
        {{HTML::style('styles/style/menus_3.css')}} 
         Bootstrap Core CSS 
        {{HTML::style('styles/style/bootstrap.css')}}   
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
         minDate: 0,
         
         
         
    });
    
    $(".inicio").datepicker({
    minDate: 0,
    "dateFormat": "yy-mm-dd",
    onClose: function (selectedDate) {
    $(".fin").datepicker("option", "minDate", selectedDate);
    }
    });

    $(".fin").datepicker({
    minDate: 0,
    "dateFormat": "yy-mm-dd",
    onClose: function (selectedDate) {
    $(".inicio").datepicker("option", "maxDate", selectedDate);
    }
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
                        <h1 class="page-header">Crear horario</h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-10">
        {{ Form::open(['class'=>'form-horizontal'])}}
                            <fieldset>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fecha_orden">fecha inicio</label>  
                                    <div class="col-md-4">
                                        {{Form::text('fecha_inicio',
                  Input::old('nombre'), 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"form-control input-md , inicio"
                    
                   ])
                                        }}
                                    
                                    </div>
                                <strong class="alert-danger" align="center">{{$errors->first('fecha_inicio')}}</strong>
                                 <strong class="alert-danger" align="center"> {{Session::get('error') }} </strong>    
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fecha_fin">fecha fin</label>  
                                    <div class="col-md-4">
                                        {{Form::text('fecha_fin',
                  Input::old('nombre'), 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"form-control input-md , fin"
                    
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
                                        
                                        
                                       @if($jh_1==false)
                                       @else
                                       
                                        <div class="checkbox">
                                            <label for="checkboxes-0">

                                                {{ Form::checkbox('franja_horaria[]','7am-8am', null, ['class' => 'field']) }}
                                                7am-8am
                                            </label>
                                        </div>
                                       <div class="checkbox">
                                            <label for="checkboxes-0">

                                                {{ Form::checkbox('franja_horaria[]','8am-9am', null, ['class' => 'field']) }}
                                                8am-9am
                                            </label>
                                        </div>
                                        @endif
                                        
                                       @if($jh_2==false)
                                       @else
                                        <div class="checkbox">
                                            <label for="checkboxes-1">
                                                {{ Form::checkbox('franja_horaria[]','9am-10am', null, ['class' => 'field']) }}
                                                9am-10am
                                            </label>
                                        </div>
                                       <div class="checkbox">
                                            <label for="checkboxes-1">
                                                {{ Form::checkbox('franja_horaria[]','10am-11am', null, ['class' => 'field']) }}
                                                10am-11am
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_3==false)
                                       @else
                                        <div class="checkbox">
                                            <label for="checkboxes-0">

                                                {{ Form::checkbox('franja_horaria[]','11am-12am', null, ['class' => 'field']) }}
                                                11am-12am
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkboxes-0">

                                                {{ Form::checkbox('franja_horaria[]','12am-1pm', null, ['class' => 'field']) }}
                                                12am-1pm
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_4==false)
                                       @else
                                        <div class="checkbox">
                                            <label for="checkboxes-1">
                                                {{ Form::checkbox('franja_horaria[]','1pm-2pm', null, ['class' => 'field']) }}
                                                1pm-2pm
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="checkboxes-1">
                                                {{ Form::checkbox('franja_horaria[]','2pm-3pm', null, ['class' => 'field']) }}
                                                2pm-3pm
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_5==false)
                                       @else
                                        <div class="checkbox">
                                            <label for="checkboxes-0">

                                                {{ Form::checkbox('franja_horaria[]','3pm-4pm', null, ['class' => 'field']) }}
                                                3pm-4pm
                                            </label>
                                        </div>
                                       <div class="checkbox">
                                            <label for="checkboxes-0">

                                                {{ Form::checkbox('franja_horaria[]','4pm-5pm', null, ['class' => 'field']) }}
                                                4pm-5pm
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_6==false)
                                       @else
                                        <div class="checkbox">
                                            <label for="checkboxes-1">
                                                {{ Form::checkbox('franja_horaria[]','5pm-6pm', null, ['class' => 'field']) }}
                                                5pm-6pm
                                            </label>
                                        </div>
                                       @endif 
                                         <strong class="alert-danger" align="center">{{$errors->first('franja_horaria')}}</strong>
                                         <label class="col-md-4 control-label" for="Franja horaria">{{$h->hora_de_trabajo_fin}}</label>
                                          @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="radios">Franja horaria de descanso</label>
                                    <div class="col-md-4">
                                        @if($jh_2==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','9am-10am',true) }}
                                                9am-10am
                                            </label>
                                        </div>
                                        @endif
                                       @if($jh_3==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','11am-12am') }}
                                                11am-12am
                                            </label>
                                        </div>
                                        @endif
                                       @if($jh_4==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','1pm-2pm') }}
                                                1pm-2pm
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_5==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('franja_horaria_descanso','3pm-4pm') }}
                                                3pm-4pm
                                            </label>
                                        </div>
                                       @endif
                                        <br>
                                        <strong class="alert-danger" align="center">{{$errors->first('franja_horaria_descanso')}}</strong>  
                                        <strong class="alert-danger" align="center">{{Session::get('descanso') }}</strong>
                                    </div>
                                </div>

                                
                                



                                <div class="form-group">

                                    <div class="col-md-4">
                                          {{ Form::hidden('idhorario',$horario) }}
                                        
                                    </div>
                                </div>



                                <div class="form-group">

                                    <label class="col-md-4 control-label" for=""></label>
                                    <div class="col-md-4" align="center">
                                        <strong class="alert-danger" align="center"> {{Session::get('mensajexito') }} </strong>
                                        <br>
                                        <br>
                                     
                                        {{HTML::link('terapeuta/horariosvista', 'Ver Horario',["class"=>"btn btn-danger"])}}
                                        {{Form::submit('Registrar',[
                    'class'=>"btn btn-primary"
                   ]) }}

                                    </div>
                                </div>


   

                            </fieldset>

                            {{ Form::close()  }}                                            



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
        <h2 class="page-header">Crear horario</h2>
    </div>
    

<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['class'=>'form-horizontal'])}}
        <fieldset>

            <div class="form-group">
                <label class="col-md-4 control-label" for="fecha_orden">Fecha inicio</label>  
                <div class="col-md-4">
                    {{Form::text('fecha_inicio',
                  Input::old('nombre'), 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"form-control border-input inicio"
                    
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('fecha_inicio')}}</strong>
                <strong class="alert-danger" align="center"> {{Session::get('error') }} </strong>    
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="fecha_fin">Fecha fin</label>  
                <div class="col-md-4">
                    {{Form::text('fecha_fin',
                  Input::old('nombre'), 
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


                    @if($jh_1==false)
                    @else

                    <div>
                        <label for="checkboxes-0">

                            {{ Form::checkbox('franja_horaria[]','7am-8am', null, ['class' => 'field']) }}
                            7am-8am
                        </label>
                    </div>
                    <div>
                        <label for="checkboxes-0">

                            {{ Form::checkbox('franja_horaria[]','8am-9am', null, ['class' => 'field']) }}
                            8am-9am
                        </label>
                    </div>
                    @endif

                    @if($jh_2==false)
                    @else
                    <div>
                        <label for="checkboxes-1">
                            {{ Form::checkbox('franja_horaria[]','9am-10am', null, ['class' => 'field']) }}
                            9am-10am
                        </label>
                    </div>
                    <div>
                        <label for="checkboxes-1">
                            {{ Form::checkbox('franja_horaria[]','10am-11am', null, ['class' => 'field']) }}
                            10am-11am
                        </label>
                    </div>
                    @endif

                    @if($jh_3==false)
                    @else
                    <div>
                        <label for="checkboxes-0">

                            {{ Form::checkbox('franja_horaria[]','11am-12am', null, ['class' => 'field']) }}
                            11am-12am
                        </label>
                    </div>
                    <div>
                        <label for="checkboxes-0">

                            {{ Form::checkbox('franja_horaria[]','12am-1pm', null, ['class' => 'field']) }}
                            12am-1pm
                        </label>
                    </div>
                    @endif

                    @if($jh_4==false)
                    @else
                    <div>
                        <label for="checkboxes-1">
                            {{ Form::checkbox('franja_horaria[]','1pm-2pm', null, ['class' => 'field']) }}
                            1pm-2pm
                        </label>
                    </div>
                    <div>
                        <label for="checkboxes-1">
                            {{ Form::checkbox('franja_horaria[]','2pm-3pm', null, ['class' => 'field']) }}
                            2pm-3pm
                        </label>
                    </div>
                    @endif

                    @if($jh_5==false)
                    @else
                    <div>
                        <label for="checkboxes-0">

                            {{ Form::checkbox('franja_horaria[]','3pm-4pm', null, ['class' => 'field']) }}
                            3pm-4pm
                        </label>
                    </div>
                    <div>
                        <label for="checkboxes-0">

                            {{ Form::checkbox('franja_horaria[]','4pm-5pm', null, ['class' => 'field']) }}
                            4pm-5pm
                        </label>
                    </div>
                    @endif

                    @if($jh_6==false)
                    @else
                    <div>
                        <label for="checkboxes-1">
                            {{ Form::checkbox('franja_horaria[]','5pm-6pm', null, ['class' => 'field']) }}
                            5pm-6pm
                        </label>
                    </div>
                    @endif 
                    <strong class="alert-danger" align="center">{{$errors->first('franja_horaria')}}</strong>
                    <label class="col-md-4 control-label" for="Franja horaria">{{$h->hora_de_trabajo_fin}}</label>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="radios">Franja horaria de descanso</label>
                <div class="col-md-4">
                    @if($jh_2==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','9am-10am',true) }}
                            9am-10am
                        </label>
                    </div>
                    @endif
                    @if($jh_3==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','11am-12am') }}
                            11am-12am
                        </label>
                    </div>
                    @endif
                    @if($jh_4==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','1pm-2pm') }}
                            1pm-2pm
                        </label>
                    </div>
                    @endif

                    @if($jh_5==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('franja_horaria_descanso','3pm-4pm') }}
                            3pm-4pm
                        </label>
                    </div>
                    @endif
                    <br>
                    <strong class="alert-danger" align="center">{{$errors->first('franja_horaria_descanso')}}</strong>  
                    <strong class="alert-danger" align="center">{{Session::get('descanso') }}</strong>
                </div>
            </div>






            <div class="form-group">

                <div class="col-md-4">
                    {{ Form::hidden('idhorario',$horario) }}

                </div>
            </div>



            <div class="form-group">

                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-4" align="center">
                    <strong class="alert-danger" align="center"> {{Session::get('mensajexito') }} </strong>
                    <br>
                    <br>

                    {{HTML::link('terapeuta/horariosvista', 'Ver Horario',["class"=>"btn btn-danger"])}}
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

