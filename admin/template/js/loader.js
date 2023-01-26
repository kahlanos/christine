
function cargaCategorias() {

    var select = document.getElementById("categorias");

    var urlBase = "http://localhost/christine/admin/index.php/";
    var accion = "categoriasCarga";

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        
            var resultados=JSON.parse(this.responseText);

            if (resultados != undefined && resultados != null && resultados != "") {
                
                for (let i = 0; i < resultados.length; i++) {
                    option = document.createElement("option");
                    option.innerHTML = resultados[i].nombre;
                    select.appendChild(option);
                }
            }

            
        }
    };

    xmlhttp.open("GET", urlBase + accion, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send();
}


function cargaComentsUsuario() {
    
}