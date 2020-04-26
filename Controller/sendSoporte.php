<?php

 include_once("Model/Producto.php");
 $nuevoProducto = new Producto();
 $listaProductos = $nuevoProducto->selectAll();
 include_once "View/FormSoporte.php";
 