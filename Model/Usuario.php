<?php

 require_once("Model/Connection.php");

 class Usuario {

     public $usuario;
     public $contrasena;
     public $rol;
     private $idUsuario;

     /**
      * 
      * @param string $pusuario
      * @param string $pcontrasena
      * @param int $prol
      * @param int $pidUsuario
      */
     public function __construct($pusuario = "", $pcontrasena = "", $prol = 0, $pidUsuario = 0) {
         $this->usuario = $pusuario;
         $this->contrasena = $pcontrasena;
         $this->rol = $prol;
         $this->idUsuario = $pidUsuario;
     }

     public function selectName($nn = "") {
         $rows = [];
         try {
             $conect = new Connection();
             $pdo = $conect->OpenConnection();
             $sql = "SELECT * FROM usuarios WHERE usuario = '" . $nn . "'";

             $result = $pdo->query($sql);
             while ($row = $result->fetch()) {
                 $rows[] = new Usuario($row["usuario"], $row["contrasena"], $row["rol"], $row["id"]);
             }
         } catch (Exception $ex) {
             
         }
         return $rows[0];
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
 