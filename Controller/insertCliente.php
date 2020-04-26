<?php

  include_once("Model/Producto.php");
  include_once("Model/Cliente.php");
  $nuevoProducto = new Producto();
  $listaProductos = $nuevoProducto->selectAll();
  if (isset($_GET['total'])) {
    $total = $_GET['total'];
    $_SESSION['total'] = serialize($total);
  }
  if ($_POST) {
    $cliente = new Cliente($_POST["correo"], $_POST["nombre"], $_POST["direccion"], NULL);
    print_r($cliente);
    if ($cliente->insert()) {
      unset($_SESSION['cliente']);
      $_SESSION['cliente'] = serialize($cliente);
    } else {
      echo"ECHO";
    }
    include "View/ViewFactura.php";
  } else {
    include "View/FormCliente.php";
  }
