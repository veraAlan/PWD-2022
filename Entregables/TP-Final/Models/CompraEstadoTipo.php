<?php

class CompraEstadoTipo
{
    private $idCompraEstadoTipo;
    private $cetDescripcion;
    private $cetDetalle;
    private $mensajeOperacion;


    public function getIdCompraEstadoTipo()
    {
        return $this->idCompraEstadoTipo;
    }
    public function getCetDescripcion()
    {
        return $this->cetDescripcion;
    }
    public function getCetDetalle()
    {
        return $this->cetDetalle;
    }
    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }


    public function setCetDetalle($cetDetalle)
    {
        $this->cetDetalle = $cetDetalle;
    }
    public function setCetDescripcion($cetDescripcion)
    {
        $this->cetDescripcion = $cetDescripcion;
    }
    public function setIdCompraEstadoTipo($idCompraEstadoTipo)
    {
        $this->idCompraEstadoTipo = $idCompraEstadoTipo;
    }
    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }


    public function __construct()
    {
        $this->idCompraEstadoTipo = "";
        $this->cetDescripcion = "";
        $this->cetDetalle = "";
        $this->mensajeOperacion = "";
    }

    public function setear($id, $descripcion, $detalle)
    {
        $this->setIdCompraEstadoTipo($id);
        $this->setCetDescripcion($descripcion);
        $this->setCetDetalle($detalle);
    }


    public function Load()
    {
        $resp = false;
        $dataBase = new dataBase();
        $sql = "SELECT * FROM compraestadotipo WHERE idCompraEstadoTipo = " . $this->getIdCompraEstadoTipo();
        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idCompraEstadoTipo'], $row['cetDescripcion'], $row['cetDetalle']);
                    $resp = true;
                }
            }
        } else {
            $this->setmensajeoperacion("CompraEstadoTipo->Load: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Insert()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "INSERT INTO compraestadotipo (cetdescripcion, cetdetalle) VALUES (
                '" . $this->getCetDescripcion() . "',
                '" . $this->getCetDetalle() . "');";

        if ($dataBase->Start()) {
            if ($dataBase = $dataBase->Execute($sql)) {
                $this->setIdCompraEstadoTipo($dataBase);
                $resp = true;
            } else {
                $this->setMensajeOperacion("CompraEstadoTipo->Insert: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("CompraEstadoTipo->Insert: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "UPDATE compraestadotipo SET
                idCompraEstadoTipo='" . $this->getIdCompraEstadoTipo() . "',
                cetDescripcion='" . $this->getCetDescripcion() . "',
                cetDetalle='" . $this->getCetDetalle() . "'
                WHERE idcompraestadotipo='" . $this->getIdCompraEstadoTipo() . "'";

        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("CompraEstadoTipo->Modify: " . $dataBase->getError());
            }
        } else {
            $this->setmensajeoperacion("CompraEstadoTipo->Modify: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Delete()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "DELETE FROM compraestadotipo WHERE idCompraEstadoTipo=" . $this->getIdCompraEstadoTipo();
        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("CompraEstadoTipo->Delete: " . $dataBase->getError());
            }
        } else {
            $this->setmensajeoperacion("CompraEstadoTipo->Delete: " . $dataBase->getError());
        }
        return $resp;
    }

    public static function List($argument = "")
    {
        $array = array();
        $dataBase = new DataBase();
        $sql = "SELECT * FROM compraestadotipo ";
        if ($argument != "") {
            $sql .= 'WHERE ' . $argument;
        }
        $res = $dataBase->Execute($sql);
        if ($res > -1) {
            if ($res > 0) {
                while ($row = $dataBase->Register()) {
                    $object = new CompraEstadoTipo();
                    $object->setear($row['idCompraEstadoTipo'], $row['cetDescripcion'], $row['cetDetalle']);
                    array_push($array, $object);
                }
            }
        }
        return $array;
    }
}
