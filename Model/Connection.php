<?php

 require 'config.php';
 require_once('config.php');

 class Connection {

     private $std;

     public function __construct() {
         $this->std = "mysql:dbname=" . DB_NAME;
     }

     /**
      * @return \PDO
      */
     public function OpenConnection() {
         try {
             return new PDO($this->std, DB_USER, DB_PASSWORD);
         } catch (PDOException $ex) {
             print "Database Error: " . $ex->getMessage();
         }
     }

 }
 