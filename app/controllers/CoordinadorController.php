<?php

class CoordinadorController extends BaseController {

    public function getIndex() {
        $usu = usuario::find(Session::get('id'));
        return View::make('usuarios.formusuarios')->with(["usuario"=>$usu]);
                
  
    }

    public function postIndex() {

        $reglas = array(
            'nombre_1' => 'required|alpha',
            'tipo_documento' => 'required', //requerido, se admiten espacios
            'correo' => 'required|email', // requerido formato email
            'usuario' => 'required|max:30|unique:usuario,username', //requerido, max 10,
            'clave' => 'required|min:6', //requerido, max10
            'documento' => 'required|numeric|unique:usuario,documento|max:99999999999999999999|min:10000000',
            'apellido_1' => 'required|alpha'
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

            $usuario = new usuario();


            $usuario->rol_idrol = $_POST["tipo_usuario"];
            $usuario->nombre_1 = $_POST["nombre_1"];
            $usuario->apellido_1 = $_POST["apellido_1"];
            $usuario->nombre_2 = $_POST["nombre_2"];
            $usuario->apellido_2 = $_POST["apellido_2"];
            $usuario->estado = "activo";
            $usuario->tipo = $_POST["tipo_documento"];
            $usuario->documento = $_POST["documento"];
            $usuario->correo = $_POST["correo"];
            $usuario->username = $_POST["usuario"];
            $usuario->password = Hash::make($_POST["clave"]);
            //$validador = Validator::make($_POST,$reglas,$mensajes);
            $usuario->save();
            
           

            switch ($_POST["tipo_usuario"]) {
                case 1:
                    return Redirect::to('coordinador/repaciente');
                    break;
                case 2:
                    return Redirect::to('coordinador/reterapeuta');
                    break;
                case 3:
                    return Redirect::back()->with('mensajexito', 'Usuario registrado');
                    break;
                case 4:
                    return Redirect::back()->with('mensajexito', 'Usuario registrado');
                    break;
            }

//        $paciente = new paciente();
//        
//        $paciente->usuario_idusuario=$id;
//        $paciente->estrato=$_POST['Estrato'];
//        $paciente->rh=$_POST['rh'];
//        $paciente->eps=$_POST['eps'];
//        $paciente->aseguradora=$_POST['aseguradora'];
//        $paciente->telefono=$_POST['telefono'];
//        
//        $paciente->save();



            return Redirect::back()->with('mensajexito', 'Usuario registrado');
        }
    }

    public function getRepaciente() {
        $usu = usuario::find(Session::get('id'));
        return View::make('usuarios.formpaciente')->with(["usuario"=>$usu]);
    }

    public function postRepaciente() {
        
        $reglas = array(

            'rh'=>'required|max:3',
            'eps'=>'required',
            'Aseguradora'=>'required',
            'Telefono'=>'required|Numeric',
           
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
        
        

        $user = usuario::all();
        $id = $user->last()->idusuario;

        $paciente = new paciente();

        $paciente->usuario_idusuario = $id;
        $paciente->estrato = $_POST['Estrato'];
        $paciente->rh = $_POST['rh'];
        $paciente->eps = $_POST['eps'];
        $paciente->aseguradora= $_POST["Aseguradora"];
        $paciente->telefono= $_POST["Telefono"];
       
     

        $paciente->save();
        
         return Redirect::back()->with('mensajexito', 'Paciente Registrado');
    }
    }            
    
    
    public function getReterapeuta() {
        
        $usu = usuario::find(Session::get('id'));
        return View::make('usuarios.formterapeuta')->with(["usuario"=>$usu]);
    }

    public function postReterapeuta() {
        
        $user = usuario::all();
        $id = $user->last()->idusuario;

        $teraperuta = new teraperuta();

        $teraperuta->usuario_idusuario = $id;
        $teraperuta->especialidad_idespecialidad= $_POST['especialidad'];
        $teraperuta->matricula= $_POST['matricula'];
        
        $teraperuta->save();
        
        return Redirect::back()->with('mensajexito', 'Teraperuta Registrado');
        
    }
    
