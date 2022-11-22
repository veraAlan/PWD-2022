<?php

class CompraEstado
{
    private $idcompraestado;
    private $compra;
    private $compraEstadoTipo;
    private $cefechaini;
    private $cefechafin;
    private $mensajeOperacion;


    public function getIdCompraEstado()
    {
        return $this->idcompraestado;
    }
    public function setIdCompraEstado($idcompraestado)
    {
        $this->idcompraestado = $idcompraestado;
    }

    public function getCeFechaIni()
    {
        return $this->cefechaini;
    }
    public function setCeFechaIni($cefechaini)
    {
        $this->cefechaini = $cefechaini;
    }

    public function getCeFechaFin()
    {
        return $this->cefechafin;
    }
    public function setCeFechaFin($cefechafin)
    {
        $this->cefechafin = $cefechafin;
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
        $this->idcompraestado = "";
        $this->compra = new Compra();
        $this->comoEstadoTipo = new CompraEstadoTipo();
        $this->cefechaini = getDate();
        $this->cefechafin = null;
    }

    public function setear($id, $compra, $compraEstadoTipo, $cefechaini, $cefechafin)
    {
        $this->setIdCompraEstado($id);
        $this->setCompra($compra);
        $this->setCompraEstadoTipo($compraEstadoTipo);
        $this->setCeFechaIni($cefechaini);
        $this->setCeFechaFin($cefechafin);
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "SELECT * FROM compraestado WHERE idcompra = " . $this->getIdCompraEstado();

        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);

            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();

                    $compra = new Compra();
                    if ($row['idcompra'] != null) {
                        $compra->setIdCompra($row['idcompra']);
                        $compra->Load();
                    }

                    $compraEstadoTipo = new CompraEstadoTipo();
                    if ($row['idcompraestadotipo'] != null) {
                        $compraEstadoTipo->setIdCompraEstadoTipo($row['idcompraestadotipo']);
                        $compraEstadoTipo->Load();
                    }

                    $resp =  true;
                    $this->setear($row['idcompraestado'], $compra, $compraEstadoTipo, $row['cefechaini'], $row['cefechafin']);
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
        $sql = "INSERT INTO compraestado (idcompra,idcompraestadotipo,cefechaini)  VALUES (
                " . $this->getCompra()->getIdCompra() . ",
                " . $this->getCompraEstadoTipo()->getIdCompraEstadoTipo() . ",
                '" . $this->getCeFechaIni() . "');";

        if ($dataBase->Start()) {
            if (!$this->Load()) {
                if ($elid = $dataBase->Execute($sql)) {
                    $this->setIdCompraEstado($elid);
                    $resp = true;
                } else {
                    $this->setMensajeOperacion("usuario->Insert: " . $dataBase->getError());
                }
            } else {
                $this->setMensajeOperacion("usuario->Insert: " . $dataBase->getError());
            }
        } else {
            $this->setMensajeOperacion("usuario->Insert: " . $dataBase->getError());
        }
        return $resp;
    }

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = "UPDATE compraestado SET
                idcompraestado='" . $this->getIdCompraEstado() . "',
                idcompra='" . $this->getCompra()->getIdCompra() . "',
                idcompraestadotipo='" . $this->getCompraEstadoTipo()->getIdCompraEstadoTipo() . "',
                cefechaini='" . $this->getCeFechaIni() . "',
                cefechafin='" . $this->getCeFechaFin() . "'
                WHERE idcompraestado='" . $this->getIdCompraEstado() . "'";

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
        $sql = "DELETE FROM compraEstado WHERE idcompraestado=" . $this->getIdCompraEstado();

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

    public function List($argument = "")
    {
        $array = array();
        $dataBase = new DataBase();
        $sql = "SELECT * FROM compraEstado ";
        if ($argument != "") {
            $sql .= 'WHERE ' . $argument;
        }

        if ($dataBase->Execute($sql) > -1) {
            while ($row = $dataBase->Register()) {
                $object = new CompraEstado();

                $objCompra = new Compra();
                if ($row['idcompra'] != null) {
                    $objCompra->setIdCompra($row['idcompra']);
                    $objCompra->Load();
                }

                $objCompraEstadoTipo = new CompraEstadoTipo();
                if ($row['idcompraestadotipo'] != null) {
                    $objCompraEstadoTipo->setIdCompraEstadoTipo($row['idcompraestadotipo']);
                    $objCompraEstadoTipo->Load();
                }

                $object->setear($row['idcompraestado'], $objCompra, $objCompraEstadoTipo, $row['cefechaini'], $row['cefechafin']);
                array_push($array, $object);
            }
        } else {
            $this->setMensajeOperacion("CompraEstado->listar: " . $dataBase->getError());
        }
        return $array;
    }
}
