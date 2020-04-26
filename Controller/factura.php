<?php

  include_once("Model/Factura.php");
  include_once("Model/Cliente.php");
  include_once("Model/Producto.php");
  include_once("Model/DetalleFactura.php");
  if ($_POST) {
    //productos. cantidad
    $carrito = unserialize($_SESSION['carrito']);
    $cliente = unserialize($_SESSION['cliente']);
    $total = unserialize($_SESSION['total']);

    //crear objeto factura
    $factura = new Factura($cliente->getAttribute('idCliente'), $total, NULL);

    //insertar los detalles
    foreach ($carrito as $values) {
      $factura->addDetalle(new DetalleFactura($values['producto']->getAttribute('idProducto'), $values['cantidad'], NULL));
    }

    //luego de insertar los detalles dentro de la factura, INSERTO FACTURA
    $factura->insertFactura();
    include 'View/ViewFactura.php';
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
  }
  

  