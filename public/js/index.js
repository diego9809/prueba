$(function() {
  var pruebas = $(".pruebas"),
    nivelesColores = $("#nivelesColores"),
    boton = $("button"),
    inputs = $("input"),
    inputClaveActual = $("#claveActual"),
    inputRepetirClaveActual = $("#repetirClaveActual"),
    fieldset = $("fieldset"),
    nivel;

  function devuelveNivel(esteInput, evento) {
    var nivelBajo = 8,
      nivelMedio = 12,
      nivelAlto = 16,
      numCaracteres = esteInput.val().length,
      estaId = esteInput.attr("id"),
      espanNivelesColores = $(".spanNivelesColores");
    evento.stopPropagation();
    limpiarError();
    if (estaId === "claveActual") {
      if (numCaracteres > 0 && numCaracteres < nivelBajo) {
        nivel = "bajo";
                espanNivelesColores.removeClass().addClass("spanNivelesColores bajo");        
      } 
      else if (numCaracteres >= nivelBajo && numCaracteres < nivelMedio) {
        nivel = "medio";
                espanNivelesColores.removeClass().addClass("spanNivelesColores medio"); 
      } 
      else if (numCaracteres >= nivelMedio && numCaracteres < nivelAlto) {
        nivel = "alto";
                espanNivelesColores.removeClass().addClass("spanNivelesColores alto"); 
      } 
      else if (numCaracteres >= nivelAlto) {
        nivel = "muy alto";
                espanNivelesColores.removeClass().addClass("spanNivelesColores muyAlto");
      }
      if (numCaracteres === 0) {
        espanNivelesColores.removeClass().addClass("spanNivelesColores");
      }
    }
  }
   function limpiarError() {
    var divError = $(".error");
    if(!divError.hasClass("oculto")) {
      divError.addClass("oculto");
    }
  }
  $(document).on('keyup', 'input', function(e) {
    var nivelSeg = $("#nivelseguridad");
    devuelveNivel($(this), e);
    nivelSeg.html(nivel);
  });

  

  inputs.focus(limpiarError);
});