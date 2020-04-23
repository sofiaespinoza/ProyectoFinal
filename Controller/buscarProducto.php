<?php

 include_once("Model/Producto.php");
 $buscarProducto = new Producto();

 if ($_POST) {

     if (empty($_POST["buscador"])) {
         echo "No se ha ingresado una cadena a buscar";
     } else {
         $buscarProducto = new Producto(NULL, $_POST["buscador"], NULL, NULL, NULL);
         $productoBD = $buscarProducto->selectName($_POST["buscador"]);
         print_r($productoBD);
         if ($productoBD) {
             
             $listaProductos = $buscarProducto->selectAllNames($_POST["buscador"]);
             include "View/ViewProducto.php";
         } else {
             include "View/Modal.php";
         }
     }
 } else {
     include "View/ViewProducto.php";
 }

     