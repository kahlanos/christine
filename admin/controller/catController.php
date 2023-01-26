<?php 

class catController {

    public function categorias() {
        require("view/listado_categorias.php");
    }

    public function cargaCategorias() {
        $db = new DbCat();
        $res = $db->getCategorias();

        return $res;
    }

    public function cargaCategoriasNombre() {
        $db = new DbCat();
        $res = $db->getCategoriasNombre();

        return $res;
    }


    public function editaCategoria($id) {

        $db = new DbCat();
        $db->editCategoria($id, $_POST['nombre'], $_POST['descripcion'], $_FILES['imagen']['name'], $_POST['padre']);

        if (isset($_FILES['imagen'])) {
            $this->subeImg($_FILES['imagen'], $id);
        }

        header("location: ../../../index.php/categorias");
    }

    public function fichaCategoria($id) {

        $db = new DbCat();
        $res = $db->getCategoriaById($id);
        
        require("view/ficha_categorias.php");
    }

    public function borraCategoria($id) {

        $db = new DbCat();
        $db->deleteCategoria($id);

        $folder = "img/img_cat/$id";
        //Get a list of all of the file names in the folder.
        $files = glob($folder . '/*');

        foreach ($files as $file) {

            if (is_file($file)) {

                unlink($file);
            }
        }
        rmdir($folder);

        header("location: ../../index.php/categorias");
    }

    

    public function addCategoriaProcess() {

        $db = new DbCat();

        $id = $db->addCategoria($_POST['nombre'], $_POST['descripcion'], $_FILES['imagen']['name'], $_POST['padre'],);

        if (isset($_FILES['imagen'])) {
            $this->subeImg($_FILES['imagen'], $id);
        }
        

        header("location: ../../../index.php/categorias");

    }

    public function addCategoria() {

        require("view/add_categorias.php");
    }

    public function subeImg($img_file, $id) {
        $location = "img/img_cat/$id/";

        # create directory if not exists in upload/ directory
        if(!is_dir($location)){
            mkdir($location, 0755);
        }

        $target_file = $location . basename($img_file["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($img_file["tmp_name"], $target_file)) {
              echo "";
            } else {
              echo "Sorry, there was an error uploading your file.";
            }
          }
    }

}

  
