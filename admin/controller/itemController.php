<?php

class itemController {

    public function items() {
        require("view/listado_items.php");
    }

    public function cargaItems() {

        $db = new DbItem();
        if ($_POST['query'] != '') {
            $res = $db->getItemsByName($_POST["last"], $_POST['query']);
        } else {
            $res = $db->getItems($_POST["last"]);
        }

        return $res;
    }

    public function editaItem($id) {

        $db = new DbItem();


        $db->editItem($id, $_POST['nombre'], $_POST['descripcion'], $_POST['categoria'], $_POST['precio'], $_FILES['img1']['name'],
        $_FILES['img2']['name'], $_FILES['img3']['name'], $_POST['latitud'], $_POST['longitud']);

        if (isset($_FILES['img1'])) {
            $this->subeImg($_FILES['img1'], $id);
        }
        if (isset($_FILES['img2'])) {
            $this->subeImg($_FILES['img2'], $id);
        }
        if (isset($_FILES['img3'])) {
            $this->subeImg($_FILES['img3'], $id);
        }

        header("location: ../../../index.php/items");

    }

    public function fichaItem($id) {
        
        $db = new DbItem();
        $res = $db->getItemById($id);

        require("view/ficha_item.php");
    }

    public function borraItem($id) {

        $db = new DbItem();
        $db->deleteItem($id);

        $folder = "img/img_item/$id";
        //Get a list of all of the file names in the folder.
        $files = glob($folder . '/*');

        foreach ($files as $file) {

            if (is_file($file)) {

                unlink($file);
            }
        }
        rmdir($folder);

        header("location: ../../index.php/items");
    }

    public function addItemProcess() {

        $db = new DbItem();

        $id = $db->addItem($_POST['nombre'], $_POST['descripcion'], $_POST['categoria'], $_POST['precio'], $_FILES['img1']['name'],
        $_FILES['img2']['name'], $_FILES['img3']['name'], $_POST['latitud'], $_POST['longitud'],);

        if (isset($_FILES['img1'])) {
            $this->subeImg($_FILES['img1'], $id);
        }
        if (isset($_FILES['img2'])) {
            $this->subeImg($_FILES['img2'], $id);
        }
        if (isset($_FILES['img3'])) {
            $this->subeImg($_FILES['img3'], $id);
        }

        header("location: ../../../index.php/items");

    }

    public function addItem() {
        require("view/add_items.php");
    }

    public function cargaCategoriasNombre() {
        $db = new DbCat();
        $res = $db->getCategoriasNombre();

        return $res;
    }

    public function subeImg($img_file, $id) {
        $location = "img/img_item/$id/";

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

        // // Check file size
        // if ($_FILES["size"] > 500000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }

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