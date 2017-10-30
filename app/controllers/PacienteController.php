<?php


class PacienteController extends BaseController {
  
//     public function getConsultar() {
//        //buscar el cliente con el id de parametro:
//        $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora')
//            ->get();
//        //Envio cliente encontrado a la vista de actualizar
//        return View::make('paciente.consulta', ["pacientes" => $pacientes]);
//    }
   
    public function anyIndex() {

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
             return View::make('paciente.consulta')->with(array('pacientes' => $pacientes,'usuario'=>$usu));
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }
    
    
    
      public function getActualizar($id) {
        //buscar el cliente con el id de parametro:
        $paciente = paciente::find($id);
        $usuario = usuario::find($id);
        $usu = usuario::find(Session::get('id'));
        //Envio cliente encontrado a la vista de actualizar
        return View::make('paciente.modificar', ["paciente" => $paciente,"user"=>$usuario,"usuario"=>$usu]);
    }

    public function postActualizar($id) {
        //buscar el cliente
        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
           // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;
            


        $reglas = array(
            'nombre_1'=>'required|alpha',
            'Telefono'=>'required',
            'documento'=>'required|numeric|max:99999999999999999999|min:10000000',
            'apellido_1'=>'required|alpha'
        );
        
        $mensajes = array(
            'numeric'=>"campo :attribute solo numeros",
            'required'=>"Campo :attribute obligatorio",
            'alpha'=>"Campo :attribute solo letras",
            'email'=>"Formato de correo en el campo :attribute no valido",
            'max'=>"Campo :attribute Ingrese maximo :20 caracteres",
            'min'=>"Campo :attribute Ingrese minimo :8 caracteres",
            'same'=>"Las claves no coinciden",
            'unique'=>"El usuario ya existe"
        );
        
        //2. Crear el objeto de validacion
        // parametros: a. Los datos a validar (viene del arreglo)
        //             b. Las reglas de validacion a aplicar
        //              sobre esos campos
        $validador = Validator::make($_POST,$reglas, $mensajes);
        
        //3. validar los datos con las reglas
        
        if($validador->fails()){
            //si la validacion fallo
            //withErrors= lleva mensajes de validacion
            //withInput= lleva los datos del formulario devuelta a sus respectivos lugares
            return Redirect::back()->withErrors($validador)->withInput();
        }
        else{
        
        $paciente = paciente::find($id);    

        //actializo el cliente
        $paciente->estrato= $_POST["Estrato"];        
        $paciente->eps= $_POST["Eps"];
        $paciente->aseguradora= $_POST["Aseguradora"];
        $paciente->telefono= $_POST["Telefono"];
        //Guardar cambios
        $paciente->save();
        
        $usuario = usuario::find($id);
        $usuario->nombre_1=$_POST["nombre_1"];
        $usuario->apellido_1=$_POST["apellido_1"];
        $usuario->documento=$_POST["documento"];
        $usuario->estado=$_POST["estado"];
        $usuario->save();
        //redirigirse a la ruta de la tabla cliente
        return Redirect::back()->with('mensajexito','Paciente Modificado');
//        echo "usuario actualizado";
    }//put your code here
    }
    }
    public function getRegistro() {
        
        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
            // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;
        $usu = usuario::find(Session::get('id'));     
        return View::make('paciente.registrar')->with("usuario",$usu);    
            
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
        
    }
    
    public function postRegistro() {
        
        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
           // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;
            


        $reglas = array(
            'nombre_1'=>'required|alpha',
             'tipo_documento'=>'required', //requerido, se admiten espacios
            'correo'=>'required|email',// requerido formato email
            'usuario'=>'required|max:30|unique:usuario,username',//requerido, max 10,
            'clave'=>'required|min:6', //requerido, max10
            'documento'=>'required|numeric|unique:usuario,documento|max:99999999999999999999|min:10000000',
            'rh'=>'required|max:3',
            
           
            'telefono'=>'required|Numeric',
            'apellido_1'=>'required|alpha'
        );
        
        $mensajes = array(
            'numeric'=>"campo :attribute solo numeros",
            'required'=>"Campo :attribute obligatorio",
            'alpha'=>"Campo :attribute solo letras",
            'email'=>"Formato de correo en el campo :attribute no valido",
            'max'=>"Campo :attribute Ingrese maximo :20 caracteres",
            'min'=>"Campo :attribute Ingrese minimo :8 caracteres",
            'same'=>"Las claves no coinciden",
            'unique'=>"El usuario ya existe"
        );
        
        //2. Crear el objeto de validacion
        // parametros: a. Los datos a validar (viene del arreglo)
        //             b. Las reglas de validacion a aplicar
        //              sobre esos campos
        $validador = Validator::make($_POST,$reglas, $mensajes);
        
        //3. validar los datos con las reglas
        
        if($validador->fails()){
            //si la validacion fallo
            //withErrors= lleva mensajes de validacion
            //withInput= lleva los datos del formulario devuelta a sus respectivos lugares
            return Redirect::back()->withErrors($validador)->withInput();
        }
        else{
        
        $usuario = new usuario();
        
        
        $usuario->rol_idrol=1;
        $usuario->nombre_1=$_POST["nombre_1"];
        $usuario->apellido_1=$_POST["apellido_1"];
        $usuario->nombre_2=$_POST["nombre_2"];
        $usuario->apellido_2=$_POST["apellido_2"];
        $usuario->estado="activo";
        $usuario->tipo=$_POST["tipo_documento"];
        $usuario->documento =$_POST["documento"];
        $usuario->correo=$_POST["correo"];
        $usuario->username=$_POST["usuario"];
        $usuario->password=Hash::make($_POST["clave"]);
        //$validador = Validator::make($_POST,$reglas,$mensajes);
        $usuario->save();
        
        $user= usuario::all();
        $id=$user->last()->idusuario;
        
        $paciente = new paciente();
        
        $paciente->usuario_idusuario=$id;
        $paciente->estrato=$_POST['Estrato'];
        $paciente->rh=$_POST['rh'];
        $paciente->eps=$_POST['eps'];
        $paciente->aseguradora=$_POST['aseguradora'];
        $paciente->telefono=$_POST['telefono'];
        
        $paciente->save();
      
         
        return Redirect::back()->with('mensajexito','Usuario registrado') ;
        
    }
    
            
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
        
    }
    
    public function getSolicitud() {
        
       
            //si usted esta autenticado:    
            //Traer todos los clientes:
            // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;
        $usu = usuario::find(Session::get('id'));
        $numsolicitudes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->count(); 
            $solicitudescon = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->get();
        return View::make('paciente.registrarsolicitud')->with(array('usuario' => $usu,'numero'=>$numsolicitudes,'lleno'=>$solicitudescon ));
            
      
        
         
        
    }
    
    public function postSolicitud() {
       
        
       $reglas = array(
				'asunto' => 'required',
				'descripcion' => 'required', //requerido, se admiten espacios
				'fecha_cita' => 'required'
		);

		$mensajes = array(
				'numeric' => "campo :attribute solo numeros",
				'required' => "Campo :attribute obligatorio",
				'alpha' => "Campo :attribute solo letras",
				'email' => "Formato de correo en el campo :attribute no valido",
				'max' => "Campo :attribute Ingrese maximo :20 caracteres",
				'min' => "Campo :attribute Ingrese minimo :8 caracteres",
				'same' => "Las claves no coinciden",
				'unique' => "El usuario ya existe"
		);

		//2. Crear el objeto de validacion
		// parametros: a. Los datos a validar (viene del arreglo)
		//             b. Las reglas de validacion a aplicar
		//              sobre esos campos
		$validador = Validator::make($_POST, $reglas, $mensajes);

		//3. validar los datos con las reglas

		if ($validador->fails()) {
			//si la validacion fallo
			//withErrors= lleva mensajes de validacion
			//withInput= lleva los datos del formulario devuelta a sus respectivos lugares
			return Redirect::back()->withErrors($validador)->withInput();
		} else { 
       
       $solicitud = new solicitud();
       
       $solicitud->fecha_solicitud = $_POST["fecha_solicitud"];
       $solicitud->fecha_cita = $_POST["fecha_cita"];
       $solicitud->asunto= $_POST["asunto"];
       $solicitud->descripcion= $_POST["descripcion"];
       $solicitud->paciente_usuario_idusuario = $_POST["idpaciente"];
       
       $solicitud->save();
       
       return Redirect::back()->with('mensajexito','Solicitud enviada') ;
       
//        echo  Session::get('id');
        
    }
    }
        public function anyConsolitu() {

        //http://localhost:85/laravel/public/  customer/            insert
        //    ruta de aplicacion          ruta controlador    ruta accion
        //vamos a verificar si la variable de sesion existe:
        $fecha = date('Y-m-d');
        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
           // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;
            $mensaje="";
            if (@$_POST["opcionbusqueda"]!= null and @$_POST["termino"]!=null ) {
                //si  recien entre, selecciono todos los clientes
//            $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->paginate(5);
              switch (@$_POST['opcionbusqueda']) {
                case 'documento':
                    $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.documento', 'like', $_POST ["termino"] . '%')->where('solicitud.estado', '!=',3)->paginate(10);    
                    $paciente = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.documento', 'like', $_POST ["termino"] . '%')->where('solicitud.estado', '!=',3)->get();    
                    if ($paciente==null) {
                      $mensaje="no hay pacientes con el documento ".$_POST ["termino"];  
                    }
                    break;
                case 'nombre':
                    $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.nombre_1', 'like', $_POST ["termino"] . '%')->where('solicitud.estado', '!=',3)->paginate(10);    
                    $paciente = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.nombre_1', 'like', $_POST ["termino"] . '%')->where('solicitud.estado', '!=',3)->get();    
                    if ($paciente==null) {
                      $mensaje="no hay pacientes con el nombre ".$_POST ["termino"];  
                    }
                    break;
                case 'apellido':
                    $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.apellido_1', 'like', $_POST ["termino"] . '%')->where('solicitud.estado', '!=',3)->paginate(10);    
                    $paciente = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.apellido_1', 'like', $_POST ["termino"] . '%')->where('solicitud.estado', '!=',3)->get();    
                    if ($paciente==null) {
                      $mensaje="no hay pacientes con el apellido ".$_POST ["termino"];  
                    }
                    break;
                case 'asunto':
                    $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.asunto', 'like', $_POST ["termino"] . '%')->where('solicitud.estado', '!=',3)->paginate(10);    
                $paciente = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.asunto', 'like', $_POST ["termino"] . '%')->where('solicitud.estado', '!=',3)->get();    
                    if ($paciente==null) {
                      $mensaje="no hay solicitudes con ese asunto ".$_POST ["termino"];  
                    }
                    break;
            }
           
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
              $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado', '!=',3)->where('solicitud.fecha_cita', '>',$fecha)->paginate(10); 
              
                
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
        //Envio cliente encontrado a la vista de actualizar
             $usu = usuario::find(Session::get('id'));
             return View::make('paciente.consultasolicitud')->with(array('pacientes' => $pacientes,'usuario' => $usu ,"men"=>$mensaje));
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }
    
     public function getMostrarsolicitud($id,$idpaciente) {
        //buscar el cliente con el id de parametro:
        $usu = usuario::find(Session::get('id')); 
        $solicitud = solicitud::find($id);
        $paciente = $idpaciente;
        //Envio cliente encontrado a la vista de actualizar
        return View::make('paciente.mostrarsolicitud')->with(array("solicitud" =>  $solicitud,'usuario' => $usu,"paciente"=>$paciente));
    }
    
    public function getCita () {
    $fecha = date('Y-m-d');
    $numsolicitudes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->count(); 
    $solicitudescon = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->get();
    $usu = usuario::find(Session::get('id'));    
    $terapeutas = DB::table('usuario') ->join('fisioterapeuta', 'usuario.idusuario', '=', 'fisioterapeuta.usuario_idusuario')->join('especialidad', 'fisioterapeuta.especialidad_idespecialidad', '=', 'especialidad.idespecialidad')->get(); 
    $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'orden.idorden', '=', 'cita.orden_idorden')->where("usuario.idusuario","=",Session::get('id'))->paginate(10);
    $paciente = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'orden.idorden', '=', 'cita.orden_idorden')->where("usuario.idusuario","=",Session::get('id'))->get();
    $fecha = date('Y-m-d');
    foreach ($paciente as $p) {
        
        if ($p->fecha < $fecha) {
            
            DB::table('cita')
            ->where('idcita',$p->idcita)->where('estado',0)
            ->update(['estado' => 2]);
            
        }
        else{
           
        }
        
    }
    
    if ($paciente==null) {
      return View::make('cita.citapaciente')->with(array('pacientes' => $pacientes , 'terapeutas' => $terapeutas,'usuario'=>$usu ,'messege'=>'no hay ninguna cita registrada','numero'=>$numsolicitudes,'lleno'=>$solicitudescon)); 
    }
 else {
        
    }
       return View::make('cita.citapaciente')->with(array('pacientes' => $pacientes , 'terapeutas' => $terapeutas,'usuario'=>$usu ,'messege'=>'','numero'=>$numsolicitudes,'lleno'=>$solicitudescon)); 
    }
    
   
    
      
    
    
    public function getCitacancelar () {
    $fecha = date('Y-m-d');
    $numsolicitudes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->count(); 
    $solicitudescon = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->get();
    $usu = usuario::find(Session::get('id'));
    $terapeutas = DB::table('usuario') ->join('fisioterapeuta', 'usuario.idusuario', '=', 'fisioterapeuta.usuario_idusuario')->join('especialidad', 'fisioterapeuta.especialidad_idespecialidad', '=', 'especialidad.idespecialidad')->get();  
    $pacientes = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'orden.idorden', '=', 'cita.orden_idorden')->where("usuario.idusuario","=",Session::get('id'))->where("cita.estado","!=",2)->where("cita.estado","!=",1)->where("cita.fecha",">=",$fecha)->paginate(10);    
    $paciente = DB::table('usuario') ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'orden.idorden', '=', 'cita.orden_idorden')->where("usuario.idusuario","=",Session::get('id'))->where("cita.estado","!=",2)->where("cita.estado","!=",1)->get();    

    foreach ($paciente as $p) {
        
        if ($p->fecha < $fecha) {
            
            DB::table('cita')
            ->where('idcita',$p->idcita)->where('estado',0)
            ->update(['estado' => 2]);
            
        }
        else{
           
        }
        
    }
    
    if ($paciente == null) {
     return View::make('cita.citapacientecancelar')->with(array('pacientes' => $pacientes , 'terapeutas' => $terapeutas , 'usuario' => $usu ,'messege'=>'no hay ninguna cita para cancelar','numero'=>$numsolicitudes,'lleno'=>$solicitudescon));    
    }
 else {
        
     return View::make('cita.citapacientecancelar')->with(array('pacientes' => $pacientes , 'terapeutas' => $terapeutas , 'usuario' => $usu,'messege'=>'','numero'=>$numsolicitudes,'lleno'=>$solicitudescon ));    
    }
      
    }
    
    public function getCitacancela ($id) {
        
        $cita = cita::find($id);    

        //actializo el cliente
        $cita->estado=2;        
        $cita->save();
        //redirigirse a la ruta de la tabla cliente
        return Redirect::to('paciente/cita');
    }
    
    public function getBorsolicitud ($id) {
        
        $solicitud = solicitud::find($id);    

        //actializo el cliente
        $solicitud->estado_pa=1;        
        $solicitud->save();
        
        //redirigirse a la ruta de la tabla cliente
        return Redirect::to('sessiones/insert');
    }
    
    public function getEntsolicitud ($id) {
        
        $solicitud = solicitud::find($id);    

        //actializo el cliente
        $solicitud->estado_pa=2;        
        $solicitud->save();
        
        //redirigirse a la ruta de la tabla cliente
        return Redirect::to('sessiones/insert');
    }
  
    
}
