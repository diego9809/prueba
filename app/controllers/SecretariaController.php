<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SecretariaController
 *
 * @author Home
 */
class SecretariaController extends BaseController {
    

    
    public function anyVistahoraria() {

        //http://localhost:85/laravel/public/  customer/            insert
        //    ruta de aplicacion          ruta controlador    ruta accion
        //vamos a verificar si la variable de sesion existe:

        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
           // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;

            if (!isset($_POST["termino"])) {
                //si  recien entre, selecciono todos los clientes
//            $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->paginate(5);
            
            $horariocoordinador = DB::table('horarios') ->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->groupBy('horarios.idhorario')->paginate(10);
	//si queremos añadir una clausula where podemos hacer los siguiente
	//->where('usuarios.id', '=', '2'), eso cogeria los posts del usuario con id = 2
 
//	return View::make('home.index')->with(array('posts' => $posts, 'titulo' => 'Paginación con laravel'));
            
            
            }else{
                //di en buscar, por lo tanto se tiene que seleccionar
                //los clientes cuyo nombre coincida con el termino de busqueda
//            $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->where('nombre', '=', $_POST ["termino"])
//            ->paginate(5);
              
            $horariocoordinador = DB::table('horarios') ->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->groupBy('horarios.idhorario')->where('usuario.documento', 'like', $_POST ["termino"] . '%')->paginate(10);    
                
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
        //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));
            return View::make('horarios.vistahorariosecretaria', ["horariocoordinador" => $horariocoordinador,"usuario"=>$usu]); 
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }
    
    
    
    public function getVerhorario($id){
        
        $fecha = date('Y-m-d');
        $usu =usuario::find(Session::get('id'));
        $horariocoordinador = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->where('usuario.idusuario','=',"$id")->where('horarios_has_fisioterapeuta.fecha_fin', '>=', $fecha)->paginate(10);
        $horariocoordinado = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->where('usuario.idusuario','=',"$id")->where('horarios_has_fisioterapeuta.fecha_fin', '>=', $fecha)->get();
        $terapeuta =DB::table('usuario')->where('usuario.idusuario','=',"$id")->get();
        foreach ($terapeuta as $t ){
            $t->nombre_1;
            $t->apellido_1;
        }
        
        if ($horariocoordinado==NULL) {
            return View::make('horarios.verhorario', ["horariocoordinador" => $horariocoordinador,"usuario"=>$usu,"messege"=>"no tiene horarios creados","nombre"=>$t->nombre_1,"apellido"=>$t->apellido_1]);
        }
        else{
            return View::make('horarios.verhorario', ["horariocoordinador" => $horariocoordinador,"usuario"=>$usu,"messege"=>"","nombre"=>$t->nombre_1,"apellido"=>$t->apellido_1]);
        }
         
        
        
    }
    
    
    public function anyVistacita() {

        //http://localhost:85/laravel/public/  customer/            insert
        //    ruta de aplicacion          ruta controlador    ruta accion
        //vamos a verificar si la variable de sesion existe:

        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
           // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;

            if (!isset($_POST["termino"])) {
                //si  recien entre, selecciono todos los clientes
//            $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->paginate(5);
            
            $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->paginate(10);
	//si queremos añadir una clausula where podemos hacer los siguiente
	//->where('usuarios.id', '=', '2'), eso cogeria los posts del usuario con id = 2
 
//	return View::make('home.index')->with(array('posts' => $posts, 'titulo' => 'Paginación con laravel'));
            
            
            }else{
                //di en buscar, por lo tanto se tiene que seleccionar
                //los clientes cuyo nombre coincida con el termino de busqueda
//            $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->where('nombre', '=', $_POST ["termino"])
//            ->paginate(5);
              
            $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.documento', 'like', $_POST ["termino"] . '%')->paginate(10);    
                
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
        //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));
             return View::make('cita.vercita')->with(array('pacientes' => $pacientes,'usuario'=>$usu));
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }
    
    
    public function getCita ($id) {
     
    $usu = usuario::find(Session::get('id'));    
    $terapeutas = DB::table('usuario') ->join('fisioterapeuta', 'usuario.idusuario', '=', 'fisioterapeuta.usuario_idusuario')->join('especialidad', 'fisioterapeuta.especialidad_idespecialidad', '=', 'especialidad.idespecialidad')->paginate(10); 
    $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'orden.idorden', '=', 'cita.orden_idorden')->where("usuario.idusuario","=","$id")->where("cita.estado","!=",2)->paginate(10);    
    $paciente = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'orden.idorden', '=', 'cita.orden_idorden')->where("usuario.idusuario","=","$id")->where("cita.estado","!=",2)->get();    
    
    if ($paciente == NULL) {
       
         return View::make('cita.citasecretaria')->with(array('pacientes' => $pacientes , 'terapeutas' => $terapeutas,'usuario'=>$usu,"messege"=>"no hay citas para cancelar")); 
    }
    else{
        
         return View::make('cita.citasecretaria')->with(array('pacientes' => $pacientes , 'terapeutas' => $terapeutas,'usuario'=>$usu,"messege"=>"")); 
    }
    }
    
    public function getCitacancelar ($id) {
        
     $cita = cita::find($id);    

        //actializo el cliente
        $cita->estado=2;        
        $cita->save();
        //redirigirse a la ruta de la tabla cliente
        return Redirect::to('secretaria/vistacita');
    }
    
    public function getCansolicitud ($id) {
       
     
  $solicitud = solicitud::find($id);    
 
        //actializo el cliente
        $solicitud->estado=2;       
        $solicitud->save();
        //redirigirse a la ruta de la tabla cliente
        return Redirect::to('paciente/consolitu');
    }
    
    public function getVersolicitud ($id) {
       
     
  $solicitud = solicitud::find($id);    
 
        //actializo el cliente
        $solicitud->estado=1;       
        $solicitud->save();
        //redirigirse a la ruta de la tabla cliente
        return Redirect::to('paciente/consolitu');
    }
    
    
    public function getElisolicitud ($id) {
       
     
  $solicitud = solicitud::find($id);    
 
        //actializo el cliente
        $solicitud->estado=3;       
        $solicitud->save();
        //redirigirse a la ruta de la tabla cliente
        return Redirect::to('paciente/consolitu');
    }
}
