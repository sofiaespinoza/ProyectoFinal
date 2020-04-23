<?php

 include_once("Model/Usuario.php");
 include_once("Model/Producto.php");
 $nuevoProducto = new Producto();
 $listaProductos = $nuevoProducto->selectAll();
 if ($_POST) {
     $usuario = new Usuario($_POST["usuario"], $_POST["contrasena"], "", "");
     $usuarioDB = $usuario->selectName($usuario->usuario);
     if ($usuarioDB) {
         if ($usuarioDB->getAttribute("contrasena") == $usuario->getAttribute("contrasena")) {
             $_SESSION['admin'] = serialize($usuarioDB);
             echo 'LOG YEAH';
              include "View/ViewProducto.php";
         } else {
             echo 'NEL';
         }
     } else {
          echo 'NEL';
     }
 } else {
     include "View/LoginUsuario.php";
 }
