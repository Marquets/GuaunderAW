//activación de los tooltip (descripción cuando se pasa por encima del botón para crear un nuevo mensaje)
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

    $('#message_content').on('keyup',function() {
    	if(this.textLength != 0) {
        	$('#enviarMensaje').removeAttr("disabled");
    	}
	});


    $('#chatModal')on('show.bs.modal', function (event) {
    	console.log($(this).attr("data-id"));
    	var remitente = $(this).attr("data-id");
    	$('#chatModal .modal-dialog .modal-content .modal-header .modal-title').text(remitente);
    });

});


