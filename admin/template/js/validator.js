
function validaUsuario(e) {

    var user = document.getElementById("user");
    var passw = document.getElementById("passw");
    var nombre = document.getElementById("passw");
    var apellido = document.getElementById("passw");

    if (!correo(user)) {
        return false;
    } 
}

function focoFuera(e) {

    elems = [e];

    type = e.type;

    if (type == "text") {
        if (texto(elems)) {
            e.style.border = "2px solid green";
        } else {
            e.style.border = "2px solid red";
        }
    }  else if (type == "email") {
        if (correo(elems)) {
            e.style.border = "2px solid green";
        } else {
            e.style.border = "2px solid red";
        }
    }
}


function texto(elems) {

    
         
        if (!(/^[a-zA-Z0-9]*$/i.test(elems.value))) {
        document.getElementById("alertas").innerHTML += "<br>Nombre obligatorio y solo texto";
        return false;
            
               
        }
    return true;
}

function correo(elems) {
    for (let i = 0; i < elems.length; i++) {
        if( !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(elems[i].value)) ) {
            document.getElementById("alertas").innerHTML += "<br>Correo obligatorio y formato: ejemplo@ejemplo.com";
            return false;
          }
    }
    return true;
}

function limitaTexto(evento) {
    let tecla = evento.keyCode;

    if (tecla >= 48 && tecla <= 90) {
        return false;
    } else {
        return true;
    }
}

function limitaCorreo(evento) {
    let tecla = evento.keyCode;

    if (tecla == 219 || tecla == 221 || tecla == 186 || tecla == 226 || tecla == 190 || 
        tecla == 222 || tecla == 219 || tecla == 191 || tecla == 32) {
        return false;
    } else {
        return true;
    }
}