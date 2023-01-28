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
      <form action= "login/process" method="POST" enctype="multipart/form-data">

        <!-- Email input -->
        <div class="form-outline mb-4">
          <input name="user" type="email" id="user" class="form-control text-white-50" />
          <label class="form-label text-white-50" for="user">Usuario</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input name="passw" type="password" id="passw" class="form-control text-white-50" />
          <label class="form-label text-white-50" for="passw">Contraseña</label>
        </div>

        <!-- Crear cuenta button -->
        <button type="submit" class="btn btn-primary btn-rounded me-4" id="boton">Iniciar</button>
        <button type="button" class="btn btn-secondary btn-rounded">Cancelar</button>
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