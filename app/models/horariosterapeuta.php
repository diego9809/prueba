<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of horariosterapeuta
 *
 * @author Home
 */
class horariosterapeuta extends Eloquent{
    
     protected $table="horarios_has_fisioterapeuta";
    
    protected $primaryKey="idhorariopersonal";
    
    public $timestamps= false;
}
