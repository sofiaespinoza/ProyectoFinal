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
      * @param float $pprecio
      * @param string $pimagen
      */
     public function __construct($pidProducto = 0, $pnombre = "", $pdetalle = "", $pprecio = 0, $pimagen = "") {
         $this->idProducto = $pidProducto;
         $this->nombre = $pnombre;
         $this->detalle = $pdetalle;
         $this->precio = $pprecio;
         $this->imagen = $pimagen;
     }

     /**
      * 
      * @return boolean
      */
     public function insert() {
         try {
             $conect = new Connection();
             $pdo = $conect->OpenConnection();
             $sql = "INSERT INTO productos (Nombre, Detalle, Precio, Imagen) "
                     . "VALUES ('" . $this->nombre . "','" . $this->detalle . "','" . $this->precio . "','" . $this->imagen . "')";
             return $pdo->query($sql);
         } catch (Exception $ex) {
             error_log("ERROR: " . $ex->getMessage());
         }
         return FALSE;
     }

     /**
      * 
      * @param int $id
      * @return \Cliente
      * 
      */
     public function selectId($id = 0) {
         $rows = [];
         try {
             $conect = new Connection();
             $pdo = $conect->OpenConnection();
             $sql = "SELECT * FROM productos";
             if ($id) {
                 $sql .= " WHERE id = '" . $id . "'";
             }
             $result = $pdo->query($sql);
             while ($row = $result->fetch()) {
                 $rows[] = new Producto($row["Id"], $row["Nombre"], $row["Detalle"], $row["Precio"], $row["Imagen"]);
             }
         } catch (Exception $ex) {
             
         }
         return $rows;
     }

     public function selectName($name = "") {
         $rows = [];
         try {
             $conect = new Connection();
             $pdo = $conect->OpenConnection();
             $sql = "SELECT * FROM productos";
             if ($name) {
                 /*                  * Hay que hacer el LIKE de bases de datos */
                 $sql .= " WHERE nombre = '" . $name . "'";
             }
             $result = $pdo->query($sql);
             while ($row = $result->fetch()) {
                 $rows[] = new Producto($row["Id"], $row["Nombre"], $row["Detalle"], $row["Precio"], $row["Imagen"]);
             }
         } catch (Exception $ex) {
             
         }
         return $rows;
     }

     public function selectAll() {
         $list = [];
         try {
             $conect = new Connection();
             $pdo = $conect->OpenConnection();
             $sql = "SELECT * FROM productos ORDER BY id DESC ";

             $result = $pdo->query($sql);
             while ($row = $result->fetch()) {

                 $list[] = new Producto($row["Id"], $row["Nombre"], $row["Detalle"], $row["Precio"], $row["Imagen"]);
             }
         } catch (Exception $ex) {
             error_log("ERROR: " . $ex->getMessage());
         }
         return $list;
     }

 }
 