<!--<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>coordinador crear horario</title>

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
                        
                        startTime: '1:00',
                        dynamic: false,
                        dropdown: true,
                        scrollbar: true
                    });

                    $(".fecha").datepicker({
                        "dateFormat": "yy-mm-dd"
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
                                                coordinador
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
                                <a href="#"><i class="glyphicon glyphicon-book"></i> Agenda <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                                <ul class="nav nav-second-level">
                                    <li class="">
                                        {{HTML::link('coordinador/horario', 'crear agenda')}}

                                    </li>
                                    <li>
                                        {{HTML::link('coordinador/modhoraria', 'modificar agenda')}}
                                    </li>

                                    <li>
                                        {{HTML::link('coordinador/vistahoraria', 'consultar agenda')}}
                                    </li>
                                </ul>
                                 /.nav-second-level 
                            </li>

                            <li>
                                <a href="#"><i class="glyphicon glyphicon-user"></i> Usuarios <span class="glyphicon glyphicon-chevron-down" style="float:right;"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        {{HTML::link('coordinador/index', 'crear usuarios')}}
                                    </li>
                                    <li>

                                        {{HTML::link('paciente/index', 'modificar paciente')}}
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
                        <h1 class="page-header">crear horarios </h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-10">
{{ Form::open(["class"=>"form-horizontal"])}}
        
        <fieldset>


<div class="form-group">
  <label class="col-md-4 control-label" for="termino">Ingrese el docuemnto del terapeuta</label>  
  <div class="col-md-4">
      
  <input id="textinput" name="termino" placeholder="Terapeuta" class="form-control input-md" type="text">
    
  </div>
</div>

 Button 
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
      <button id="singlebutton" name="singlebutton" type="submit" class="btn btn-primary">Buscar</button>
  </div>
</div>

</fieldset>
        
        {{Form::close()}}
        
      
        <table class="table table-hover tbody tr-hover "  style=" border: 3px solid orange; background-color: #afeefb ;
             
               ">
                     
            <thead class="" style="background-color: #ec971f; font-size: 18px; color: white;">
                <tr>
                   
                    <td style="font-size: 15px">Nombre completo</td>
                    <td style="font-size: 15px">Documento</td>
                    <td style="font-size: 15px">especialidad</td>
                    <td style="font-size: 15px">matricula</td>
                    <td style="font-size: 15px">Codigo</td>
                    <td style="font-size: 15px">seleccion</td>
                    

                </tr>              
            </thead>
            <tbody>
            @foreach($terapeuta as $t)
            <tr>
            
            <td>{{$t->nombre_1}} {{$t->apellido_1}}</td>
            <td>{{$t->documento}}</td>
            <td>{{$t->idusuario}}</td>
            <td>{{$t->nombre_de_la_especialidad}}</td>
            <td>{{$t->matricula}}</td>
             <td>{{HTML::link("coordinador/formhorario/$t->usuario_idusuario","selecionar")}}</td>
            
           
            </tr>
            @ENDFOREACH
            
            {{$terapeuta->links()}}
            
        </tbody>
        </table>
        
                </div>
                <div class="col-md-2">
                </div>
                </div>
                 /.panel 


              
                {{ HTML::script('js/bootstrap.min.js') }}
                {{ HTML::script('js/menus.js') }}
                {{ HTML::script('js/menus_1.js') }}
                {{ HTML::script('js/scripts.js') }} 
                </body>

                </html>

-->
@extends ('login.menu_cor')

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Crear Horarios </h2>
    </div>

</div>
<div class="row">
    <div class="col-lg-12">
        {{ Form::open(["class"=>"form-horizontal"])}}

        <fieldset>

            <div class="form-group">
                <label class="col-md-4 control-label" for="termino">Ingrese Documento Del Terapeuta</label>  
                <div class="col-md-4">
                    <input id="textinput" name="termino" placeholder="Documento Terapeuta" class="form-control input-md border-input" type="text">
                </div>
                <button type="submit" class="btn  btn-round btn-just-icon btn-warning">
                <i class="ti-search"></i><div class="ripple-container"></div>
                </button>
            </div>


        </fieldset>

        {{Form::close()}}


        <div class="card">
            <div class="header">
                <h4 class="title">Lista Terapeutas</h4>
                <p class="category">Escoja el terpaeuta para crear el horario</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">

            <thead class="" style="background-color: #ec971f; font-size: 18px; color: white;">
                <tr>

                    <td style="font-size: 15px">Nombre completo</td>
                    <td style="font-size: 15px">Documento</td>
                    <td style="font-size: 15px">Especialidad</td>
                    <td style="font-size: 15px">Matricula</td>
                    <td style="font-size: 15px">Codigo</td>
                    <td style="font-size: 15px">Seleccion</td>


                </tr>              
            </thead>
            <tbody>
                @foreach($terapeuta as $t)
                <tr>

                    <td>{{$t->nombre_1}} {{$t->apellido_1}}</td>
                    <td>{{$t->documento}}</td>
                    <td>{{$t->idusuario}}</td>
                    <td>{{$t->nombre_de_la_especialidad}}</td>
                    <td>{{$t->matricula}}</td>
                    <td>{{HTML::link("coordinador/formhorario/$t->usuario_idusuario","selecionar")}}</td>


                </tr>
                @ENDFOREACH

                

            </tbody>
        </table>

    </div>
            {{$terapeuta->links()}}
    </div>
</div>
</div>
@stop
