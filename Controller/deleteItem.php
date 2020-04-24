<?php

  require_once("Model/Producto.php");
  $carrito = unserialize($_SESSION['carrito']);
  if (isset($_GET['id'])) {
    $selectedProducto = new Producto();
    $selectedProducto = $selectedProducto->selectId($_GET['id'])[0];
    foreach ($carrito as $values) {
      if ($values['producto'] == $selectedProducto) {
        print_r($selectedProducto);
        unset($carrito[$values]);
        echo"<script>alert('Articulo eliminado del carrito')</script>";
      }
    }
    $_SESSION['carrito'] = serialize($carrito);
    include 'View/ViewCarrito.php';
  }