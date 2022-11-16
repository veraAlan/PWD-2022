<?php

class CompraEstadoTipo
{
    private $idcompraestadotipo;
    private $cetdescripcion;
    private $cetdetalle;
    private $mensajeOperacion;


    public function getIdCompraEstadoTipo()
    {
        return $this->idcompraestadotipo;
    }
    public function getCetDescripcion()
    {
        return $this->cetdescripcion;
    }
    public function getCetDetalle()
    {
        return $this->cetdetalle;
    }
    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }


    public function setCetDetalle($cetdetalle)
    {
        $this->cetdetalle = $cetdetalle;
    }
    public function setCetDescripcion($cetdescripcion)
    {
        $this->cetdescripcion = $cetdescripcion;
    }
    public function setIdCompraEstadoTipo($idcompraestadotipo)
    {
        $this->idcompraestadotipo = $idcompraestadotipo;
    }
    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }


    public function __construct()
    {
        $this->idcompraestadotipo = "";
        $this->cetdescripcion = "";
        $this->cetdetalle = "";
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
        $sql = "SELECT * FROM compraestadotipo WHERE idcompraestadotipo = " . $this->getIdCompraEstadoTipo();
        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idcompraestadotipo'], $row['cetdescripcion'], $row['cetdetalle']);
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
                idcompraestadotipo='" . $this->getIdCompraEstadoTipo() . "',
                cetdescripcion='" . $this->getCetDescripcion() . "',
                cetdetalle='" . $this->getCetDetalle() . "'
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
        $sql = "DELETE FROM compraestadotipo WHERE idcompraestadotipo=" . $this->getIdCompraEstadoTipo();
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
                    $object->setear($row['idcompraestadotipo'], $row['cetdescripcion'], $row['cetdetalle']);
                    array_push($array, $object);
                }
            }
        }
        return $array;
    }
}
