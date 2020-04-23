<?php
 include_once("Model/Producto.php");
 include_once("Model/Cliente.php");
 $cliente = new Cliente();
 $nuevoProducto = new Producto();
 $listaProductos = $nuevoProducto->selectAll();
 if ($_POST) {
     $cliente = new Cliente($_POST["correo"], $_POST["nombre"], $_POST["direccion"], NULL);
     if ($cliente->insert()) {
         $_SESSION['cliente'] = serialize($cliente);
         include "View/ViewProducto.php";
     }
 } else {
      include "View/FormCliente.php";
 }
