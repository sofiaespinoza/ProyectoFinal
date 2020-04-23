<?php
 require_once("Model/Producto.php");
 if (isset($_GET['id'])) {
     $selectedProducto = new Producto();
     $selectedProducto = $selectedProducto->selectId($_GET['id'])[0];
 }
 if (isset($_POST)) {
     if (isset($_SESSION['carrito'])) {

         $itemArrayId = array_column($_SESSION['carrito'], 'producto');

         if (!in_array($selectedProducto, $itemArrayId)) {
             $count = count($_SESSION['carrito']);
             $itemArray = array(
                 'producto' => $selectedProducto,
                 'cantidad' => isset($_POST['cantidad'])
             );
             $_SESSION['carrito'][$count] = $itemArray;
         } else {
             echo'producto ya existe';
         }
         include 'View/ViewCarrito.php';
     } else {
         $itemArray = array(
             'producto' => $selectedProducto,
             'cantidad' => isset($_POST['cantidad'])
         );
         $_SESSION['carrito'][] = $itemArray;
         include 'View/ViewCarrito.php';
     }
 } else {
     include 'View/ViewProducto.php';
 }

 
         