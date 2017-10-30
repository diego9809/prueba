<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <img style=" height: 50%; width:60% " {{HTML::image('img/kinapsis.png')}}
        <br>
        <br>
        <p>En el siguiente correo se encuentra los datos de su cuenta en kinapsis 
        porfavor tomar el codigo y ingresarlo para recuperar contraseña</p>
        <br>
        <p>apellido:  {{$apellido}}</p> 
        <p>nombre:  {{$nombre}}</p>
        
        <p>documento:  {{$documento}}</p>
        <p>usuario:  {{$usuario}}</p>
        <p>codigo:{{$codigo}}</p>
    </body>
</html>
