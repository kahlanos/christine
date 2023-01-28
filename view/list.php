<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>List</title>
  <!-- MDB icon -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../template/css/mdb.min.css" />
  <link rel="stylesheet" href="../template/css/main.css" />
</head>

<body>
  <!-- Start your project here-->


  <?php require("navbar.php") ?>

  <div class="container d-flex justify-content-center">
    <div class="col-12 row m-5">
      <div class="w-100">
        <h1 class="text-white py-4">LIST</h1>

        <div class="p-4 rounded-5 bg-dark">
          <!-- Primary -->
          <div class="btn-group" id="boton-list m-3">
            <button id="boton" type="button" class="btn btn-primary dropdown-toggle" data-mdb-toggle="dropdown" aria-expanded="false">
              Filtrar por
            </button>
            <ul class="dropdown-menu bg-dark text-white">
              <li><a class="dropdown-item" href="#">Nombre</a></li>
              <li><a class="dropdown-item" href="#">Categoria</a></li>
              <li><a class="dropdown-item" href="#">Puntuacion</a></li>

            </ul>
          </div>

          <div class="input-group w-50 mt-3">
            <div class="form-outline">
              <input type="search" id="form1" class="form-control" />
              <label class="form-label" for="form1">Search</label>
            </div>
            <button type="button" class="btn btn-primary ms-1" id="boton">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
      <!-- ACCORDION -->
      <div id="acordeon" class="w-100 d-flex flex-column align-items-center rounded-5 p-4 text-center shadow-3-strong rounded mt-5 text-wihte">
        <!-- ITEM -->
        <?php
        $num = "One";
        foreach ($res as $i) {
          echo "<div class='accordion accordion-flush h-50 w-100 mt-3'>
          <div class='accordion-item w-100'>
            
              <button class='accordion-button collapsed w-100 bg-dark text-light align-items-center rounded-5 text-center' type='button' data-mdb-toggle='collapse' data-mdb-target='#flush-collapseOne' aria-expanded=''false' aria-controls='flush-collapseOne'>
              <div class='w-50'>
                  <img src='../admin/img/img_item/" . $i->getId() . "/" . $i->getImg1() . "' alt='' class='w-100'>
                </div>
                <div class='w-50'>" .
            $i->getNombre()
            . "</div>
                <div class='w-50'>" .
            $i->getPrecio()
            . "</div>
              </button>
          
            <div id='flush-collapseOne' class='accordion-collapse collapse w-100' aria-labelledby='flush-headingOne' data-mdb-parent='#accordionFlushExample'>
              <div class='accordion-body d-flex mt-5'>
                <div class='w-50'>
                <div id='carouselMaterialStyle' class='carousel slide carousel-fade' data-mdb-ride='carousel'>

              <div class='carousel-indicators'>
                <button type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                <button type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide-to='1' aria-label='Slide 2'></button>
                <button type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide-to='2' aria-label='Slide 3'></button>
              </div>


              <div class='carousel-inner rounded-5 shadow-4-strong'>

                <div class='carousel-item active'>
                <img src='../admin/img/img_item/" . $i->getId() . "/" . $i->getImg1() . "' alt='' class='w-100'>
                  
                </div>


                <div class='carousel-item'>
                <img src='../admin/img/img_item/" . $i->getId() . "/" . $i->getImg2() . "' alt='' class='w-100'>
                  
                </div>


                <div class='carousel-item'>
                <img src='../admin/img/img_item/" . $i->getId() . "/" . $i->getImg3() . "' alt='' class='w-100'>
                  
                </div>
              </div>

              <button class='carousel-control-prev' type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide='prev'>
                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                <span class='visually-hidden'>Previous</span>
              </button>
              <button class='carousel-control-next' type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide='next'>
                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                <span class='visually-hidden'>Next</span>
              </button>
            </div>
                  
                </div>
                <div class='w-50'>
                " .
            $i->getNombre()
            . "
                </div>
                <div class='w-50'>
                " .
            $i->getDescripcion() . " " .
            $i->getPrecio() . "€"
            . "
                </div>
              </div>
              <button type='button' class='btn btn-primary btn-rounded m-4' id='boton'>Comentar</button>
              <button type='button' class='btn btn-primary btn-rounded m-4' >Comprar</button>
            </div>
          </div>         
        </div>";
        }

        ?>
        <div class="accordion accordion-flush w-100">
          <div class="accordion-item w-100">
            <!-- RESUMEN -->
            <button class="accordion-button collapsed w-100 bg-dark text-light align-items-center rounded-5 text-center" type="button" data-mdb-toggle="collapse" data-mdb-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              <div class="w-50">
                <img src="../view/img/galaxy.png" alt="" class="w-100">
              </div>
              <div class="w-50">
                CONT
              </div>
              <div class="w-50">
                PRECIO
              </div>
            </button>
            <!-- RESUMEN FIN -->
            <!-- FICHA -->
            <div id="flush-collapseOne" class="accordion-collapse collapse w-100" aria-labelledby="flush-headingOne" data-mdb-parent="#accordionFlushExample">
              <div class="accordion-body d-flex mt-5">
                <div class="w-50">
                  <img src="../view/img/galaxy.png" alt="" class="w-100">
                </div>
                <div class="w-50">
                  CONT
                </div>
                <div class="w-50">
                  PRECIO
                </div>
              </div>
            </div>
            <!-- FICHA FIN -->
          </div>
        </div>
        <!-- ITEM FIN -->
      </div>
    </div>

  </div>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="../template/js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript" src="../template/js/main.js"></script>

</body>

<?php require("footer.php") ?>

</html>