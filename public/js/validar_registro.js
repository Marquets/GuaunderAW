//Expresión regular para validar el correo:
exprMail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//validar e-mail
function email_correcto(correo){
    if (!exprMail.test(correo)){
        alert("La dirección de correo electrónico es incorrecta.");
        return false;

    }
    else{
        return true;
    }
}

document.getElementById('clave').addEventListener("change", function () {

     // Validar el tamaño de la contraseña
    if (this.value.length < 8) {
        alert('La contraseña debe tener al menos 8 caracteres. Por favor, inténtelo de nuevo.');
        document.getElementById('clave').style.border = "1px solid red";
        document.getElementById('registrarse').disabled=true;
    }
    else{
        document.getElementById('clave').style.border = "1px solid red";
        document.getElementById('registrarse').disabled=false;
    }

    // Validar composición de la contraseña
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    if (!re.test(this.value)) {
        alert('La contraseña debe contener al menos un número, una letra minúscula y una mayúscula. Por favor, inténtelo de nuevo.');
        document.getElementById('clave').style.border = "1px solid red";
        document.getElementById('registrarse').disabled=true;
    }
    else{
        document.getElementById('clave').style.border = "1px solid green";
        document.getElementById('registrarse').disabled=false;
    }

});

document.getElementById('clave_repetida').addEventListener("change", function (){
    var clave=document.getElementById('clave');
    if(this.value!=clave.value){
        alert("Las contraseñas no coinciden");
        document.getElementById('clave_repetida').style.border = "1px solid red";
        document.getElementById('clave_registro').style.border = "1px solid red";
        document.getElementById('registrarse').disabled=true;
    }
    else
        document.getElementById('registrarse').disabled=false;
}, false);

document.getElementById('formulario').addEventListener("submit",function(event){
    var nick = document.getElementById('nick').value;
    var correo = document.getElementById('mail').value;
    var nombre = document.getElementById('usuario').value;
    var clave = document.getElementById('clave').value;
    var clave_repetida = document.getElementById('clave_repetida').value;
    var fecha = document.getElementById('fecha').value;

    if(nick==''||nombre==''||clave==''||clave_repetida==''||correo==''||fecha==''){
        alert("Por favor, rellene todos los campos");
        event.preventDefault();
    }
});


//Código Jquery
$(document).ready(function(){
    $("#nick").change(function(){
        var consulta=$("#nick").val();
        $.ajax({
            type:"GET",
            url:'comprobar_nick.php',
            data: "nick="+consulta,
            success: function(data){
                $existe=data;
                if($existe=="error"){
                    alert("Rellene el campo nick");
                    $('#registrarse').attr("disabled", true);
                    $('#nick').css("border-color","red");
                }
                else if($existe=="exito"){
                        $('#registrarse').attr("disabled", false);
                        $('#nick').css("border-color","green");
                }
                else{
                    alert("Este usuario ya existe");
                    $('#registrarse').attr("disabled", true);
                    $('#nick').css("border-color","red");
                }
            }

        });
    });
});

$(document).ready(function(){
    $("#mail").change(function(){
        var consulta=$("#mail").val();
        $.ajax({
            type:"GET",
            url:'comprobar_correo.php',
            data: "correo="+consulta,
            success: function(data){
                $existe=data;
                if($existe=="error"){
                    alert("Rellene el campo correo");
                    $('#registrarse').attr("disabled", true);
                    $('#mail').css("border-color","red");
                }
                else if($existe=="exito"){
                    if(email_correcto($("#mail").val())){
                        $('#registrarse').attr("disabled", false);
                        $('#mail').css("border-color","green");
                    }
                    else{
                        $('#registrarse').attr("disabled", true);
                        $('#mail').css("border-color","red");
                    }

                }
                else{
                    alert("Este mail ya esta registrado");
                    $('#registrarse').attr("disabled", true);
                    $('#mail').css("border-color","red");
                }
            }

        });
    });
});














/*//Expresión para validar el mail
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

});*/