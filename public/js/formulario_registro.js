

//Expresión para validar el mail
 var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
document.getElementById('Mail').addEventListener("change", function () {


        if ( !expr.test(this.value)){
            alert("La dirección de correo " + this.value + " es incorrecta.");
            document.getElementById('Mail').style.border = "1px solid red";
            //document.getElementById('error_email').setAttribute("class", "show");
            //document.getElementById('ok_email').setAttribute("class", "hidden");
            this.focus();
            submit = false;
        	return submit;
        }else{
            document.getElementById('Mail').style.border = "1px solid green";
            //document.getElementById('ok_email').setAttribute("class", "show");
            //document.getElementById('error_email').setAttribute("class", "hidden");
        }
    }, false);


document.getElementById('Usuario').addEventListener("change", function () {

var re = /^\w+$/;
    if(!re.test(this.value)) {
        alert("El nombre de usuario debe contener solo letras, números y subrayados. Por favor, inténtelo de nuevo.");
        document.getElementById('Usuario').style.border = "1px solid red";
        this.focus();

        submit = false;
        return submit;
    }

	});

document.getElementById('Contraseña').addEventListener("change", function () {

     // Validar el tamaño de la contraseña
    if (this.value.length < 8) {
        alert('La contraseña debe tener al menos 8 caracteres. Por favor, inténtelo de nuevo.');
         document.getElementById('Contraseña').style.border = "1px solid red";
        this.focus();
        submit = false;
        return submit;
    }

    // Validar composición de la contraseña
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    if (!re.test(this.value)) {
        alert('La contraseña debe contener al menos un número, una letra minúscula y una mayúscula. Por favor, inténtelo de nuevo.');
         document.getElementById('Contraseña').style.border = "1px solid red";
         this.focus();
        submit = false;
        return submit;
    }
    if(re.test(this.value)){
        document.getElementById('Contraseña').style.border = "1px solid green";
    }

	});

document.getElementById('Confirma').addEventListener("change", function () {


 // Validar contraseña y confirmación de la contraseña
    if (document.getElementById('Contraseña').value != this.value) {
        alert('Su contraseña y la confirmación de la contraseña no coinciden. Por favor, inténtelo de nuevo.');
         document.getElementById('Contraseña').style.border = "1px solid red";
        document.getElementById('Contraseña').focus();
        submit = false;
        return submit;
    }

 // Crear un campo nuevo, este será un hash de la contraseña.
    var p = document.createElement("input");

    // Enviar un nuevo campo oculto con la clave encriptada.
    form.appendChild(p);
    p.name = "pass";
    p.id = "pass";
    p.type = "hidden";
    p.value = hex_sha512(contraseña.value);

    // Limpiar los campos contraseña y confirmación de la pagina de registro.
    document.getElementById('Contraseña') = "";
    this.value = "";

	});

document.getElementById("boton1").addEventListener("click", function() {
	var form = document.getElementById('formulario');
    var sumit = true;

	if (form.nombre.value == '' || form.mail.value == '' || form.usuario.value == '' || form.contraseña.value == '' || form.confirma.value == '') {
        alert('Debe proporcionar todos los campos solicitados. Por favor, inténtelo de nuevo.');
        document.getElementById('Nombre').style.border = "1px solid red";
        document.getElementById('Mail').style.border = "1px solid red";
        document.getElementById('Usuario').style.border = "1px solid red";
        document.getElementById('Contraseña').style.border = "1px solid red";
        document.getElementById('Confirma').style.border = "1px solid red";
        submit = false;
        return submit;
    }
    else {
    	window.location="pagPrincipal.html";
        return submit;
    }

});