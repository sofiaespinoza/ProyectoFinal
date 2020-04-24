<?php
  require_once("Model/Producto.php");
  if (isset($_GET['id'])) {
    $selectedProducto = new Producto();
    $selectedProducto = $selectedProducto->selectId($_GET['id'])[0];
  }
  if (isset($_POST)) {
    $carrito = [];
    if (isset($_SESSION['carrito'])) {
      $carrito = unserialize($_SESSION['carrito']);
      $itemArrayId = array_column($carrito, 'producto');
      if (!in_array($selectedProducto, $itemArrayId)) {
        $itemArray = array(
          'producto' => $selectedProducto,
          'cantidad' => isset($_POST['cantidad']) ? $_POST['cantidad'] : 1,
        );
        $carrito [] = $itemArray;
      } else {
        echo'producto ya existe';
      }
    } else {
      $itemArray = (array(
        'producto' => $selectedProducto,
        'cantidad' => isset($_POST['cantidad']) ? $_POST['cantidad'] : 1,
      ));
      $carrito [] = $itemArray;
    }
    $_SESSION['carrito'] = serialize($carrito);
    include 'View/ViewCarrito.php';
  } else {
    include 'View/ViewProducto.php';
  }

 
         