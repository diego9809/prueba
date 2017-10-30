<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoginController
 *
 * @author cristianbuitrago
 */
class LoginController extends BaseController {

    public function getLogin() {

        return View::make('login.login');
    }

    public function postLogin() {

//        var_dump($_POST);

        $datos = array(
            "username" => $_POST["usuario"],
            "password" => $_POST["clave"]
        );


        if (Auth::attempt($datos)) {
            //capturar el rol del usuario:
            $usuario = Auth::User();
            //Crear variable de sesion con el rol del usuario
            Session::put('rol', $usuario->rol_idrol);
            Session::put('id', $usuario->idusuario);
            //redirigir a horarios/insert
            Session::put('usuario', $usuario->username);
            
            return Redirect::to('sessiones/insert');

            
        } else {
//            return View::make('login.iniciocordinador');

            $r = Session::get('intentos') + 1;
            Session::put('intentos', $r);

            if (Session::get('intentos') >= 3) {
                Session::put('intentos', 0);
                return Redirect::back()->with('mensajerror', 'usuario o contraseña incorrecta')->with('mensajesalida', 'Recuperar contraseña');
            } else {
                return Redirect::back()->with('mensajerror', 'usuario o contraseña incorrecta');
            }
        }
    }

    public function getInsertar() {

        return View::make('login.insertar');
    }

    public function postInsertar() {


        $reglas = array(
            'nombre_1' => 'required|alpha',
            'tipo_documento' => 'required', //requerido, se admiten espacios
            'correo' => 'required|email', // requerido formato email
            'usuario' => 'required|max:30|unique:usuario,username', //requerido, max 10,
            'clave' => 'required|min:6',
            'repita_clave' => 'required|same:clave', //requerido, max10
            'documento' => 'required|numeric|unique:usuario,documento|max:99999999999999999999|min:10000000',
            'apellido_1' => 'required|alpha',
            'rh' => 'required|max:3',
            'Telefono' => 'required|Numeric',
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


            $usuario->rol_idrol = 1;
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



            $user = usuario::all();
            $id = $user->last()->idusuario;

            $paciente = new paciente();

            $paciente->usuario_idusuario = $id;
            $paciente->estrato = $_POST['Estrato'];
            $paciente->rh = $_POST['rh'];
            $paciente->eps = $_POST['eps'];
            $paciente->aseguradora = $_POST["Aseguradora"];
            $paciente->telefono = $_POST["Telefono"];

            $paciente->save();

            return Redirect::back()->with('mensajexito', 'Usuario registrado');
        }
    }

    public function getLogout() {

        //Destruit las vatriables de sesion:

        Session::forget('usuario');

        //Cerrar Sesion
        Auth::logout();

        //redirigir a login

        return Redirect::to('login/login');
    }

    public function getRecuperar() {

        return View::make('login.recuperar');
    }

    public function postRecuperar() {


        $reglas = array(
            //requerido, se admiten espacios
            'correo' => 'required|email|exists:usuario' // requerido formato email
        );

        $mensajes = array(
            "exists" => "El email seleccionado no se encuentra registrado",
            'required' => "Campo :attribute obligatorio",
            'email' => "Formato de correo en el campo :attribute no valido"
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


            $foremail = 'kinapsisproyecto@gmail.com';
            $forname = 'kinapsis';
            $correo = $_POST["correo"];
            $pacientes = DB::table('usuario')->where("usuario.correo", "=", $_POST["correo"])->get();
            foreach ($pacientes as $p) {
                $id = $p->idusuario;
                $nombre = $p->nombre_1;
                $apellido = $p->apellido_1;
                $codigo = $p->password;
                $usuario = $p->username;
                $documento = $p->documento;
            }
            $codigo_1 = rand(0, 9);
            $codigo_2 = rand(0, 9);
            $codigo_3 = rand(0, 9);
            $codigo_4 = rand(0, 9);
            $codig = "$codigo_1$codigo_2$codigo_3$codigo_4";
            $codigo = md5($codig);
            echo $codig;
            Mail::send('login.correo', $paci = ["codigo" => $codigo, "nombre" => $nombre, "apellido" => $apellido, "usuario" => $usuario, "documento" => $documento, "id" => $id, "codigo" => $codig], function($message)use($forname, $foremail, $correo, $nombre) {
                $message->from($foremail, $forname);
                $message->to($correo, $nombre);
                $message->subject('Recuperar Contraseña');
            });
            return Redirect::to('login/contrasena/' . $codigo . '/' . $id);


            //Busco el usuario en mi BD el cual pertenece al correo correspondiente
        }
    }

