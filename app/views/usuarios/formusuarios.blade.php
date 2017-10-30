<!--<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="shortcut icon" href="http://localhost/kinapsis/public/img/icon-2.png">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>coordinador registrar usuario</title>

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
                        <h1 class="page-header">Formulario De Registro Usuarios </h1>
                    </div>
                     /.col-lg-12 
                </div>
                <div class="row">
                    <div class="col-lg-10">
           {{ Form::open(['class'=>'form-horizontal'])}}
                    <fieldset>
                    
                        

                        <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                        <br>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="EPS">nombre 1</label>  
                            <div class="col-md-4">
                                {{Form::text('nombre_1',
                  Input::old('nombre_1'), 
                  [' placeholder'=>"ingrese nombre completo ",
                    'class'=>"form-control input-md"
                   ])
                                }}

                            </div>
                            <strong class="alert-danger" align="center">{{$errors->first('nombre_1')}}</strong>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="EPS">nombre 2</label>  
                            <div class="col-md-4">
                                {{Form::text('nombre_2',
                  Input::old('nombre_2'), 
                  [' placeholder'=>"ingrese nombre completo ",
                    'class'=>"form-control input-md"
                   ])
                                }}

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="EPS">apellido 1</label>  
                            <div class="col-md-4">
                                {{Form::text('apellido_1',
                  Input::old('apellido_1'), 
                  [' placeholder'=>"ingrese nombre completo ",
                    'class'=>"form-control input-md"
                   ])
                                }}

                            </div>
                            <strong class="alert-danger" align="center">{{$errors->first('apellido_1')}}</strong>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="EPS">apellido 2</label>  
                            <div class="col-md-4">
                                {{Form::text('apellido_2',
                  Input::old('apellido_2'), 
                  [' placeholder'=>"ingrese nombre completo ",
                    'class'=>"form-control input-md"
                   ])
                                }}

                            </div>

                        </div>
                         
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="tipo_documento">tipo de documento</label>
                            <div class="col-md-4">

                                {{Form::select('tipo_documento', [1 =>'Targeta de indentidad',2 =>'Cédula de ciudadania',3 =>'Registro civil'], null, ['class' => 'form-control'])}}
                               
                            </div>
                        </div>



                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="documento">documento</label>  
                            <div class="col-md-4">
                                {{Form::text('documento',
                  Input::old('documento'), 
                  [' placeholder'=>"ingrese su documento",
                    'class'=>"form-control input-md"
                   ])
                                }}

                            </div>
                            <strong class="alert-danger" align="center">{{$errors->first('documento')}}</strong>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="correo">correo</label>  
                            <div class="col-md-4">
                                {{Form::email('correo',
                  Input::old('correo'), 
                  [' placeholder'=>"ingrese su correo ",
                    'class'=>"form-control input-md"
                   ])
                                }}

                            </div>
                            <strong class="alert-danger" align="center">{{$errors->first('correo')}}</strong>
                        </div>
                       
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="usuario">usuario</label>  
                            <div class="col-md-4">
                                {{Form::text('usuario',
                  Input::old('usuario'), 
                  [' placeholder'=>"ingrese su usuario ",
                    'class'=>"form-control input-md"
                   ])
                                }}

                            </div>
                            <strong class="alert-danger" align="center">{{$errors->first('usuario')}}</strong>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="passwordinput">clave</label>
                            <div class="col-md-4">
                                <input id="passwordinput" name="clave" type="password" placeholder="ingrese contraseña" class="form-control input-md">

                            </div>
                            <strong class="alert-danger" align="center">{{$errors->first('clave')}}</strong>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="tipo_usuario">tipo de usuario </label>
                            <div class="col-md-4">

                                {{Form::select('tipo_usuario', [1 =>'paciente',2 =>'terapeuta',3 =>'secretaria',4 =>'coordinador'], null, ['class' => 'form-control'])}}
                                
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-4" align="center">
                                <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                                <br>
                                <br>
                            <label class="col-md-4 control-label" for=""></label>
                            <div class="col-md-4" align="center">
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
                 /.panel 


                {{ HTML::script('js/jquery.min.js') }}
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
    <div class="card" style="height: 100%;">
    <div class="col-lg-12">
        <h2 class="page-header">Formulario De Registro Usuarios </h2>
    </div>


<div class="row">
    <div class="col-lg-12">
        {{ Form::open(['class'=>'form-horizontal'])}}
        <fieldset>



            <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
            <br>
            <div class="form-group">
                <label class="col-md-4 control-label" for="EPS">Nombre 1</label>  
                <div class="col-md-4">
                    {{Form::text('nombre_1',
                  Input::old('nombre_1'), 
                  [' placeholder'=>"Ingrese nombre1",
                    'class'=>"form-control border-input"
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('nombre_1')}}</strong>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="EPS">Nombre 2</label>  
                <div class="col-md-4">
                    {{Form::text('nombre_2',
                  Input::old('nombre_2'), 
                  [' placeholder'=>"Ingrese nombre2",
                    'class'=>"form-control border-input"
                   ])
                    }}

                </div>

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="EPS">Apellido 1</label>  
                <div class="col-md-4">
                    {{Form::text('apellido_1',
                  Input::old('apellido_1'), 
                  [' placeholder'=>"Ingrese apellido1",
                    'class'=>"form-control border-input"
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('apellido_1')}}</strong>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="EPS">Apellido 2</label>  
                <div class="col-md-4">
                    {{Form::text('apellido_2',
                  Input::old('apellido_2'), 
                  [' placeholder'=>"Ingrese apellido2",
                    'class'=>"form-control border-input"
                   ])
                    }}

                </div>

            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="tipo_documento">Tipo de documento</label>
                <div class="col-md-4">

                    {{Form::select('tipo_documento', [1 =>'Targeta de identidad',2 =>'Cédula de ciudadania',3 =>'Registro civil'], null, ['class' => 'form-control border-input'])}}

                </div>
            </div>




            <div class="form-group">
                <label class="col-md-4 control-label" for="documento">Documento</label>  
                <div class="col-md-4">
                    {{Form::text('documento',
                  Input::old('documento'), 
                  [' placeholder'=>"Ingrese su documento",
                    'class'=>"form-control border-input"
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('documento')}}</strong>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="correo">Correo</label>  
                <div class="col-md-4">
                    {{Form::email('correo',
                  Input::old('correo'), 
                  [' placeholder'=>"Ingrese su e-mail",
                    'class'=>"form-control border-input"
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('correo')}}</strong>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="usuario">Usuario</label>  
                <div class="col-md-4">
                    {{Form::text('usuario',
                  Input::old('usuario'), 
                  [' placeholder'=>"Ingrese su usuario ",
                    'class'=>"form-control border-input"
                   ])
                    }}

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('usuario')}}</strong>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">Clave</label>
                <div class="col-md-4">
                    <input id="passwordinput" name="clave" type="password" placeholder="Ingrese contraseña" class="form-control border-input">

                </div>
                <strong class="alert-danger" align="center">{{$errors->first('clave')}}</strong>
            </div>


            <div class="form-group">
                <label class="col-md-4 control-label" for="tipo_usuario">Tipo de usuario </label>
                <div class="col-md-4">

                    {{Form::select('tipo_usuario', [1 =>'Paciente',2 =>'Terapeuta',3 =>'Secretaria',4 =>'Coordinador'], null, ['class' => 'form-control border-input'])}}

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for=""></label>
                <div class="col-md-4" align="center">
                    <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                    <br>
                    <br>
                    <label class="col-md-4 control-label" for=""></label>
                    <div class="col-md-4" align="center">
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
