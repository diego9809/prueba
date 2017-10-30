@extends ('login.menu_ter')

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
                        <label class="col-md-4 control-label" for="tipo_documento">tipo de documento</label>
                        <div class="col-md-4">
                            @if($user->tipo == 1)
                            {{Form::select('tipo_documento', [1 =>'Targeta de indentidad'], null, ['class' => 'form-control  border-input' ,
                            'readonly'=>"readonly"])}}
                            @elseif($user->tipo == 2)
                            {{Form::select('tipo_documento', [2 =>'Cédula de ciudadania'], null, ['class' => 'form-control  border-input' ,
                            'readonly'=>"readonly"])}}
                            @elseif($user->tipo == 3)
                            {{Form::select('tipo_documento', [3 =>'Registro civil'], null, ['class' => 'form-control  border-input' ,
                            'readonly'=>"readonly" ])}}
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
                        <strong class="alert-danger" align="center">{{$errors->first('documento')}}</strong>
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