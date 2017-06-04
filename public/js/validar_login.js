//Comprueba que los campos no estén vacíos antes de enviarlo al servidor, con mensajes distintos según el input sin rellenar
//Cuando pulse el botón submit del formulario se ejecuta la siguiente función.
document.getElementById('formulario_login').addEventListener("submit",function(event){
	//Si el valor de los dos campos es vacío mostramos un mensaje y cancelamos el envio al servidor
	if(document.getElementById('nick').value=='' && document.getElementById('contrasenia').value==''){
		alert("Por favor, rellene el nick y la contraseña");
		event.preventDefault();
	}
	//Si el valor del nick es vacío mostramos un mensaje y cancelamos el envio al servidor
	else if(document.getElementById('nick').value==''){
		alert('Por favor, introduzca un nick');
		event.preventDefault();
	}
	//Si el valor de la contraseña es vacío mostramos un mensaje y cancelamos el envio al servidor
	else if(document.getElementById('contrasenia').value=='' ){
		alert('Por favor, introduzca una contraseña');
		event.preventDefault();
	}
});

