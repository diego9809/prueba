<?php

class SessionesController extends BaseController {

    public function getInsert() {

        if (Session::has('usuario') and Session::get('rol') == 1) {
            $usu = usuario::find(Session::get('id'));
            $solicitudes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',3)->where('solicitud.estado', '!=',0)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->paginate(3); 
            $numsolicitudes = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->count(); 
            $solicitudescon = DB::table('usuario')->join('paciente', 'usuario.idusuario', '=', 'paciente.usuario_idusuario')->join('solicitud', 'solicitud.paciente_usuario_idusuario', '=', 'paciente.usuario_idusuario')->where('solicitud.estado_pa', '!=',1)->where('solicitud.estado_pa', '!=',2)->where('solicitud.estado', '!=',1)->where('solicitud.estado', '!=',0)->where('solicitud.estado', '!=',3)->where('solicitud.paciente_usuario_idusuario','=',Session::get('id'))->get(); 
            return View::make('login.iniciopaciente')->with(array('usuario' => $usu ,'solicitud'=>$solicitudes,'numero'=>$numsolicitudes,'lleno'=>$solicitudescon));
        } else {

            if (Session::has('usuario') and Session::get('rol') == 2) {
                $usu = usuario::find(Session::get('id'));
                return View::make('login.inicioterapeuta')->with(array('usuario' => $usu));
            } else {
                if (Session::has('usuario') and Session::get('rol') == 3) {
                    $usu = usuario::find(Session::get('id'));
                    return View::make('login.iniciosecretaria')->with(array('usuario' => $usu));
                } else {
                    if (Session::has('usuario') and Session::get('rol') == 4) {
                        $usu = usuario::find(Session::get('id'));
                        return View::make('login.iniciocordinador')->with(array('usuario' => $usu));
                    }
                }
            }
        }
    }

    public function postInsert() {

        $horarios = new horarios();
        $horarios->idhorario = $_POST['idhorario'];
        $horarios->fecha_inicio = $_POST['fechainico'];
        $horarios->fecha_fin = $_POST['fechafin'];
        $horarios->hora_inicio = $_POST['horainicio'];
        $horarios->hora_fin = $_POST['horafin'];
        $horarios->horadescanso_inicio = $_POST['horadeini'];
        $horarios->horadescanso_fin = $_POST['horadefi'];
        $horarios->save();
        echo " horario registrado ";
    }

}
