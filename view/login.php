<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Login</title>
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
      <div class="w-50">
      <h1 class="text-white py-4">INICIAR SESIÓN</h1>
      <form>

        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="email" id="form6Example5" class="form-control" />
          <label class="form-label text-white-50" for="form6Example5">Email</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="text" id="form6Example4" class="form-control" />
          <label class="form-label text-white-50" for="form6Example4">Contraseña</label>
        </div>

        <!-- Crear cuenta button -->
        <button type="button" class="btn btn-primary btn-rounded me-4" id="boton">Iniciar</button>
        <button type="button" class="btn btn-primary btn-rounded" id="boton">Cancelar</button>
      </form>
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