    public function getPerfil($id, $rol) {

         $usu = usuario::find(Session::get('id'));
           
            $numsolicitudes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->count(); 
            $solicitudescon = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->get(); 
            
        switch ($rol) {

            case 1:
                $paciente = paciente::find($id);
                $usuario = usuario::find($id);
                return View::make('login.perfil_1')->with(array('usuario' => $usuario, 'paciente' => $paciente, "user" => $usu,'numero'=>$numsolicitudes,'lleno'=>$solicitudescon));
                break;

            case 2:

                $usuario = usuario::find($id);
                return View::make('login.perfil_2')->with(array('usuario' => $usu, "user" => $usu));
                break;

            case 3:

                $usuario = usuario::find($id);
                return View::make('login.perfil_3')->with(array('usuario' => $usu, "user" => $usu));
                break;

            case 4:

                $usuario = usuario::find($id);
                return View::make('login.perfil_4')->with(array('usuario' => $usu, "user" => $usu));
                break;
        }
    }

    public function postPerfil($id, $rol) {


          $reglas = array(
            //requerido, se admiten espacios
            'documento' => 'required',
            'correo' => 'required|email',
            'usuario' => 'required|max:30',

        );
         


        $mensajes = array(
            'required' => "Campo :attribute obligatorio",
            'email' => "Formato de correo en el campo :attribute no valido",
            'max' => "Campo :attribute Ingrese maximo :20 caracteres",
            
        );

        $validador = Validator::make($_POST, $reglas, $mensajes);

        if ($validador->fails()) {
            return Redirect::back()->withErrors($validador)->withInput();
        } 
        else 
        {

                $consulta = DB::table('usuario')->where('usuario.username', '=', $_POST["usuario"])->where('usuario.idusuario', '!=', $id)->get();

                    if ($consulta == null) {

                                if ($rol == 1) {
            
                                    if ($_POST["Telefono"] == null) {
                                        return Redirect::back()->with('telefono_error', 'el telefono es obligatorio');
                                    }
                                    else{
            
                                            $usuario = usuario::find($id);
                                            $usuario->correo = $_POST["correo"];
                                            $usuario->username = $_POST["usuario"];
                                    
                                            $usuario->save();

                                            $paciente = paciente::find($id);
                                            $paciente->usuario_idusuario = $id;
                                            $paciente->eps = $_POST['Eps'];
                                            $paciente->aseguradora = $_POST["Aseguradora"];
                                            $paciente->telefono = $_POST["Telefono"];
                                    
                                            $paciente->save();

                                            if (Input::file("imagen_fondo") != null and Input::file("imagen_perfil") != null ) {
                                        

                                                File::delete(public_path("img/perfil/".$_POST["imagen_fondo_antigua"]));
                                                File::delete(public_path("img/perfil/".$_POST["imagen_perfil_antigua"]));
                                                
                                                $n_imagen_fondo = Input::file("imagen_fondo")->getClientOriginalName();
                                                
                                                $imagen_fondo = Input::file("imagen_fondo")->move('img/perfil', $n_imagen_fondo);
                                                $n_imagen_perfil = Input::file("imagen_perfil")->getClientOriginalName();
                                                $imagen_perfil = Input::file("imagen_perfil")->move('img/perfil', $n_imagen_perfil);
                                                
                                                if (strpos($n_imagen_fondo,'.jpg') === false and strpos($n_imagen_fondo,'.png') === false and strpos($n_imagen_fondo,'.jpeg') === false) {
                                                   
                                                    return Redirect::back()->with('imagenfondo_error', 'el archivo debe ser jpg o png o jpeg');       
                                                }
                                                elseif(strpos($n_imagen_perfil,'.jpg') === false and strpos($n_imagen_perfil,'.png') === false and strpos($n_imagen_perfil,'.jpeg') === false) {
                                                
                                                    return Redirect::back()->with('imagenperfil_error', 'el archivo debe ser jpg o png o jpeg'); 
                                                    
                                                }
                                                $usuario = usuario::find($id);
                                                $usuario->imagen_perfil = $n_imagen_perfil;
                                                $usuario->imagen_fondo = $n_imagen_fondo;
                                                
                                                $usuario->save();

                                                
                                            }
                                            elseif (Input::file("imagen_fondo") != null and Input::file("imagen_perfil") == null ) {
            
                                                File::delete(public_path("img/perfil/".$_POST["imagen_fondo_antigua"]));
                                                
                                                $n_imagen_fondo = Input::file("imagen_fondo")->getClientOriginalName();
                                                $imagen_fondo = Input::file("imagen_fondo")->move('img/perfil', $n_imagen_fondo);
                                                
                                                if (strpos($n_imagen_fondo,'.jpg') === false and strpos($n_imagen_fondo,'.png') === false and strpos($n_imagen_fondo,'.jpeg') === false) {
                                                   
                                                    return Redirect::back()->with('imagenfondo_error', 'el archivo debe ser jpg o png o jpeg');       
                                                }
                                                
                                                $usuario = usuario::find($id);
                                                $usuario->imagen_fondo = $n_imagen_fondo;
                                                
                                                $usuario->save();
                                                
                                            }
                                            elseif (Input::file("imagen_perfil") != null and Input::file("imagen_fondo") == null) {
                                                
                                                File::delete(public_path("img/perfil/".$_POST["imagen_perfil_antigua"]));
                                                
                                                $n_imagen_perfil = Input::file("imagen_perfil")->getClientOriginalName();
                                                $imagen_perfil = Input::file("imagen_perfil")->move('img/perfil', $n_imagen_perfil);
                                               
                                                if (strpos($n_imagen_perfil,'.jpg') === false and strpos($n_imagen_perfil,'.png') === false and strpos($n_imagen_perfil,'.jpeg') === false) {
                                                   
                                                    return Redirect::back()->with('imagenperfil_error', 'el archivo debe ser jpg o png o jpeg');       
                                                }
                                                
                                                $usuario = usuario::find($id);
                                                $usuario->imagen_perfil = $n_imagen_perfil;
                                                
                                                $usuario->save();
                                                File::delete(public_path('img/perfil/icon.png'));
                                            } 
                                            
                                            
                                            
                                            
                                            return Redirect::back()->with('mensajexito', 'Informacion actualizada');
                                        }

                                } 
                                else {


                                    $usuario = usuario::find($id);
                                    $usuario->tipo = $_POST["tipo_documento"];
                                    $usuario->documento = $_POST["documento"];
                                    $usuario->correo = $_POST["correo"];
                                    $usuario->username = $_POST["usuario"];

                                    $usuario->save();
                                    
                                            if (Input::file("imagen_fondo") != null and Input::file("imagen_perfil") != null ) {
                                        
                                                File::delete(public_path("img/perfil/".$_POST["imagen_fondo_antigua"]));
                                                File::delete(public_path("img/perfil/".$_POST["imagen_perfil_antigua"]));
                                                
                                                $n_imagen_fondo = Input::file("imagen_fondo")->getClientOriginalName();
                                                $imagen_fondo = Input::file("imagen_fondo")->move('img/perfil', $n_imagen_fondo);
                                                $n_imagen_perfil = Input::file("imagen_perfil")->getClientOriginalName();
                                                $imagen_perfil = Input::file("imagen_perfil")->move('img/perfil', $n_imagen_perfil);
                                                
                                                $usuario = usuario::find($id);
                                                $usuario->imagen_perfil = $n_imagen_perfil;
                                                $usuario->imagen_fondo = $n_imagen_fondo;
                                                
                                                $usuario->save();
                                                
                                            }
                                            elseif (Input::file("imagen_fondo") != null and Input::file("imagen_perfil") == null ) {
            
                                                File::delete(public_path("img/perfil/".$_POST["imagen_fondo_antigua"]));
                                                
                                                $n_imagen_fondo = Input::file("imagen_fondo")->getClientOriginalName();
                                                $imagen_fondo = Input::file("imagen_fondo")->move('img/perfil', $n_imagen_fondo);
                                                
                                                $usuario = usuario::find($id);
                                                $usuario->imagen_fondo = $n_imagen_fondo;
                                                
                                                $usuario->save();
                                            }
                                            elseif (Input::file("imagen_perfil") != null and Input::file("imagen_fondo") == null) {
                                                
                                                File::delete(public_path("img/perfil/".$_POST["imagen_perfil_antigua"]));
                                                
                                                $n_imagen_perfil = Input::file("imagen_perfil")->getClientOriginalName();
                                                $imagen_perfil = Input::file("imagen_perfil")->move('img/perfil', $n_imagen_perfil);
                                               
                                                $usuario = usuario::find($id);
                                                $usuario->imagen_perfil = $n_imagen_perfil;
                                                
                                                $usuario->save();
                                            } 
                                            
                                    return Redirect::back()->with('mensajexito', 'Informacion actualizada');
                                }
                } 
                else {
                return Redirect::back()->with('username_error', 'el usuario ' . $_POST["usuario"] . ' ya existe');
                }
        }
    }

