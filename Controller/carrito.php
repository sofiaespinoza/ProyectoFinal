<?php

  require_once("Model/Producto.php");
  $selectedProducto = new Producto();
  if (isset($_POST)) {
    $carrito = [];
    $selectedProducto = $selectedProducto->selectId($_POST['idProducto'])[0];
    if (isset($_SESSION['carrito'])) {
      $carrito = unserialize($_SESSION['carrito']);
      $itemArrayId = array_column($carrito, 'producto');
      if (!in_array($selectedProducto, $itemArrayId)) {
        $itemArray = array(
          'producto' => $selectedProducto,
          'cantidad' => isset($_POST['cantidad']) ? $_POST['cantidad'] : 1,
        );
        print_r($itemArray);
        $carrito [] = $itemArray;
      } else {
        echo'producto ya existe';
      }
    } else {
      $itemArray = (array(
        'producto' => $selectedProducto,
        'cantidad' => isset($_POST['cantidad']) ? $_POST['cantidad'] : 1
      ));
      $carrito [] = $itemArray;
      print_r($itemArray);
    }
    $_SESSION['carrito'] = serialize($carrito);
    include 'View/ViewCarrito.php';
  } else {
    include 'View/ViewProducto.php';
  }

 
         