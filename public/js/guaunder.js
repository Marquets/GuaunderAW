//comprobar cada 3 segundos si ha habido match con algún usuario mediante AJAX
$(document).ready(function() {
	setInterval(function(){
		$.ajax({
        	type: 'POST',
        	url: 'match.php',
        	success: function(data) {
        		if (data=="SI") {
        			$("#header").after('<div class="alert alert-success alert-dismissible" id="newMatch"><a href="#" class="close">&times;</a><span class="negrita">¡NUEVO MATCH!</span><span>Para verlo ve a <span class="negrita"><a href="chats.php">Chats</a></span> y haz click en nuevo mensaje.</span></div>');
        		}
        	}
   		});
	}, 3000);
});