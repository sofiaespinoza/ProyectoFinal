<?php

  class DetalleFactura {

    public $producto;
    public $cantidad;
    private $idDetalle;

    /**
     * 
     * @param int $pproducto
     * @param int $pcantidad
     * @param int $pidDetalle
     */
    public function __construct($pproducto = 0, $pcantidad = 0, $pidDetalle = 0) {
      $this->producto = $pproducto;
      $this->cantidad = $pcantidad;
      $this->idDetalle = $pidDetalle;
    }

    /**
     * Inserto detalles, recibo por parametro idFactura
     * @return boolean
     */
    public function insertDetalle($factura = 0) {
      try {
        $conect = new Connection();
        $pdo = $conect->OpenConnection();
        $sql = "INSERT INTO detalle(factura, producto, cantidad) "
          . "VALUES ( '" . $factura . "','" . $this->producto . "','" . $this->cantidad . "')";
        return $pdo->query($sql);
      } catch (Exception $ex) {
        error_log("ERROR: " . $ex->getMessage());
      }
      return FALSE;
    }

    /**
     * Recibo todos los detalles por idFactura
     * @param int $idFactura
     * @return \DetalleFactura
     */
    public function selectDetallePorFactura($idFactura = 0) {
      $rows = [];
      try {
        $conect = new Connection();
        $pdo = $conect->OpenConnection();
        $sql = "SELECT * FROM detalle";
        if ($idFactura) {
          $sql .= " WHERE factura = '" . $idFactura . "'";
        }
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
          $rows[] = new DetalleFactura($row["producto"], $row["cantidad"],$row["id"]);
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
  