<?php

 include_once("Model/Usuario.php");

 if ($_POST) {
     $nuevoUsuario = new Usuario($pcorreo, $pcontrasena, $pnombre, $ptelefono, $pdireccion, $prol, $pidCliente);
     //($_POST["usuario"], md5($_POST["contrasena"]), $_POST["nombre"], "1", NULL);

     if ($nuevoUsuario->insert()) {
         
     }
 } else {
     include "View/FormSignUp.php";
 }
