<?php

  include_once("Model/Producto.php");
  include_once("Model/Cliente.php");
  $cliente = new Cliente();
  $nuevoProducto = new Producto();
  $listaProductos = $nuevoProducto->selectAll();
  if (isset($_GET['total'])) {
    $total = $_GET['total'];
    $_SESSION['total'] = serialize($total);
  }
  if ($_POST) {
    if (empty($_SESSION['cliente'])) {
      $cliente = new Cliente($_POST["correo"], $_POST["nombre"], $_POST["direccion"], NULL);
      if ($cliente->insert()) {
        $_SESSION['cliente'] = serialize($cliente);
        
      }
    }
    include "View/ViewFactura.php";
  } else {
    include "View/FormCliente.php";
  }
