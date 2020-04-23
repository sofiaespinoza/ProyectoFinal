<?php

 require_once("Model/Connection.php");

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
      * @param int $pcategoria
      * @param double $pprecio
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
      * Inserta producto
      * @return boolean
      */
     public function insert() {
         try {
             $conect = new Connection();
             $pdo = $conect->OpenConnection();

             $sql = "INSERT INTO productos (nombre, detalle, precio, imagen) "
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
                 $rows[] = new Producto($row["id"], $row["nombre"], $row["detalle"], $row["precio"], $row["imagen"]);
             }
         } catch (Exception $ex) {
             error_log("Error:" . $ex->getMessage() . " in function" . __FUNCTION__ . " at file" . __FILE__);
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
                 $sql .= " WHERE nombre LIKE '%" . $name . "%'";
             }
             $result = $pdo->query($sql);
             while ($row = $result->fetch()) {
                 $rows[] = new Producto($row["id"], $row["nombre"], $row["detalle"], $row["precio"], $row["imagen"]);
             }
         } catch (Exception $ex) {
             error_log("Error:" . $ex->getMessage() . " in function" . __FUNCTION__ . " at file" . __FILE__);
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

                 $list[] = new Producto($row["id"], $row["nombre"], $row["detalle"], $row["precio"], $row["imagen"]);
             }
         } catch (Exception $ex) {
             error_log("ERROR: " . $ex->getMessage());
         }
         return $list;
     }

     public function update() {
         try {
             $conect = new Connection();
             $pdo = $conect->openConnection();
             $query = "UPDATE productos SET nombre = '$this->nombre', detalle = '$this->detalle', precio = '$this->precio', imagen = '$this->imagen'  WHERE id = '" . $this->getAttribute("idProducto") . "'";
             return $pdo->query($query);
         } catch (Exception $exc) {
             error_log("Error en la Funcion" . __FUNCTION__ . ", mensaje:" . $exc->getMessage());
         }
         return FALSE;
     }

     public function getAttribute($smth) {
         try {
             return $this->$smth;
         } catch (Exception $ex) {
             error_log("Error:" . $ex->getMessage() . " in function" . __FUNCTION__ . " at file" . __FILE__);
         }
         return NULL;
     }

 }
 