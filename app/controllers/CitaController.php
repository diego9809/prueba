<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CitaController
 *
 * @author APRENDIZ
 */
class CitaController extends BaseController {

    public function getInsert() {
        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
            // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;
            $usu = usuario::find(Session::get('id'));
            return View::make('cita.ingresar')->with(["usuario" => $usu]);
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }

    public function postInsert() {

        $cita = new cita();
        $cita->idcita = 1;
        $cita->orden_idorden = 1;
        $cita->fisioterapeuta_usuario_idusuario = 2;
        $cita->tipo_de_cita = $_POST['tipo_cita'];
        $cita->fecha = $_POST['fecha'];
        $cita->hora = $_POST['hora'];
        $cita->lugar = $_POST['lugar'];
        $cita->save();
        echo " cita ingresada ";
    }

    public function getRegistrarcita($id, $horario, $idterapeuta) {

        if (Session::has('usuario')) {

            $fisioterapeuta = $id;
            $usu = usuario::find(Session::get('id'));
            $pacientes = DB::table('usuario')->join('fisioterapeuta', 'usuario.idusuario', '=', 'fisioterapeuta.usuario_idusuario')->where('usuario.idusuario', '=', $idterapeuta)->get();
            $horarios = DB::table('horarios_has_fisioterapeuta')->where('horarios_has_fisioterapeuta.idhorariopersonal', '=', $horario)->get();
            $jh_1 = false;
            $jh_2 = false;
            $jh_3 = false;
            $jh_4 = false;
            $jh_5 = false;
            $jh_11 = false;
            $jh_21 = false;
            $jh_31 = false;
            $jh_41 = false;
            $jh_51 = false;
            $jh_6 = false;
            foreach ($horarios as $h) {
                $h->franja_horaria;
            }
            switch ($h->franja_horaria) {
                case '7am-8am' :
                    $jh_1 = TRUE;
                    break;
                case '8am-9am' :
                    $jh_11 = TRUE;
                    break;
                case '9am-10am' :
                    $jh_2 = TRUE;
                    break;
                case '10am-11am' :
                    $jh_21 = TRUE;
                    break;
                case '11am-12am' :
                    $jh_3 = TRUE;
                    break;
                case '12am-1pm' :
                    $jh_31 = TRUE;
                    break;
                case '1pm-2pm' :
                    $jh_4 = TRUE;
                    break;
                case '2pm-3pm' :
                    $jh_41 = TRUE;
                    break;
                case '3pm-4pm' :
                    $jh_5 = TRUE;
                    break;
                case '4pm-5pm' :
                    $jh_51 = TRUE;
                    break;
                case '5pm-6pm' :
                    $jh_6 = TRUE;
                    break;
            }
            return View::make('cita/registrocita')->with(array('pacientes' => $pacientes, 'usuario' => $usu, 'idorden' =>
                        $id, 'idterapeuta' => $idterapeuta, "jh_1" => $jh_1, "jh_2" => $jh_2, "jh_3" => $jh_3, "jh_4" => $jh_4, "jh_5" => $jh_5, "jh_6" => $jh_6
                        , "jh_11" => $jh_11, "jh_21" => $jh_21, "jh_31" => $jh_31, "jh_41" => $jh_41, "jh_51" => $jh_51, "horarios" => $horarios));
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }

    public function postRegistrarcita($id, $horario, $idterapeuta) {

        $reglas = array(
            'fecha' => 'required',
            'lugar' => 'required',
            'hora' => 'required'
//requerido, se admiten espacios
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
            $horarios = DB::table('horarios_has_fisioterapeuta')
                            ->where('horarios_has_fisioterapeuta.idhorariopersonal', '=', $horario)->get();
            
            $fechas = DB::table('cita')->where('cita.fecha','=',$_POST['fecha'])->where('cita.hora','=',$_POST['hora'])->get();
            if($fechas != null ){
            return Redirect::back()->with('error', 'la fecha no y la hora no estan disponibles');    
            }
            foreach ($horarios as $h) {

                if ($_POST['fecha'] > $h->fecha_fin) {

                    return Redirect::back()->with('error', 'la fecha debe ser menor al '.$h->fecha_fin);
                } elseif ($_POST['fecha'] < $h->fecha_inicio) {
                    return Redirect::back()->with('error', 'la fecha debe ser mayor al '.$h->fecha_inicio);
                }
            }
               
            $cita = new cita();

            $cita->orden_idorden = $_POST['idorden'];
            $cita->fisioterapeuta_usuario_idusuario = $_POST['idterapeuta'];
            $cita->tipo_de_cita = $_POST['tipo_cita'];
            $cita->fecha = $_POST['fecha'];
            $cita->hora = $_POST['hora'];
            $cita->lugar = $_POST['lugar'];
            $cita->save();
            return Redirect::back()->with('mensajexito', 'Cita registrada');
        }
    }
    
    public function getRegistrarcitasol($id, $horario, $idterapeuta ,$idsol,$idpa) {

        if (Session::has('usuario')) {

            $fisioterapeuta = $id;
            $solitud = DB::table('solicitud')->where('solicitud.idsolicitud',"=",$idsol)->get();  
            $usu = usuario::find(Session::get('id'));
            $pacientes = DB::table('usuario')->join('fisioterapeuta', 'usuario.idusuario', '=', 'fisioterapeuta.usuario_idusuario')->where('usuario.idusuario', '=', $idterapeuta)->get();
            $horarios = DB::table('horarios_has_fisioterapeuta')->where('horarios_has_fisioterapeuta.idhorariopersonal', '=', $horario)->get();
            $jh_1 = false;
            $jh_2 = false;
            $jh_3 = false;
            $jh_4 = false;
            $jh_5 = false;
            $jh_11 = false;
            $jh_21 = false;
            $jh_31 = false;
            $jh_41 = false;
            $jh_51 = false;
            $jh_6 = false;
            foreach ($horarios as $h) {
                $h->franja_horaria;
            }
            switch ($h->franja_horaria) {
                case '7am-8am' :
                    $jh_1 = TRUE;
                    break;
                case '8am-9am' :
                    $jh_11 = TRUE;
                    break;
                case '9am-10am' :
                    $jh_2 = TRUE;
                    break;
                case '10am-11am' :
                    $jh_21 = TRUE;
                    break;
                case '11am-12am' :
                    $jh_3 = TRUE;
                    break;
                case '12am-1pm' :
                    $jh_31 = TRUE;
                    break;
                case '1pm-2pm' :
                    $jh_4 = TRUE;
                    break;
                case '2pm-3pm' :
                    $jh_41 = TRUE;
                    break;
                case '3pm-4pm' :
                    $jh_5 = TRUE;
                    break;
                case '4pm-5pm' :
                    $jh_51 = TRUE;
                    break;
                case '5pm-6pm' :
                    $jh_6 = TRUE;
                    break;
            }
            return View::make('cita/registrocitasol')->with(array('pacientes' => $pacientes, 'usuario' => $usu, 'idorden' =>
                        $id , 'idterapeuta' => $idterapeuta,"idsol"=>$idsol,"idpa"=>$idpa, "jh_1" => $jh_1, "jh_2" => $jh_2, "jh_3" => $jh_3, "jh_4" => $jh_4, "jh_5" => $jh_5, "jh_6" => $jh_6
                        , "jh_11" => $jh_11, "jh_21" => $jh_21, "jh_31" => $jh_31, "jh_41" => $jh_41, "jh_51" => $jh_51, "horarios" => $horarios ,"fecha"=>$solitud));
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }

    public function postRegistrarcitasol($id, $horario, $idterapeuta ,$idsol) {

        $reglas = array(
            'fecha' => 'required',
            'lugar' => 'required',
            'hora' => 'required'
//requerido, se admiten espacios
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
            $horarios = DB::table('horarios_has_fisioterapeuta')
                            ->where('horarios_has_fisioterapeuta.idhorariopersonal', '=', $horario)->get();
            
            $fechas = DB::table('cita')->where('cita.fecha','=',$_POST['fecha'])->where('cita.hora','=',$_POST['hora'])->get();
            if($fechas != null ){
            return Redirect::back()->with('error', 'la fecha no y la hora no estan disponibles');    
            }
            foreach ($horarios as $h) {

                if ($_POST['fecha'] > $h->fecha_fin) {

                    return Redirect::back()->with('error', 'la fecha debe ser menor al '.$h->fecha_fin);
                } elseif ($_POST['fecha'] < $h->fecha_inicio) {
                    return Redirect::back()->with('error', 'la fecha debe ser mayor al '.$h->fecha_inicio);
                }
            }
               
            $cita = new cita();

            $cita->orden_idorden = $_POST['idorden'];
            $cita->fisioterapeuta_usuario_idusuario = $_POST['idterapeuta'];
            $cita->tipo_de_cita = $_POST['tipo_cita'];
            $cita->fecha = $_POST['fecha'];
            $cita->hora = $_POST['hora'];
            $cita->lugar = $_POST['lugar'];
            $cita->save();
            
            $solicitude = solicitud::find($idsol);
            $solicitude->estado=4;
            $solicitude->save();
            
            return Redirect::back()->with('mensajexito', 'Cita registrada');
        }
    }

    
    
    public function anyOrden() {

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

                $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->paginate(10);
                //si queremos añadir una clausula where podemos hacer los siguiente
                //->where('usuarios.id', '=', '2'), eso cogeria los posts del usuario con id = 2
//	return View::make('home.index')->with(array('posts' => $posts, 'titulo' => 'Paginación con laravel'));
            } else {
                //di en buscar, por lo tanto se tiene que seleccionar
                //los clientes cuyo nombre coincida con el termino de busqueda
//            $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->where('nombre', '=', $_POST ["termino"])
//            ->paginate(5);

                $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.nombre_1', '=', $_POST ["termino"])->paginate(10);
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
            //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));
            return View::make('cita/registrorden')->with(array('pacientes' => $pacientes, 'usuario' => $usu));
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }

    public function anyCita() {

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

                $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->paginate(10);
                //si queremos añadir una clausula where podemos hacer los siguiente
                //->where('usuarios.id', '=', '2'), eso cogeria los posts del usuario con id = 2
//	return View::make('home.index')->with(array('posts' => $posts, 'titulo' => 'Paginación con laravel'));
            } else {
                //di en buscar, por lo tanto se tiene que seleccionar
                //los clientes cuyo nombre coincida con el termino de busqueda
//            $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->where('nombre', '=', $_POST ["termino"])
//            ->paginate(5);

                $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.nombre_1', '=', $_POST ["termino"])->paginate(10);
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
            //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));
            return View::make('cita/cita')->with(array('pacientes' => $pacientes, "usuario" => $usu));
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }
    
    public function getSolcita($id,$idorden) {

        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
            // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;

            $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->where('usuario.idusuario', '=',$id)->get();
            //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));
            return View::make('cita.solcita', ["paciente" => $pacientes, "usuario" => $usu,"idorden"=>$idorden]);
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }

    public function getRegistrarorden($id) {

        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
            // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;

            $paciente = paciente::find($id);
            //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));
            return View::make('cita.ajax', ["paciente" => $paciente, "usuario" => $usu]);
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }

    public function postRegistrarorden() {


        $reglas = array(
            'fecha_orden' => 'required',
            'fecha_vencimiento' => 'required', //requerido, se admiten espacios
            'fecha_ingreso' => 'required'
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

            $orden = new orden();
            $orden->paciente_usuario_idusuario = $_POST['Id'];
            $orden->secciones = $_POST['secciones'];
            $orden->fecha_de_orden = $_POST['fecha_orden'];
            $orden->fecha_de_vencimiento = $_POST['fecha_vencimiento'];
            $orden->fecha_de_ingreso = $_POST['fecha_ingreso'];
            $orden->save();


            return Redirect::back()->with('mensajexito', 'Orden registrada');
        }
    }

    public function getOrdenes($id) {


        $usu = usuario::find(Session::get('id'));
        $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('paciente.usuario_idusuario', '=', $id)->paginate(10);
        $paciente = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('paciente.usuario_idusuario', '=', $id)->get();

        if ($paciente != null) {

            foreach ($pacientes as $p) {

                $orden = $p->idorden;
            }

            $citas = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'cita.orden_idorden', '=', 'orden.idorden')->where('orden.idorden', '=', $orden)->where('cita.estado', '<=', 2)->count("cita.idcita");



            return View::make('cita.ordenes', ["pacientes" => $pacientes, "usuario" => $usu, "citas" => $citas, "messege" => ""]);
        } else {
            return View::make('cita.ordenes', ["pacientes" => $pacientes, "usuario" => $usu, "messege" => "no hay ordenes registradas "]);
        }
    }

    
        public function getOrdenesol($id,$idorden) {


        $usu = usuario::find(Session::get('id'));
        $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('paciente.usuario_idusuario', '=', $id)->paginate(10);
        $paciente = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('paciente.usuario_idusuario', '=', $id)->get();

        if ($paciente != null) {

            foreach ($pacientes as $p) {

                $orden = $p->idorden;
            }

            $citas = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'cita.orden_idorden', '=', 'orden.idorden')->where('orden.idorden', '=', $orden)->where('cita.estado', '<=', 2)->count("cita.idcita");



            return View::make('cita.ordenesol', ["pacientes" => $pacientes, "usuario" => $usu, "citas" => $citas, "messege" => "","id"=>$id,"idorden"=>$idorden]);
        } else {
            return View::make('cita.ordenesol', ["pacientes" => $pacientes, "usuario" => $usu, "messege" => "no hay ordenes registradas ","id"=>$id,"idorden"=>$idorden]);
        }
    }
    
    
    
