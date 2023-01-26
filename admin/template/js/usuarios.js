
window.onload = pinta();

function pinta() {
    var urlBase = "http://localhost/christine/admin/index.php/";
    var accion = "usuariosCarga";

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            //var json = this.responseText;
           // var resultados = eval(json);
            var resultados=JSON.parse(this.responseText);
            
            var tabla = document.getElementById("tabla");
            var body = document.createElement('tbody');
            var cabecera = construirCabecera();
            tabla.appendChild(cabecera);

            for (let i = 0; i < resultados.length; i++) {
                let fila = construirFila(resultados[i]);
                body.appendChild(fila);
                tabla.appendChild(body);
            }
        }
    };

    xmlhttp.open("GET", urlBase + accion, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send();

    

}

function construirFila(datos) {    
    var linea = document.createElement('tr');

    var titulo = document.createElement('td');    
    titulo.hidden = true;
    titulo.innerHTML = datos.id;
    titulo.className = "id";
    titulo.scope = "row";
    linea.appendChild(titulo);

    var titulo = document.createElement('td');  
    titulo.className = "user";
    titulo.innerHTML = datos.user;    
    linea.appendChild(titulo);

    var titulo = document.createElement('td');  
    titulo.className = "nombre";
    titulo.innerHTML = datos.nombre;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    titulo.className = "apellido";
    titulo.innerHTML = datos.apellido;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    titulo.className = "tokens";
    titulo.innerHTML = datos.tokens;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var check = document.createElement('input');
    check.className = "form-check-input";
    check.type = "checkbox";
    if (datos.admin == 1) {
        check.checked = true;
    }
    check.disabled = true;
    titulo.appendChild(check);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var btn = document.createElement("button");
    var icon = document.createElement("i");
    var a = document.createElement("a");
    icon.className = "fa fa-edit";
    btn.className = "btn btn-square btn-outline-info";
    a.href = "usuarios/" + datos.id;
    a.appendChild(btn);
    btn.appendChild(icon);
    titulo.appendChild(a);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var btn = document.createElement("button");
    var icon = document.createElement("i");
    var a = document.createElement("a");
    icon.className = "fa fa-trash";
    btn.className = "btn btn-square btn-outline-danger";
    a.href = "usuariosDelete/" + datos.id;
    a.appendChild(btn);
    btn.appendChild(icon);
    titulo.appendChild(a);
    linea.appendChild(titulo);

    return linea;
}

function construirCabecera() {
    var head = document.createElement("thead");
    var cabecera = document.createElement('tr');


    var titulo = document.createElement('th');
    var texto = document.createTextNode("User");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Nombre");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Apellidos");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Tokens");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Admin");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);


    var titulo = document.createElement('th');
    var texto = document.createTextNode("Editar");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Borrar");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    head.appendChild(cabecera);
    return head;
}
