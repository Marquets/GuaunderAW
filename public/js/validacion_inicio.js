

//Expresión regular para validar el correo:
exprMail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

//validar e-mail
document.getElementById('email').addEventListener("change", function () {
    if (!exprMail.test(this.value) && this.value != ('admin'||'administrador'||'Admin'||'Administrador')) {
        alert("La dirección de correo electrónico " + this.value + " es incorrecta.");

        var email = document.getElementById('email');
        email.style.border = "1px solid red";
        var iconError = document.getElementById('errorIconEmail');
	    iconError.style.display = 'block';
	    var iconOk = document.getElementById('okIconEmail');
	    iconOk.style.display = 'none';

        this.focus();//mueve la página a donde esté el error
    } else {
        document.getElementById('email').style.border = "1px solid green";
        var iconOk = document.getElementById('okIconEmail');
	    iconOk.style.display = 'block';
	    var iconError = document.getElementById('errorIconEmail');
	    iconError.style.display = 'none';
    }
}, false);

var numAccesos = 0;

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
}













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