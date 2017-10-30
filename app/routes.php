<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */


//Route::get('logout','loginController@Cerrarsesion');
Route::get('contraseña', function()
{
    return View::make("prueba");
});
Route::get('templates', function()
{
    return View::make("templates");
});
Route::Controller("horarios","horariosController");
Route::Controller("sessiones","SessionesController");
Route::Controller("login","loginController");
//Route::Controller("orden","OrdenController");
Route::Controller("cita","CitaController");
Route::Controller("paciente","PacienteController");
Route::Controller("coordinador","CoordinadorController");
Route::Controller("terapeuta","TerapeutaController");
Route::Controller("secretaria","SecretariaController");