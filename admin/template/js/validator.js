
function valida(e) {

    var inputs = document.getElementsByTagName("input");


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

    for (let i = 0; i < elems.length; i++) {
         
            if (!(/^[a-zA-Z0-9]*$/i.test(elems[i].value))) {
            // document.getElementById("alertas").innerHTML += "<br>Nombre obligatorio y solo texto";
            return false;
            
        }        
    }
    return true;
}

function correo(elems) {
    for (let i = 0; i < elems.length; i++) {
        if( !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(elems[i].value)) ) {
            // document.getElementById("alertas").innerHTML += "<br>Correo obligatorio y formato: ejemplo@ejemplo.com";
            return false;
          }
    }
    return true;
}