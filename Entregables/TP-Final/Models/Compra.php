<?php
class Compra
{
    private $idCompra;
    private $fecha;
    private $objUsuario;

    //Getters
    public function getIdCompra()
    {
        return $this->idCompra;
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
    public function setIdCompra($idCompra)
    {
        $this->idCompra = $idCompra;
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
        $this->idCompra = "";
        $this->fecha = "";
        $this->objUsuario = new Usuario;
    }

    public function setear($idCompra, $fecha, $idUsuario)
    {
        $resp = false;
        $this->objUsuario->setIdUsuario($idUsuario);
        if ($this->objUsuario->cargar()) {
            $this->setIdCompra($idCompra);
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
            $sql = "SELECT * FROM compra WHERE idCompra = " . $this->getIdCompra();
        }
        if ($dataBase->Start()) {
            $res = $dataBase->Execute($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $dataBase->Register();
                    $this->setear($row['idCompra'], $row['coFecha'], $row['idUsuario']);
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
        $consulta = "INSERT INTO compra (coFecha, idUsuario) VALUES (
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
        SET idCompra = '{$this->getIdCompra()}',
        coFecha = '{$this->getFecha()}',
        idUsuario = '{$this->getObjUsuario()->getIdUsuario()}',
        WHERE idCompra = '{$this->getIdCompra()}'";
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
            $consulta = "DELETE FROM compra WHERE idCompraItem = '" . $this->getIdCompra() . "'";
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
        $consultaCompra .= " ORDER BY idCompra ";
        if ($dataBase->Start()) {
            if ($dataBase->Execute($consultaCompra)) {
                $array = array();
                while ($compra = $dataBase->Register()) {
                    $object = new Compra();
                    $object->setear($compra['idCompra'], $compra['coFecha'], $compra['idUsuario']);
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
