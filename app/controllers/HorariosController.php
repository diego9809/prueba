<?php

class HorariosController extends BaseController {

    public function getInsert() {
        if (Session::has('usuario') and Session::get('rol') == 1  ) {
            return View::make('horarios.horarios');
        }else{
           
            return Redirect::to('login/login');
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

    /* public function postInsert(){

      //mostrar la vista del nuevo cliente
      $clientes = new customer();
      $clientes->first_name= $_POST['nombre'];
      $clientes->last_name= $_POST['apellido'];
      $clientes->email= $_POST['email'];
      $clientes->active = $_POST["activo"];
      $clientes->save();

      echo "cliente insertado";
      }

      public function  getIndex(){

      $clientes = Customer::all();
      return View::make ('customer.index',["clientes"=> $clientes]);

      }

      public function getUpdate($id) {

      $clientes =Customer::Find($id);
      return View::make ('customer.update',["clientes"=> $clientes]);
      }

      public function postUpdate($id) {
      $clientes = Customer::Find($id);

      $clientes->first_name= $_POST['nombre'];
      $clientes->last_name= $_POST['apellido'];
      $clientes->save();
      echo "Cliente actualizado";
      } */
}
