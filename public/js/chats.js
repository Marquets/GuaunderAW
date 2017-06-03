//activación de los tooltip (descripción cuando se pasa por encima del botón para crear un nuevo mensaje)
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    $('#message_content').on('keyup',function() {
    	if(this.textLength != 0) {
        	$('#enviarMensaje').removeAttr("disabled");
    	}
	});

});


