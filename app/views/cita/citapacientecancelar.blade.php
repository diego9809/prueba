<!--<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Paciente cancelar cita</title>

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
                        <h1 class="page-header">cancelar citas</h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-8">







                        <table class="table table-hover tbody tr-hover "  style=" border: 3px solid orange; background-color: #afeefb ;

                               ">

                            <thead class="" style="background-color: #ec971f; font-size: 18px; color: white;">
                                <tr>

                                    <td>Nombre</td>
                                    <td>Apellido</td>
                                    <td>Documento</td>
                                    <td>Numero de orden</td>
                                    <td>Fecha de orden</td>
                                    <td>Numero de secciones</td>
                                    <td>Hora de la cita</td>
                                    <td>Fecha de la cita</td>
                                    <td>Lugar de la cita</td>
                                    <td>Terapeuta</td>
                                    <td>Tipo de cita</td>
                                    <td>Editar</td>

                                </tr>              
                            </thead>
                            <tbody>
                                @foreach($pacientes as $p)
                                <tr>


                                    <td>{{$p->nombre_1}}</td>
                                    <td>{{$p->apellido_1}}</td>
                                    <td>{{$p->documento}}</td>
                                    <td>{{$p->idorden}}</td>    
                                    <td>{{$p->fecha_de_orden }}</td>
                                    <td>{{$p->secciones }}</td>
                                    <td>{{$p->hora }}</td>
                                    <td>{{$p->fecha}}</td>
                                    <td>{{$p->lugar}}</td>
                                    @foreach($terapeutas as $t)
                                    @if ( $p->fisioterapeuta_usuario_idusuario === $t->usuario_idusuario  )
                                    <td>{{$t->nombre_1}} {{$t->apellido_1}}</td>
                                    @else

                                    @endif
                                    @endforeach
                                    @if ( $p->tipo_de_cita === 1)
                                    <td>grupal</td>
                                    @else
                                    <td>individual</td>
                                    @endif

                               
                                    <td><a id="modal-199169" href="#modal-container-199169" role="button" class="btn" data-toggle="modal">Cancelar</a></td>
                                </tr>       

                                @ENDFOREACH

                                {{$pacientes->links()}}

                            </tbody>
                        </table>

                        <h3 style="font-size: 15px">{{$messege}}</h3>            
                        {{HTML::link('sessiones/insert', 'atras',["id"=>"texto","class"=>"btn btn-primary"])}}

                    </div>

                    <div class="col-md-1">
                    </div>
                </div>
                @foreach($pacientes as $p)
                <div class="col-md-12">


                    <div class="modal fade btn-lg" id="modal-container-199169" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#f35e5e;">


                                    <h4 class="modal-title" id="myModalLabel" align='center'>
                                        Advertencia
                                    </h4>
                                </div>
                                <div class="modal-body" align='center'>
                                    ¿ DESEA CANCELAR LA CITA ?
                                </div>
                                <div class="modal-footer" align='center'>

                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Cancelar
                                    </button> 
                                    <td>{{HTML::link("paciente/citacancela/$p->idcita","Aceptar",["class"=>"btn btn-primary"])}}</td>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                @ENDFOREACH





            </div>
             /.panel 


            {{ HTML::script('js/jquery.min.js') }}
            {{ HTML::script('js/bootstrap.min.js') }}
            {{ HTML::script('js/menus.js') }}
            {{ HTML::script('js/menus_1.js') }} 
    </body>

</html>
-->

@extends ('login.menu')

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h2>Cancelar Citas</h2>
            <div class="header">
                <h4 class="title">Citas</h4>
                <p class="category">aqui estan todas las citas registradas</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead class="" style="background-color: #ec971f; color: white;">
                        <tr>

                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Documento</td>
                            <td>Numero de orden</td>
                            <td>Fecha de orden</td>
                            <td>Numero de secciones</td>
                            <td>Hora de la cita</td>
                            <td>Fecha de la cita</td>
                            <td>Lugar de la cita</td>
                            <td>Terapeuta</td>
                            <td>Tipo de cita</td>
                            <td></td>

                        </tr>              
                    </thead>
                    <tbody>
                        @foreach($pacientes as $p)
                        <tr>


                            <td>{{$p->nombre_1}}</td>
                            <td>{{$p->apellido_1}}</td>
                            <td>{{$p->documento}}</td>
                            <td>{{$p->idorden}}</td>    
                            <td>{{$p->fecha_de_orden }}</td>
                            <td>{{$p->secciones }}</td>
                            <td>{{$p->hora }}</td>
                            <td>{{$p->fecha}}</td>
                            <td>{{$p->lugar}}</td>
                            @foreach($terapeutas as $t)
                            @if ( $p->fisioterapeuta_usuario_idusuario === $t->usuario_idusuario  )
                            <td>{{$t->nombre_1}} {{$t->apellido_1}}</td>
                            @else

                            @endif
                            @endforeach
                            @if ( $p->tipo_de_cita === 1)
                            <td>grupal</td>
                            @else
                            <td>individual</td>
                            @endif


                            <td><a id="modal-199169" href="#modal-container-199169" role="button" class="btn" data-toggle="modal">Cancelar</a></td>
                        </tr>       

                        @ENDFOREACH

                        {{$pacientes->links()}}

                    </tbody>
                </table>
                 <h3 style="font-size: 15px">{{$messege}}</h3>            
          
            </div>
           

        </div>

    </div>
</div>
@stop

@foreach($pacientes as $p)



<div class="modal fade btn-lg" id="modal-container-199169" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#f35e5e;">


                <h4 class="modal-title" id="myModalLabel" align='center'>
                    Advertencia
                </h4>
            </div>
            <div class="modal-body" align='center'>
                ¿ DESEA CANCELAR LA CITA ?
            </div>
            <div class="modal-footer" align='center'>

                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancelar
                </button> 
                <td>{{HTML::link("paciente/citacancela/$p->idcita","Aceptar",["class"=>"btn btn-primary"])}}</td>
            </div>
        </div>

    </div>

</div>


@ENDFOREACH