<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OrdenController
 *
 * @author APRENDIZ
 */
class OrdenController extends BaseController {
    
    
    
    public function getInsert() {
        
            return View::make('orden.insertar');
        }
    

    public function postInsert() {

        $orden = new orden();
        $orden->idorden= 1;
        $orden->paciente_usuario_idusuario=2;
        $orden->secciones= $_POST['secciones'];
        $orden->fecha_de_orden= $_POST['fecha_orden'];
        $orden->fecha_de_vencimiento= $_POST['fecha_vencimiento'];
        $orden->fecha_de_ingreso= $_POST['fecha_ingreso'];
        $orden->save();
        echo " orden  ingresada ";
    }   
}
