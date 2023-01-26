<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Home</title>
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

<body onload="cargaSpiner()">
  <!-- Start your project here-->


  <?php require("navbar.php") ?>


  <div class="container d-flex justify-content-center">
    <div class="col-12 row m-5">

      <div class="w-100 d-flex flex-column align-items-center rounded-5 bg-image p-5 text-center shadow-3-strong rounded mb-5 text-light opacity-75" style="background-image: url(../view/img/galaxy.png);">
        <h1 class="">Bienvenid@ a Christine's & Meta</h1><br>
        <h2>Tu portal de subastas y compras para tu metaverso</h2><br>
        <h2>Compra, comenta, comparte y sé tu mismo</h2>
      </div>


      <!-- Carousel wrapper -->
      <div id="carouselMaterialStyle" class="carousel slide carousel-fade w-50 mt-5 p-0" data-mdb-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="5" aria-label="Slide 6"></button>
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="6" aria-label="Slide 7"></button>
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="7" aria-label="Slide 8"></button>
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="8" aria-label="Slide 9"></button>
          <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="9" aria-label="Slide 10"></button>
        </div>



        <!-- Inner -->
        <div class="carousel-inner rounded-5 shadow-4-strong bg-dark p-4 d-flex" id="spiner">
          <!-- Single item -->
          <div class="carousel-item row col-12 active">
            <div class="w-50">
            <img src="../view/img/logo.png" class="d-block w-100 img-fluid" alt="" />
            </div>
            <div class="carousel-caption d-none d-md-block w-10">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <!-- Carousel wrapper -->

      <div class="w-50 d-flex align-items-center mt-5 ps-5 pe-0">
        <h2 class="p-4 rounded-5 bg-dark text-white-50">Comienza la experiencia Meta ahora!
          Compra y comenta sobre los Artículos virtuales que no existen!!
        </h2>
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