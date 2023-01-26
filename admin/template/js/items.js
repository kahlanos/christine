
window.onload = pinta();



function pinta() {
    var urlBase = "http://localhost/christine/admin/index.php/";
    document.getElementById("last").value = 0;
    
    var accion = "itemsCarga";
    
    var form_data = new FormData();
    form_data.append('last', document.getElementById("last").value);
    form_data.append('query', '');

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
                document.getElementById("last").value = parseInt(document.getElementById("last").value) + 1;
                body.appendChild(fila);
                tabla.appendChild(body);
            }
        }
    };

    xmlhttp.open("POST", urlBase + accion , true);
    // xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send(form_data);

    // fetch(urlBase + accion).then(function(response) {
    //     var json = this.responseText;
    //     var res = eval(json);
    // });

}

function rePinta(query = '') {
    var urlBase = "http://localhost/christine/admin/index.php/";
    last = document.getElementById("last").value;  
    var accion = "itemsCarga";
    
    var form_data = new FormData();
    form_data.append('last', last);
    form_data.append('query', query);

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
                document.getElementById("last").value = parseInt(last) + 1;
                body.appendChild(fila);
                tabla.appendChild(body);
            }
        }
    };

    xmlhttp.open("POST", urlBase + accion , true);
    // xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send(form_data);

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
    titulo.className = "categoria";
    titulo.innerHTML = datos.categoria;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    titulo.className = "precio";
    titulo.innerHTML = datos.precio;
    linea.appendChild(titulo);


    var titulo = document.createElement('td');
    var img = document.createElement('img');
    if (datos.img1 != "") {
        img.src = "../img/img_item/" + datos.id + "/" + datos.img1;
        img.style = "width:60px;height: 50px;"; 
    }
    titulo.className = "img1";
    titulo.appendChild(img);  
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    titulo.className = "puntuacion";
    titulo.innerHTML = datos.puntuacion;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var btn = document.createElement("button");
    var icon = document.createElement("i");
    var a = document.createElement("a");
    icon.className = "fa fa-edit";
    btn.className = "btn btn-square btn-outline-info";
    a.href = "items/" + datos.id;
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
    a.href = "itemsDelete/" + datos.id;
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
    var texto = document.createTextNode("Categoria");
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Precio");
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


function siguiente() {
    document.getElementById("tabla").innerHTML = "";
    rePinta();
}

function anterior() {
    document.getElementById("tabla").innerHTML = "";
    document.getElementById("last").value = parseInt(document.getElementById("last").value) - 4;
    rePinta();
}

function filtraNombre(e) {
    document.getElementById("tabla").innerHTML = "";
    rePinta(e.value);
}
