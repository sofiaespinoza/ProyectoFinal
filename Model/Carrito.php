<?php

 require_once("Model/Connection.php");

 class Carrito {

     protected $carrito = array();

     public function readByIds($ids) {

         $ids_arr = str_repeat('?,', count($ids) - 1) . '?';

         // query to select products
         $query = "SELECT id, name, price FROM " . $this->table_name . " WHERE id IN ({$ids_arr}) ORDER BY name";

         // prepare query statement
         $stmt = $this->conn->prepare($query);

         // execute query
         $stmt->execute($ids);

         // return values from database
         return $stmt;
     }

 }
 