<?php

 include_once("Model/Producto.php");
 include_once("Model/Usuario.php");
 $nuevoProducto = new Producto();
 $listaProductos = $nuevoProducto->selectAll();
 session_unset();
 session_destroy();
 unset($_SESSION['carrito']);
 include "View/ViewProducto.php";

 