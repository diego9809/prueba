<!--<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>terapeuta cancelar cita</title>

        {{HTML::style('styles/style/bootstrap.min.css')}}
        {{HTML::style('styles/style/menus.css')}}
        {{HTML::style('styles/style/menu.css')}}
        {{HTML::style('styles/style/menus_1.css')}}
        {{HTML::style('styles/style/menus_2.css')}}
        {{HTML::style('styles/style/menus_3.css')}} 

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
                                
                            </li>
                         
                        </ul>
                    </div>
                    
                </div>
                            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cancelar Cita</h1>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-lg-10">
                    
                
        
        {{ Form::open(["class"=>"form-horizontal"])}}
        
        <fieldset>

<div class="form-group">
  <label class="col-md-4 control-label" for="termino">Ingrese el documeto del paciente</label>  
  <div class="col-md-4">
      
  <input id="textinput" name="termino" placeholder="Paciente" class="form-control input-md" type="text">
    
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
        
      
        <table class="table table-hover tbody tr-hover "  style=" border: 3px solid orange; background-color: #afeefb ;
             
               ">
                     
            <thead class="" style="background-color: #ec971f; font-size: 18px; color: white;">
                <tr>
                    <td style="font-size: 15px">Numero cita</td>
                    <td style="font-size: 15px">Nombre Completo</td>
                    <td style="font-size: 15px">Documento</td>
                    <td style="font-size: 15px">eps</td>
                    <td style="font-size: 15px">fecha</td>
                    <td style="font-size: 15px">hora</td>
                    <td style="font-size: 15px">lugar</td>
                    <td style="font-size: 15px">Cancelar</td>

                </tr>              
            </thead>
            <tbody>
            @foreach($pacientes as $p)
            <tr>
            <td>{{$p->idcita}}</td>    
            <td>{{$p->nombre_1}}  {{$p->apellido_1}}</td>
         
            <td>{{$p->documento}}</td>
            <td>{{$p->eps}}</td>
            <td>{{$p->fecha}}</td>
            <td>{{$p->hora}}</td>
            <td>{{$p->lugar}}</td>
          
             
              <td><a id="modal-199169" href="#modal-container-199169" role="button" class="glyphicon glyphicon-remove" data-toggle="modal"></a></td>
            </tr>
            @ENDFOREACH
            
            {{$pacientes->links()}}
            
        </tbody>
        </table>
        <h3 style="font-size: 15px">{{$messege}}</h3> 
        {{HTML::link('sessiones/insert', 'atras',["id"=>"texto","class"=>"btn btn-primary"])}}
                </div>
                <div class="col-md-2">
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
                                                        <td>{{HTML::link("terapeuta/citacancela/$p->idcita","Aceptar",["class"=>"btn btn-primary"])}}</td>
                                                </div>
                                        </div>
                                        
                                </div>
                                
                        </div>
                        
                </div>
        @ENDFOREACH
            
        </div>

            {{ HTML::script('js/jquery.min.js') }}
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
    <div class="col-lg-12">



        {{ Form::open(["class"=>"form-horizontal"])}}

        <fieldset>

            <div class="form-group">
                <label class="col-md-4 control-label" for="termino">Ingrese Documento Del Paciente</label>  
                <div class="col-md-4">
                    <input id="textinput" name="termino" placeholder="Documento Paciente" class="form-control input-md border-input" type="text">
                </div>
                <button type="submit" class="btn  btn-round btn-just-icon btn-warning">
                <i class="ti-search"></i><div class="ripple-container"></div>
                </button>
            </div>


        </fieldset>

        {{Form::close()}}

        <div class="card">
            <div class="header">
                <h2>Cancelar Cita</h2>
                <h4 class="title">Citas</h4>
                <p class="category">Escoja la cita para cancelar</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">

                    <thead class="" style="background-color: #ec971f; font-size: 18px; color: white;">
                        <tr>
                            <td style="font-size: 15px">Numero cita</td>
                            <td style="font-size: 15px">Nombre Completo</td>
                            <td style="font-size: 15px">Documento</td>
                            <td style="font-size: 15px">Eps</td>
                            <td style="font-size: 15px">Fecha</td>
                            <td style="font-size: 15px">Hora</td>
                            <td style="font-size: 15px">Lugar</td>
                            <td style="font-size: 15px"></td>

                        </tr>              
                    </thead>
                    <tbody>
                        @foreach($pacientes as $p)
                        <tr>
                            <td>{{$p->idcita}}</td>    
                            <td>{{$p->nombre_1}}  {{$p->apellido_1}}</td>

                            <td>{{$p->documento}}</td>
                            <td>{{$p->eps}}</td>
                            <td>{{$p->fecha}}</td>
                            <td>{{$p->hora}}</td>
                            <td>{{$p->lugar}}</td>


                            <td><a id="modal-199169" href="#modal-container-199169" role="button" class="" data-toggle="modal">Cancelar</a></td>
                        </tr>
                        @ENDFOREACH

                        

                    </tbody>
                </table>
                <h3 style="font-size: 15px">{{$messege}}</h3> 
                
            </div>
             {{$pacientes->links()}}
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
                    <td>{{HTML::link("terapeuta/citacancela/$p->idcita","Aceptar",["class"=>"btn btn-primary"])}}</td>
                </div>
            </div>

        </div>

    </div>

</div>
@ENDFOREACH