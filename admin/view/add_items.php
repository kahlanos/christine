<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Listado</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../../template/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../../template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../../template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../../template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../../template/css/style.css" rel="stylesheet">
</head>

<body onload="cargaCategorias()">
<?php
if (!control()) {
    header("location: login");
}
?>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa me-2"></i>C & M</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="../home" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Home</a>
                    
                    <a href="../usuarios" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Usuarios</a>
                    <a href="../categorias" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Categorías</a>
                    <a href="../items" class="nav-item nav-link active"><i class="fa fa-table me-2"></i>Items</a>
                    
                    
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php require("navbar.php") ?>
            <!-- Navbar End -->

            <div class="col-12 col-xl-6 container-fluid">
                <div class="bg-secondary rounded h-100 p-4 m-4">
                    <h6 class="mb-4">Nuevo tem</h6>
                    
                    <form action= "add/process" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input name="nombre" type="text" class="form-control" id="nombre" value="" require>                           
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input name="descripcion" type="text" class="form-control" id="descripcion" value="" require>                           
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            
                            <select id="categorias" name="categoria" class="form-select form-select mb-3" require>
                                <option>Seleccione una Categoria...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input name="precio" type="number" class="form-control" id="precio" value="" require>
                        </div>           
                        <div class="mb-3">
                            <label for="img1" class="form-label">imagen 1</label>
                            <input name="img1" type="file" class="form-control form-control bg-dark" id="img1" value="">
                        </div>
                        <div class="mb-3">
                            <label for="img2" class="form-label">imagen 2</label>
                            <input name="img2" type="file" class="form-control form-control bg-dark" id="img2" value="">
                        </div>
                        <div class="mb-3">
                            <label for="img3" class="form-label">imagen 3</label>
                            <input name="img3" type="file" class="form-control form-control bg-dark" id="img3" value="">
                        </div>
                        <div class="mb-3">
                            <label for="latitud" class="form-label">Latitud</label>
                            <input name="latitud" type="text" class="form-control" id="latitud" value="">
                        </div>
                        <div class="mb-3">
                            <label for="longitud" class="form-label">Longitud</label>
                            <input name="longitud" type="text" class="form-control" id="longitud" value="">
                        </div>

                        <button type="submit" class="btn btn-outline-success m-2">Guardar</button>
                        <a class="btn btn-outline-primary m-2" href="../items" role="button">Cancelar</a>                       
                    </form>
                </div>
            </div>




        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../template/lib/chart/chart.min.js"></script>
    <script src="../../template/lib/easing/easing.min.js"></script>
    <script src="../../template/lib/waypoints/waypoints.min.js"></script>
    <script src="../../template/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../../template/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../../template/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../../template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../../template/js/main.js"></script>
    <script src="../../template/js/loader.js"></script>
    
</body>
<footer>
    <!-- Footer Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded-top p-4">
            <div class="row">
                <div class="col-6 text-center">
                    &copy; <a href="#">Christine's & Meta</a>, All Right Reserved.
                </div>
                <div class="col-12 col-sm-6 text-center text-sm-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
</footer>

</html>