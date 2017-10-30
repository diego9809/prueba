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
                        <h1 class="page-header">lista de ordenes</h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-10">
        
        
        {{ Form::open(["class"=>"form-horizontal"])}}
       
        <fieldset>




<table class="table table-hover tbody tr-hover "  style=" border: 3px solid orange; background-color: #afeefb ;
             
               ">
                     
            <thead class="" style="background-color: #ec971f; font-size: 18px; color: white;">
                <tr>
                 
                    <td style="font-size: 15px">Nombre completo</td>
                    <td style="font-size: 15px">Documento</td>
                    <td style="font-size: 15px">sesiones</td>
                    <td style="font-size: 15px">Citas registradas</td>
                    <td style="font-size: 15px">fecha de la orden </td>
                    <td style="font-size: 15px">fecha de vencimiento</td>
                    <td style="font-size: 15px">fecha de ingreso</td>

                    <td>Editar</td>

                </tr>              
            </thead>
            <tbody>
           
            
                
            @foreach($pacientes as $p)
           
            <tr>
              
               
            <td>{{$p->nombre_1}} {{$p->apellido_1}}</td>
            <td>{{$p->documento}}</td>
            <td>{{$p->secciones}}</td>
           
            <td>{{$citas}}</td>
            
            <td>{{$p->fecha_de_orden}}</td>
            <td>{{$p->fecha_de_vencimiento}}</td>
            <td>{{$p->fecha_de_ingreso}}</td>
           
            @if($citas>=$p->secciones)
            <td>orden llena</td>
            @else
            <td>{{HTML::link("cita/selecterapeuta/$p->idorden","selecionar")}}</td>
            @endif
            </tr>
            
            
            @ENDFOREACH
            {{$pacientes->links()}}
            
              
            
        </tbody>
        </table>
                            <h3 style="font-size: 15px">{{$messege}}</h3> 
                            {{HTML::link('cita/cita', 'atras',["id"=>"texto","class"=>"btn btn-primary"])}}
                            </div>
                            <div class="col-md-2">
                               
                            </div>

                        
  

            </div>
  
            {{ HTML::script('js/jquery.min.js') }}
            {{ HTML::script('js/bootstrap.min.js') }}
            {{ HTML::script('js/menus.js') }}
            {{ HTML::script('js/menus_1.js') }}
            {{ HTML::script('js/scripts.js') }} 
    </body>

</html>


-->
@extends ('login.menu_sec')

@section('contenido')


<div class="row">
    <div class="col-lg-12">


        {{ Form::open(["class"=>"form-horizontal"])}}

        <div class="card">
            <div class="header">
                <h4 class="title">Lista pacientes</h4>
                <p class="category">escoja el paciente para agendar la cita</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead class="" style="background-color: #ec971f; color: white;">
                    <tr>

                        <td style="font-size: 15px">Nombre completo</td>
                        <td style="font-size: 15px">Documento</td>
                        <td style="font-size: 15px">sesiones</td>
                        <td style="font-size: 15px">Citas registradas</td>
                        <td style="font-size: 15px">fecha de la orden </td>
                        <td style="font-size: 15px">fecha de vencimiento</td>
                        <td style="font-size: 15px">fecha de ingreso</td>

                        <td>Editar</td>

                    </tr>              
                </thead>
                <tbody>



                    @foreach($pacientes as $p)

                    <tr>


                        <td>{{$p->nombre_1}} {{$p->apellido_1}}</td>
                        <td>{{$p->documento}}</td>
                        <td>{{$p->secciones}}</td>

                        <td>{{$citas}}</td>

                        <td>{{$p->fecha_de_orden}}</td>
                        <td>{{$p->fecha_de_vencimiento}}</td>
                        <td>{{$p->fecha_de_ingreso}}</td>

                        @if($citas>=$p->secciones)
                        <td>orden llena</td>
                        @else
                        <td>{{HTML::link("cita/selecterapeuta/$p->idorden","selecionar")}}</td>
                        @endif
                    </tr>


                    @ENDFOREACH
                    {{$pacientes->links()}}



                </tbody>
            </table>
            <h3 style="font-size: 15px">{{$messege}}</h3> 
            {{HTML::link('cita/cita', 'atras',["id"=>"texto","class"=>"btn btn-primary"])}}
    </div>
    <div class="col-md-2">

    </div>



</div>
</div>
</div>

@stop