     public function anyHorario() {

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
            
            $terapeutas = DB::table('usuario') ->join('fisioterapeuta', 'usuario.idusuario', '=', 'fisioterapeuta.usuario_idusuario')->join('especialidad', 'fisioterapeuta.especialidad_idespecialidad', '=', 'especialidad.idespecialidad')->paginate(10);
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
              
            $terapeutas = DB::table('usuario') ->join('fisioterapeuta', 'usuario.idusuario', '=', 'fisioterapeuta.usuario_idusuario')->join('especialidad', 'fisioterapeuta.especialidad_idespecialidad', '=', 'especialidad.idespecialidad')->where('usuario.documento', 'like', $_POST ["termino"] . '%')->paginate(10);    
                
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
        //Envio cliente encontrado a la vista de actualizar
             $usu = usuario::find(Session::get('id'));
             return View::make('horarios.horariosterapeuta')->with(array('terapeuta' => $terapeutas,"usuario"=>$usu));
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }
    
    
    public function getFormhorario($id){
        
        $terapeuta = teraperuta::find($id);
        $usu = usuario::find(Session::get('id'));
       
        
        return View::make('horarios.formhorarioscordinador',["terapeuta" => $terapeuta,"usuario"=>$usu]); 
        
        
    }
    
    public function postFormhorario($id){
        
        $reglas = array(

            'hora_inicio'=>'required',
            'hora_fin'=>'required'

           
        );
        
        $mensajes = array(
       
            'required'=>"Campo :attribute obligatorio"

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
        
        if ($_POST["hora_inicio"]>$_POST["hora_fin"]) {
           return Redirect::back()->with("error","la hora fin no puede ser menor a la inicial")->withInput(); 
        }
        
        else{
        $horario = new horarios();
        
        $horario->hora_de_trabajo_inicio=$_POST["hora_inicio"];
        $horario->hora_de_trabajo_fin=$_POST["hora_fin"];
        $horario->save();
        
        
	$horarios = horarios::all();
        $idhorarios = $horarios->last()->idhorario;
        
        $terapeutahorarios = new horariosterapeuta();
        
        $terapeutahorarios->horarios_idhorario=$idhorarios;
        $terapeutahorarios->fisioterapeuta_usuario_idusuario=$_POST["idterapeuta"];
        $terapeutahorarios->save();
          return Redirect::back()->with('mensajexito', 'Horario Registrado'); 
        }

        }
        
        
        
    }
    
  
    
    
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
            return View::make('horarios.vistahorarioscoordinador', ["horariocoordinador" => $horariocoordinador,"usuario"=>$usu]);
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }
    
        public function anyModhoraria() {

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
            return View::make('horarios.horariosmodificar', ["horariocoordinador" => $horariocoordinador,"usuario"=>$usu]);
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }

    
    public function getHorariomodificar($id,$idterapeuta){
        
        $horario = horarios::find($id);
        $usu = usuario::find(Session::get('id'));
        $terapeuta = usuario::find($idterapeuta);  
        //Envio cliente encontrado a la vista de actualizar
        return View::make('horarios.horariosmodificarh', ["horario" => $horario,"terapeuta" => $terapeuta,"usuario"=>$usu]); 
        
        
    }
    
    public function postHorariomodificar($id){
        
        $reglas = array(

            'hora_inicio'=>'required',
            'hora_fin'=>'required'

           
        );
        
        $mensajes = array(
      
            'required'=>"Campo :attribute obligatorio"

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
        
        if ($_POST["hora_inicio"]>$_POST["hora_fin"]) {
           return Redirect::back()->with(["error"=>"la hora fin no puede ser menor a la inicial"]); 
        }
        else{
        
        $horario = horarios::find($id);
        $horario->hora_de_trabajo_inicio=$_POST["hora_inicio"];
        $horario->hora_de_trabajo_fin=$_POST["hora_fin"];
        $horario->save();   
        return Redirect::back()->with('mensajexito', 'Horario Actualizado');
    }
    }
    }
}
