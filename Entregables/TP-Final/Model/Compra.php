<?php
class Compra
{
    private $idcompra;
    private $fecha;
    private $objUsuario;

    //Getters
    public function getIdCompra()
    {
        return $this->idcompra;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getObjUsuario()
    {
        return $this->objUsuario;
    }

    public function getMensajeFuncion()
    {
        return $this->mensajeFuncion;
    }

    //Setters
    public function setIdCompra($idcompra)
    {
        $this->idcompra = $idcompra;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setObjUsuario($objUsuario)
    {
        $this->objUsuario = $objUsuario;
    }

    public function setMensajeFuncion($mensajeFuncion)
    {
        $this->mensajeFuncion = $mensajeFuncion;
    }

    public function __construct()
    {
        $this->idcompra = "";
        $this->fecha = "";
        $this->objUsuario = new Usuario();
    }

    public function setear($idcompra, $fecha, $idusuario)
    {
        $resp = false;
        $this->objUsuario->setIdUsuario($idusuario);
        if ($this->objUsuario->Load()) {
            $this->setIdCompra($idcompra);
            $this->setFecha($fecha);
            $resp = true;
        }
        return $resp;
    }

    public function Load()
    {
        $resp = false;
        $dataBase = new DataBase();
        $sql = null;
        if ($this->getIdCompra() != '') {
            $sql = "SELECT * FROM compra WHERE idcompra = " . $this->getIdCompra();
        }
        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idcompra'], $row['cofecha'], $row['idusuario']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $resp;
    }

    public function Insert()
    {
        $dataBase = new DataBase();
        $resp = false;
        $consulta = "INSERT INTO compra (cofecha, idusuario) VALUES (
		" . $this->getFecha() . ",
		" . $this->getObjUsuario()->getIdUsuario() . ")";
        if ($dataBase->Start()) {
            if ($dataBase->Execute($consulta)) {
                $resp =  true;
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $resp;
    }

    public function Modify()
    {
        $resp = false;
        $dataBase = new DataBase();
        $consulta = "UPDATE compra
        SET idcompra = '{$this->getIdCompra()}',
        cofecha = '{$this->getFecha()}',
        idusuario = '{$this->getObjUsuario()->getIdUsuario()}',
        WHERE idcompra = '{$this->getIdCompra()}'";
        if ($dataBase->Start()) {
            if ($dataBase->Execute($consulta)) {
                $resp =  true;
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $resp;
    }

    public function Delete()
    {
        $dataBase = new DataBase();
        $resp = false;
        if ($dataBase->Start()) {
            $consulta = "DELETE FROM compra WHERE idcompraItem = '" . $this->getIdCompra() . "'";
            if ($dataBase->Execute($consulta)) {
                $resp =  true;
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $resp;
    }

    public function List($argument = "")
    {
        $array = null;
        $dataBase = new DataBase();
        $consultaCompra = "SELECT * FROM compra ";
        if ($argument != "") {
            $consultaCompra = $consultaCompra . ' WHERE ' . $argument;
        }

        if ($dataBase->Start()) {
            if ($dataBase->Execute($consultaCompra)) {
                $array = array();
                while ($compra = $dataBase->Register()) {
                    $object = new Compra();
                    $object->setear($compra['idcompra'], $compra['cofecha'], $compra['idusuario']);
                    array_push($array, $object);
                }
            } else {
                $this->setMensajeFuncion($dataBase->getError());
            }
        } else {
            $this->setMensajeFuncion($dataBase->getError());
        }
        return $array;
    }
}
