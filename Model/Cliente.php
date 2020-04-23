<?php
 require_once("Model/Connection.php");
 class Cliente {

     public $correo;
     public $nombre;
     public $direccion;
     private $idCliente;

     /**
      * 
      * @param string $pcorreo
      * @param string $pnombre
      * @param string $pdireccion
      * @param int $pidCliente
      */
     public function __construct($pcorreo = "", $pnombre = "", $pdireccion = "", $pidCliente = 0) {
         $this->correo = $pcorreo;
         $this->nombre = $pnombre;
         $this->direccion = $pdireccion;
         $this->idCliente = $pidCliente;
     }

     /**
      * 
      * @return boolean
      */
     public function insert() {
         try {
             $conect = new Connection();
             $pdo = $conect->OpenConnection();
             $sql = "INSERT INTO clientes (nombre, correo, direccion) "
                     . "VALUES ('" . $this->nombre . "','" . $this->correo . "','" . $this->direccion . "')";
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
     public function selectIdC($id = 0) {
         $rows = [];
         try {
             $conect = new Connection();
             $pdo = $conect->OpenConnection();
             $sql = "SELECT * FROM clientes";
             if ($id) {
                 $sql .= " WHERE id = '" . $id . "'";
             }
             $result = $pdo->query($sql);
             while ($row = $result->fetch()) {
                 $rows[] = new Cliente($row["correo"], $row["nombre"], $row["direccion"], $row["id"]);
             }
         } catch (Exception $ex) {
             
         }
         return $rows;
     }
     
     public function update() {
         try {
             $conect = new Connection();
             $pdo = $conect->openConnection();
             $query = "UPDATE clientes SET nombre = '$this->nombre', correo = '$this->correo', precio = '$this->direccion'  WHERE id = '" . $this->getAttribute("idCliente") . "'";
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
 