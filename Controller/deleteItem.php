<?php

  require_once("Model/Producto.php");
  $carrito = unserialize($_SESSION['carrito']);
  if (isset($_GET['id'])) {
    $selectedProducto = new Producto();
    $selectedProducto = $selectedProducto->selectId($_GET['id'])[0];
    $i = -1;
    foreach ($carrito as $values) {
      $i++;
      if ($values['producto'] == $selectedProducto) {
        print_r($values);
        unset($carrito[$i]);
        echo"<script>alert('Articulo eliminado del carrito')</script>";
      }
    }
    $_SESSION['carrito'] = serialize($carrito);
    include 'View/ViewCarrito.php';
  }