    public function getContrasena($codigo, $id) {

        $usuario = usuario::find($id);

        return View::make('login.recupcontra')->with(["codigo" => $codigo, "usuario" => $usuario]);
    }

    public function postContrasena($codigo, $id) {

        $reglas = array(
            //requerido, se admiten espacios
            'correo_codigo' => 'required|min:4', // requerido formato email
            'contraseña_nueva' => 'required|min:8|unique:usuario,username', //requerido, max 10,
            'contraseña_repita' => 'required|min:8|same:contraseña_nueva' //requerido, max10
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

            $codigo_ingreso = $_POST["correo_codigo"];
            $codigo_ingreso = md5($codigo_ingreso);

            if ($codigo == $codigo_ingreso) {

                $usuario = usuario::find($id);
                $usuario->password = Hash::make($_POST["contraseña_nueva"]);

                //$validador = Validator::make($_POST,$reglas,$mensajes);
                $usuario->save();

                return Redirect::to('login/login')->with('mensajecorreo', 'Clave modificado');
                ;
            } else {
                $r = Session::get('intentos_error') + 1;
                Session::put('intentos_error', $r);

                if (Session::get('intentos_error') > 3) {
                    Session::put('intentos_error', 0);
                    return Redirect::to('login/login');
                } else {
                    $muestra = 3 - Session::get('intentos_error');
                    return Redirect::back()->with('mensajerror', 'codigo erroneo intentos restantes:' . $muestra . '.');
                }
            }
        }
    }

}

//    
//
//}
