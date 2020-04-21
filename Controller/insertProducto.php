<?php

 include_once("Model/Producto.php");
 if ($_POST) {
     $nuevoProducto = new Producto(NULL, $_POST["Nombre"], $_POST["Detalle"], $_POST["Precio"], "mabel.png");
     $nuevoProducto->insert();
     include "View/FormProducto.php";
 } else {

     include "View/FormProducto.php";
 }