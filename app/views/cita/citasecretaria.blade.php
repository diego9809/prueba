<!--<!DOCTYPE html>
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

            <link href="styles/style/bootstrap.min.css" rel="stylesheet">
            <link href="styles/style/style.css" rel="stylesheet">

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
                        


                            <div class="col-md-1" style="white-space: 50%;">
                               
                            </div>
                            <div class="col-md-10">
                                         <h1> Citas  </h1>
        
      
        
      
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
           
            <td>{{HTML::link("secretaria/citacancelar/$p->idcita","cancelar")}}</td>
            <td><a id="modal-199169" href="#modal-container-199169" role="button" class="btn" data-toggle="modal">Cancelar</a></td>
            </tr>
            @ENDFOREACH
            
            {{$pacientes->links()}}
            
        </tbody>
        </table>
                      <h3 style="font-size: 15px">{{$messege}}</h3>
           {{HTML::link('secretaria/vistacita', 'atras',["id"=>"texto","class"=>"btn btn-primary"])}}
                            </div>
                            <div class="col-md-1">
                               
                            </div>

                        
    </div
    @foreach($pacientes as $p)
        <div class="col-md-12">
                         
                        
            <div class="modal fade" id="modal-container-199169" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                        <td>{{HTML::link("secretaria/citacancelar/$p->idcita","Aceptar",["class"=>"btn btn-primary"])}}</td>
                                                </div>
                                        </div>
                                        
                                </div>
                                
                        </div>
                        
                </div>
        @ENDFOREACH
    </div>
    {{ HTML::script('js/jquery.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/scripts.js') }} 
</body>
</html>-->


@extends ('login.menu_sec')

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2>Cancelar Cita</h2>
                <h4 class="title">Citas</h4>
                <p class="category">Citas registradas</p>
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
        {{HTML::link('secretaria/vistacita', 'atras',["id"=>"texto","class"=>"btn btn-primary"])}}
    </div>
</div>
</div>
</div>            
</div>
</div>
@stop


@foreach($pacientes as $p)
        <div class="col-md-12">
                         
                        
            <div class="modal fade" id="modal-container-199169" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                        <td>{{HTML::link("secretaria/citacancelar/$p->idcita","Aceptar",["class"=>"btn btn-primary"])}}</td>
                                                </div>
                                        </div>
                                        
                                </div>
                                
                        </div>
                        
                </div>
        @ENDFOREACH
