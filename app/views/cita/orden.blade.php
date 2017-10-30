<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
  {{HTML::style('styles/style/style.css')}}   
  {{HTML::style('styles/style/bootstrap.min.css')}}
  {{HTML::style('styles/style/bootstrap.css')}}   
  {{HTML::style('styles/style/datepicker.css')}} 
  {{ HTML::script('js/datepicker.js') }}
  {{ HTML::script('js/main.js') }}
  
  <script>
      $(document).ready(function () {

    $("#fecha").datepicker({
                            "dateFormat":"dd-mm-yyyy"
                        });
      });
  </script> 

        
    
</head>
  <body>

    <div class="container-fluid">
        <div  class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-3">
                    <img {{HTML::image('img/kinapsis.png')}}
		</div>
		<div class="col-md-7">
		</div>
		<div class="col-md-1">
		</div>
	</div>
        <div class="row">
		<div class="col-md-1">
		</div>
            <div class="col-md-10" >
			<nav class="navbar navbar-default" role="navigation" style="background-color: #0E509A">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                                        </button> <a class="navbar-brand" href="#" id="texto">inicio</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="">
							<a href="#" id="texto">cancelar cita</a>
						</li>
                                                <li>
							<a href="#" id="texto">registrar cita </a>
						</li>
                                                <li class="">
							<a href="#" id="texto">consultar agenda</a>
						</li>
                                                <li>
							<a href="#" id="texto">registrar paciente</a>
						</li>

                                              
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right" >
                                            
                                              <li>
                                                    <a id="textos" >{{Session::get('usuario')}}</a>  
						</li>
                                                <li>
                                                    <a id="textos" class="glyphicon glyphicon-user"></a> 
						</li>
						
						<li class="dropdown" id="texto">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong class="glyphicon glyphicon-cog" id="textos" ></strong></a>
							<ul class="dropdown-menu" id="texto">
								
								<li>
									<a href="#" id="texto">configuracion</a>
								</li>

								<li>
									 {{HTML::link('login/logout', 'Cerrar Sesion',["id"=>"texto"])}}
								</li>
							</ul>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
		<div class="col-md-1">
		</div>
	</div>
        
        <div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-1">
				</div>
                            <div class="col-md-2" style="white-space: 50%;">
					<nav class="navbar navbar-default sidebar" role="navigation" id="textoc">
    

    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1" >
        <ul class="nav navbar-nav" >
           <li> {{HTML::link('cita/registrarcita', 'Registrar cita',["id"=>"textoc"])}}</li>
          <li>  {{HTML::link('cita/registrarorden', 'Registrar orden',["id"=>"textoc"])}}</li>        
       
      </ul>
    </div>
  
</nav>
				</div>
				<div class="col-md-8">
                                    
{{ Form::open(['class'=>'form-horizontal'])}}
<fieldset>

 
<legend>orden </legend>





<div class="form-group">
  <label class="col-md-4 control-label" for="Id">Id</label>
  <div class="col-md-4">
    {{Form::select('Id', [$paciente->usuario_idusuario =>$paciente->usuario_idusuario], null, ['class' => 'form-control'])}}

  </div>
</div>



<div class="form-group">
    <label class="col-md-4 control-label" for="secciones">numero de secciones</label>  
  <div class="col-md-4">
      {{Form::number('secciones',
                  Input::old('nombre'), 
                  [' placeholder'=>"Ingrese el numero de secciones",
                    'class'=>"form-control input-md"
                   ])
      }}
<strong class="alert-danger" >{{$errors->first('nombre')}}</strong>
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="fecha_orden">fecha de orden</label>  
  <div class="col-md-4">
       {{Form::text('fecha_orden',
                  Input::old('nombre'), 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"datepicker"
                   ])
      }}
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="fecha_vencimiento">fecha de vencimiento</label>  
  <div class="col-md-4">
  {{Form::text('fecha_vencimiento',
                  Input::old('nombre'), 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"datepicker"
                   ])
      }}
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="fecha_ingreso">fecha de ingreso</label>  
  <div class="col-md-4">
  {{Form::text ('date',
                  Input::old('date'), 
                  [' placeholder'=>"DD-MM-YYYY",
                    'class'=>"datepicker"
                   ])
      }}
    
  </div>
  
</div>
    
    <div class="well">Fecha: <input class="datepicker-dropdown-menu" type="text" name="date"</div>
<div>
    
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
   {{Form::submit('Enviar',[
                    'class'=>"btn btn-primary"
                   ]) }}
  </div>
</div>

<input type="text" name="fecha" id="fecha">    

</fieldset>

{{ Form::close()  }}                                            



				</div>
				<div class="col-md-1">
				</div>
			</div>
		</div>
	</div>
        <br>
        <br>

</div>

<!--
      {{ HTML::script('js/jquery.min.js') }}
      {{ HTML::script('js/bootstrap.min.js') }}
      {{ HTML::script('js/scripts.js') }} -->
</body>
</html>

