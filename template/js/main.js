document.addEventListener("DOMContentLoaded", function(){
        

    /////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(function(element){
        element.addEventListener('click', function (e) {
          e.stopPropagation();
        });
    })



    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
                // after dropdown is hidden, then find all submenus
                  this.querySelectorAll('.submenu').forEach(function(everysubmenu){
                      // hide every submenu as well
                      everysubmenu.style.display = 'none';
                  });
            })
        });
        
        document.querySelectorAll('.dropdown-menu a').forEach(function(element){
            element.addEventListener('click', function (e) {
    
                  let nextEl = this.nextElementSibling;
                  if(nextEl && nextEl.classList.contains('submenu')) {	
                      // prevent opening link if link needs to open dropdown
                      e.preventDefault();
                      console.log(nextEl);
                      if(nextEl.style.display == 'block'){
                          nextEl.style.display = 'none';
                      } else {
                          nextEl.style.display = 'block';
                      }

                  }
            });
        })
    }
    // end if innerWidth

}); 


function cargaSpiner() {
    var urlBase = "http://localhost/christine/index.php/";
    var accion = "cargaSpiner";

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var resultados=JSON.parse(this.responseText);

            var spiner = document.getElementById("spiner");

            for (let i = 0; i < resultados.length; i++) {
                let element = elementSpiner(resultados[i]);
                spiner.appendChild(element);
            }
        }
    };

    xmlhttp.open("POST", urlBase + accion , true);
    xmlhttp.send();
}

function elementSpiner(datos) {

    var conten = document.createElement("div");
    conten.className = "carousel-item row col-12 justify-content-center";

    var img = document.createElement("img");
    img.src = "../admin/img/img_item/"+ datos.id + "/" + datos.img1;
    img.style = "width:200px;height: 200px;" ;
    img.className = "d-block w-100 img-fluid";
    var divImg = document.createElement("div");
    divImg.className = "w-50";
    divImg.appendChild(img);

    var text = document.createElement("div");
    text.className = "carousel-caption d-none d-md-block w-50";
    var h5 = document.createElement("h5");
    h5.innerHTML = datos.nombre;
    text.appendChild(h5);
    var p = document.createElement("p");
    p.innerHTML = datos.precio + " ChrisTokens";
    text.appendChild(p);

    conten.appendChild(divImg);
    conten.appendChild(text);

    return conten;
}

function cargaItemsAll() {
    var urlBase = "http://localhost/christine/index.php/";
    var accion = "cargaItemsAll";

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            var resultados=JSON.parse(this.responseText);

            var spiner = document.getElementById("spiner");

            for (let i = 0; i < resultados.length; i++) {
                let element = elementAcordeon(resultados[i]);
                spiner.appendChild(element);
            }
        }
    };

    xmlhttp.open("POST", urlBase + accion , true);
    xmlhttp.send();
}

function elementAcordeon() {

    var contenedor = document.getElementById("acordeon");

    var element = createElement("div");
    var item = createElement("div");
    element.className= "accordion accordion-flush w-100";
    item.className= "accordion-item w-100";

    var btn = createElement("button");
    btn.className = "accordion-button collapsed w-100 bg-dark text-light align-items-center rounded-5 text-center";
    btn.type = "button";
    

}