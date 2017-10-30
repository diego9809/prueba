<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		{{HTML::style('styles/bootstrap/css/bootstrap.css')}}
                
                {{ HTML::script('styles/js/contraseña.js') }} 
               
	</head>
       
	<div   align="center">
		{{HTML::image('img/kinapsis.png')}}
	</div >

	<body>

		{{ Form::open(['class'=>'form-horizontal'])}}
		<fieldset>

			<!-- Form Name -->

			
			<br>
			<div class="form-group">
				<label class="col-md-4 control-label" for="EPS">primer nombre </label>  
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
				<label class="col-md-4 control-label" for="EPS">segundo nombre</label>  
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
				<label class="col-md-4 control-label" for="EPS">primer apellido</label>  
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
				<label class="col-md-4 control-label" for="EPS">segundo apellido</label>  
				<div class="col-md-4">
					{{Form::text('apellido_2',
                  Input::old('apellido_2'), 
                  [' placeholder'=>"ingrese nombre completo ",
                    'class'=>"form-control input-md"
                   ])
					}}

				</div>

			</div>
			<!-- Select Basic -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="tipo_documento">tipo de documento</label>
				<div class="col-md-4">

					{{Form::select('tipo_documento', [1 =>'Tarjeta de identidad',2 =>'Cédula de ciudadania',3 =>'Registro civil'], null, ['class' => 'form-control'])}}
			<!--    <select id="tipo_cita" name="tipo_cita" class="form-control">
						<option value="1">grupal</option>
						<option value="2">individual</option>
					</select>-->
				</div>
			</div>



			<!-- Text input-->
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

			<!-- Text input-->
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
			<!-- Text input-->
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
			<!--<div class="form-group">
				<label class="col-md-4 control-label" for="clave">clave</label>  
				<div class="col-md-6">
				{{Form::password('clave',
												Input::old('nombre'), 
												[' placeholder'=>"ingrese su clave ",
													'class'=>"form-control input-md"
												 ])
						}}
					
				</div>
			</div>-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="passwordinput">clave</label>
				<div class="col-md-4">
					<input id="claveActual" name="clave" type="password" placeholder="ingrese contraseña" class="form-control input-md" >
                                        
				</div>
				<strong class="alert-danger" align="center">{{$errors->first('clave')}}</strong>
                        </div>
                        
                

                        
                        <div class="form-group">
				<label class="col-md-4 control-label" for="passwordinput"> repita clave</label>
				<div class="col-md-4">
					<input id="claveActual" name="repita_clave" type="password" placeholder="ingrese contraseña" class="form-control input-md">
                                        
				</div>
				<strong class="alert-danger" align="center">{{$errors->first('repita_clave')}}</strong>
                        </div>


			<div class="form-group">
				<label class="col-md-4 control-label" for="Estrato">Estrato</label>
				<div class="col-md-4">
					{{Form::select('Estrato', [1 =>'1',2 =>'2',3 =>'3',4 =>'4',5 =>'5',6 =>'6',7 =>'7'], null, ['class' => 'form-control'])}}

				</div>

			</div>

			<div class="form-group">
				<label class="col-md-4 control-label" for="Estrato">rh</label>
				<div class="col-md-4">
					{{Form::select('rh', ['o+'=>'o+','o-'=>'o-','a+'=>'a+','a-'=>'a-','b+'=>'b+','b-'=>'b-','ab+'=>'ab+','ab-'=>'ab-'], null, ['class' => 'form-control'])}}

				</div>

			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="eps">eps</label>  
				<div class="col-md-4">
					
                     {{Form::select('eps', ["salud total" =>'salud total',"sanitas" =>'Sanitas',"compensar"=>'compensar',"coomeva"=>'coomeva',"otros"=>'otros'], null, ['class' => 'form-control'])}}
				</div>
				
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="Aseguradora">Aseguradora</label>  
				<div class="col-md-4">
					
					
                    {{Form::select('Aseguradora', ["allianz" =>'allianz',"colpatria" =>'colpatria',"equidad seguros"=>'equidad seguros',"seguros bolivar"=>'seguros bolivar',"otros"=>'otros'], null, ['class' => 'form-control'])}}            
				</div>
				
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="Telefono">Telefono</label>  
				<div class="col-md-4">
					{{Form::text('Telefono',
                  Input::old('telefono'), 
                  [' placeholder'=>"ingrese su telefono ",
                    'class'=>"form-control input-md"
                   ])
					}}

				</div>
				<strong class="alert-danger" align="center">{{$errors->first('Telefono')}}</strong>
			</div>
                        
                        

			<div class="form-group">

				<label class="col-md-4 control-label" for=""></label>
				<div class="col-md-4" align="center">
					<strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
					<br>
					<br>
					
					{{HTML::link('login/login', 'Atras',["class"=>"btn btn-danger"])}}
                                        {{Form::submit('Registrar',[
                    'class'=>"btn btn-primary"
                   ]) }}

				</div>
			</div>

		</fieldset>
		{{ Form::close()  }}

	</body>
</html>


