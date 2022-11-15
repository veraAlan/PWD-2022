<?php

class CompraEstado
{
    private $idCompraEstado;
    private $compra;
    private $compraEstadoTipo;
    private $ceFechaIni;
    private $ceFechaFin;
    private $mensajeOperacion;


    public function getIdCompraEstado()
    {
        return $this->idCompraEstado;
    }
    public function setIdCompraEstado($idCompraEstado)
    {
        $this->idCompraEstado = $idCompraEstado;
    }

    public function getCeFechaIni()
    {
        return $this->ceFechaIni;
    }
    public function setCeFechaIni($ceFechaIni)
    {
        $this->ceFechaIni = $ceFechaIni;
    }

    public function getCeFechaFin()
    {
        return $this->ceFechaFin;
    }
    public function setCeFechaFin($ceFechaFin)
    {
        $this->ceFechaFin = $ceFechaFin;
    }

    public function getCompra()
    {
        return $this->compra;
    }
    public function setCompra($compra)
    {
        $this->compra = $compra;
    }

    public function getCompraEstadoTipo()
    {
        return $this->compraEstadoTipo;
    }
    public function setCompraEstadoTipo($compraEstadoTipo)
    {
        $this->compraEstadoTipo = $compraEstadoTipo;
    }
    public function getMensajeOperacion()
    {
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($mensajeOperacion)
    {
        $this->mensajeOperacion = $mensajeOperacion;
    }


    public function __construct()
    {
        $this->idCompraEstado = "";
        $this->compra = new Compra();
        $this->comoEstadoTipo = new CompraEstadoTipo();
        $this->ceFechaIni = getDate();
        $this->ceFechaFin = null;
    }

    public function setear($id, $compra, $compraEstadoTipo, $ceFechaIni, $ceFechaFin)
    {
        $this->setIdCompraEstado($id);
        $this->setCompra($compra);
        $this->setCompraEstadoTipo($compraEstadoTipo);
        $this->setCeFechaIni($ceFechaIni);
        $this->setCeFechaFin($ceFechaFin);
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM compraestado WHERE idCompraEstado = " . $this->getIdCompraEstado();

        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);

            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();

                    $compra = null;
                    if ($row['idCompra'] != null) {
                        $compra = new Compra();
                        $compra->setIdCompra($row['idCompra']);
                        $compra->Load();
                    }

                    $compraEstadoTipo = null;
                    if ($row['idCompraEstadoTipo'] != null) {
                        $compraEstadoTipo = new CompraEstadoTipo();
                        $compraEstadoTipo->setIdCompraEstadoTipo($row['idCompraEstadoTipo']);
                        $compraEstadoTipo->Load();
                    }

                    $resp =  true;
                    $this->setear($row['idCompraEstado'], $compra, $compraEstadoTipo, $row['ceFechaIni'], $row['ceFechaFin']);
                }
            }
        } else {
            $this->setMensajeOperacion("menu->Load: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Insert()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "INSERT INTO compraestado (idCompra,idCompraEstadoTipo,ceFechaIni,ceFechaFin)  VALUES (
                " . $this->getCompra()->getIdCompra() . ",
                " . $this->getCompraEstadoTipo()->getIdCompraEstadoTipo() . ",
                '" . $this->getCeFechaIni() . "',
                '" . $this->getCeFechaFin() . "'
                )";

        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("compraestado->Insert: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("compraestado->Insert: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "UPDATE compraestado SET
                idCompraEstado='" . $this->getIdCompraEstado() . "',
                idCompra='" . $this->getCompra()->getIdCompra() . "',
                idCompraEstadoTipo='" . $this->getCompraEstadoTipo()->getIdCompraEstadoTipo() . "',
                ceFechaIni='" . $this->getCeFechaIni() . "',
                ceFechaFin='" . $this->getCeFechaFin() . "'
                WHERE idCompraEstado='" . $this->getIdCompraEstado() . "'";

        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("CompraEstado->Modify: " . $dataBase->getError());
            }
        } else {
            $this->setmensajeoperacion("CompraEstado->Modify: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Delete()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "DELETE FROM compraEstado WHERE idCompraEstado=" . $this->getIdCompraEstado();
        if ($dataBase->Start()) {
            if ($dataBase->Execute($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("CompraEstado->Delete: " . $dataBase->getError());
            }
        } else {
            $this->setmensajeoperacion("CompraEstado->Delete: " . $dataBase->getError());
        }
        return $resp;
    }

    public function listar($argument = "")
    {
        $arreglo = null;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM compraEstado ";
        if ($argument != "") {
            $sql .= 'WHERE ' . $argument;
        }
        $res = $dataBase->Execute($sql);
        if ($res > -1) {
            if ($res > 0) {

                $array = array();
                while ($row = $dataBase->Register()) {
                    $object = new CompraEstado();

                    $objCompra = null;
                    if ($row['idCompra'] != null) {
                        $objCompra = new Compra();
                        $objCompra->setIdCompra($row['idCompra']);
                        $objCompra->Load();
                    }
                    $objCompraEstadoTipo = null;
                    if ($row['idCompraEstadoTipo'] != null) {
                        $objCompraEstadoTipo = new CompraEstadoTipo();
                        $objCompraEstadoTipo->setIdCompraEstadoTipo($row['idCompraEstadoTipo']);
                        $objCompraEstadoTipo->Load();
                    }

                    $object->setear($row['idCompraEstado'], $objCompra, $objCompraEstadoTipo, $row['ceFechaIni'], $row['ceFechaFin']);
                    array_push($array, $object);
                }
            }
        } else {
            $this->setMensajeOperacion("CompraEstado->listar: " . $dataBase->getError());
        }
        return $array;
    }
}
