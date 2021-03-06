<?php

 include_once("Model/Producto.php");
 if ($_POST) {

     ///// CHORRO DE CODIGO STARTS HERE///
     $target_dir = "img/";
     $target_file = $target_dir . basename($_FILES["Imagen"]["name"]);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
     if (isset($_POST)) {
         $check = getimagesize($_FILES["Imagen"]["tmp_name"]);
         if ($check !== false) {
             echo "File is an image - " . $check["mime"] . ".";
             $uploadOk = 1;
         } else {
             echo "File is not an image.";
             $uploadOk = 0;
         }
     }
     // Check if file already exists
     if (file_exists($target_file)) {
         echo "Sorry, file already exists.";
         $uploadOk = 0;
     }
// Check file size
     if ($_FILES["Imagen"]["size"] > 500000) {
         echo "Sorry, your file is too large.";
         $uploadOk = 0;
     }
// Allow certain file formats
     if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
         echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
         $uploadOk = 0;
     }
// Check if $uploadOk is set to 0 by an error
     if ($uploadOk == 0) {
         echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
     } else {
         if (move_uploaded_file($_FILES["Imagen"]["tmp_name"], $target_file)) {
             echo "The file " . basename($_FILES["Imagen"]["name"]) . " has been uploaded.";
         } else {
             echo "Sorry, there was an error uploading your file.";
         }
     }
     /////////
     $nuevoProducto = new Producto(NULL, $_POST["Nombre"], $_POST["Detalle"], $_POST["Precio"], $target_file);
     $nuevoProducto->insert();
     include "View/FormProducto.php";
 } else {

     include "View/FormProducto.php";
 }