    public function anySelecterapeuta($idorden) {

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

                $horariocoordinador = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->groupBy('horarios.idhorario')->paginate(10);
                //si queremos añadir una clausula where podemos hacer los siguiente
                //->where('usuarios.id', '=', '2'), eso cogeria los posts del usuario con id = 2
//	return View::make('home.index')->with(array('posts' => $posts, 'titulo' => 'Paginación con laravel'));
            } else {
                //di en buscar, por lo tanto se tiene que seleccionar
                //los clientes cuyo nombre coincida con el termino de busqueda
//            $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->where('nombre', '=', $_POST ["termino"])
//            ->paginate(5);

                $horariocoordinador = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->groupBy('horarios.idhorario')->where('usuario.documento', 'like', $_POST ["termino"] . '%')->paginate(10);
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
            //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));
            return View::make('cita.selectera', ["horariocoordinador" => $horariocoordinador, "usuario" => $usu, "idorden" => $idorden]);
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }
    
    
        public function anySelecterapeutasol($idorden,$id,$idsol) {

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

                $horariocoordinador = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->groupBy('horarios.idhorario')->paginate(10);
                //si queremos añadir una clausula where podemos hacer los siguiente
                //->where('usuarios.id', '=', '2'), eso cogeria los posts del usuario con id = 2
//	return View::make('home.index')->with(array('posts' => $posts, 'titulo' => 'Paginación con laravel'));
            } else {
                //di en buscar, por lo tanto se tiene que seleccionar
                //los clientes cuyo nombre coincida con el termino de busqueda
//            $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->where('nombre', '=', $_POST ["termino"])
//            ->paginate(5);

                $horariocoordinador = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->groupBy('horarios.idhorario')->where('usuario.documento', 'like', $_POST ["termino"] . '%')->paginate(10);
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
            //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));
            return View::make('cita.selecterasol', ["horariocoordinador" => $horariocoordinador, "usuario" => $usu, "idorden" => $idorden,"id"=>$id,"idsol"=>$idsol]);
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }
    
    
    
    
    
