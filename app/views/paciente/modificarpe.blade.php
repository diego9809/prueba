<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
  {{HTML::style('styles/bootstrap/css/bootstrap.css')}}
  {{HTML::style('styles/style/style.css')}}   
  {{HTML::style('styles/style/bootstrap.min.css')}} 

<!--    <link href="styles/style/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style/style.css" rel="stylesheet">-->

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
							<a href="#" id="texto">crear agenda</a>
						</li>
                                                <li>
							<a href="#" id="texto">modificar agenda</a>
						</li>
                                                <li class="">
							<a href="#" id="texto">consultar agenda</a>
						</li>
                                                <li>
							<a href="#" id="texto">crear usuarios</a>
						</li>
                                                <li>
							<a href="#" id="texto">modificar paciente</a>
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
        <br>
	<div class="row">
            <div class="col-md-2">
		</div>
		<div class="col-md-8">
                    
                  <h1>Actualizar cliente</h1>
        

       {{ Form::open(['class'=>'form-horizontal'])}}
        
  <fieldset>
            
  <legend> Modificar Informacion Del Paciente  </legend>     
        
  <div  class="form-group" margin-top="100px">
  <label class="col-md-4 control-label" for="Nombre">Nombre</label>  
  <div class="col-md-4">
  {{Form::text('Nombre',$usuario->nombre,[
                    'class'=>"form-control input-md"
                   ])}}
  </div> 
  </div> 
        
  <div  class="form-group" margin-top="100px">
  <label class="col-md-4 control-label" for="Documento">Documento</label>  
  <div class="col-md-4">
  {{Form::text('Documento',$usuario->documento,[
                    'class'=>"form-control input-md"
                   ])}}
  </div> 
  </div> 
      
         
  <div  class="form-group" margin-top="100px">
  <label class="col-md-4 control-label" for="Correo">Correo</label>  
  <div class="col-md-4">
  {{Form::text('Correo',$usuario->Correo,[
                    'class'=>"form-control input-md"
                   ])}}
  </div> 
  </div>       
       
<!--<div class="form-group">
  <label class="col-md-4 control-label" for="Estado">Estado</label>
  <div class="col-md-4">
    {{Form::select('Estado',$usuario->estado,['activo'=>'activo','inactivo'=>'inactivo'], null, ['class' => 'form-control'])}}

  </div>
</div>-->

  
  <div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
   {{Form::submit('Modificar',[
                    'class'=>"btn btn-primary"
                   ]) }}
  </div>
</div>
  </fieldset>            
       

        {{Form::close()}}

		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>
      {{ HTML::script('js/jquery.min.js') }}
      {{ HTML::script('js/bootstrap.min.js') }}
      {{ HTML::script('js/scripts.js') }} 
</body>
</html>

