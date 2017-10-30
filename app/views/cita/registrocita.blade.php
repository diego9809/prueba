<!--
<!DOCTYPE html>
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

    $(".fecha").datepicker({
        "dateFormat": "yy-mm-dd",
        minDate: 0
    });

    $('.hora').timepicker({
        timeFormat: 'h:mm:p',
        interval: 60,
        minTime: '7:00am',
        maxTime: '8:00pm',
        defaultTime: '7',
        startTime: '7:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
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
                        <h1 class="page-header">Registrar Cita</h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-10">
         {{ Form::open(['class'=>'form-horizontal'])}}
                            <fieldset>

                              @foreach($pacientes as $p)
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="terapeutas">Terapeuta:</label>
                                    <div class="col-md-4">
                                    <label  for="terapeutas">{{$p->nombre_1}} {{$p->apellido_1}}</label>
                                    </div>
                                </div>
                              @endforeach  
                                


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="Id">tipo de cita</label>
                                    <div class="col-md-4">
                                        {{Form::select('tipo_cita',[1=>"grupal",2=>"individual"] , null, ['class' => 'form-control'])}}

                                    </div>
                                </div>


                                
                              
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fecha_orden">fecha</label>
                                    <div class="col-md-4">
                                        @foreach($horarios as $h)
                                    <label control-label for=fecha_orden> {{$h->fecha_inicio}} - {{$h->fecha_fin}}</label>
                                    @endforeach
                                        {{Form::text('fecha',
                  Input::old('nombre'), 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"form-control input-md , fecha"
                    
                   ])
                                        }}
                                        <br>
                                     <strong class="alert-danger" align="center"> {{Session::get('error') }} </strong>
                                    </div>
                                    
                                    
                                    
                         <strong class="alert-danger" align="center">{{$errors->first('fecha')}}</strong>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="radios">hora</label>
                                    <div class="col-md-4">
                                       @if($jh_1==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','07:00:00',true) }}
                                                07:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','07:30:00') }}
                                                07:30:00
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_11==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','08:00:00',true) }}
                                                08:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','08:30:00') }}
                                                08:30:00
                                            </label>
                                        </div>
                                        @endif
                                        
                                       @if($jh_2==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','09:00:00',true) }}
                                                09:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','09:30:00') }}
                                                09:30:00
                                            </label>
                                        </div>
                                        @endif
                                        
                                        @if($jh_21==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','10:00:00',true) }}
                                                10:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','10:30:00') }}
                                                10:30:00
                                            </label>
                                        </div>
                                        @endif
                                        
                                       @if($jh_3==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','11:00:00',true) }}
                                                11:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','11:30:00') }}
                                                11:30:00
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_31==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','12:00:00',true) }}
                                                12:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','12:30:00') }}
                                                12:30:00
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_4==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','13:00:00',true) }}
                                                13:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','13:30:00') }}
                                                13:30:00
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_41==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','14:00:00',true) }}
                                                14:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','14:30:00') }}
                                                14:30:00
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_5==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','15:00:00',true) }}
                                                15:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','15:30:00') }}
                                                15:00:00
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_51==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','16:00:00',true) }}
                                                16:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','16:30:00') }}
                                                16:30:00
                                            </label>
                                        </div>
                                       @endif
                                       
                                       @if($jh_6==false)
                                       @else
                                        <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','17:00:00',true) }}
                                                17:00:00
                                            </label>
                                        </div>
                                       <div class="radio">
                                            <label for="radios-0">
                                                {{ Form::radio('hora','17:30:00') }}
                                                17:30:00
                                            </label>
                                        </div>
                                       @endif
                                       
                                        <br>
                                        <strong class="alert-danger" align="center">{{$errors->first('franja_horaria_descanso')}}</strong>  
                                        <strong class="alert-danger" align="center">{{Session::get('descanso') }}</strong>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="fecha_ingreso">lugar</label>  
                                    <div class="col-md-4">
                                        {{Form::text ('lugar',
                  Input::old('date'), 
                  [
                    'class'=>"form-control input-md"
                    
                   ])
                                        }}

                                    </div>
                                 <strong class="alert-danger" align="center">{{$errors->first('lugar')}}</strong>
                                </div>
                                {{ Form::hidden('idorden', $idorden) }}
                                {{ Form::hidden('idterapeuta', $idterapeuta) }}
                                   



                                <div class="form-group">

                                    <label class="col-md-4 control-label" for=""></label>
                                    <div class="col-md-4" align="center">
                                        <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                                        <br>
                                        <br>
                                        
                                        {{HTML::link('cita/cita', 'Atras',["class"=>"btn btn-danger"])}}
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

</html>-->



@extends ('login.menu_sec')

@section('contenido')

<div class="row">
    <div class="card" style="height:100%;">
    <div class="col-lg-12">
        <h2 class="page-header">Registrar Cita</h2>
    </div>


<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['class'=>'form-horizontal'])}}
        <fieldset>

            @foreach($pacientes as $p)
            <div class="form-group">
                <label class="col-md-4 control-label" for="terapeutas">Terapeuta:</label>
                <div class="col-md-4">
                    <label  for="terapeutas">{{$p->nombre_1}} {{$p->apellido_1}}</label>
                </div>
            </div>
            @endforeach  



            <div class="form-group">
                <label class="col-md-4 control-label" for="Id">Tipo de cita</label>
                <div class="col-md-4">
                    {{Form::select('tipo_cita',[1=>"grupal",2=>"individual"] , null, ['class' => 'form-control border-input'])}}

                </div>
            </div>




            <div class="form-group">
                <label class="col-md-4 control-label" for="fecha_orden">Fecha</label>
                <div class="col-md-4">
                    @foreach($horarios as $h)
                    <label control-label for=fecha_orden> {{$h->fecha_inicio}} - {{$h->fecha_fin}}</label>
                    @endforeach
                    {{Form::text('fecha',
                  Input::old('nombre'), 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"form-control input-md fecha border-input "
                    
                   ])
                    }}
                    <br>
                    <strong class="alert-danger" align="center"> {{Session::get('error') }} </strong>
                </div>



                <strong class="alert-danger" align="center">{{$errors->first('fecha')}}</strong>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="radios">Hora</label>
                <div class="col-md-4">
                    @if($jh_1==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','07:00:00',true,["style" => "background-color:blue;"]) }}
                            07:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','07:30:00') }}
                            07:30:00
                        </label>
                    </div>
                    @endif

                    @if($jh_11==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','08:00:00',true) }}
                            08:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','08:30:00') }}
                            08:30:00
                        </label>
                    </div>
                    @endif

                    @if($jh_2==false)
                    @else
                   <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','09:00:00',true) }}
                            09:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','09:30:00') }}
                            09:30:00
                        </label>
                    </div>
                    @endif

                    @if($jh_21==false)
                    @else
                   <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','10:00:00',true) }}
                            10:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','10:30:00') }}
                            10:30:00
                        </label>
                    </div>
                    @endif

                    @if($jh_3==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','11:00:00',true) }}
                            11:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','11:30:00') }}
                            11:30:00
                        </label>
                    </div>
                    @endif

                    @if($jh_31==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','12:00:00',true) }}
                            12:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','12:30:00') }}
                            12:30:00
                        </label>
                    </div>
                    @endif

                    @if($jh_4==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','13:00:00',true) }}
                            13:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','13:30:00') }}
                            13:30:00
                        </label>
                    </div>
                    @endif

                    @if($jh_41==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','14:00:00',true) }}
                            14:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','14:30:00') }}
                            14:30:00
                        </label>
                    </div>
                    @endif

                    @if($jh_5==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','15:00:00',true) }}
                            15:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','15:30:00') }}
                            15:00:00
                        </label>
                    </div>
                    @endif

                    @if($jh_51==false)
                    @else
                   <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','16:00:00',true) }}
                            16:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','16:30:00') }}
                            16:30:00
                        </label>
                    </div>
                    @endif

                    @if($jh_6==false)
                    @else
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','17:00:00',true) }}
                            17:00:00
                        </label>
                    </div>
                    <div>
                        <label for="radios-0">
                            {{ Form::radio('hora','17:30:00') }}
                            17:30:00
                        </label>
                    </div>
                    @endif

                    <br>
                    <strong class="alert-danger" align="center">{{$errors->first('franja_horaria_descanso')}}</strong>  
                    <strong class="alert-danger" align="center">{{Session::get('descanso') }}</strong>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="fecha_ingreso">Lugar</label>  
                <div class="col-md-4">
                    {{Form::text ('lugar',
                  Input::old('date'), 
                  [
                    'class'=>"form-control border-input"
                    
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('lugar')}}</strong>
            </div>
            {{ Form::hidden('idorden', $idorden) }}
            {{ Form::hidden('idterapeuta', $idterapeuta) }}




            <div class="form-group">

                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-4" align="center">
                    <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                    <br>
                    <br>

                    {{HTML::link('cita/cita', 'Atras',["class"=>"btn btn-danger"])}}
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