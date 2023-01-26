
window.onload = pinta();

var last = 0;

function pinta() {
    var urlBase = "http://localhost/christine/admin/index.php/";
    var accion = "categoriasCarga";

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        
            var resultados=JSON.parse(this.responseText);
            
            var tabla = document.getElementById("tabla");
            var body = document.createElement('tbody');
            var cabecera = construirCabecera();
            tabla.appendChild(cabecera);

            for (let i = 0; i < resultados.length; i++) {
                let fila = construirFila(resultados[i]);
                last++;
                body.appendChild(fila);
                tabla.appendChild(body);
            }
        }
    };

    xmlhttp.open("GET", urlBase + accion, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send();

    // fetch(urlBase + accion).then(function(response) {
    //     var json = this.responseText;
    //     var res = eval(json);
    // });

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
    titulo.className = "nombre";
    titulo.innerHTML = datos.nombre;    
    linea.appendChild(titulo);

    var titulo = document.createElement('td');  
    titulo.className = "descripcion";
    titulo.innerHTML = datos.descripcion;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var img = document.createElement('img');
    if (datos.imagen != "") {
        img.src = "../img/img_cat/" + datos.id + "/" + datos.imagen;
        img.style = "width:60px;height: 50px;"; 
    }
    titulo.className = "imagen";
    titulo.appendChild(img);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    titulo.className = "puntuacion";
    titulo.innerHTML = datos.puntuacion;
    linea.appendChild(titulo);


    var titulo = document.createElement('td');
    titulo.className = "padre";
    titulo.innerHTML = datos.padre;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var btn = document.createElement("button");
    var icon = document.createElement("i");
    var a = document.createElement("a");
    icon.className = "fa fa-edit";
    btn.className = "btn btn-square btn-outline-info";
    a.href = "categorias/" + datos.id;
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
    a.href = "categoriasDelete/" + datos.id;
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
    var texto = document.createTextNode("Nombre");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Descripcion");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Imagen");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Puntuacion");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Categoria padre");
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
