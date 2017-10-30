<?php

class TerapeutaController extends BaseController {

    public function getHorarios() {
        $usu = usuario::find(Session::get('id'));
        $horariosterapeutas = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->where('horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->groupBy('horarios.idhorario')->paginate(10);
        $horariosterapeuta = DB::table('horarios')->join('horarios_has_fisioterapeuta', 'horarios.idhorario', '=', 'horarios_has_fisioterapeuta.horarios_idhorario')->where('horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->groupBy('horarios.idhorario')->get();


        if ($horariosterapeuta == null) {
            return View::make('horarios.vistahorarios')->with(array('horariocoordinador' => $horariosterapeutas, "usuario" => $usu, "messege" => "no se le ha asignado ningun horario"));
        } else {

            return View::make('horarios.vistahorarios')->with(array('horariocoordinador' => $horariosterapeutas, "usuario" => $usu, "messege" => ""));
        }
    }

    public function getVistahorarios($h) {

//$horarios = horarios::find($id)
//Envio cliente encontrado a la vista de actualizar
        $horarios = $h;
        $coorhorario = DB::table("horarios")->where("horarios.idhorario", '=', $h)->get();
        $jh_1 = TRUE;
        $jh_2 = TRUE;
        $jh_3 = TRUE;
        $jh_4 = TRUE;
        $jh_5 = TRUE;
        $jh_6 = TRUE;
        foreach ($coorhorario as $c) {

            switch ($c->hora_de_trabajo_inicio) {

                case'09:00:00':
                    $jh_1 = FALSE;
                    break;

                case'11:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    break;

                case'13:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    break;

                case'15:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    break;


                case'17:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;

                    break;

                case'19:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;
                    break;
            }
            switch ($c->hora_de_trabajo_fin) {

                case'17:00:00':
                    $jh_6 = FALSE;
                    break;

                case'15:00:00':

                    $jh_5 = FALSE;
                    $jh_6 = FALSE;
                    break;

                case'13:00:00':
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;
                    break;

                case'11:00:00':


                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;

                    break;


                case'9:00:00':


                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;

                    break;

                case'7:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;
                    break;
            }
        }


        $usu = usuario::find(Session::get('id'));
        return View::make('horarios.horarioinsert')->with(array("horario" => $horarios, "usuario" => $usu, "coorhorario" => $coorhorario, "jh_1" => $jh_1
                    , "jh_2" => $jh_2, "jh_3" => $jh_3, "jh_4" => $jh_4, "jh_5" => $jh_5, "jh_6" => $jh_6));
    }

    public function postVistahorarios($id) {

        if (Session::has('usuario')) {
            //si usted esta autenticado:    
            //Traer todos los clientes:
            // $termino = (!isset($_POST["termino"])) ? $_POST["termino"] : 0;



            $reglas = array(
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required', //requerido, se admiten espacios
                'franja_horaria' => 'required',
                'franja_horaria_descanso' => 'required'
            );

            $mensajes = array(
                'numeric' => "campo :attribute solo numeros",
                'required' => "Campo :attribute obligatorio",
                'alpha' => "Campo :attribute solo letras",
                'email' => "Formato de correo en el campo :attribute no valido",
                'max' => "Campo :attribute Ingrese maximo :20 caracteres",
                'min' => "Campo :attribute Ingrese minimo :8 caracteres",
                'same' => "Las claves no coinciden",
                'unique' => "la fecha ya asignada"
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

                $select = DB::table('horarios_has_fisioterapeuta')->where('horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('horarios_has_fisioterapeuta.fecha_fin', '>', $_POST['fecha_inicio'])->get();
                if ($select != null) {
                    return Redirect::back()->with('error', 'ya existe un horario asignado para la fecha');
                }
                $franja_horaria = Input::get('franja_horaria');
                foreach ($franja_horaria as $value) {

                    if ($value == $_POST['franja_horaria_descanso']) {
                        return Redirect::back()->with('descanso', 'la franja horaria no puede ser igual a la franja descanso');
                    } else {

                        $horarios = new horariosterapeuta();

                        $horarios->fecha_inicio = $_POST['fecha_inicio'];
                        $horarios->fecha_fin = $_POST['fecha_fin'];
                        $horarios->franja_horaria = $value;


                        $horarios->fisioterapeuta_usuario_idusuario = Session::get('id');
                        $horarios->horarios_idhorario = $_POST['idhorario'];
                        $horarios->franja_horaria_descanso = $_POST['franja_horaria_descanso'];


                        $horarios->save();
                    }
                }
                return Redirect::back()->with('mensajexito', 'Horario Registrado');
            }
        }
    }

    public function getHorariosvista() {
        $fecha = date('Y-m-d');
        $usu = usuario::find(Session::get('id'));
        $horariosterapeutas = DB::table('horarios_has_fisioterapeuta')->where('horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('horarios_has_fisioterapeuta.fecha_fin', '>=', $fecha)->paginate(10);
        $horariosterapeuta = DB::table('horarios_has_fisioterapeuta')->where('horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('horarios_has_fisioterapeuta.fecha_fin', '>=', $fecha)->get();
        if ($horariosterapeuta == null) {
            return View::make('horarios.horariosvista')->with(array('horarioterapeuta' => $horariosterapeutas, 'usuario' => $usu, 'messege' => 'no hay ningun horario creado'));
        } else {

            return View::make('horarios.horariosvista')->with(array('horarioterapeuta' => $horariosterapeutas, 'usuario' => $usu, 'messege' => ''));
        }
    }

    public function getModificarhorario() {

        $fecha = date('Y-m-d');
        $usu = usuario::find(Session::get('id'));
        $horariosterapeutas = DB::table('horarios_has_fisioterapeuta')->where('horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('horarios_has_fisioterapeuta.estado', '!=', 2)->where('horarios_has_fisioterapeuta.fecha_fin', '>=', $fecha)->paginate(10);
        $horariosterapeuta = DB::table('horarios_has_fisioterapeuta')->where('horarios_has_fisioterapeuta.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('horarios_has_fisioterapeuta.estado', '!=', 2)->get();


        foreach ($horariosterapeuta as $h) {

            if ($h->fecha_fin < $fecha) {

                DB::table('horarios_has_fisioterapeuta')
                        ->where('idhorariopersonal', $h->idhorariopersonal)->where('estado', 0)
                        ->update(['estado' => 2]);
            } else {
                
            }
        }

        if ($horariosterapeuta == null) {
            return View::make('horarios.horariosactualizar')->with(array('horarioterapeuta' => $horariosterapeutas, 'usuario' => $usu, 'messege' => 'no hay ningun horario creado'));
        } else {

            return View::make('horarios.horariosactualizar')->with(array('horarioterapeuta' => $horariosterapeutas, 'usuario' => $usu, 'messege' => ''));
        }
    }

    public function getModificarhorarios($id) {

        $horarios = horariosterapeuta::find($id);
        $usu = usuario::find(Session::get('id'));
        $hilo = DB::table("horarios_has_fisioterapeuta")->select('horarios_has_fisioterapeuta.horarios_idhorario')->where("horarios_has_fisioterapeuta.idhorariopersonal", '=', $id)->get();
        foreach ($hilo as $i) {
            $i->horarios_idhorario;
        }
        $coorhorario = DB::table("horarios")->where("horarios.idhorario", '=', $i->horarios_idhorario)->get();
        $jh_1 = TRUE;
        $jh_2 = TRUE;
        $jh_3 = TRUE;
        $jh_4 = TRUE;
        $jh_5 = TRUE;
        $jh_6 = TRUE;
        foreach ($coorhorario as $c) {

            switch ($c->hora_de_trabajo_inicio) {

                case'09:00:00':
                    $jh_1 = FALSE;
                    break;

                case'11:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    break;

                case'13:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    break;

                case'15:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    break;


                case'17:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;

                    break;

                case'19:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;
                    break;
            }
            switch ($c->hora_de_trabajo_fin) {

                case'17:00:00':
                    $jh_6 = FALSE;
                    break;

                case'15:00:00':

                    $jh_5 = FALSE;
                    $jh_6 = FALSE;
                    break;

                case'13:00:00':
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;
                    break;

                case'11:00:00':


                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;

                    break;


                case'9:00:00':


                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;

                    break;

                case'7:00:00':
                    $jh_1 = FALSE;
                    $jh_2 = FALSE;
                    $jh_3 = FALSE;
                    $jh_4 = FALSE;
                    $jh_5 = FALSE;
                    $jh_6 = FALSE;
                    break;
            }
        }
        return View::make('horarios.actualizarhorario', ["horario" => $horarios, 'usuario' => $usu, "coorhorario" => $coorhorario, "jh_1" => $jh_1
                    , "jh_2" => $jh_2, "jh_3" => $jh_3, "jh_4" => $jh_4, "jh_5" => $jh_5, "jh_6" => $jh_6]);
    }

    public function postModificarhorarios($id) {

        $reglas = array(
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required', //requerido, se admiten espacios
            'franja_horaria' => 'required',
            'franja_horaria_descanso' => 'required'
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

            $franja_horaria = Input::get('franja_horaria');
            if ($franja_horaria == $_POST['franja_horaria_descanso']) {
                return Redirect::back()->with('descanso', 'la franja horaria no puede ser igual a la franja descanso');
            } else {

                $horarios = horariosterapeuta::find($id);

                $horarios->fecha_inicio = $_POST['fecha_inicio'];
                $horarios->fecha_fin = $_POST['fecha_fin'];
                $horarios->franja_horaria = $_POST['franja_horaria'];
                $horarios->fisioterapeuta_usuario_idusuario = Session::get('id');
                $horarios->horarios_idhorario = $_POST['idhorario'];
                $horarios->franja_horaria_descanso = $_POST['franja_horaria_descanso'];


                $horarios->save();
                return Redirect::back()->with('mensajexito', 'Horario Registrado');
            }
        }
    }

    public function anyCancita() {

        //http://localhost:85/laravel/public/  customer/            insert
        //    ruta de aplicacion          ruta controlador    ruta accion
        //vamos a verificar si la variable de sesion existe:
        $fecha = date('Y-m-d');
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

                $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
                                ->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'cita.orden_idorden', '=', 'orden.idorden')
                                ->join('fisioterapeuta', 'cita.fisioterapeuta_usuario_idusuario', '=', 'fisioterapeuta.usuario_idusuario')->where('cita.estado', '!=', 2)->where('cita.estado', '!=', 1)->where('cita.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('cita.fecha', '>=', $fecha)->paginate(10);
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

                $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
                                ->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'cita.orden_idorden', '=', 'orden.idorden')->join('fisioterapeuta', 'cita.fisioterapeuta_usuario_idusuario', '=', 'fisioterapeuta.usuario_idusuario')
                                ->where('cita.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('usuario.documento', 'like', $_POST ["termino"] . '%')->where('cita.estado', '!=', 2)->where('cita.fecha', '>=', $fecha)->paginate(10);
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
            //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));

            $paciente = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
                            ->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'cita.orden_idorden', '=', 'orden.idorden')->join('fisioterapeuta', 'cita.fisioterapeuta_usuario_idusuario', '=', 'fisioterapeuta.usuario_idusuario')
                            ->where('cita.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('cita.estado', '!=', 2)->get();
            foreach ($paciente as $p) {

                if ($p->fecha < $fecha) {

                    DB::table('cita')
                            ->where('idcita', $p->idcita)->where('estado', 0)
                            ->update(['estado' => 2]);
                } else {
                    
                }
            }

            if ($paciente == null) {
                return View::make('cita.cancitaterapeuta')->with(array('pacientes' => $pacientes, 'usuario' => $usu, 'messege' => 'no hay ninguna cita para atender'));
            } else {

                return View::make('cita.cancitaterapeuta')->with(array('pacientes' => $pacientes, 'usuario' => $usu, 'messege' => ''));
            }
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }

    public function anyConcita() {

        //http://localhost:85/laravel/public/  customer/            insert
        //    ruta de aplicacion          ruta controlador    ruta accion
        //vamos a verificar si la variable de sesion existe:
        $fecha = date('Y-m-d');
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
                if (!isset($_POST["terminos"])) {
                    $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
                                    ->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'cita.orden_idorden', '=', 'orden.idorden')
                                    ->join('fisioterapeuta', 'cita.fisioterapeuta_usuario_idusuario', '=', 'fisioterapeuta.usuario_idusuario')->where('cita.estado', '!=', 2)->where('cita.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('cita.fecha', '>=', $fecha)->paginate(10);
                } else {
                    $cita = cita::find($_POST["idcita"]);

                    //actializo el cliente
                    $cita->estado = $_POST["terminos"];
                    $cita->save();
                    $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
                                    ->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'cita.orden_idorden', '=', 'orden.idorden')
                                    ->join('fisioterapeuta', 'cita.fisioterapeuta_usuario_idusuario', '=', 'fisioterapeuta.usuario_idusuario')->where('cita.estado', '!=', 2)->where('cita.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('cita.fecha', '>=', $fecha)->paginate(10);
                }
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

                $pacientes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
                                ->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'cita.orden_idorden', '=', 'orden.idorden')->join('fisioterapeuta', 'cita.fisioterapeuta_usuario_idusuario', '=', 'fisioterapeuta.usuario_idusuario')
                                ->where('cita.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('usuario.documento', 'like', $_POST ["termino"] . '%')->where('cita.estado', '!=', 2)->where('cita.fecha', '>=', $fecha)->paginate(10);
            }

            //llevar los datos a la vista:
//             $pacientes = DB::table('usuario')
//            ->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
//            ->select('usuario.nombre_1', 'usuario.documento', 'usuario.correo', 'usuario.estado', 'paciente.estrato','paciente.rh', 'paciente.usuario_idusuario','paciente.eps', 'paciente.telefono','paciente.aseguradora', 'usuario.apellido_1')
//            ->get();
            //Envio cliente encontrado a la vista de actualizar
            $usu = usuario::find(Session::get('id'));

            $paciente = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')
                            ->join('orden', 'orden.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->join('cita', 'cita.orden_idorden', '=', 'orden.idorden')->join('fisioterapeuta', 'cita.fisioterapeuta_usuario_idusuario', '=', 'fisioterapeuta.usuario_idusuario')
                            ->where('cita.fisioterapeuta_usuario_idusuario', '=', Session::get('id'))->where('cita.estado', '!=', 2)->get();
            foreach ($paciente as $p) {

                if ($p->fecha < $fecha) {

                    DB::table('cita')
                            ->where('idcita', $p->idcita)->where('estado', 0)
                            ->update(['estado' => 2]);
                } else {
                    
                }
            }

            if ($paciente == null) {
                return View::make('cita.concita')->with(array('pacientes' => $pacientes, 'usuario' => $usu, 'messege' => 'no hay ninguna cita para atender'));
            } else {

                return View::make('cita.concita')->with(array('pacientes' => $pacientes, 'usuario' => $usu, 'messege' => ''));
            }
        } else {

            //usted sera regresado al login:
            return Redirect::to('login/login');
        }
    }

    public function getCitacancela($id) {

        $cita = cita::find($id);

        //actializo el cliente
        $cita->estado = 2;
        $cita->save();
        //redirigirse a la ruta de la tabla cliente
        return Redirect::to('terapeuta/cancita');
    }

}
