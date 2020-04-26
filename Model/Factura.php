<?php

  class Factura {

    public $detalle;
    public $cliente;
    public $total;
    private $idFactura;

    /**
     * 
     * @param int $pcliente
     * @param int $ptotal
     * @param int $pidFactura
     */
    public function __construct($pcliente = 0, $ptotal = 0, $pidFactura = 0) {

      //inicializo la lista de detalles
      $detalle = array();
      $this->cliente = $pcliente;
      $this->total = $ptotal;
      $this->idFactura = $pidFactura;
    }

    /**
     * Inserta factura a la base de Datos
     * @return boolean
     * 
     */
    public function insertFactura() {
      try {
        $conect = new Connection();
        $pdo = $conect->OpenConnection();
        $sql = "INSERT INTO facturas (cliente, total) "
          . "VALUES ('" . $this->cliente . "','" . $this->total . "')";
        //valido si sirve o no
        $var = $pdo->query($sql);
        if ($var) {
          //recupero last ID y  lo seteo a la factura
          $this->idFactura = $pdo->lastInsertId();
          //ingreso cada detalle a mi factura
          foreach ($this->detalle as $values) {
            $values->insertDetalle($pdo->lastInsertId());
          }
        }
        return $var;
      } catch (Exception $ex) {
        error_log("ERROR: " . $ex->getMessage());
      }
      return FALSE;
    }

    /**
     * Me selecciona factura por ID
     * @param int $id
     * @return \Factura
     */
    public function selectFactura($idFactura = 0) {
      $rows = [];
      try {
        $conect = new Connection();
        $pdo = $conect->OpenConnection();
        $sql = "SELECT * FROM facturas";
        if ($idFactura) {
          $sql .= " WHERE id = '" . $idFactura . "'";
        }
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
          $rows[] = new Factura($row["cliente"], $row["total"], $row["id"]);
        }
      } catch (Exception $ex) {
        
      }
      return $rows;
    }

    /**
     * Me añade items a la factura
     * @param DetalleFactura $detalleF
     */
    public function addDetalle(DetalleFactura $detalleF) {

      $this->detalle[] = $detalleF;
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
  