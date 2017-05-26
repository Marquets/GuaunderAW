document.getElementById('formulario_login').addEventListener("submit",function(event){
	if(document.getElementById('nick').value=='' && document.getElementById('contrasenia').value==''){
		alert("Por favor, rellene el nick y la contraseña");
		event.preventDefault();
	}
	else if(document.getElementById('nick').value==''){
		alert('Por favor, introduzca un nick');
		event.preventDefault();
	}
	else if(document.getElementById('contrasenia').value=='' ){
		alert('Por favor, introduzca una contraseña');
		event.preventDefault();
	}
});

/*var numAccesos = 0;

//validar todos los campos del formulario de inicio de sesión
function validaInicioSesion(form) {
    // Comprobar los campos del formulario de registro
    if (form.email.value == '' || form.contrasenia.value == '') {
    	//document.getElementById('estadoInicioSesion').innerHTML = ' Campos incorrectos';
        alert('El e-mail o la contraseña están incompletos. Por favor, inténtelo de nuevo.');
        numAccesos++;
        if (numAccesos > 1) {
			document.getElementById('captcha').style.display = 'block';
			document.getElementById('logear').setAttribute("disabled", "disabled");
		}
		if (numAccesos > 2) {
			grecaptcha.reset();
			document.getElementById('logear').setAttribute("disabled", "disabled");
		}

        return false;
	} else {
		//document.getElementById('estadoInicioSesion').innerHTML = ' Campos correctos';
		document.getElementById('contrasenia').style.border = "1px solid green";
        var icon = document.getElementById('okIconPass');
	    icon.style.display = 'block';
	    if(form.email.value==('admin'||'administrador'||'Admin'||'Administrador')){
            location.href="usuariosregistrados.html";
        }
        else{
        	location.href="pagPrincipal.html";
        }
	}
}

//mostrar el botón de Acceder sólo si el captcha es correcto
var noRobot = function() {
	//document.getElementById('logear').style.display = 'block';
	document.getElementById('logear').removeAttribute("disabled");
}*/













/*
function runTest(form, button)  {

	Ret = false;

	if (button.name == "1") Ret = testBox1(form);

	if (button.name == "2") Ret = testBox2(form);

	if (button.name == "3") Ret = testBox3(form);

	if (button.name == "4") Ret = testBox4(form);

	if (Ret)

		alert ("Campo correcto!");

}



function testBox1(form) {

	Ctrl = form.campo1;

	if (Ctrl.value == "" || Ctrl.value.indexOf ('@', 0) == -1) {

		validatePrompt (Ctrl, "Entrar un E-mail")

		return (false);

	} else

		return (true);

}



function testBox2(form) {

	Ctrl = form.campo2;

	if (Ctrl.value.length != 5) {

		validatePrompt (Ctrl, "Entrar cinco caracteres")

		return (false);

	} else

		return (true);

}



function testBox3(form) {

	Ctrl = form.campo3;

	if (Ctrl.value.length < 3) {

		validatePrompt (Ctrl, "Entrar tres o mas caracteres")

		return (false);

	} else

		return (true);

}



function testBox4(form) {

	Ctrl = form.campo4;

	if (Ctrl.value == "") {

		validatePrompt (Ctrl, "Entrar cualquier cosa")

		return (false);

	} else

		return (true);

}



function runSubmit (form, button)  {

	if (!testBox1(form)) return;

	if (!testBox2(form)) return;

	if (!testBox3(form)) return;

	if (!testBox4(form)) return;

	alert ("Todos los campos OK! Se procede a enviar");

	document.test.submit();

}



function validatePrompt (Ctrl, PromptStr) {

	alert (PromptStr)

	Ctrl.focus();

	return;

}





function loadDoc() {

	// initial focus; use if needed

	document.test.campo1.focus ();

	return;

}

//-->

*/