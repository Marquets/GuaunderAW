//avance del carrusel cuando el botón de SuperLike es pulsado
$(document).ready(function() {
	$("#star-btn").click(function(){
    	$("#carousel-usuario").carousel("next");
	});
});
//avance del carrusel cuando el botón de MeGusta es pulsado
$(document).ready(function() {
	$("#heart-btn").click(function(){
	    $("#carousel-usuario").carousel("next");
	});
});
//avance del carrusel cuando el botón de NoMeGusta es pulsado
$(document).ready(function() {
	$("#cross-btn").click(function(){
	    $("#carousel-usuario").carousel("next");
	});
});