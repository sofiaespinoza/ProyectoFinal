<?php

  include_once("Model/Factura.php");
  include_once("Model/Cliente.php");
  include_once("Model/Producto.php");
  include_once("Model/DetalleFactura.php");

  //productos. cantidad
  $carrito = unserialize($_SESSION['carrito']);

  //crear objeto factura
  $factura = new Factura(1, 500, NULL);

  //insertar los detalles
  foreach ($carrito as $values) {
    $factura->addDetalle(new DetalleFactura($values['producto']->getAttribute('idProducto'), $values['cantidad'], NULL));
  }

  //luego de insertar los detalles dentro de la factura, INSERTO FACTURA
  $factura->insertFactura();

//  print_r($factura);
  include 'View/ViewCarrito.php';
  //insertar factura
  ///select
  $factura5 = new Factura();
  $factura5 = $factura5->selectFactura(17)[0];
//  print_r($factura5);

  $detalle2 = new DetalleFactura();
  $detalle2 = $detalle2->selectDetallePorFactura($factura5->getAttribute('idFactura'));
//  print_r($detalle2);

  $factura5->detalle = $detalle2;

  print_r($factura5);


  