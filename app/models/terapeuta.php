<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teraperuta
 *
 * @author Home
 */
class teraperuta extends Eloquent {
    
    protected $table="fisioterapeuta";
    
    protected $primaryKey="usuario_idusuario";
    
    public $timestamps= false;
    
    public  $incrementing = false;
   
}
