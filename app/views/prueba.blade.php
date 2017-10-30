<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Seguridad contraseña</title>
  
    {{HTML::style('styles/style/contraseña.css')}}   
  
      

  
</head>

<body>
  <div class="formulario">
	<form>
        <fieldset>
        	<legend>Cambio de contraseña</legend>
            <label for="claveActual">Contraseña actual</label>
            <input id="claveActual" type="password">           
            <button>Enviar</button>
        </fieldset>
    </form>
</div>
<div class="nivelSeguridad">
    <p>Nivel de seguridad de contraseña</p>
    <span id="nivelseguridad">bajo</span>
    <div class="nivelesColores">
      <div class="spanNivelesColores"></div>
    </div>
  
  <div class="NivelesColores"
       ></div>
  
</div>

<h2 class="clavecorrecta oculto">
  ¡¡¡ Enhorabuena, la clave se ha establecido correctamente !!!
</h2>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

    
{{ HTML::script('js/index.js') }}
</body>
</html>
