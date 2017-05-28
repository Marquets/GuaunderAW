
//Expresión regular para validar el correo:
exprMail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

//validar e-mail
function email_correcto(correo){
    //comprombamos que lo introducido cumple la expresión regular. Si es asi devolvemos true, en caso contrario false con un alert.
    if (!exprMail.test(correo)){
        alert("La dirección de correo electrónico es incorrecta.");
        return false;

    }
    else{
        return true;
    }
}

//Comporbamos que las contraseña cumple una serie de parametros de seguridad.
//Cada vez que se produce un cambio en el campo con el id 'clave' se ejevuta la siguiente función.
document.getElementById('clave').addEventListener("change", function () {

    // Validar que el tamaño de la contraseña sea mayor que 8. Si el tamaño es menor que 8,
    //le ponemos un borde rojo al input y bloqueamos el boton de submit
    if (this.value.length < 8) {
        alert('La contraseña debe tener al menos 8 caracteres. Por favor, inténtelo de nuevo.');
        document.getElementById('clave').style.border = "1px solid red";
        document.getElementById('registrarse').disabled=true;
    }
    //La contraseña tiene más de 8 caracteres
    else{
        document.getElementById('clave').style.border = "1px solid green";
        document.getElementById('registrarse').disabled=false;

        // Validar composición de la contraseña
        var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
        //Si no cumple la expresión regular ponemos un borde rojo  y bloqueamos el botón de submit.
        if (!re.test(this.value)) {
            alert('La contraseña debe contener al menos un número, una letra minúscula y una mayúscula. Por favor, inténtelo de nuevo.');
            document.getElementById('clave').style.border = "1px solid red";
            document.getElementById('registrarse').disabled=true;
        }
        //Se cumple la expresión regular. Ponemos un borde verde al input y habilitamos el botón de submit
        else{
            document.getElementById('clave').style.border = "1px solid green";
            document.getElementById('registrarse').disabled=false;
        }
    }



});

//Comprobamos que la clave y la clave repetida coinciden
//Cada vez que se produce un cambio en el campo con el id 'clave_repetida' se ejevuta la siguiente función.
document.getElementById('clave_repetida').addEventListener("change", function (){
    var clave=document.getElementById('clave');
    //Si las claves no coinciden ponemos un borde rojo en cada uno de sus input y deshabilitamos en botón de submit del
    //formulario.
    if(this.value!=clave.value){
        alert("Las contraseñas no coinciden");
        document.getElementById('clave_repetida').style.border = "1px solid red";
        document.getElementById('clave_registro').style.border = "1px solid red";
        document.getElementById('registrarse').disabled=true;
    }
    //Si coinciden habilitamos el botón submit por si estaba anteriormente deshabilitado.
    else
        document.getElementById('registrarse').disabled=false;
}, false);

//Comprobamos que no hay ningun campo vacío antes de mandar la información al servidor,
//Cuando se pulsa el botón submit del formulario se ejecuta la función.
document.getElementById('formulario').addEventListener("submit",function(event){
    //Tomamos el valor de todos los campos del formulario
    var nick = document.getElementById('nick').value;
    var correo = document.getElementById('mail').value;
    var nombre = document.getElementById('usuario').value;
    var clave = document.getElementById('clave').value;
    var clave_repetida = document.getElementById('clave_repetida').value;
    var fecha = document.getElementById('fecha').value;

    //Si alguno de ellos está vacío, imprimimos un mensaje con alert y cancelamos el envio de datos al servidor
    //para evitar mandar datos vacíos que pueden acceder a la base de datos
    if(nick==''||nombre==''||clave==''||clave_repetida==''||correo==''||fecha==''){
        alert("Por favor, rellene todos los campos");
        event.preventDefault();
    }
});


//CÓDIGO JQUERY

