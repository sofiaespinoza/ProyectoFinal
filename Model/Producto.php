<?php

 /*
  * To change this license header, choose License Headers in Project Properties.
  * To change this template file, choose Tools | Templates
  * and open the template in the editor.
  */

 /**
  * Description of Producto
  *
  * @author sespi
  */
 class Producto {

     private $idProducto;
     public $nombre;
     public $detalle;
     public $precio;
     public $imagen;

     /**
      * 
      * @param int $pidProducto
      * @param string $pnombre
      * @param string $pdetalle
      * @param string $pprecio
      * @param string $pimagen
      */
     public function __construct($pidProducto= 0, $pnombre= "", $pdetalle= "", $pprecio= "", $pimagen= "") {
         $this->idProducto = $pidProducto;
         $this->nombre = $pnombre;
         $this->detalle = $pdetalle;
         $this->precio = $pprecio;
         $this->imagen = $pimagen;
     }

  }
 