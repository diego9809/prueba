<!DOCTYPE html>


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

<!--    <link href="styles/style/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style/style.css" rel="stylesheet">-->

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
				
				
				
				
			</nav>
		</div>

	</div>
        <br>
	<div class="row">
            <div class="col-md-2">
		</div>
		<div class="col-md-8">
		{{ Form::open(['class'=>'form-horizontal'])}}
		<fieldset>

			<div class="form-group">
				<label class="col-md-4 control-label" for="correo">correo</label>  
				<div class="col-md-4">
					{{Form::email('correo',
                  Input::old('correo'), 
                  [' placeholder'=>"ingrese su correo ",
                    'class'=>"form-control input-md"
                   ])
					}}
                                <strong class="alert-danger" align="center" >{{$errors->first('correo')}}</strong>
                                

                                <span class="help-block" style="align:center">ingrese el correo con el cual se registro en el sistema </span>
				</div>
                                
                                
				  
			</div>

			<div class="form-group">

				<label class="col-md-4 control-label" for=""></label>
				<div class="col-md-4" align="center">
					<strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
					<br>
					<br>
					
					{{HTML::link('login/login', 'Atras',["class"=>"btn btn-danger"])}}
                                        {{Form::submit('Enviar',[
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
        
	
</div>
      {{ HTML::script('js/jquery.min.js') }}
      {{ HTML::script('js/bootstrap.min.js') }}
      {{ HTML::script('js/scripts.js') }} 
</body>