//Comprobamos sin necesidad de refrescar la página si el nick con que el se quiere registrar el usuario existe ya.
$(document).ready(function(){
    //Cada vez que el elemento con id 'nick' cambia se ejecuta la función
    $("#nick").change(function(){
        //Obtenemos el valor del elemento con id 'nick'.
        var consulta=$("#nick").val();
        //Usamos ayax para defirnir el tipo, en que fichero está el código con el que se va a consultar y como se llama
        //el parametro donde le vamos a pasar la información.
        $.ajax({
            type:"GET",
            url:'comprobar_nick.php',
            data: "nick="+consulta,
            //En caso de que la consulta de comprobar_nick.php se haya hecho de forma correcta, ejecutamos la siguiente función.
            success: function(data){
                //Obtenemos los datos que nos devuelve comprobar_nick mediante 'echo'.
                $existe=data;
                //Si nos devuelve error mostramos un mensaje con alert, deshabilitamos el botón submit del formulario y
                //pintamos el borde del input de color rojo.
                if($existe=="error"){
                    alert("Rellene el campo nick");
                    $('#registrarse').attr("disabled", true);
                    $('#nick').css("border-color","red");
                }
                //Si no devuelve éxito habilitamos el botón submit del formulario y pintamos de color verde el borde del input
                else if($existe=="exito"){
                        $('#registrarse').attr("disabled", false);
                        $('#nick').css("border-color","green");
                }
                //Si no nos devuelve ninguno de estos dos, es que el usuario ya existe, por lo tanto se lo anunciamos mediante
                //un alert al usuario, deshabilitamos el botón submit del formulario y pintamos el borde del input de color rojo
                else{
                    alert("Este usuario ya existe");
                    $('#registrarse').attr("disabled", true);
                    $('#nick').css("border-color","red");
                }
            }

        });
    });
});

//Comprobamos sin necesidad de refrescar la página si el correo con que el se quiere registrar el usuario existe ya.
$(document).ready(function(){
    //Cada vez que el elemento con id 'mail' cambia se ejecuta la función
    $("#mail").change(function(){
        //Obtenemos el valor del elemento con id 'mail'.
        var consulta=$("#mail").val();
        //Usamos ayax para defirnir el tipo, en que fichero está el código con el que se va a consultar y como se llama
        //el parametro donde le vamos a pasar la información.
        $.ajax({
            type:"GET",
            url:'comprobar_correo.php',
            data: "correo="+consulta,
            //En caso de que la consulta de comprobar_correo.php se haya hecho de forma correcta,
            //ejecutamos la siguiente función.
            success: function(data){
                //Obtenemos los datos que nos devuelve comprobar_correo mediante 'echo'.
                $existe=data;
                //Si nos devuelve error mostramos un mensaje con alert, deshabilitamos el botón submit del formulario y
                //pintamos el borde del input de color rojo.
                if($existe=="error"){
                    alert("Rellene el campo correo");
                    $('#registrarse').attr("disabled", true);
                    $('#mail').css("border-color","red");
                }
                //Si no devuelve éxito comprobamos que nos devuelve la función email_correcto
                else if($existe=="exito"){
                    //Si nos devuelve true habilitamos el botón submit del formulario y ponemos un borde verde al input
                    if(email_correcto($("#mail").val())){
                        $('#registrarse').attr("disabled", false);
                        $('#mail').css("border-color","green");
                    }
                    //Sino deshabilitamos el botón submit del formulario y ponemos un borde roho al input
                    else{
                        $('#registrarse').attr("disabled", true);
                        $('#mail').css("border-color","red");
                    }

                }
                //Si no nos devuelve ninguno de estos dos, es que el usuario ya existe, por lo tanto se lo anunciamos mediante
                //un alert al usuario, deshabilitamos el botón submit del formulario y pintamos el borde del input de color rojo
                else{
                    alert("Este mail ya esta registrado");
                    $('#registrarse').attr("disabled", true);
                    $('#mail').css("border-color","red");
                }
            }

        });
    });

});
