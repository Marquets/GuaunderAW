var nickPulsado = '';
var nick = '';
//avance del carrusel cuando el botón de MeGusta es pulsado, gestionando la desactivación de botones
$(document).ready(function() {
	nick = $('#nickname').text();
	$("#heart-btn").click(function(){
		nickPulsado = $('.carousel-inner .active .usuario-foto img').attr("alt");
		if($('.carousel-inner .ultimo').hasClass('active')) {
			$('#heart-btn').attr( "disabled", true );
			$('#cross-btn').attr( "disabled", true );
			alert("No hay más usuarios de Guaunder, 'ALEA IACTA EST!'");
		} else
	    	$("#carousel-usuario").carousel("next");
	    likeGuau(nick);
	});
	if ($('#noUsers').length) {
		$('#heart-btn').attr( "disabled", true );
		$('#cross-btn').attr( "disabled", true );
	}
});
//avance del carrusel cuando el botón de NoMeGusta es pulsado, gestionando la desactivación de botones
$(document).ready(function() {
	$("#cross-btn").click(function(){
		nickPulsado = $('.carousel-inner .active .usuario-foto img').attr("alt");
		if($('.carousel-inner .ultimo').hasClass('active')) {
			$('#heart-btn').attr( "disabled", true );
			$('#cross-btn').attr( "disabled", true );
			alert("No hay más usuarios de Guaunder, 'ALEA IACTA EST!'\n\nRecarga para volver a ver usuarios");
		} else
	    	$("#carousel-usuario").carousel("next");
	});
});

function likeGuau(liker) {
    $.ajax({
        type: 'POST',
        url: 'like_guau.php',
        data: { like_us: liker, target_us: nickPulsado },
        success: function(data) {
        }
    });
}