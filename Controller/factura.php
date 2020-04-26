<?php

  include_once("Model/Factura.php");
  include_once("Model/Cliente.php");
  include_once("Model/Producto.php");
  include_once("Model/DetalleFactura.php");
  //productos. cantidad
  $cliente = new Cliente();
  $carrito = unserialize($_SESSION['carrito']);
  $cliente = unserialize($_SESSION['cliente']);
  $total = unserialize($_SESSION['total']);
  print_r($cliente);

  //crear objeto factura
  $factura = new Factura($cliente->getAttribute('idCliente'), $total, NULL);
  print_r($factura);

  //insertar los detalles
  foreach ($carrito as $values) {
    $factura->addDetalle(new DetalleFactura($values['producto']->getAttribute('idProducto'), $values['cantidad'], NULL));
  }

  //luego de insertar los detalles dentro de la factura, INSERTO FACTURA
  $factura->insertFactura();
  include 'View/ViewFactura.php';