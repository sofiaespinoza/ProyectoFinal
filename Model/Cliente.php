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
     public function __construct($pcorreo = "", $pcontrasena = "", $pnombre = "", $ptelefono = "", $pdireccion = "", $pidCliente = 0) {
         $this->correo = $pcorreo;
         $this->contrasena = $pcontrasena;
         $this->nombre = $pnombre;
         $this->telefono = $ptelefono;
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
             $sql = "INSERT INTO clientes (Nombre, Telefono, Direccion, Correo, Contrasena) "
                     . "VALUES ('" . $this->nombre . "','" . $this->telefono . "','" . $this->direccion . "','" . $this->correo . "','" . $this->contrasena . "')";
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
             $sql = "SELECT * FROM clientes";
             if ($id) {
                 $sql .= " WHERE id = '" . $id . "'";
             }
             $result = $pdo->query($sql);
             while ($row = $result->fetch()) {
                 $rows[] = new Cliente($row["Nombre"], $row["Telefono"], $row["Direccion"], $row["Correo"], $row["Contrasena"], $row["Id"]);
             }
         } catch (Exception $ex) {
             
         }
         return $rows;
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
 