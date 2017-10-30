<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        {{HTML::style('styles/bootstrap/css/bootstrap.css')}}
    </head>
    <body>
        
{{ Form::open(['class'=>'form-horizontal'])}}
<fieldset>

<!-- Form Name -->
<legend>orden </legend>

<!-- Text input-->
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

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fecha_orden">fecha de orden</label>  
  <div class="col-md-4">
  {{Form::text('fecha_orden',
                  Input::old('nombre'), 
                  [' placeholder'=>"YYY-MM-DD",
                    'class'=>"form-control input-md"
                   ])
      }}
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fecha_vencimiento">fecha de vencimiento</label>  
  <div class="col-md-4">
  {{Form::text('fecha_vencimiento',
                  Input::old('nombre'), 
                  [' placeholder'=>"YYY-MM-DD",
                    'class'=>"form-control input-md"
                   ])
      }}
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fecha_ingreso">fecha de ingreso</label>  
  <div class="col-md-4">
  {{Form::text('fecha_ingreso',
                  Input::old('nombre'), 
                  [' placeholder'=>"YYY-MM-DD",
                    'class'=>"form-control input-md"
                   ])
      }}
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
   {{Form::submit('Enviar',[
                    'class'=>"btn btn-primary"
                   ]) }}
  </div>
</div>

</fieldset>

{{ Form::close()  }}
        
    </body>
</html>
