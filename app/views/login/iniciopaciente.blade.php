@extends ('login.menu')

@section('contenido')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4"  >            
                <div class="card card-user" >
                    <div class="image">
                        @if($usuario->imagen_fondo == null )
                        {{HTML::image('img/fondo_0.png')}}
                        @elseif($usuario->imagen_fondo != null )
                        {{HTML::image('img/perfil/'.$usuario->imagen_fondo)}}
                        @endif

                    </div>
                    <div class="content" >
                        <div class="author">
                            @if($usuario->imagen_perfil == null )
                            <img class="avatar border-white" {{HTML::image('img/images.jpg')}}
                                 @elseif($usuario->imagen_perfil != null )
                                 <img class="avatar border-white" {{HTML::image('img/perfil/'.$usuario->imagen_perfil)}}
                                 @endif

                                 <h4 class="title">{{$usuario->nombre_1}}  {{$usuario->apellido_1}}<br />

                                <a href="#"><small>{{$usuario->correo}}</small></a>
                            </h4>
                        </div>
                        <p class="description text-center">
                            Rol: Paciente<br>
                            Usuario: {{$usuario->username}} <br>

                        </p>

                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-2">


                            </div>
                            <div class="col-md-8">
                                <br>
                                {{HTML::link("login/perfil/$usuario->idusuario/1", 'Editar perfil',["class"=>"btn btn-info"])}}

                            </div>
                            <div class="col-md-2">


                            </div>
                        </div>
                    </div>
                    <br>
                </div>

            </div>



            <div class="col-md-8">            
                <div class="card">
                    <div class="content">
                        <h3 style="text-align: center;"> Consulta tus solicitudes <b class="ti-search"></b> </h3> 
                    </div>

                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead class="" style="background-color: #0084ca; font-size: 18px; color: white;">
                                <tr>


                                    <td style="font-size:15px">Asunto</td>
                                    <td style="font-size:12px">Fecha de solicitud</td>
                                    <td style="font-size:12px;">Fecha de cita</td>
                                    <td style="font-size:15px">estado</td>
                                    
                                    <td style="font-size:15px">borrar</td>
                                    <td style="font-size:15px">visto</td>

                                </tr>              
                            </thead>
                            <tbody>
                                @foreach($solicitud as $p)
                                <tr>


                                    <td>{{$p->asunto}}</td>
                                    <td>{{$p->fecha_solicitud}}</td>
                                    <td>{{$p->fecha_cita}}</td>
                                    
                                    @if ( $p->estado === 2)
                                    <td>Rechazada</td>
                                    @elseif($p->estado === 1)
                                    <td>Visto</td>
                                    @elseif($p->estado === 4)
                                    <td>Agendada</td>
                                    @else
                                    <td>Sin leer </td> 
                                    @endif
                                    
                                    <td><a id="modal-199169" href="#modal-container-199169" role="button" class="glyphicon   glyphicon-trash" data-toggle="modal"></a></td>
                                    @if($p->estado_pa == 2)
                                    <td><b class="ti-flag"></b></td>
                                    @else
                                     <td>{{HTML::link("paciente/entsolicitud/$p->idsolicitud",'',["class"=>" btn btn-success ti-bell " ])}}</td>
                                    @endif 
                                </tr>
                                @ENDFOREACH
                            </tbody>
                        </table
                    </div>
                    {{$solicitud->links()}}
                </div>
            </div>
        </div>

        <div class="col-md-12"  >            
            <div class="card">
                <div class="content">
                    {{HTML::link("paciente/solicitud", ' Solicitar cita ',["class"=>"btn  ti-announcement" ,"style"=>" background-color: rgba(189, 189, 189, 0.62);    margin-left: 30%;"])}}

                    {{HTML::link("paciente/cita", ' Consultar citas ',["class"=>"btn  ti-search " ,"style"=>" background-color: rgba(189, 189, 189, 0.62);" ])}}

                    {{HTML::link("paciente/citacancelar", ' Cancelar cita ',["class"=>"btn  ti-close " ,"style"=>" background-color: rgba(189, 189, 189, 0.62);" ])}}

                </div>
            </div>

        </div>

    </div>
    <div class="row">


        <div class="col-lg-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="icon-big icon-warning text-center">
                                <img alt="Bootstrap Thumbnail First" style="width: 90%" {{HTML::image('img/img4.jpg')}}
                            </div>
                        </div>
                        <div class="col-xs-12">

                            <h5 style="text-align: center; color: #f8b133;">¿Cuanto cuesta una terapia?</h5>
                            <br>
                            <p style="text-align: justify;"> ven y solicita tu cita de manera gratuita y podras ser atendido por los mejores especialitas del pais </p>

                        </div>
                    </div>
                    <div class="footer">
                        <hr />

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="icon-big icon-warning text-center">
                                <img class="Rounded Raised" alt="Bootstrap Thumbnail First" style="width: 90%" {{HTML::image('img/imga.jpg')}}
                            </div>
                        </div>
                        <div class="col-xs-12">

                            <h5 style="text-align: center; color: #f8b133; ">Tenemos los mejores especialista</h5>
                            <br>
                            <p style="text-align: justify;"> ven y solicita tu cita de manera gratuita y podras ser atendido por los mejores especialitas del pais </p>

                        </div>
                    </div>
                    <div class="footer">
                        <hr />

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="icon-big icon-warning text-center">
                                <img alt="Bootstrap Thumbnail First" style="width: 90%" {{HTML::image('img/imga3.jpg')}}
                            </div>
                        </div>
                        <div class="col-xs-12">

                            <h5 style="text-align: center; color: #f8b133;" >Tecnologia de punta </h5>
                            <br>
                            <p style="text-align: justify;"> ven y solicita tu cita de manera gratuita y podras ser atendido por los mejores especialitas del pais </p>

                        </div>
                    </div>
                    <div class="footer">
                        <hr />

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>

@stop

@foreach($solicitud as $p)



<div class="modal fade btn-lg" id="modal-container-199169" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#f35e5e;">


                <h4 class="modal-title" id="myModalLabel" align='center'>
                    Advertencia
                </h4>
            </div>
            <div class="modal-body" align='center'>
                ¿ DESEA BORRAR LA SOLICITUD ?
            </div>
            <div class="modal-footer" align='center'>

                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancelar
                </button> 
                <td>{{HTML::link("paciente/borsolicitud/$p->idsolicitud","Aceptar",["class"=>"btn  btn-primary"])}}</td>
            </div>
        </div>

    </div>

</div>

</div>
@ENDFOREACH