    public function getVerhorariocita($id, $idorden) {

        $fecha = date('Y-m-d');
        $usu = usuario::find(Session::get('id'));
        $horariocoordinador = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->where('usuario.idusuario', '=', "$id")->where('horarios_has_fisioterapeuta.fecha_fin', '>=', $fecha)->paginate(10);
        $horariocoordinado = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->where('usuario.idusuario', '=', "$id")->where('horarios_has_fisioterapeuta.fecha_fin', '>=', $fecha)->get();
        $terapeuta = DB::table('usuario')->where('usuario.idusuario', '=', "$id")->get();
        foreach ($terapeuta as $t) {
            $t->nombre_1;
            $t->apellido_1;
        }
        

        if ($horariocoordinado == NULL) {
            return View::make('cita.verhorariocita', ["horariocoordinador" => $horariocoordinador, "usuario" => $usu, "messege" => "no tiene horarios creados", "nombre" => $t->nombre_1, "apellido" => $t->apellido_1, "idorden" => $idorden, "idterapeuta" => $id]);
        } else {
            return View::make('cita.verhorariocita', ["horariocoordinador" => $horariocoordinador, "usuario" => $usu, "messege" => "", "nombre" => $t->nombre_1, "apellido" => $t->apellido_1, "idorden" => $idorden, "idterapeuta" => $id]);
        }
    }
    
