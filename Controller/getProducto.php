<?php

 include_once("Model/Producto.php");
 $nuevoProducto = new Producto();
 $listaProductos = $nuevoProducto->selectAll();
 include "View/ViewProducto.php";
 