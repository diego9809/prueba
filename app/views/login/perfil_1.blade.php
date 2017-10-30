@extends ('login.menu')

@section('contenido')
<div class="row">
    <div class="card" >
    <div class="col-lg-12">
        <h2 class="page-header">Informacion Personal</h2>
    </div>


<div class="row">
    <div class="col-lg-12">




        {{ Form::open(['class'=>'form-horizontal','enctype'=>'multipart/form-data'])}}

        <fieldset>
            

            
            <div  class="form-group" margin-top="100px">
                <label class="col-md-4 control-label" for="nombre_1">Usuario</label>  
                <div class="col-md-4">
                    {{Form::text('usuario',$user->username,[
                    'class'=>"form-control  border-input"
                   ])}}
                </div>
                <strong class="alert-danger" align="center">{{$errors->first('usuario')}}</strong>
                <strong class="danger" align="center"> {{Session::get('username_error') }} </strong>
            </div>

             

            <div class="form-group">
                <label class="col-md-4 control-label" for="eps">Eps</label>  
                <div class="col-md-4">
                    {{Form::select('Eps',[$paciente->eps=>$paciente->eps,"salud total" =>'salud total',"sanitas" =>'Sanitas',"compensar"=>'compensar',"coomeva"=>'coomeva',"otros"=>'otros'], null, ['class' => 'form-control  border-input'])}}
                </div>

            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="Aseguradora">Aseguradora</label>  
                <div class="col-md-4">
                    {{Form::select('Aseguradora',[$paciente->aseguradora => $paciente->aseguradora ,"allianz" =>'allianz',"colpatria" =>'colpatria',"equidad seguros"=>'equidad seguros',"seguros bolivar"=>'seguros bolivar',"otros"=>'otros'], null, ['class' => 'form-control  border-input'])}}            
                </div>
            </div>


            <div  class="form-group" margin-top="100px">
                <label class="col-md-4 control-label" for="Telefono">Telefono</label>  
                <div class="col-md-4">
                    {{Form::text('Telefono',$paciente->telefono,[
                    'class'=>"form-control  border-input"
                   ])}}
                </div>
                <strong class="alert-danger" align="center">{{Session::get('telefono_error') }}</strong>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="tipo_documento">tipo de documento</label>
                <div class="col-md-4">
                    @if($user->tipo == 1)
                    
                    {{Form::text('tipo_documento','Targeta de indentidad',[
                    'class'=>"form-control  border-input",
                            'readonly'=>"readonly" 
                   ])}}
                    
                    @elseif($user->tipo == 2)
                    
                    {{Form::text('tipo_documento','Cédula de ciudadania',[
                    'class'=>"form-control  border-input",
                            'readonly'=>"readonly" 
                    ])}}

                            
                    @elseif($user->tipo == 3)
                    
                    {{Form::text('tipo_documento','Registro civil',[
                    'class'=>"form-control  border-input",
                            'readonly'=>"readonly" 
                    ])}}
                    
                    @endif
                </div>
            </div>

            <div  class="form-group" margin-top="100px">
                <label class="col-md-4 control-label" for="documento">Documento</label>  
                <div class="col-md-4">
                    {{Form::text('documento',$user->documento,[
                    'class'=>"form-control  border-input",
                            'readonly'=>"readonly" 
                   ])}}
                </div>
                
            </div>
            
            <div class="form-group">
            <label class="col-md-4 control-label" for="filebutton">imagen perfil</label>
            <div class="col-md-4">
            {{Form::file('imagen_perfil',[
                    'class'=>"input-file"
                   ])}}
            </div>
            <label>{{$user->imagen_perfil}}</label>
            {{Form::hidden('imagen_perfil_antigua',
            $user->imagen_perfil,['class'=>"form-control border-input"])
                    }}
            <br>
            <strong class="alert-danger" align="center">{{Session::get('imagenperfil_error')}}</strong>
            </div>
            
            <div class="form-group">
            <label class="col-md-4 control-label" for="filebutton">imagen fondo</label>
            <div class="col-md-4">
            {{Form::file('imagen_fondo',[
                    'class'=>"input-file"
                   ])}}
            </div>
             <label>{{$user->imagen_fondo}}</label>
             {{Form::hidden('imagen_fondo_antigua',
             $user->imagen_fondo,['class'=>"form-control border-input"])}}
             <br>
             <strong class="alert-danger" align="center">{{Session::get('imagenfondo_error')}}</strong>
            </div>
            
            
            <div  class="form-group" margin-top="100px">
                <label class="col-md-4 control-label" for="Telefono">Correo</label>  
                <div class="col-md-4">
                 
                {{Form::text('correo',$user->correo,[
                    'class'=>"form-control  border-input"      
                   ])}}    
                    
                                     
                </div>
                <strong class="alert-danger" align="center">{{$errors->first('correo')}}</strong>
            </div>
            
            <div class="form-group">
              
                <label class="col-md-4 control-label" for=""></label>


                <div class="col-md-4" align="center">
                 <strong class="danger" align="center"> {{Session::get('mensajexito') }} </strong>
                 <br>
                 <br>
                    {{Form::submit('Modificar',[
  'class'=>"btn btn-primary"
  ]) }}

                </div>
            </div>
        </fieldset>            


        {{Form::close()}}

    </div>
</div>
</div>
</div>
@stop