    public function getVerhorariocitasol($id, $idorden,$idpa,$idsol) {

        $fecha = date('Y-m-d');
        $usu = usuario::find(Session::get('id'));
        $horariocoordinador = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->where('usuario.idusuario', '=', "$id")->where('horarios_has_fisioterapeuta.fecha_fin', '>=', $fecha)->paginate(10);
        $horariocoordinado = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->join('fisioterapeuta', 'fisioterapeuta.usuario_idusuario', '=', 'horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario')->join('usuario', 'fisioterapeuta.usuario_idusuario', '=', 'usuario.idusuario')->where('usuario.idusuario', '=', "$id")->where('horarios_has_fisioterapeuta.fecha_fin', '>=', $fecha)->get();
        $terapeuta = DB::table('usuario')->where('usuario.idusuario', '=', "$id")->get();
        foreach ($terapeuta as $t) {
            $t->nombre_1;
            $t->apellido_1;
            
        }
        

        if ($horariocoordinado == NULL) {
            return View::make('cita.verhorariocitasol', ["horariocoordinador" => $horariocoordinador, "usuario" => $usu, "messege" => "no tiene horarios creados", "nombre" => $t->nombre_1, "apellido" => $t->apellido_1, "idorden" => $idorden, "idterapeuta" => $id,"idpa"=>$idpa,"idsol"=>$idsol]);
        } else {
            return View::make('cita.verhorariocitasol', ["horariocoordinador" => $horariocoordinador, "usuario" => $usu, "messege" => "", "nombre" =>$t->nombre_1, "apellido" => $t->apellido_1, "idorden" => $idorden, "idterapeuta" => $id,"idpa"=>$idpa,"idsol"=>$idsol]);
        }
    }
    
    
    
    
    

}



