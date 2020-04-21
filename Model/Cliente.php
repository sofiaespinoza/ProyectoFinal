<?php

 /*
  * To change this license header, choose License Headers in Project Properties.
  * To change this template file, choose Tools | Templates
  * and open the template in the editor.
  */

 /**
  * Description of Cliente
  *
  * @author sespi
  */
 class Cliente {

     public $correo;
     private $contrasena;
     public $nombre;
     public $telefono;
     public $direccion;
     private $idCliente;

 
     /**
      * 
      * @param string $pcorreo
      * @param string $pcontrasena
      * @param string $pnombre
      * @param string $ptelefono
      * @param string $pdireccion
      * @param int $pidCliente
      * 
      */
     public function __construct($pcorreo="", $pcontrasena="", $pnombre="", $ptelefono="", $pdireccion="", $pidCliente=0) {
         $this->correo = $pcorreo;
         $this->contrasena = $pcontrasena;
         $this->nombre = $pnombre;
         $this->telefono = $ptelefono;
         $this->direccion = $pdireccion;
         $this->idCliente = $pidCliente;
     }

 }
 